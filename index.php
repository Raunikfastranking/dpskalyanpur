<?php
include "includes/apis.php";
// print_r($flyer_data['data'][0]['image_url']);  
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $home_data['data']['title'] ?? "" ?></title>
    <meta name="description" content="<?= $home_data['data']['meta_description'] ?? "" ?>">
    <meta name="keywords" content="<?= $home_data['data']['meta_keywords'] ?? "" ?>">
    <link rel="canonical" href="https://dpskalyanpur.com/" />
    <?php include "includes/head.php" ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" defer></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js" defer></script>
</head>

<body>

    <?php include "includes/header.php" ?>

    <style>
        .swiper-wrapper {
            margin: 0 !important;
            height: auto;
        }

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
            color: #005224;
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
            background: #005224;
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
            background-color: #005224 !important;
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
                height: auto;
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


        .top-hide {
            transform: translateY(0);
            transition: .2s all
        }

        .top-hide::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 150px;
            background: linear-gradient(180deg, rgb(0, 87, 7), transparent);
            border-radius: 8px;
        }

        .top-hide h2 {
            transition: .2s ease-in-out
        }

        .card-top-peudo:hover .top-hide {
            transform: translateY(190px);
            opacity: 0;
            transition: transform 0.4s ease-in, opacity 0.4s ease-in 0.2s;
        }

        .card-top-peudo:hover .top-hide h2 {
            opacity: 0;
        }

        .bottom-card-content::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 250px;
            z-index: -1;
            background: linear-gradient(180deg, rgb(0, 87, 7), rgb(0, 87, 7));
            opacity: .9;
        }

        .bottom-card-content {
            transition: .6s ease-in-out;
            z-index: 2;
            opacity: 0;
        }

        .card-top-peudo:hover .bottom-card-content {
            opacity: 1;
        }
    </style>
    <style>
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
            background-color: #005224 !important;
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

    <?php
$image = $flyer_data['data'][0]['image_url'] ?? '';
$link  = $flyer_data['data'][0]['link_url'] ?? '';
$showPopup = !empty(trim($image)); // show popup only if image exists
?>
<?php if ($showPopup): ?>
<div id="formOverlay"
    class="fixed inset-0 bg-gray-800 bg-opacity-60 flex items-center justify-center z-[99999] hidden">

    <div class="bg-white rounded-xl shadow-2xl p-6 w-full lg:max-w-xl md:max-w-lg sm:max-w-md relative">
        <button id="dismissPopup"
            class="absolute top-4 right-4 text-gray-400 hover:text-red-400 text-2xl font-bold">&times;</button>

        <a href="<?= $link ?>">
            <img src="<?= $image ?>" alt="<?php echo ms_esc_image_alt($flyer_data['data'][0] ?? [], 'Flyer'); ?>"  fetchpriority="high"
  loading="lazy"
  decoding="async">
        </a>
    </div>

</div>
<?php endif; ?>

    <div class="main relative">
        <div class="mx-3">

            <div class="relative w-full heroSlider opne-hide-circle">
                <!-- Slides -->
                <div class="overflow-hidden" data-glide-el="track">
                      <ul class="relative w-full overflow-hidden p-0 whitespace-no-wrap flex flex-no-wrap [backface-visibility: hidden] [transform-style: preserve-3d] [touch-action: pan-Y] [will-change: transform]">
              <?php
                        $hero_data = $home_data['data']['sections'][0]['resolved_content']['items'] ?? [];
                        if (!empty($hero_data)) {
                            foreach ($hero_data as $data) { ?>
                    <li class="relative">

                        <!-- MOBILE IMAGE -->
                        <img 
                            src="<?= $api_url ?>/<?= $data['mobile_image_url'] ?? $data['image_url'] ?>" 
                            alt="<?= ms_esc_image_alt($data, $data['title'] ?? '') ?>"
                            class="w-[100%] sm:hidden block"
                             fetchpriority="high"
  loading="eager"
  decoding="async"
                        >

                        <!-- DESKTOP IMAGE -->
                        <img 
                            src="<?= $api_url ?>/<?= $data['image_url'] ?? "" ?>" 
                            alt="<?= ms_esc_image_alt($data, $data['title'] ?? 'Banner') ?>"
                            class="hidden sm:block"  sizes="(max-width: 768px) 100vw, 1600px"
                            fetchpriority="high"
                            loading="eager"
                            decoding="async"
                            width="100%"
                            height="500"
                        >

                        <div class="absolute top-5 left-4 sm:top-[75px] sm:left-[180px] hidden">
                            <h2 class="text-gray-500 sm:text-4xl text-3xl font-[700]">
                                Experience <br>
                                <span class="text-[40px] sm:text-[60px] font-[700] text-blue-900">
                                    Excellence
                                </span>
                            </h2>
                        </div>
                    </li>
                 <?php }
                        } else { ?>
                            <li>
                                No Available.
                            </li>
                        <?php } ?>
            </ul>
                </div>
                <!-- Controls -->
                <div class="absolute left-0 flex items-center justify-between w-full h-0 px-4 top-1/2 hide-circle"
                    data-glide-el="controls">
                    <button
                        class="inline-flex items-center justify-center  relative right-[0px] hover:bg-[#FED72B] hover:text-white w-8 h-8 transition duration-300 border rounded-full lg:w-10 lg:h-10 text-slate-700 border-slate-700 hover:text-slate-900 hover:border-slate-900 focus-visible:outline-none bg-white/20"
                        data-glide-dir="<" aria-label="prev slide">
                        <i class="fa-solid fa-angle-left"></i>
                    </button>
                    <button
                        class="inline-flex items-center justify-center  relative left-[0px] hover:bg-[#FED72B] hover:text-white w-8 h-8 transition duration-300 border rounded-full lg:w-10 lg:h-10 text-slate-700 border-slate-700 hover:text-slate-900 hover:border-slate-900 focus-visible:outline-none bg-white/20"
                        data-glide-dir=">" aria-label="next slide">
                        <i class="fa-solid fa-angle-right"></i>
                    </button>
                </div>

            </div>
            <style>
                .custom-blue-hover:hover {
                    box-shadow: 0 5px 0 rgb(0 84 39 / 88%), 0 10px 0 rgb(0 84 39 / 61%), 0 15px 0 rgb(0 84 39 / 54%), 0 20px 0 rgb(0 84 39 / 31%), 0 25px 0 rgba(5, 59, 122, 0.05);
                }
            </style>

            <div class="mt-5 sm:mt-[60px] 2xl:w-[1080px] lg:w-[824px] md:w-[567px] sm:w-[440px] sm:mx-auto sm:px-5 px-3">
                <div>
                    <ul class="grid 2xl:grid-cols-4 xl:grid-cols-4 lg:grid-cols-4 md:grid-cols-2 grid-cols-2 items-center gap-5">
                       <?php
                            $cta_data = $home_data['data']['sections'][1]['resolved_content']['media'] ?? [];
                            if(!empty($cta_data)){
                            foreach ($cta_data as $data) {
                            ?>
                            <li>
                                <a href="<?= $data['redirect_url']; ?>"
                                    target="_blank"
                                    class="w-full h-[110px] sm:h-auto border border-[#005224] rounded-[12px] bg-[#FED72B]/20 sm:p-[20px] transition-all duration-300 transform hover:scale-[1.03] custom-blue-hover flex-col sm:flex-row flex justify-center items-center">
                                    <img src="<?= empty($data['media_file']) ? $data['media_url'] : $api_url . '/' . $data['media_file'] ?>" alt="" class="2xl:w-[60px] 2xl:h-[60px] xl:w-[60px] xl:h-[60px] lg:w-[45px] lg:h-[45px] sm:w-[45px] sm:h-[45px] object-contain"
                                     fetchpriority="high"
  loading="lazy"
  decoding="async">
                                    <span
                                        class="font-[600] text-[13px] sm:text-[16px] text-blue-main mt-2 sm:mt-0 sm:ml-2 text-center sm:text-left">
                                        <?= $data['heading']; ?>
                                    </span>
                                </a>
                            </li>
                          <?php } }else{ ?>
                                <li>
                                    No Available.
                                </li>
                                <?php } ?>
                    </ul>
                </div>
            </div>

            <!-- Excellence -->
            <div class="mt-10 custom-container-1450">
                <div class="swiper mySwiper w-full">
                    <div class="swiper-wrapper">
                        <!-- SLIDE 1 -->
                               <?php
                        $home_data2 = $home_data['data']['sections'][2]['resolved_content']['media'] ?? [];
                        if (!empty($cta_data)) {
                            foreach ($home_data2 as $data) {
                        ?>
                            <div class="swiper-slide px-3">
                                <div class="overflow-hidden">
                                    <div class="relative w-full card-top-peudo rounded-[8px] cursor-pointer">
                                        <div class="top-hide">
                                            <div class="absolute z-10 p-3">
                                                <!-- <h2 class="text-[35px] 2xl:text-[35px] lg:text-[24px] leading-8 font-[700] "
                                                    style="color: #FED72B;">
                                                    Excellence <br>
                                                    <span
                                                        class="text-[22px] 2xl:text-[22px] lg:text-[16px] font-[700] text-white">
                                                        In Action</span>
                                                </h2> -->
                                                <?= $data['heading'] ?>
                                            </div>
                                        </div>
                                        <div>
                                            <img src="<?= empty($data['media_file']) ? $data['media_url'] : $api_url . '/' . $data['media_file'] ?>" class="w-[100%]" alt=""
                                             fetchpriority="high"
  loading="lazy"
  decoding="async">
                                        </div>
                                        <div class="absolute bottom-0 px-6 z-10 bottom-card-content bottom-open w-full">
                                            <div class="relative bottom-[16px]">
                                                <!-- <h2 class="text-[35px] 2xl:text-[35px] lg:text-[24px] leading-8 font-[700] "
                                                    style="color: #FED72B;">
                                                    Excellence <br>
                                                    <span class="text-[22px] 2xl:text-[22px] lg:text-[16px] font-[700] text-white">
                                                        In Action</span>
                                                </h2> -->
                                                <?= $data['heading'] ?>
                                                <!-- <p class="mt-3 text-white">Without the echo of a ball , without the jersey
                                                on a child , without the sound of feet and fingers on ground and games
                                                board , the nurturing will wither .</p> -->
                                                <?= $data['content'] ?>
                                                <button class="w-[100%]"><a href="<?= $data['redirect_url'] ?>"
                                                        class=" rounded-full text-blue-main p-2 font-[600] bg-white mt-5 flex justify-center items-center gap-2">Read
                                                        More

                                                        <svg width="14" height="10" viewBox="0 0 14 10" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M0.929932 5.16199L12.6731 5.16199" stroke="#005224"
                                                                stroke-width="1.5" stroke-linecap="round"></path>
                                                            <path d="M9.42798 1.39856L13.1917 5.16174L9.42798 8.92542"
                                                                stroke="#005224" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round"></path>
                                                        </svg>
                                                    </a>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          <?php }
                        } else { ?>
                            <li>
                                No Available.
                            </li>
                        <?php } ?>

                    </div>
                    <div class="swiper-pagination  mt-4"></div>
                </div>
            </div>
            <!-- END -->

        </div>

        <div style="background-image: url('./assets/images/yellow.png');  background-repeat: no-repeat;"
            class="bg-cover">
            <div class="mt-10 sm:mt-8 sm:py-16 py-4 2xl:w-[880px] lg:w-[624px] md:w-[467px] sm:w-[340px] sm:mx-auto mx-3">
                <?= $home_data['data']['sections'][3]['content'] ?? "" ?>
            </div>
        </div>
    </div>

    <div class="mt-[-30px] ">
        <div class="2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto">

        </div>
        <div class="mt-10">

            <div class="bg-[#005427] text-center pt-5 sm:pb-2 pb-5">
                <h2 class="text-[32px] font-[700] leading-9 text-white  relative text-center ">Legacy of Excellence
                </h2>
            </div>
            <div class="sm:py-8 py-5 bg-feature m-bg-feature mt-[-1px] ">
                <div class="grid grid-cols-1 md:grid-cols-5">
                    <?php
                    foreach ($statistic_data['data'][0]['items'] as $data) {
                    ?>
                        <div class="flex justify-center gap-4 items-center sm:py-0 py-6">
                            <span class="sm:w-[50%] w-[35%] inline-block "><img
                                    src="./assets/images/legacy1.png"
                                    alt="Years" class="w-[50px] 2xl:w-[50px] lg:w-[45px] md:w-[40px]"
                                    style="margin: 0 0 0 auto;"
                                     fetchpriority="high"
  loading="lazy"
  decoding="async"></span>
                            <div class="inline-block w-[50%]">
                                <h2 class="text-white font-[700] text-[35px] 2xl:text-[30px] lg:text-[20px] md:text-[20px] 
                        "><?= $data['count'] ?? "" ?></h2>
                                <h3
                                    class="text-white font-[700]  text-[22px] 2xl:text-[20px] lg:text-[15px] md:text-[15px] ">
                                    <?= $data['heading'] ?? "" ?></h3>
                            </div>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
    </div>


    <div
        class="mt-10 sm:mt-[60px] 2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto  py-10 sm:px-5 px-5">
        <div class="text-center">
            <h2 class="text-[32px] font-[700] leading-8 text-blue-main">Our Philosophy <span class="sm:hidden">
                    <br></span> Centres Around
            </h2>
        </div>
        <div class="relative w-full philosophy mt-5 opne-hide-circle">
            <div class="overflow-hidden" data-glide-el="track">
                <ul class="relative w-full overflow-hidden  p-0 whitespace-no-wrap flex flex-no-wrap [backface-visibility: hidden] [transform-style: preserve-3d] [touch-action: pan-Y] [will-change: transform]">
                   <?php
                        $our_philosophy = $home_data['data']['sections'][5]['resolved_content']['items'] ?? [];
                        if (!empty($our_philosophy)) {
                            foreach ($home_data['data']['sections'][5]['resolved_content']['items'] as $data) {
                        ?>
                        <li>
                            <img src="<?= $api_url ?>/<?= $data['image_url'] ?>" alt="<?= $data['title'] ?>" class="w-[100%] rounded-[12px]"  fetchpriority="high"
  loading="lazy"
  decoding="async">
                            <div class="mt-2">
                                <h2 class="text-[18px] font-[700] leading-5 text-blue-main"><?= $data['title'] ?></h2>
                                <p class="text-gray-600 text-[16px] mt-1"><?= $data['description'] ?></p>
                            </div>
                        </li>
                     <?php }
                        } else { ?>
                            <li>
                                No Available.
                            </li>
                        <?php } ?>
                </ul>
            </div>
            <!-- Controls -->
            <div class="absolute left-0 md:flex items-center justify-between w-full h-0 px-4 top-1/2 hide-circle hidden"
                data-glide-el="controls">
                <button
                    class="inline-flex items-center justify-center relative right-[66px] hover:bg-[#FED72B] w-8 h-8 transition duration-300 border rounded-full lg:w-10 lg:h-10 text-slate-700 hover:text-slate-900 focus-visible:outline-none bg-white/20"
                    data-glide-dir="<" aria-label="prev slide">
                    <i class="fa-solid fa-angle-left text-[#005224]"></i>
                </button>
                <button
                    class="inline-flex items-center justify-center relative left-[66px] hover:bg-[#FED72B] w-8 h-8 transition duration-300 border rounded-full lg:w-10 lg:h-10 text-slate-700 hover:text-slate-900 focus-visible:outline-none bg-white/20"
                    data-glide-dir=">" aria-label="next slide">
                    <i class="fa-solid fa-angle-right text-[#005224]"></i>
                </button>
            </div>
            <div class="absolute bottom-[-20px] md:flex hidden items-center justify-center w-full gap-2"
                data-glide-el="controls[nav]">
                <button class=" group" data-glide-dir="=0" aria-label="goto slide 1"><span
                        class="block w-[10px] h-[10px] transition-colors duration-300 rounded-full bg-green-200 focus:outline-none"></span></button>
                <button class=" group" data-glide-dir="=1" aria-label="goto slide 2"><span
                        class="block w-[10px] h-[10px] transition-colors duration-300 rounded-full bg-green-200 focus:outline-non2"></span></button>
                <button class=" group" data-glide-dir="=2" aria-label="goto slide 3"><span
                        class="block w-[10px] h-[10px] transition-colors duration-300 rounded-full bg-green-200 focus:outline-none"></span></button>
                <button class=" group" data-glide-dir="=3" aria-label="goto slide 4"><span
                        class="block w-[10px] h-[10px] transition-colors duration-300 rounded-full bg-green-200 focus:outline-none"></span></button>
            </div>
        </div>
    </div>
    </div>

    <div style="background-image: url('./assets/images/yellow.png');  background-repeat: no-repeat;"
        class="bg-cover  sm:mt-20 mt-10 pt-5 pb-16">
          <?= $home_data['data']['sections'][6]['content_heading'] ?? "" ?>
         <div class="grid grid-cols-2 md:grid-cols-3 gap-5 mt-10 px-8 md:px-0">
                     <?php
                foreach ($home_data['data']['sections'][6]['resolved_content']['media'] as $data) {
                ?>
                     <div class="mx-auto"><a href="<?= $data['redirect_url'] ?>" class=""><img
                            class="border-[1px] border-blue-main rounded-lg academic-box sm:w-[80%] w-[] hover:shadow-[6px_8px_20px_rgba(0,82,36,0.8)] transition-shadow duration-300"
                            src="https://dps.allenhouseschools.com/<?= $data['media_file'] ?>"
                            alt=""  fetchpriority="high"
  loading="lazy"
  decoding="async"></a>
                     </div>
                    <?php } ?>

                </div>
    </div>


    <?php
    $video_data = $home_data['data']['sections'][7]['resolved_content']['media'][0]['media_url'] ?? '';
    $embedUrl = '';
    if (!empty($video_data)) {
        $urlParts = parse_url($video_data);
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
    <div class="sm:mt-[100px] mt-10">
        <div class="2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto ">

            <div class="relative ">
                <div class="o-video mx-auto">
                    <?php if (!empty($embedUrl)): ?>
                        <iframe class="w-full h-full rounded-xl"
                            src="<?php echo htmlspecialchars($embedUrl); ?>"
                            title="YouTube video" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen
                            loading="lazy">
                        </iframe>
                    <?php else: ?>
                        <p class="text-center text-white">Video not available</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    </div>


    <div class="sm:mt-12 mt-8 2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto relative">

        <div class="mx-5">
            <div class="text-center">
                <h2 class="text-[30px] font-[700] leading-10 text-blue-main relative">Our
                    Campuses</h2>
            </div>

            <div class="relative w-full campus mt-5 opne-hide-circle">
                <div class="overflow-hidden" data-glide-el="track">
                    <ul class="relative w-full overflow-hidden p-0 whitespace-no-wrap flex flex-no-wrap [backface-visibility: hidden] [transform-style: preserve-3d] [touch-action: pan-Y] [will-change: transform]">
                        <?php
                            $our_campuses = $home_data['data']['sections'][9]['resolved_content']['items']?? [];
                            if (!empty($our_campuses)) {
                                foreach ($our_campuses as $data) {
                            ?>
                            <li class="bg-white mb-5 rounded-[10px] "
                                style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">

                                <img src="<?= $api_url ?>/<?= $data['image_url'] ?? "" ?>" alt="<?= $data['title'] ?? "" ?>"
                                    class="w-[100%] rounded-[10px]"
                                     fetchpriority="high"
  loading="lazy"
  decoding="async">
                                <div class="mx-3 mt-4 mb-5">
                                    <h2 class="text-[22px] font-[700] leading-8 text-blue-main"><?= $data['title'] ?? "" ?></h2>
                                    <div class="mt-3">
                                        
                                         <?= $data['description'] ?? "" ?>

                                        <button class="w-full rounded-full text-white bg-blue-main mt-5">
                                            <a href="<?= $data['link_url'] ?? "" ?>"
                                                class="flex items-center gap-2 p-2 justify-center">
                                                Visit Website

                                                <svg width="15" height="10" viewBox="0 0 15 10" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1.36914 4.71826L13.1123 4.71826" stroke="white"
                                                        stroke-width="1.5" stroke-linecap="round" />
                                                    <path d="M9.86719 0.955078L13.6309 4.71826L9.86719 8.48193"
                                                        stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>

                                            </a>
                                        </button>
                                    </div>
                                </div>


                            </li>
                       <?php }
                            } else { ?>
                                <li class="mb-4 text-center w-full">
                                    <p>No data found</p>
                                </li>
                            <?php } ?>
                    </ul>
                </div>
                <!-- Controls -->
                <div class="absolute left-0 sm:flex hidden items-center justify-between w-full h-0 px-4 top-1/2 hide-circle"
                    data-glide-el="controls">
                    <button
                        class="inline-flex items-center justify-center relative right-[66px] hover:bg-[#FED72B] w-8 h-8 transition duration-300 border rounded-full lg:w-10 lg:h-10 text-slate-700 hover:text-slate-900 focus-visible:outline-none bg-white/20"
                        data-glide-dir="<" aria-label="prev slide">
                        <i class="fa-solid fa-angle-left text-[#005224]"></i>
                    </button>
                    <button
                        class="inline-flex items-center justify-center relative left-[66px] hover:bg-[#FED72B] w-8 h-8 transition duration-300 border rounded-full lg:w-10 lg:h-10 text-slate-700 hover:text-slate-900 focus-visible:outline-none bg-white/20"
                        data-glide-dir=">" aria-label="next slide">
                        <i class="fa-solid fa-angle-right text-[#005224]"></i>
                    </button>
                </div>
                <div class="absolute bottom-[-20px] flex items-center justify-center w-full gap-2"
                    data-glide-el="controls[nav]">
                    <button class=" group" data-glide-dir="=0" aria-label="goto slide 1"><span
                            class="block w-[10px] h-[10px] transition-colors duration-300 rounded-full bg-gray-300 focus:outline-none"></span></button>
                    <button class=" group" data-glide-dir="=1" aria-label="goto slide 2"><span
                            class="block w-[10px] h-[10px] transition-colors duration-300 rounded-full bg-gray-300 focus:outline-non2"></span></button>
                    <button class=" group" data-glide-dir="=2" aria-label="goto slide 3"><span
                            class="block w-[10px] h-[10px] transition-colors duration-300 rounded-full bg-gray-300 focus:outline-none"></span></button>
                    <button class=" group" data-glide-dir="=3" aria-label="goto slide 4"><span
                            class="block w-[10px] h-[10px] transition-colors duration-300 rounded-full bg-gray-300 focus:outline-none"></span></button>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

    <div class="relative sm:py-6 py-5 2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto mt-10">

        <?= $home_data['data']['sections'][8]['content_heading'] ?? "" ?>
          <div class="mx-5 mt-7">
            <div class="sm:flex gap-3">
                <div class="sm:w-[33.33%]">
                    <div>
                        <a><img src="https://dps.allenhouseschools.com/<?= $home_data['data']['sections'][8]['resolved_content']['media'][0]['media_file'] ?>"
                                alt="student 1"
                                class="popup-img rounded-[10px] mb-2 object-cover hover:scale-90 transition delay-300"
                                style="width:100%"
                                 fetchpriority="high"
  loading="lazy"
  decoding="async"></a>
                    </div>
                    <div class="mt-3">
                        <a><img src="https://dps.allenhouseschools.com/<?= $home_data['data']['sections'][8]['resolved_content']['media'][1]['media_file'] ?>"
                                alt="student 2"
                                class="popup-img rounded-[10px] mb-2 object-cover hover:scale-90 transition delay-300"
                                style="width:100%"
                                 fetchpriority="high"
  loading="lazy"
  decoding="async"></a>
                    </div>
                </div>

                <div class="sm:w-[33.33%]">
                    <div>
                        <a><img src="https://dps.allenhouseschools.com/<?= $home_data['data']['sections'][8]['resolved_content']['media'][2]['media_file'] ?>"
                                alt="student 3"
                                class="popup-img rounded-[10px] object-cover hover:scale-90 transition delay-300"
                                style="width:100%"
                                 fetchpriority="high"
  loading="lazy"
  decoding="async"></a>
                    </div>
                </div>

                <div class="w-[33.33%] sm:block hidden">
                    <div>
                        <a><img src="https://dps.allenhouseschools.com/<?= $home_data['data']['sections'][8]['resolved_content']['media'][3]['media_file'] ?>"
                                alt="student 4"
                                class="popup-img rounded-[10px] mb-2 hover:scale-90 transition delay-300"
                                style="width:100%"
                                 fetchpriority="high"
  loading="lazy"
  decoding="async"></a>
                    </div>
                    <div class="mt-3">
                        <a><img src="https://dps.allenhouseschools.com/<?= $home_data['data']['sections'][8]['resolved_content']['media'][4]['media_file'] ?>"
                                alt="student 5"
                                class="popup-img rounded-[10px] mb-2 hover:scale-90 transition delay-300"
                                style="width:100%"
                                 fetchpriority="high"
  loading="lazy"
  decoding="async"></a>
                    </div>

                </div>
            </div>

            <div class="mt-[6px] sm:flex gap-3">
                <div>
                    <a><img src="https://dps.allenhouseschools.com/<?= $home_data['data']['sections'][8]['resolved_content']['media'][5]['media_file'] ?>"
                            alt="student 7" class="popup-img rounded-[10px] mb-2 hover:scale-90 transition delay-300"
                            style="width:100%"
                             fetchpriority="high"
  loading="lazy"
  decoding="async"></a>
                </div>
                <div>
                    <a><img src="https://dps.allenhouseschools.com/<?= $home_data['data']['sections'][8]['resolved_content']['media'][6]['media_file'] ?>"
                            alt="student 8" class="popup-img rounded-[10px] mb-2 hover:scale-90 transition delay-300"
                            style="width:100%"
                             fetchpriority="high"
  loading="lazy"
  decoding="async"></a>
                </div>
            </div>
        </div>
    </div>

    <div class="img-popup">
        <div class="popup-content">
            <img src="" alt="Popup Image"
             fetchpriority="high"
  loading="lazy"
  decoding="async">
            <div class="close-btn">
                <div class="bar"></div>
                <div class="bar"></div>
            </div>
        </div>
    </div>

    <div class="relative mt-12">
        <div class="2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 mx-3 px-3">
            <div class="text-center">
                <h2 class="text-[28px] sm:text-[30px] font-[700] leading-10  text-blue-main relative">Testimonials</h2>
            </div>
            <div class="mx-3 2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 px-3">
                <div class="relative " id="testimonials">

                    <div class="2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 mx-3 px-3">

                        <div class="relative  sm:pt-5 pt-2 ">

                            <!-- <ul class="tabs 2xl:ml-[432px] md:ml-[298px]  ml-[6px]">
                                <li class="tab-link current" data-tab="tab-1">Image Testimonials</li>
                                <li class="tab-link" data-tab="tab-2">Video Testimonials</li>
                            </ul> -->

                            <div id="tab-1" class="tab-content current Testimonials">
                                <div class=" overflow-hidden mt-1" data-glide-el="track">
                                    <ul class="glide__slides">
                                         <?php
                                $testimonial_data = $home_data['data']['sections'][10]['resolved_content']['items'] ?? [];
                                if (!empty($testimonial_data)) {
                                    foreach ($testimonial_data as $data) {
                                        $description = $data['description'] ?? "";
                                        $words = explode(" ", strip_tags($description));
                                        $shortDesc = implode(" ", array_slice($words, 0, 40));
                                ?>
                                            <li
                                                class=" sm:flex items-start gap-2 mb-4 border-[1px] border-gray-300 p-3 rounded-[8px] bg-blue-main">
                                                <div class="text-center sm:w-[30%] w-[90%]">
                                                    <img src="<?= $api_url ?>/<?= $data['image_url'] ?? "" ?>" alt="parent1"
                                                        class="mb-2 mx-auto rounded-[10px] w-[130px] h-[130px]"
                                                         fetchpriority="high"
  loading="lazy"
  decoding="async">
                                                    <h2 class="font-[700] text-[16px] text-gray-100"><?= $data['title'] ?? "" ?></h2>
                                                </div>
                                                <div class="sm:w-[50%] w-[90%] sm:mt-0 mt-3 sm:text-left text-center ">
                                                    <p class="testimonial-text text-[16px] text-gray-200 text-center sm:text-left clamp-2">
                                                        <?= strip_tags($data['description']) ?? "" ?>
                                                    </p>
                                                    <button class="moreless-button font-[600] text-white text-sm mt-1">Read
                                                        more...</button>
                                                </div>
                                            </li>
                                      <?php }
                                } else { ?>
                                    <li class="mb-4 text-center w-full">
                                        <p>No data found</p>
                                    </li>
                                <?php } ?>

                                        <!-- <li
                                            class=" sm:flex items-start gap-2 mb-4 border-[1px] border-gray-300 p-3 rounded-[8px] bg-blue-main">
                                            <div class="text-center sm:w-[30%] w-[90%]">
                                                <img src="./assets/images/parent2.jpg" alt="Fatima Zehra"
                                                    class="mb-2 mx-auto rounded-[10px] w-[130px] h-[130px] ">
                                                <h2 class="font-[700] text-[16px] text-gray-100">Mother of Shivanshi
                                                    Singh
                                                    <br>
                                                    XII C3
                                                </h2>
                                            </div>
                                            <div class="sm:w-[60%] w-[90%] sm:mt-0 mt-3  sm:text-left text-center">
                                                <p
                                                    class="testimonial-text text-[16px] text-gray-200 text-center sm:text-left clamp-2">
                                                    Hello everyone,
                                                    <br>
                                                    I'm the proud mother of Shivanshi Singh, a student of DPS Kalyanpur.
                                                    As she graduates this year after being a part of this nurturing
                                                    institution from PG to Class XII, I want to express my deepest
                                                    gratitude to the school. This journey has been nothing short of
                                                    remarkable a transformation from a little girl with tiny feet to a
                                                    confident young woman with big dreams and strong wings.
                                                    DPS Kalyanpur has not only enriched her academically, but also
                                                    shaped her emotionally and socially, instilling values, curiosity,
                                                    and responsibility at every step.
                                                    Thank you for providing her the perfect environment to grow, learn,
                                                    and flourish. You've truly played a beautiful part in shaping her
                                                    future.
                                                </p>
                                                <button class="moreless-button font-[600] text-white text-sm mt-1">Read
                                                    more...</button>
                                            </div>
                                        </li> -->



                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>



    <div class="relative mt-8 mb-10">

        <div class="2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 px-3">
            <div class="text-center">
                <h2 class="text-[28px] sm:text-[32px] font-[700] leading-10  text-blue-main relative">Images
                </h2>
            </div>
            <div class="relative Images sm:pt-5 pt-2  opne-hide-circle">
                <!-- Slides -->
                <div class="overflow-hidden mt-1" data-glide-el="track">
                    <ul
                        class="relative w-full overflow-hidden p-0 pb-5 whitespace-no-wrap flex flex-no-wrap [backface-visibility: hidden] [transform-style: preserve-3d] [touch-action: pan-Y] [will-change: transform]">
                        <?php
                            $items = $home_data['data']['sections'][11]['resolved_content']['items'] ?? [];
                            if (!empty($items)) {
                                foreach ($items as $data) { ?>
                            <li class="mb-4">
                                <div class="flex">
                                    <div><img src="<?= $api_url ?>/<?= $data['image_url'] ?? "" ?>" alt="<?= $data['title'] ?? "" ?>"
                                     fetchpriority="high"
  loading="lazy"
  decoding="async"></div>
                                </div>
                            </li>
                       <?php }
                            } else { ?>
                                <li class="mb-4 text-center w-full">
                                    <p>No data found</p>
                                </li>
                            <?php } ?>
                    </ul>
                </div>
                <!-- Controls -->
                <div class="absolute left-0 items-center justify-between w-full h-0 px-4 top-1/2 hide-circle hidden md:flex"
                    data-glide-el="controls">
                    <button
                        class="inline-flex items-center justify-center relative right-[66px] hover:bg-[#FED72B] w-8 h-8 transition duration-300 border rounded-full lg:w-10 lg:h-10 text-slate-700 hover:text-slate-900 focus-visible:outline-none bg-white/20"
                        data-glide-dir="<" aria-label="prev slide">
                        <i class="fa-solid fa-angle-left text-[#005224]"></i>
                    </button>
                    <button
                        class="inline-flex items-center justify-center relative left-[66px] hover:bg-[#FED72B] w-8 h-8 transition duration-300 border rounded-full lg:w-10 lg:h-10 text-slate-700 hover:text-slate-900 focus-visible:outline-none bg-white/20"
                        data-glide-dir=">" aria-label="next slide">
                        <i class="fa-solid fa-angle-right text-[#005224]"></i>
                    </button>
                </div>

                <!-- <div class="absolute bottom-0 flex items-center justify-center w-full gap-2 hidden"
                    data-glide-el="controls[nav]">
                    <button class=" group" data-glide-dir="=0" aria-label="goto slide 1"><span
                            class="block w-[10px] h-[10px] transition-colors duration-300 rounded-full bg-gray-300 focus:outline-none"></span></button>
                    <button class=" group" data-glide-dir="=1" aria-label="goto slide 2"><span
                            class="block w-[10px] h-[10px] transition-colors duration-300 rounded-full bg-gray-300 focus:outline-non2"></span></button>
                    <button class=" group" data-glide-dir="=2" aria-label="goto slide 3"><span
                            class="block w-[10px] h-[10px] transition-colors duration-300 rounded-full bg-gray-300 focus:outline-none"></span></button>
                    <button class=" group" data-glide-dir="=3" aria-label="goto slide 4"><span
                            class="block w-[10px] h-[10px] transition-colors duration-300 rounded-full bg-gray-300 focus:outline-none"></span></button>
                </div> -->
                <div class="text-center mt-3">
                    <a href="photo-gallery.php"
                        class="text-[16px]font-[600] rounded-[20px] p-[5px] px-4 border-[1px] border-blue-main  hover:bg-[#005224] hover:text-white hover:boder-[#FED72B]">View
                        All</a>
                </div>
            </div>
        </div>
    </div>

    <?php include "includes/footer.php" ?>


    </div>

    <?php include "includes/foot.php" ?>

      <script>
window.addEventListener('load', () => {
    const popup = document.getElementById('formOverlay');
    if (popup) popup.classList.remove('hidden');
});

const dismiss = document.getElementById('dismissPopup');
if (dismiss) {
    dismiss.addEventListener('click', () => {
        const popup = document.getElementById('formOverlay');
        if (popup) popup.classList.add('hidden');
    });
}
</script>
    <script>
        $('.moreless-button').click(function() {
            const moreText = $(this).siblings('.moretext');
            moreText.slideToggle();

            if ($(this).text() == "Read more...") {
                $(this).text("Read less");
            } else {
                $(this).text("Read more...");
            }
        });
    </script>
    <script>
        var Images = new Glide('.Images', {
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
        Images.mount();

        var Videos = new Glide('.videos', {
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
        Videos.mount();
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            new Swiper(".mySwiper", {
                slidesPerView: 4, // default
                spaceBetween: 10,
                loop: true,
                autoplay: {
                    delay: 2000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                // Responsive breakpoints
                breakpoints: {
                    320: { // mobile
                        slidesPerView: 1,
                        spaceBetween: 10,
                    },
                    640: { // small tablets
                        slidesPerView: 2,
                        spaceBetween: 15,
                    },
                    1024: { // tablets & small laptops
                        slidesPerView: 3,
                        spaceBetween: 20,
                    },
                    1280: { // desktops
                        slidesPerView: 4,
                        spaceBetween: 25,
                    }
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            var imgPopup = $('.img-popup');
            var popupImage = $('.img-popup img');
            var closeBtn = $('.close-btn');

            // Open on image click
            $('.popup-img').on('click', function() {
                var img_src = $(this).attr('src');
                popupImage.attr('src', img_src);
                imgPopup.addClass('opened');
            });

            // Close popup
            imgPopup.on('click', function() {
                imgPopup.removeClass('opened');
                popupImage.attr('src', '');
            });

            closeBtn.on('click', function() {
                imgPopup.removeClass('opened');
                popupImage.attr('src', '');
            });

            popupImage.on('click', function(e) {
                e.stopPropagation();
            });

            // ESC key to close
            $(document).on('keydown', function(e) {
                if (e.key === "Escape") {
                    imgPopup.removeClass('opened');
                    popupImage.attr('src', '');
                }
            });
        });
    </script>

    <script>
        // Start 
        let glide1Initialized = false;
        let glide2Initialized = false;

        function initGlide(selector, perViewCount) {
            return new Glide(selector, {
                type: 'carousel',
                focusAt: 1,
                perView: 2,
                autoplay: 3500,
                animationDuration: 700,
                gap: 10,
                breakpoints: {
                    1680: {
                        perView: 2
                    },
                    1024: {
                        perView: 2
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
                    const glide2 = initGlide('.Testimonials2', 4); // Show 4 slides
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

</body>

</html>