  <?php foreach ($data['resolved_content']['media'] as $video) {
        $embedUrl = '';
        $videoUrl = $video['media_url'] ?? '';  // <-- get URL from API

        if (!empty($videoUrl)) {
            $urlParts = parse_url($videoUrl);

            if (isset($urlParts['host']) && (strpos($urlParts['host'], 'youtube.com') !== false)) {
                if (isset($urlParts['query'])) {
                    parse_str($urlParts['query'], $queryVars);
                    if (!empty($queryVars['v'])) {
                        $embedUrl = "https://www.youtube.com/embed/" . $queryVars['v'];
                    }
                }
            } elseif (isset($urlParts['host']) && (strpos($urlParts['host'], 'youtu.be') !== false)) {
                $videoId = ltrim($urlParts['path'], '/');
                $embedUrl = "https://www.youtube.com/embed/" . $videoId;
            }
        }
    ?>
      <?php if (!empty($embedUrl)) { ?>
          <div class="max-w-5xl mx-auto aspect-video comman-container-1050" style="margin-top:15px;">
              <iframe class="w-full h-full rounded-xl"
                  src="<?= $embedUrl ?>"
                  title="YouTube video"
                  frameborder="0"
                  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                  allowfullscreen
                  onerror="this.parentElement.innerHTML='<p style=\'color:red;text-align:center;padding:20px;\'>Video unavailable. <a href=\'<?= $videoUrl ?>\' target=\'_blank\' style=\'color:blue;text-decoration:underline;\'>Watch on YouTube</a></p>';">
              </iframe>
          </div>
      <?php } ?>

  <?php } ?>