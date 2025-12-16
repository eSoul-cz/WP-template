const deAudioPlayers = document.querySelectorAll('.de-audio-player');

let playlistItem;

deAudioPlayers.forEach(audioPlayer => {
    const audioElement = audioPlayer.querySelector('audio');
    
    if (audioElement.classList.contains("de-default-player")) {
        audioElement.addEventListener('play', () => {
            stopAllSongs(audioElement);
        });
        return;
    };

    const autoplay = audioPlayer.getAttribute('data-autoplay');

    const playPuaseBtn = audioPlayer.querySelector(".play-icon");
    const playIcon = audioPlayer.querySelector('.play-icon-svg');
    const pauseIcon = audioPlayer.querySelector('.pause-icon-svg');
    const currentTimeElement = audioPlayer.querySelector('.current-time');
    const durationElement = audioPlayer.querySelector('.duration');
    const seekSlider = audioPlayer.querySelector('.seek-slider');
    const volumeOutput = audioPlayer.querySelector('.volume-output');
    const muteIcon = audioPlayer.querySelector('.mute-icon');
    const muteIconSvg = audioPlayer.querySelector('.mute-icon-svg');
    const mutedIconSvg = audioPlayer.querySelector('.muted-icon-svg');
    const volumeSlider = audioPlayer.querySelector('.volume-slider');
    const timeWrapper = audioPlayer.querySelector('.progress-before');
    const loadingIndicator = audioPlayer.querySelector('.loading-indicator');


    const nextButton = audioPlayer.querySelector('.next-song');
    const previousButton = audioPlayer.querySelector('.prev-song');

    playlistItem = audioPlayer.querySelectorAll('.playlist-item');
    const mainSongName = audioPlayer.querySelector('.main-song-name');

    let currentAudio = audioElement;
    let currenAudioIndex = 0;

    function stopAllSongs(currentAudio, playIcon, pauseIcon) {
        deAudioPlayers.forEach(audioPlayer => {
            const audioElement = audioPlayer.querySelector('audio');
            
            // 
            if (audioElement === currentAudio){
                return;
            };

            if(audioElement.classList.contains("de-default-player")){
                audioElement.pause();
                return;
            }

            const playIcon = audioPlayer.querySelector('.play-icon-svg');
            const pauseIcon = audioPlayer.querySelector('.pause-icon-svg');
            audioElement.pause();
            playIcon.classList.remove('hide');
            pauseIcon.classList.add('hide');

            const playlistItem = audioPlayer.querySelectorAll('.playlist-item');
            playlistItem.forEach(el => {
                const audioFile = el.querySelector('audio');
                audioFile.pause();
            });
        });
    };

    currentAudio.addEventListener('waiting', function () {
        loadingIndicator.classList.remove('hide');
        playIcon.classList.add('hide');
        pauseIcon.classList.remove('hide');
    });

    currentAudio.addEventListener('playing', function () {
        loadingIndicator.classList.add('hide');
        playIcon.classList.add('hide');
        pauseIcon.classList.remove('hide');
    });


    playlistItem.forEach((el, index) => {
        const songName = el.querySelector('.song-name');
        const audioFile = el.querySelector('audio');
        const durationEl = el.querySelector('.duration');

        el.setAttribute('data-no', index);

        audioFile.addEventListener('loadedmetadata', function () {
            durationEl.textContent = formatTime(audioFile.duration);
        });

        el.addEventListener('click', function () {
            stopAllSongs(currentAudio, playIcon, pauseIcon);
            mainSongName.innerHTML = songName.innerHTML;

            playlistItem.forEach(item => {
                item.classList.remove('active');
            });

            el.classList.add('active');

            timeWrapper.style.setProperty('--seek-before-width', '10%');

            // Update audioElement source with the clicked song
            audioElement.src = audioFile.src;
            currentAudio = audioElement;
            currentAudio.play();

            currenAudioIndex = Number(el.getAttribute('data-no'));

            if (currenAudioIndex == 0) {
                previousButton.classList.add('disabled');
            } else {
                previousButton.classList.remove('disabled');
            }


            if (currenAudioIndex == playlistItem.length - 1) {
                nextButton.classList.add('disabled');
            } else {
                nextButton.classList.remove('disabled');
            }

            playIcon.classList.add('hide');
            pauseIcon.classList.remove('hide');

            // Update currentTimeElement and durationElement
            currentAudio.addEventListener('loadedmetadata', () => {
                currentTimeElement.textContent = formatTime(currentAudio.currentTime);
                durationElement.textContent = formatTime(currentAudio.duration);

                // Update seekSlider value
                let percentageValue = (currentAudio.currentTime * 100) / currentAudio.duration;
                seekSlider.value = percentageValue;
            });
        });
    });

    playPuaseBtn.addEventListener('click', function () {

        if (currentAudio.paused) {
            stopAllSongs(currentAudio, playIcon, pauseIcon);
            currentAudio.play()
            playIcon.classList.add('hide');
            pauseIcon.classList.remove('hide');
        } else {
            currentAudio.pause();
            playIcon.classList.remove('hide');
            pauseIcon.classList.add('hide');
        }

        if (currentAudio.paused) {
            loadingIndicator.classList.add('hide');
        }
    });

    currentAudio.addEventListener('timeupdate', function () {
        const currentTime = currentAudio.currentTime;
        const duration = currentAudio.duration;
        currentTimeElement.textContent = formatTime(currentTime);
        let percentageValue = (currentTime * 100) / duration;
        seekSlider.value = percentageValue;
        timeWrapper.style.setProperty('--seek-before-width', (percentageValue.toFixed() + '%'));

        if (currentTime == duration) {
            playIcon.classList.remove('hide');
            pauseIcon.classList.add('hide');
        }
    });

    currentAudio.addEventListener('loadedmetadata', function () {
        const duration = currentAudio.duration;
        durationElement.textContent = formatTime(duration);
    });

    currentAudio.addEventListener('timeupdate', function () {
        if (currentAudio.src === audioElement.src) {
            const currentTime = currentAudio.currentTime;
            const duration = currentAudio.duration;
            currentTimeElement.textContent = formatTime(currentTime);
            let percentageValue = (currentTime * 100) / duration;
            seekSlider.value = percentageValue;
            timeWrapper.style.setProperty('--seek-before-width', (percentageValue.toFixed() + '%'));

            if (currentTime === duration) {
                playIcon.classList.remove('hide');
                pauseIcon.classList.add('hide');
            }
        }
    });

    seekSlider.addEventListener('input', function () {
        const duration = currentAudio.duration;
        const value = seekSlider.value;
        const currentTime = (value * duration) / 100;
        currentAudio.currentTime = currentTime;
        currentTimeElement.textContent = formatTime(currentTime);
        // Update the --seek-before-width property
        let percentageValue = (currentTime * 100) / duration;
        timeWrapper.style.setProperty('--seek-before-width', (percentageValue.toFixed() + '%'));
    });



    muteIcon.addEventListener('click', function () {
        currentAudio.muted = !currentAudio.muted;
        muteIconSvg.classList.toggle('hide');
        mutedIconSvg.classList.toggle('hide');
    });

    volumeSlider.addEventListener('input', function () {
        currentAudio.volume = volumeSlider.value / 100;
        volumeOutput.value = volumeSlider.value;
    });

    function playSong(index) {
        // Clear active class from all playlist items
        playlistItem.forEach(item => {
            item.classList.remove('active');
        });

        if (index == 0) {
            previousButton.classList.add('disabled');
        } else {
            previousButton.classList.remove('disabled');
        }

        if (index == playlistItem.length - 1) {
            nextButton.classList.add('disabled');
        } else {
            nextButton.classList.remove('disabled');
        }

        // Return if the index is out of bounds
        if (index < 0 || index >= playlistItem.length) {
            return;
        }

        // Add active class to the current playlist item
        playlistItem[index].classList.add('active');

        const audioFile = playlistItem[index].querySelector('audio');
        const songName = playlistItem[index].querySelector('.song-name');
        const durationEl = playlistItem[index].querySelector('.duration');

        stopAllSongs(playIcon, pauseIcon);
        mainSongName.innerHTML = songName.innerHTML;
        audioElement.src = audioFile.src;
        currentAudio = audioElement;
        currentAudio.play();
        updateDuration(durationEl, audioFile.duration);
    }

    function playNextSong() {
        if (currenAudioIndex < playlistItem.length - 1) {
            currenAudioIndex++;
            playSong(currenAudioIndex);
        } else if (autoplay == 'true') {
            currentAudio.pause();
            playIcon.classList.remove('hide');
            pauseIcon.classList.add('hide');
        }
    }

    currentAudio.addEventListener('ended', function () {
        if (autoplay == 'true') {
            playNextSong();
        }
    });

    function playPreviousSong() {
        if (currenAudioIndex > 0) {
            currenAudioIndex--;
            playSong(currenAudioIndex);
        }
    }

    function updateDuration(durationEl, duration) {
        durationEl.textContent = formatTime(duration);
    }

    if (nextButton) {
        nextButton.addEventListener('click', playNextSong);
        previousButton.addEventListener('click', playPreviousSong);
    }

});

function formatTime(time) {
    if (isNaN(time) || time < 0) {
        return '0:00';
    }

    const formatter = new Intl.DateTimeFormat('en-US', {
        minute: 'numeric',
        second: 'numeric'
    });
    return formatter.format(time * 1000);
}