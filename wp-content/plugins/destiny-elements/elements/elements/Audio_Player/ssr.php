<?php

$de_audio_file = (string) ($propertiesData['content']['audio']['mp3_file']['url'] ?? '/');
$de_player_type = (string) ($propertiesData['content']['options']['player'] ?? 'custom'); // default and custom available
$de_player_data = (string) ($propertiesData['content']['options']['data_type'] ?? ''); // Supports ACF or Meta box

//icons
$de_play_icon = isset($propertiesData['design']['play_pause_button']['play_icon']['icon']) ? $propertiesData['design']['play_pause_button']['play_icon']['icon']['svgCode'] : false;
$de_pause_icon = isset($propertiesData['design']['play_pause_button']['pause_icon']['icon']) ? $propertiesData['design']['play_pause_button']['pause_icon']['icon']['svgCode'] : false;

$de_mute_icon = isset($propertiesData['design']['volume']['volume_icon']) ? $propertiesData['design']['volume']['volume_icon']['svgCode'] : false;
$de_unmute_icon = isset($propertiesData['design']['volume']['unmute_icon']) ? $propertiesData['design']['volume']['unmute_icon']['svgCode'] : false;

$de_next_icon = isset($propertiesData['design']['next_previous_button']['next_icon']['icon']) ? $propertiesData['design']['next_previous_button']['next_icon']['icon']['svgCode'] : false;
$de_previous_icon = isset($propertiesData['design']['next_previous_button']['previous_icon']['icon']) ? $propertiesData['design']['next_previous_button']['previous_icon']['icon']['svgCode'] : false;

//Playlist
$de_player_counter = (bool) ($propertiesData['content']['options']['include_counter'] ?? false);

// Enable Download
$enable_download = (bool) ($propertiesData['design']['download']['enable_download'] ?? false);
$download_icon = (string) ($propertiesData['design']['download']['download_icon']['svgCode'] ?? '');

// ACF
$de_acf_audio_file = (string) ($propertiesData['content']['audio']['acf_file_field_name'] ?? '');
$de_acf_repeater_field = (string) ($propertiesData['content']['playlist']['acf_repeater_field_name'] ?? '');
$de_acf_file_field = (string) ($propertiesData['content']['playlist']['acf_repeater_file_field'] ?? '');
$de_acf_song_field = (string) ($propertiesData['content']['playlist']['acf_repeater_song_name_field'] ?? '');
$de_acf_audio_file_name_type = (string) ($propertiesData['content']['playlist']['acf_song_name'] ?? '');
if(!$de_acf_audio_file_name_type || $de_acf_audio_file_name_type == 'custom') {
  $de_acf_audio_file_name_type = false;
}

//Metabox
$de_mb_audio_file = (string) ($propertiesData['content']['audio']['meta_box_file_id'] ?? '');
$de_mb_group = (string) ($propertiesData['content']['playlist']['meta_box_group_id'] ?? '');
$de_mb_group_name = (string) ($propertiesData['content']['playlist']['meta_box_song_name_id'] ?? '');
$de_mb_group_file = (string) ($propertiesData['content']['playlist']['meta_box_file_id'] ?? '');


?>


<?php if($de_player_data != 'acf' && $de_player_data != 'metabox' && $de_player_type == 'default' || $de_player_type == '') { ?>

<audio class="de-default-player" controls>
  <source src="<?php echo $de_audio_file; ?>" type="audio/mpeg">
Your browser does not support the audio element.
</audio> 
<?php }

if ($de_player_data == 'acf') {
  if ( is_plugin_active( 'advanced-custom-fields-pro/acf.php' ) ) {
    $audio_file = get_field($de_acf_audio_file);

    if ($de_player_type == 'custom' && $audio_file) { 
    
      ?>
      <audio class="audio-file" src="<?php echo $audio_file['url'] ?>" preload="metadata"></audio>
      <button class="play-icon">
        <div class="play-icon-svg" title="Play">
        <?php echo $de_play_icon; ?>
        </div>
        <div class="pause-icon-svg hide" title="Pause">
        <?php echo $de_pause_icon; ?>
        </div>
        <div class="loading-indicator hide"></div>
      </button>
      
      <div class="time-wrapper">
        <span class="progress-before" style="--seek-before-width: 3%;">
          <input type="range" class="seek-slider" max="100" value="0">
        </span>
        <span class="current-time time">00:00</span>
        <span class="dur-seperator">/</span>
        <span class="duration time">00:00</span>
      </div>

    <div class="volume-wrapper">
        <output style="display: none;" class="volume-output">100</output>
        <button class="mute-icon" title="Mute">
          <div class="mute-icon-svg">
          <?php echo $de_mute_icon; ?>
        </div>
          <div class="muted-icon-svg hide" title="Unmute">
          <?php echo $de_unmute_icon; ?>
        </div>
        </button>
        <input style="display: none" type="range" class="volume-slider" max="100" value="100">
      </div>

      <?php if($enable_download && $de_player_type != 'playlist') { ?>
        <div class="download-wrapper">
            <a href="<?php echo $audio_file['url'] ?>" class="download-icon" download>
                <?php echo $download_icon; ?>
            </a>
        </div>
      <?php } ?>
    <?php }
    if ($de_player_type == 'playlist') {
      ?>
    <audio class="audio-file" src="<?= get_field($de_acf_repeater_field)[0][$de_acf_file_field]['url'] ?>" preload="metadata"></audio>
    <?php 
    if(have_rows($de_acf_repeater_field)) { 
      $song_name = get_field($de_acf_repeater_field)[0][$de_acf_song_field];
      if($de_acf_audio_file_name_type) {
        $song_name = get_field($de_acf_repeater_field)[0][$de_acf_file_field][$de_acf_audio_file_name_type];
      }
      ?>
      <p class="main-song-name"><?= $song_name ?></p>
    <?php } ?>
    <div class="player-wrapper">
        <div class="player-buttons">
          <button class="prev-song disabled"><?php echo $de_previous_icon; ?></button>
          <button class="play-icon">
            <div class="play-icon-svg" title="Play">
              <?php echo $de_play_icon; ?>
            </div>
            <div class="pause-icon-svg hide" title="Pause">
              <?php echo $de_pause_icon; ?>
          </div>
          <div class="loading-indicator hide"></div>
        </button>
      <button class="next-song"> <?php echo $de_next_icon; ?></button>
      </div>
      <div class="rest-controls">
        <div class="time-wrapper">
          <span class="progress-before" style="--seek-before-width: 3%;">
            <input type="range" class="seek-slider" max="100" value="0">
          </span>
          <span class="current-time time">00:00</span>
          <span class="dur-seperator">/</span>
          <span class="duration time">00:00</span>
        </div>
      <div class="volume-wrapper">
          <output style="display: none;" class="volume-output">100</output>
          <button class="mute-icon" title="Mute">
            <div class="mute-icon-svg">
              <?php echo $de_mute_icon; ?>
            </div>
            <div class="muted-icon-svg hide" title="Unmute">
              <?php echo $de_unmute_icon; ?>
            </div>
          </button>
          <input style="display: none" type="range" class="volume-slider" max="100" value="100">
        </div>
      </div>
    </div>

    <div class="playlist-wrapper">
      <?php if(have_rows($de_acf_repeater_field)): ?>
          <?php $counter = 1; ?>
          <?php while(have_rows($de_acf_repeater_field)): the_row(); ?>
            <?php 
              $active = $counter == 1 ? 'active' : ''; 
              $file = get_sub_field($de_acf_file_field);
              $song_name = get_sub_field($de_acf_song_field);
              if($de_acf_audio_file_name_type) {
                $song_name = $file[$de_acf_audio_file_name_type];
              }
            ?>
              <div role="button" class="playlist-item <?= $active ?>" tabindex="0">
                <?php if($de_player_counter) { ?>
                <span class="counter"><?= $counter ?></span>
              <?php } ?>
                <div class="song-name"><?= $song_name ?></div>
                <div class="time-wrapper">
                  <span class="duration time">00:00</span>
                </div>
                <?php if($enable_download) { ?>
                  <div class="download-wrapper">
                      <a href="<?= $file['url']; ?>" class="download-icon" download>
                          <?php echo $download_icon; ?>
                      </a>
                  </div>
                <?php } ?>
                <audio src="<?= $file['url']; ?>"></audio>
                </div>
                <?php $counter++; ?>
          <?php endwhile; ?>
        <?php endif; ?>
    </div>
      <?php
    }
  } else {
    echo '<p>ACF PRO is required to use ACF data type</p>';
  }
}


if ($de_player_data == 'metabox') {
  if ( is_plugin_active( 'meta-box/meta-box.php' ) ) {

    $audio_file = rwmb_meta($de_mb_audio_file);

    if ($de_player_type == 'custom' && $audio_file) { ?>
      <audio class="audio-file" src="<?php echo $audio_file ?>" preload="metadata"></audio>
      <button class="play-icon">
        <div class="play-icon-svg" title="Play">
        <?php echo $de_play_icon; ?>
        </div>
        <div class="pause-icon-svg hide" title="Pause">
        <?php echo $de_pause_icon; ?>
        </div>
        <div class="loading-indicator hide"></div>
      </button>
      
      <div class="time-wrapper">
        <span class="progress-before" style="--seek-before-width: 3%;">
          <input type="range" class="seek-slider" max="100" value="0">
        </span>
        <span class="current-time time">00:00</span>
        <span class="dur-seperator">/</span>
        <span class="duration time">00:00</span>
      </div>

    <div class="volume-wrapper">
        <output style="display: none;" class="volume-output">100</output>
        <button class="mute-icon" title="Mute">
          <div class="mute-icon-svg">
          <?php echo $de_mute_icon; ?>
        </div>
          <div class="muted-icon-svg hide" title="Unmute">
          <?php echo $de_unmute_icon; ?>
        </div>
        </button>
        <input style="display: none" type="range" class="volume-slider" max="100" value="100">
      </div>

      <?php if($enable_download && $de_player_type != 'playlist') { ?>
        <div class="download-wrapper">
            <a href="<?php echo $audio_file ?>" class="download-icon" download>
                <?php echo $download_icon; ?>
            </a>
        </div>
      <?php } ?>
    <?php }
    if ($de_player_type == 'playlist') {
      $mb_group = rwmb_meta( 'audio_group' );
      ?>
    <audio class="audio-file" src="<?= !empty($mb_group[0][$de_mb_group_file]) ? $mb_group[0][$de_mb_group_file] : '' ?>" preload="metadata"></audio>
    <?php 
    if($mb_group) { 
      $song_name = $mb_group[0][$de_mb_group_name];

      ?>
      <p class="main-song-name"><?= $song_name ?></p>
    <?php } ?>
    <div class="player-wrapper">
        <div class="player-buttons">
        <button class="prev-song disabled"><?php echo $de_previous_icon; ?></button>
        <button class="play-icon">
          <div class="play-icon-svg" title="Play">
            <?php echo $de_play_icon; ?>
          </div>
          <div class="pause-icon-svg hide" title="Pause">
            <?php echo $de_pause_icon; ?>
          </div>
          <div class="loading-indicator hide"></div>
        </button>
      <button class="next-song"> <?php echo $de_next_icon; ?></button>
      </div>
      <div class="rest-controls">
        <div class="time-wrapper">
          <span class="progress-before" style="--seek-before-width: 3%;">
            <input type="range" class="seek-slider" max="100" value="0">
          </span>
          <span class="current-time time">00:00</span>
          <span class="dur-seperator">/</span>
          <span class="duration time">00:00</span>
        </div>
      <div class="volume-wrapper">
          <output style="display: none;" class="volume-output">100</output>
          <button class="mute-icon" title="Mute">
            <div class="mute-icon-svg">
              <?php echo $de_mute_icon; ?>
            </div>
            <div class="muted-icon-svg hide" title="Unmute">
              <?php echo $de_unmute_icon; ?>
            </div>
          </button>
          <input style="display: none" type="range" class="volume-slider" max="100" value="100">
        </div>
      </div>
    </div>

    <div class="playlist-wrapper">
      <?php 
      if($mb_group) { ?>
          <?php $counter = 1; ?>
          <?php foreach ( $mb_group as $group ) { ?>
            <?php 
              $active = $counter == 1 ? 'active' : ''; 
              $file = $group[$de_mb_group_file];
              $song_name = $group[$de_mb_group_name];
            ?>
              <div role="button" class="playlist-item <?= $active ?>" tabindex="0">
                <?php if($de_player_counter) { ?>
                <span class="counter"><?= $counter ?></span>
              <?php } ?>
                <div class="song-name"><?= $song_name ?></div>
                <div class="time-wrapper">
                  <span class="duration time">00:00</span>
                </div>
                <?php if($enable_download) { ?>
                  <div class="download-wrapper">
                      <a href="<?= $file; ?>" class="download-icon" download>
                          <?php echo $download_icon; ?>
                      </a>
                  </div>
                <?php } ?>
                <audio src="<?= $file; ?>"></audio>
                </div>
                <?php $counter++; ?>
          <?php } ?>
        <?php } ?>
    </div>
      <?php
    }
  } else {
    echo '<p>Meta Box is required to use Meta Box data type</p>';
  }
}