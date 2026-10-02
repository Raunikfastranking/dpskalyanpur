<?php
include "includes/apis.php";
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $mv_data['data']['title'] ?? "" ?></title>
    <meta name="description" content="<?= $mv_data['data']['meta_description'] ?? "" ?>">
    <meta name="keywords" content="<?= $mv_data['data']['meta_keywords'] ?? "" ?>">
    <?php include "includes/head.php" ?>

    <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [{
    "@type": "ListItem",
    "position": 1,
    "name": "Home",
    "item": "https://dpskalyanpur.com/"
  },{
    "@type": "ListItem",
    "position": 2,
    "name": "About Us",
    "item": "https://dpskalyanpur.com/mission"
  }]
}
</script>

</head>

<body>

    <?php include "includes/header.php" ?>

    <div class="main relative">
        <div class="bg-[url('assets/images/building.webp')] bg-top flex items-center text-center h-[300px]">
            <div>
                <h1
                    class="text-[32px] sm:hidden block font-[700] text-white text-left pl-4 mb-5 sm:mb-8 hr-line relative leading-9">
                   <?= strip_tags($mv_data['data']['sections'][0]['content_heading']) ?? "" ?>
                </h1>
            </div>

            <div class="md:w-[100%]">
                <h1
                    class="sm:text-[32px] sm:block hidden font-[700] text-white text-left sm:mb-1 hr-line relative leading-9 ml-[7rem]">
                   <?= strip_tags($mv_data['data']['sections'][0]['content_heading']) ?? "" ?>
                </h1>
            </div>
        </div>

        <div class="flex m-5" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="/" class="inline-flex items-center text-sm font-medium text-blue-main">
                        Home
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-blue-main mx-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4"></path>
                        </svg>
                        <p class="ms-1 text-sm font-medium text-blue-main">About Us
                        </p>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-blue-main mx-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4"></path>
                        </svg>
                        <a href="mission" class="ms-1 text-sm font-medium text-blue-main"><?= strip_tags($mv_data['data']['sections'][0]['content_heading']) ?? "" ?></a>
                    </div>
                </li>
            </ol>
        </div>

        <div
            class="2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 mx-4 sm:py-5 py-0 sm:p-20 p-0">
            <div class="text-center">
                 <?= $mv_data['data']['sections'][1]['content'] ?? "" ?>
            </div>
        </div>

        <div
            class="mt-[-80px] 2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 px-4 sm:mt-3 bg-center sm:mb-10 mb-0 sm:px-20 p-0 relative">

            <div class="sm:flex gap-10 items-center">
                <div class="pb-0 sm:pt-0 pt-[100px] sm:w-[50%]">
                    <div class="sm:text-left text-center">
                        <?= $mv_data['data']['sections'][2]['columns'][0]['content'] ?? "" ?>
                        <!-- <h2 class="text-[30px] font-[700] text-blue-main  hr-line inline relative">Vision</h2>
                        <p class="text-[16px] text-gray-500 mt-1">Our group envisions a dynamic and transformative
                            learning
                            ecosystem that empowers children to become visionary thinkers, compassionate global citizens
                            and
                            ingenious problem solvers.</p> -->
                    </div>
                </div>
                <div class="sm:w-[50%] sm:block hidden">
                    <img src="<?= $mv_data['data']['sections'][2]['columns'][1]['image_url'] ?? "" ?>" alt="<?= ms_esc_image_alt($mv_data['data']['sections'][2]['columns'][1] ?? [], 'vision') ?>">
                </div>
            </div>
        </div>

        <div
            class="mt-[-80px] 2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 px-4 sm:mt-0 bg-center sm:mb-10 mb-0 sm:px-20 p-0 relative">

            <div class="flex items-center gap-10">
                <div class="sm:w-[50%] sm:block hidden">
                    <img src="<?= $mv_data['data']['sections'][3]['columns'][0]['image_url'] ?? "" ?>" alt="<?= ms_esc_image_alt($mv_data['data']['sections'][3]['columns'][0] ?? [], 'mission') ?>">
                </div>
                <div class="pb-0 sm:pt-0 pt-[100px] sm:w-[50%]">
                    <div class="sm:text-left text-center">
                        <?= $mv_data['data']['sections'][3]['columns'][1]['content'] ?? "" ?>
                        <!-- <h2 class="text-[30px] font-[700] text-blue-main  hr-line inline relative">Mission</h2>
                        <p class="text-[16px] text-gray-500 mt-1">Our mission is to revolutionise education by providing
                            an immersive, personalised and holistic learning experience to every child, cultivating
                            intellectual agility, emotional intelligence and the mindset needed to thrive in a rapidly
                            evolving global landscape</p> -->
                    </div>
                </div>
            </div>
        </div>

        <div
            class="mt-[-80px] 2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 px-4 sm:mt-0 bg-center sm:mb-10 mb-0 sm:px-20 p-0 relative">

            <div class="flex items-center gap-10">
                <div class="pb-0 sm:pt-0 pt-[100px] sm:w-[50%]">
                    <div class="sm:text-left text-center">
                        <?= $mv_data['data']['sections'][4]['columns'][0]['content'] ?? "" ?>
                    </div>
                </div>
                <div class="sm:w-[50%] sm:block hidden">
                    <img src="<?= $mv_data['data']['sections'][4]['columns'][1]['image_url'] ?? "" ?>" alt="<?= ms_esc_image_alt($mv_data['data']['sections'][4]['columns'][1] ?? [], 'core values') ?>">
                </div>
            </div>
        </div>

        <!-- <div class="mb-5 ab-cr-bg sm:mt-10 sm:p-4">
            <div class="2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto px-3">
                <div class="relative about-carousel opne-hide-circle">
                    <h3
                        class="text-[30px] font-[700] text-white uppercase sm:text-left text-center mb-3 hr-line relative">
                        Core Values</h3>
                   
                    <div class="overflow-hidden mt-3 mx-3 " data-glide-el="track">
                        <ul
                            class="mt-5 relative w-full overflow-hidden p-0 whitespace-no-wrap flex flex-no-wrap [backface-visibility: hidden] [transform-style: preserve-3d] [touch-action: pan-Y] [will-change: transform]">
                            <li><img src="assets/images/img01.jpg" class="w-full max-w-full m-auto" /></li>
                            <li><img src="assets/images/img02.jpg" class="w-full max-w-full m-auto" /></li>
                            <li><img src="assets/images/img03.jpg" class="w-full max-w-full m-auto" /></li>
                            <li><img src="assets/images/img04.jpg" class="w-full max-w-full m-auto" /></li>
                            <li><img src="assets/images/img05.jpg" class="w-full max-w-full m-auto" /></li>

                        </ul>
                    </div>
                
                    <div class="absolute left-0 flex items-center justify-between w-full h-0 px-4 top-1/2 hide-circle"
                        data-glide-el="controls">
                        <button
                            class="inline-flex items-center justify-center relative right-[66px] hover:bg-[#FED72B] hover:text-white w-8 h-8 transition duration-300 border rounded-full lg:w-10 lg:h-10 text-slate-700 border-slate-700 hover:text-slate-900 hover:border-slate-900 focus-visible:outline-none bg-white/20"
                            data-glide-dir="<" aria-label="prev slide">
                            <i class="fa-solid fa-angle-left"></i>
                        </button>
                        <button
                            class="inline-flex items-center justify-center relative left-[66px]  hover:bg-[#FED72B] hover:text-white w-8 h-8 transition duration-300 border rounded-full lg:w-10 lg:h-10 text-slate-700 border-slate-700 hover:text-slate-900 hover:border-slate-900 focus-visible:outline-none bg-white/20"
                            data-glide-dir=">" aria-label="next slide">
                            <i class="fa-solid fa-angle-right"></i>
                        </button>
                    </div>
                </div>
                <div class="bg-blue-main px-3 mt-[-140px] pt-[160px] pb-5 text-white">
                    <p class="">Education is never just about good grades. So, at DPS, we work on developing values. Be
                        it classrooms, the sports field, or the multicultural programs organised— in every interaction
                        we seek opportunities to uplift the following core values in our students.
                    <ul style="list-style:disc; margin-top:4px;" class="sm:ml-5">
                        <li class="mt-[2px]">Integrity and strong moral principles</li>
                        <li class="mt-[2px]">Respect for diversity, inclusivity, and kindness towards all</li>
                        <li class="mt-[2px]">Compassion, care, and support towards one and all</li>
                        <li class="mt-[2px]">Creativity, innovation, and problem-solving skills at all times</li>
                        <li class="mt-[2px]">Perseverance and determination to achieve goals</li>
                        <li class="mt-[2px]">Curiosity and a love for learning and exploration</li>
                        <li class="mt-[2px]">Strong relationships, teamwork, and social responsibility towards the
                            community</li>
                        <li class="mt-[2px]">Excellence in academics, innovation, and continuous improvement</li>

                    </ul>

                    </p>
                </div>
            </div>
        </div> -->

    </div>

    <?php include "includes/footer.php" ?>
    </div>
    <?php include "includes/foot.php" ?>
    <script>
        $('.moreless-button').click(function () {
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