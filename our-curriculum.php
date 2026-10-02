<?php
include "includes/apis.php";
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $ourcurriculum_data['data']['title'] ?? "" ?></title>
    <meta name="description" content="<?= $ourcurriculum_data['data']['meta_description'] ?? "" ?>">
    <meta name="keywords" content="<?= $ourcurriculum_data['data']['meta_keywords'] ?? "" ?>">
    <?php include "includes/head.php" ?>
</head>

<body>

    <?php include "includes/header.php" ?>

    <div class="main relative">
        <div class="bg-[url('assets/images/building.webp')] bg-top flex items-center text-center h-[300px]">
            <div>
                <h1
                    class="text-[32px] sm:hidden block font-[700] text-white text-left pl-4 mb-5 sm:mb-8 hr-line relative leading-9">
                    <?= strip_tags($ourcurriculum_data['data']['sections'][0]['content_heading']) ?? "" ?>
                </h1>
            </div>

            <div class="md:w-[100%]">
                <h1
                    class="sm:text-[32px] sm:block hidden font-[700] text-white text-left sm:mb-1 hr-line relative leading-9 ml-[7rem]">
                    <?= strip_tags($ourcurriculum_data['data']['sections'][0]['content_heading']) ?? "" ?>
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
                        <a href="our-curriculum" class="ms-1 text-sm font-medium text-blue-main"> <?= strip_tags($ourcurriculum_data['data']['sections'][0]['content_heading']) ?? "" ?></a>
                    </div>
                </li>
            </ol>
        </div>

        <div
            class="2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 mx-3 sm:py-10 py-0 sm:p-20 p-0">
             <?= $ourcurriculum_data['data']['sections'][1]['content'] ?? "" ?>
            <!-- <p class="text-gray-600 text-[16px] mt-2 ">Delhi Public School, Kalyanpur follows the CBSE curriculum, designed to promote life skills, goal setting,
            and lifelong learning. The curriculum nurtures values, fosters cultural awareness, and builds global
            understanding in today’s interdependent society. Students are also encouraged to harness technology and
            information responsibly for the betterment of humankind. Equal emphasis is placed on physical fitness,
            health, and overall well-being, alongside academic excellence. The quest for knowledge is further enriched
            through an art-integrated syllabus that sparks creativity and innovation.</p>
            <p class="text-gray-600 text-[16px] mt-2 ">Our teaching–learning process emphasizes activity-based learning through structured lessons, standardized
            worksheets, educational trips, and nature walks that connect students with the outdoors. Special assemblies
            are organized regularly to celebrate festivals and significant occasions, fostering respect for cultural
            diversity. Critical and creative thinking is encouraged across all subjects. Alongside the traditional
            disciplines, students are offered a variety of modern and career-oriented courses such as Fashion Studies,
            Legal Studies, Mass Communication, NCC, and Artificial Intelligence, equipping them to succeed in the
            competitive global environment.</p>
            <h3 class="text-gray-600 text-[20px] mt-4 font-[700]">Learning Outcomes</h3>
            <p class="text-gray-600 text-[16px] mt-2 ">At DPS Kalyanpur, academics are delivered in a safe, inclusive, and healthy environment. Our experienced
            faculty members cultivate strong bonds with students, balancing care with preparation, and creating a
            nurturing atmosphere for growth. Personalized counselling, remedial classes, and active parent–teacher
            associations further strengthen the school’s commitment to being a true “home away from home.”</p>
            <p class="text-gray-600 text-[16px] mt-2 ">Students are encouraged to explore their talents through stage events, Sports Day, national and
            international fests, and academic competitions. These platforms help them build confidence, unleash their
            potential, and experience the joy of achievement.</p>
            <p class="text-gray-600 text-[16px] mt-2 ">We believe in creating a collaborative classroom culture that promotes empathy, teamwork, and respect for
            diversity. Through daily class activities, students learn to share their strengths, support one another, and
            develop the skills of collaboration and leadership—qualities that are essential in the modern interconnected
            world.</p> -->

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