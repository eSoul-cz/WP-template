@Library(['dockerHelpers', 'deploy']) _

pipeline {
	agent any

	parameters {
		string(
			name: 'WP_VERSION',
			defaultValue: '7.0.2',
			description: 'Official WordPress image version; blank uses the Dockerfile default',
			trim: true
		)
		string(
			name: 'PHP_VERSION',
			defaultValue: '8.4',
			description: 'PHP-FPM image version; blank uses the Dockerfile default',
			trim: true
		)
	}

	environment {
		REGISTRY = 'rg.fr-par.scw.cloud/esoul-starters'
		REGISTRY_HOST = 'rg.fr-par.scw.cloud'

		// Images
		APP_IMAGE = 'esoul-wp'

		DEPLOY_STACK_NAMES = 'wp1,wp2,wp3'
	}

	stages {
		stage('Build images and deploy') {
			when {
				anyOf {
					branch 'main'
					branch 'master'
				}
			}

			stages {
				stage('Build and push image') {
					steps {
						withCredentials([string(credentialsId: 'scaleway_secret_key', variable: 'SECRET')]) {
							script {
								def dockerfileDefault = { argument ->
									sh(
										returnStdout: true,
										script: "sed -n 's/^ARG ${argument}=//p' Dockerfile"
									).trim()
								}
								def wpVersion = params.WP_VERSION?.trim() ?: dockerfileDefault('WP_VERSION')
								def phpVersion = params.PHP_VERSION?.trim() ?: dockerfileDefault('PHP_VERSION')
								def versionPattern = /^[0-9]+(?:\.[0-9]+){1,2}(?:[-.][A-Za-z0-9]+)*$/
								def dockerTagPattern = /^[A-Za-z0-9_][A-Za-z0-9_.-]{0,127}$/

								if (!(wpVersion ==~ versionPattern)) {
									error("Invalid WP_VERSION: ${wpVersion}")
								}
								if (!(phpVersion ==~ versionPattern)) {
									error("Invalid PHP_VERSION: ${phpVersion}")
								}

								def revision = sh(
									returnStdout: true,
									script: 'git rev-parse --short=12 HEAD'
								).trim()
								def buildTags = [
									"latest",
									revision,
									"${wpVersion}-php${phpVersion}",
								]

								// If the build is from a tagged commit, also tag the image with the tag
								def gitTags = sh(returnStdout: true, script: "git tag --points-at HEAD").trim().split("\\n")
								if (gitTags.size() > 0 && gitTags[0] != '') {
									for (tag in gitTags) {
										if (tag ==~ dockerTagPattern) {
											buildTags.add("${tag}")
										} else {
											echo "Skipping Git tag that is not a valid Docker tag: ${tag}"
										}
									}
								}

								echo 'Building multi-platform production Docker image...'
								dockerBuildMultiArch(
									registry: env.REGISTRY,
									registryHost: env.REGISTRY_HOST,
									registryPassword: env.SECRET,
									image: env.APP_IMAGE,
									contextDir: '.',
									tags: buildTags.unique(),
									dockerfileArgs: [
										WP_VERSION: wpVersion,
										PHP_VERSION: phpVersion,
									],
									dockerfile: 'Dockerfile',
									target: 'final',
								)
							}
						}
					}
				}
				stage('Deploy') {
					steps {
						script {
							echo 'Deploying the new Docker image to the server...'
						}

						// load komodo_deploy_api_key and komodo_deploy_api_secret
						withCredentials([
							string(credentialsId: 'komodo_deploy_api_key', variable: 'API_KEY'),
							string(credentialsId: 'komodo_deploy_api_secret', variable: 'API_SECRET')
						]) {
							script {

								// Get the list of stack names from the environment variable and split it into an array
								def stackNames = env.DEPLOY_STACK_NAMES.split(',')

								// Prepare parallel deployment stages for each stack
								def parallelStages = [:]
								for (int i = 0; i < stackNames.size(); i++) {
									def stackName = stackNames[i].trim()
									parallelStages["Deploy to ${stackName}"] = {
										// Set the DEPLOY_STACK_NAME environment variable for this deployment
										withEnv(["DEPLOY_STACK_NAME=${stackName}"]) {
											script {
												deployKomodoStack(
													apiKey: env.API_KEY,
													apiSecret: env.API_SECRET,
													deployStackName: env.DEPLOY_STACK_NAME
												)
											}
										}
									};
								}

								parallel parallelStages;
							}
						}
						script {
							echo 'Deployment completed successfully.'
						}
					}
				}
			}
		}
	}

	post {
		success {
			echo 'Pipeline completed successfully!'
		}
		failure {
			echo 'Pipeline failed!'
		}
	}
}
