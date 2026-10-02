<?php
include "includes/apis.php";
// print_r($testimonial_data['data']['sections'][2]['resolved_content']['media'][0]);
   $videos = $testimonial_data['data']['sections'][2]['resolved_content']['media'] ?? [];
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DPS Kalyanpur | Testimonials</title>
    <?php include "includes/head.php" ?>
</head>

<body>
    <style>
        ul.glide__slides {
            display: flex;
            padding: 0;
            margin: 0;
            list-style: none;
        }

        ul.tabs {
            padding: 0px;
            list-style: none;
        }

        ul.tabs li {
            background: none;
            color: #003618;
            display: inline-block;
            padding: 10px 15px;
            cursor: pointer;

            background: #ededed;
        }

        @media (max-width: 640px) {
            ul.tabs li {
                font-size: 14px;
                padding: 8px;
                background: #ededed;
            }

        }

        ul.tabs li.current {
            background: #003618;
            color: #fff;
        }

        .tab-content {
            display: none;
            padding-top: 15px;
        }

        .tab-content.current {
            display: block !important;
        }

        .img-popup {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: transparent;
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        .popup-content {
            background: rgba(0, 0, 0, 0.85);
            border-radius: 12px;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            animation: animatepopup 0.3s ease-in-out forwards;

            /* Desktop default */
            width: 50vw;
            height: 90vh;
        }

        .popup-content img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
            opacity: 0;
            transform: translateY(-100px);
            animation: animatepopup 0.3s ease-in-out forwards;
            border-radius: 10px;
        }

        /* Responsive for mobile screens */
        @media (max-width: 640px) {
            .popup-content {
                width: 100vw;
                height: 50vh;
            }
        }

        .close-btn {
            width: 35px;
            height: 30px;
            display: flex;
            justify-content: center;
            flex-direction: column;
            position: absolute;
            top: 20px;
            right: 20px;
            cursor: pointer;
        }

        .close-btn .bar {
            height: 4px;
            background: #fff;
            border-radius: 2px;
        }

        .close-btn .bar:nth-child(1) {
            transform: rotate(45deg);
        }

        .close-btn .bar:nth-child(2) {
            transform: translateY(-4px) rotate(-45deg);
        }

        .img-popup.opened {
            display: flex;
        }

        @keyframes animatepopup {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .mySwiper .swiper-pagination-bullet {
            background-color: #003618 !important;
        }

        .mySwiper .swiper-pagination-bullet-active {
            background-color: #002A5B !important;
        }

        @media (max-width: 640px) {
            .swiper {
                box-shadow: none !important;
            }

            .swiper-slide {
                box-shadow: none !important;
            }

            .swiper-wrapper {
                margin: 0 !important;
            }
        }

        .clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 4;
            -webkit-box-orient: vertical;
            overflow: hidden;
            transition: max-height 0.3s ease;
        }

        .expanded {
            max-height: 200px;
            overflow-y: auto;
            overflow-x: hidden;
            display: block;
            -webkit-line-clamp: unset;
            white-space: normal;
        }
    </style>

    <?php include "includes/header.php" ?>

    <div class="main relative  mb-[40px] sm:mb-[120px] ">
        <div class="bg-[url('assets/images/building.webp')] bg-top flex items-center text-center h-[300px]">
            <div>
                <h1
                    class="text-[32px] sm:hidden block font-[700] text-white text-left pl-4 mb-5 sm:mb-8 hr-line relative leading-9">
                    Testimonials
                </h1>
            </div>

            <div class="md:w-[100%]">
                <h1
                    class="sm:text-[32px] sm:block hidden font-[700] text-white text-left sm:mb-1 hr-line relative leading-9 ml-[7rem]">
                    Testimonials
                </h1>
            </div>
        </div>


        <div class="flex m-5" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="/" class="inline-flex items-center sm:text-sm text-xs font-medium text-blue-main">
                        Home
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-blue-main mx-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <a href="testimonial"
                            class="ms-1 sm:text-sm text-xs font-medium text-blue-main">Testimonials</a>
                    </div>
                </li>
            </ol>
        </div>

        <div class="my-10">

            <div class="mt-8 mx-3 2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 px-3">
                <div class="relative sm:mt-20 mt-10" id="testimonials">
                     <div class="2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 mx-3 px-3">

                        <div class="relative  sm:pt-5 pt-2 ">

                            <ul class="tabs 2xl:ml-[432px] md:ml-[298px]  ml-[6px]">
                                <li class="tab-link current" data-tab="tab-1">Image Testimonials</li>
                                <li class="tab-link" data-tab="tab-2">Video Testimonials</li>
                            </ul>

                            <div id="tab-1" class="tab-content current Testimonials">
                                <div class=" overflow-hidden mt-1" data-glide-el="track">
                                    <ul class="glide__slides">
                                        <?php
                                        foreach ($home_data['data']['sections'][10]['resolved_content']['items'] as $data) {
                                        ?>
                                            <li
                                                class=" sm:flex items-start gap-2 mb-4 border-[1px] border-gray-300 p-3 rounded-[8px] bg-blue-main">
                                                <div class="text-center sm:w-[30%] w-[90%]">
                                                    <img src="<?= $api_url ?>/<?= $data['image_url'] ?? "" ?>" alt="<?= ms_esc_image_alt($data, '') ?>"
                                                        class="mb-2 mx-auto rounded-[10px] w-[130px] h-[130px]">
                                                    <h2 class="font-[700] text-[16px] text-gray-100"><?= $data['title'] ?? "" ?></h2>
                                                </div>
                                                <div class="sm:w-[50%] w-[90%] sm:mt-0 mt-3 sm:text-left text-center ">
                                                    <p class="testimonial-text text-[16px] text-gray-200 text-center sm:text-left clamp-2">
                                                        <?=  strip_tags($data['description']) ?? "" ?>
                                                    </p>
                                                    <button class="moreless-button font-[600] text-white text-sm mt-1">Read
                                                        more...</button>
                                                </div>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>

                            <div id="tab-2" class="tab-content Testimonials2">
                                <div class=" overflow-hidden mt-1" data-glide-el="track">
                                    <ul
                                        class="mt-1 relative w-full overflow-hidden p-0 pb-5 whitespace-no-wrap flex gap-3 flex-no-wrap">
                                       <?php
                                      

                                        if (empty($videos)) {
                                            echo "<p>No data available</p>";
                                        } else {
                                            foreach ($videos as $video) {
                                                $videoUrl = $video["media_url"] ?? '';
                                                $embedUrl = "";

                                                if (strpos($videoUrl, 'youtube') !== false) {
                                                    // Extract video ID
                                                    preg_match('/(youtu\.be\/|v=)([^&]+)/', $videoUrl, $matches);
                                                    $videoId = $matches[2] ?? '';

                                                    if ($videoId) {
                                                        $embedUrl = "https://www.youtube.com/embed/" . $videoId;
                                                    }
                                                }
                                                ?>
                                                <li>
                                                    <div class="w-full rounded-2xl shadow-lg sm:p-5 p-2">
                                                        <iframe class="w-[100%] h-[300px]" src="<?php echo $embedUrl; ?>"
                                                            allowfullscreen></iframe>
                                                    </div>
                                                </li>
                                            <?php
                                            }
                                        }
                                        ?>
                                     

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>

    <?php include "includes/footer.php" ?>
    <?php include "includes/foot.php" ?>

    <script>
        // Start 
        let glide1Initialized = false;
        let glide2Initialized = false;

        function initGlide(selector, perViewCount) {
            return new Glide(selector, {
                type: 'carousel',
                focusAt: 1,
                perView: perViewCount,
                autoplay: 3500,
                animationDuration: 700,
                gap: 10,
                breakpoints: {
                    1680: {
                        perView: perViewCount >= 4 ? 3 : 2
                    },
                    1024: {
                        perView: perViewCount >= 4 ? 2 : 2
                    },
                    820: {
                        perView: 1
                    },
                    640: {
                        perView: 1
                    }
                }
            });
        }

        // Initialize Glide for the first tab (Testimonials - 2 items)
        const glide1 = initGlide('.Testimonials', 2);
        glide1.mount();
        glide1Initialized = true;

        // Tab switch logic
        document.querySelectorAll('.tab-link').forEach(tab => {
            tab.addEventListener('click', function() {
                const tabId = this.getAttribute('data-tab');

                // Update active tab
                document.querySelectorAll('.tab-link').forEach(link => link.classList.remove('current'));
                this.classList.add('current');

                // Toggle tab content
                document.querySelectorAll('.tab-content').forEach(tab => tab.classList.remove('current'));
                document.getElementById(tabId).classList.add('current');

                // Mount Glide2 when switching to tab-2 for the first time
                if (tabId === 'tab-2' && !glide2Initialized) {
                    const glide2 = initGlide('.Testimonials2', 2); // Show 4 slides
                    glide2.mount();
                    glide2Initialized = true;
                }
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const tabs = document.querySelectorAll(".tab-link");
            const contents = document.querySelectorAll(".tab-content");

            tabs.forEach(tab => {
                tab.addEventListener("click", function() {
                    const tabId = this.getAttribute("data-tab");

                    // Remove 'current' from all tabs and contents
                    tabs.forEach(t => t.classList.remove("current"));
                    contents.forEach(c => c.classList.remove("current"));

                    // Add 'current' to the clicked tab and its content
                    this.classList.add("current");
                    document.getElementById(tabId).classList.add("current");

                    // Stop all videos if switching away from video tab
                    if (tabId !== "tab-2") {
                        const videos = document.querySelectorAll("#tab-2 video");
                        videos.forEach(video => {
                            video.pause();
                            video.currentTime = 0; // Optional: reset to beginning
                        });
                    }
                });
            });
        });
    </script>

    <script>
        $('.moreless-button').click(function() {
            const moreText = $(this).siblings('.moretext');
            moreText.slideToggle();

            if ($(this).text() == "Read less") {
                $(this).text("Read more...");
            } else {
                $(this).text("Read less");
            }
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const buttons = document.querySelectorAll(".moreless-button");

            buttons.forEach(button => {
                button.addEventListener("click", function() {
                    const para = this.previousElementSibling;
                    para.classList.toggle("expanded");
                    para.classList.toggle("clamp-2");

                    this.textContent = para.classList.contains("expanded") ? "Read less" :
                        "Read more...";
                });
            });
        });
    </script>

</body>

</html>