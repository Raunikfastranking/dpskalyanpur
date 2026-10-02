<?php 
include "includes/apis.php";
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "includes/head.php" ?>
    <title><?= $campus_tour['data']['title'] ?? "" ?></title>
    <meta name="description" content="<?= $campus_tour['data']['meta_description'] ?? "" ?>">
    <meta name="keywords" content="<?= $campus_tour['data']['meta_keywords'] ?? "" ?>">
</head>

<body>

    <?php include "includes/header.php" ?>

    <div class="main relative">
        <div class="bg-center flex items-center text-center h-[300px] bg-[url('assets/images/building.webp')]">
            <div>
                <h1 class="text-[32px] sm:hidden block font-[700] text-white text-left pl-4 mb-5 sm:mb-8 hr-line relative leading-9">
                    <?= strip_tags($campus_tour['data']['sections'][0]['content_heading']) ?? "" ?>
                </h1>
            </div>

            <div class="md:w-[100%]">
                <h1 class="sm:text-[32px] sm:block hidden font-[700] text-white text-left sm:mb-1 hr-line relative leading-9 ml-[7rem]">
                    <?= strip_tags($campus_tour['data']['sections'][0]['content_heading']) ?? "" ?>
                </h1>
            </div>
        </div>

        <div class="flex m-5" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="index.php" class="inline-flex items-center text-sm font-medium text-blue-main">
                        Home
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-blue-main mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"></path>
                        </svg>
                        <a href="campus-tour" class="ms-1 text-sm font-medium text-blue-main"><?= strip_tags($campus_tour['data']['sections'][0]['content_heading']) ?? "" ?></a>
                    </div>
                </li>
            </ol>
        </div>

        <div
            class="2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 mx-3 sm:py-10 py-0 sm:p-20 p-0">
            
                          
                        <?php
                        // ----- VIDEO EXTRACTION + REMOVAL OF THE SOURCE SECTION -----
                        $embedUrl = '';
                        $videoSectionIndex = null;

                        if (!empty($campus_tour['data']['sections']) && is_array($campus_tour['data']['sections'])) {
                            foreach ($campus_tour['data']['sections'] as $index => $section) {
                                $found = false;

                                // 1️⃣ Check the 'media' array for a YouTube URL
                                if (!empty($section['resolved_content']['media']) && is_array($section['resolved_content']['media'])) {
                                    foreach ($section['resolved_content']['media'] as $mediaItem) {
                                        $url = $mediaItem['media_url'] ?? '';
                                        if (empty($url)) continue;
                                        $urlParts = parse_url($url);
                                        if (isset($urlParts['host'])) {
                                            if (strpos($urlParts['host'], 'youtube.com') !== false && isset($urlParts['query'])) {
                                                parse_str($urlParts['query'], $q);
                                                if (!empty($q['v'])) {
                                                    $embedUrl = "https://www.youtube.com/embed/" . $q['v'];
                                                    $found = true;
                                                    break 2;
                                                }
                                            } elseif (strpos($urlParts['host'], 'youtu.be') !== false) {
                                                $videoId = ltrim($urlParts['path'], '/');
                                                $embedUrl = "https://www.youtube.com/embed/" . $videoId;
                                                $found = true;
                                                break 2;
                                            }
                                        }
                                    }
                                }

                                // 2️⃣ If not found in media, check the raw content for an iframe or YouTube link
                                if (!$found) {
                                    $content = $section['resolved_content']['content'] ?? $section['content'] ?? '';
                                    if (strpos($content, 'youtube.com/embed') !== false ||
                                        strpos($content, 'youtu.be') !== false ||
                                        strpos($content, '<iframe') !== false) {
                                        // This section contains the video – mark it as the source
                                        $found = true;
                                        // Optionally, you could also extract the embed URL from the iframe's src,
                                        // but we already have one from the media array (if it existed).
                                        // If the video is only inside content and not in media,
                                        // you might want to parse the src here, but we'll keep the existing $embedUrl.
                                    }
                                }

                                if ($found) {
                                    $videoSectionIndex = $index;
                                    break;
                                }
                            }
                        }

                        // 3️⃣ Remove the section that holds the video so it won't be rendered again (e.g., by footer)
                        if ($videoSectionIndex !== null) {
                            unset($campus_tour['data']['sections'][$videoSectionIndex]);
                            // Re-index the array to avoid issues with loops expecting sequential numeric keys
                            $campus_tour['data']['sections'] = array_values($campus_tour['data']['sections']);
                        }
                        ?>
 
                       

                        </div> <!-- end overflow-x-auto -->
                    </div>
                </div>
            </div>
        </div>

    </div>
    
    <?php include "includes/footer.php" ?>
    </div>
    <?php include "includes/foot.php" ?>
    <script>
        $('.moreless-button').click(function() {
            const moreText = $(this).siblings('.moretext');

            $('.moretext').not(moreText).slideUp();
            $('.moreless-button').not(this).text('Read more');

            // Toggle the current one
            moreText.slideToggle();

            if ($(this).text() == "Read more") {
                $(this).text("Read less");
            } else {
                $(this).text("Read more");
            }
        });

        var aboutCarousel = new Glide('.about-carousel', {
            type: 'carousel',
            focusAt: 1,
            perView: 4,
            autoplay: 3500,
            animationDuration: 700,
            gap: 24,
            classes: {
                activeNav: '[&>*]:bg-slate-700',
            },
            breakpoints: {
                1024: {
                    perView: 4
                },
                640: {
                    perView: 1
                }
            },
        });
        aboutCarousel.mount();

        var aboutCarousel2 = new Glide('.about-carousel2', {
            type: 'carousel',
            focusAt: 1,
            perView: 4,
            autoplay: 3500,
            animationDuration: 700,
            gap: 24,
            classes: {
                activeNav: '[&>*]:bg-slate-700',
            },
            breakpoints: {
                1680: {
                    perView: 4
                },
                1024: {
                    perView: 3
                },
                820: {
                    perView: 2
                },
                640: {
                    perView: 1
                }
            },
        });
        aboutCarousel2.mount();




        var glide03 = new Glide('.glide-03', {
            type: 'carousel',
            focusAt: 1,
            perView: 4,
            autoplay: 3500,
            animationDuration: 700,
            gap: 24,
            classes: {
                activeNav: '[&>*]:bg-slate-700',
            },
            breakpoints: {
                1680: {
                    perView: 4
                },
                1024: {
                    perView: 3
                },
                820: {
                    perView: 2
                },
                640: {
                    perView: 1
                }
            },
        });

        glide03.mount();

        var latestNews2 = new Glide('.latestNews2', {
            type: 'carousel',
            focusAt: 1,
            perView: 4,
            autoplay: 3500,
            animationDuration: 700,
            gap: 24,
            classes: {
                activeNav: '[&>*]:bg-slate-700',
            },
            breakpoints: {
                1680: {
                    perView: 4
                },
                1024: {
                    perView: 3
                },
                820: {
                    perView: 2
                },
                640: {
                    perView: 1
                }
            },
        });
        latestNews2.mount();
    </script>
</body>

</html>