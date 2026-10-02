<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "includes/head.php" ?>
    <title>DPS Kalyanpur |Sanskrit</title>
</head>

<body>

    <?php include "includes/header.php" ?>

    <div class="main relative">
        <div class="bg-[url('assets/images/building.webp')] bg-top flex items-center text-center h-[300px]">
            <div>
                <h1 class="text-[32px] sm:hidden block font-[700] text-white text-left pl-4 mb-5 sm:mb-8 hr-line relative leading-9">
                    Sanskrit
                </h1>
            </div>

            <div class="md:w-[100%]">
                <h1 class="sm:text-[32px] sm:block hidden font-[700] text-white text-left sm:mb-1 hr-line relative leading-9 ml-[7rem]">
                    Sanskrit
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
                        <p class="ms-1 text-sm font-medium text-blue-main">Academics
                        </p>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-blue-main mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"></path>
                        </svg>
                        <a href="sanskrit.php" class="ms-1 text-sm font-medium text-blue-main">Sanskrit</a>
                    </div>
                </li>
            </ol>
        </div>

        <div class="2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 mx-3 sm:py-10 py-0 sm:p-20 p-0">
            <div class="md:flex gap-9 mt-6 mb-10">
                <div class="md:w-[40%]">
                    <img src="https://dummyimage.com/292x196/e6e6ed/000000&text=Not+Provided" alt="" class="w-[100%]">
                </div>
                <div class="md:w-[60%]">
                    <span class="text-[18px] font-[700]">Connecting with the Roots of Knowledge</span>
                    <br><br>
                    Delhi Public School Kalyanpur, Kanpur, proudly offers Sanskrit as an optional subject. Sanskrit is not only the foundation of ancient Indian literature, philosophy, and spirituality, but it also continues to influence modern fields such as linguistics, computer science, and cognitive development.
                    <br><br>
                    <span class="text-[16px] font-[600]">Why Learn Sanskrit?</span>
                    <ul class="list-disc ml-6 mt-2 space-y-1 text-gray-700">
                        <li><b>The Language of Ancient Wisdom:</b> All the Vedas, Vedangas, Upanishads, and much of India's rich philosophical literature are composed in Sanskrit. Mastery of Sanskrit opens the door to a deeper understanding of our ancient culture and civilization.</li>
                        <li><b>Scientifically Structured:</b> Sanskrit’s precise grammar and structure make it a truly scientific language. Even when words are rearranged, the meaning remains intact — a feature that has implications in areas like coding, computational linguistics, and artificial intelligence.</li>
                        <li><b>Gateway to Other Languages:</b> Known as the 'mother of all languages,' Sanskrit forms the foundation of many modern Indian and global languages. Learning Sanskrit builds a strong linguistic base for mastering additional languages.</li>
                        <li><b>Moral and Spiritual Growth:</b> Sanskrit literature, rich in timeless values and high moral teachings, guides humanity toward purity, ethical living, and intellectual excellence.</li>
                    </ul>


                </div>
            </div>

            <span class="text-[16px] font-[600]">Program Overview</span>
            <ul class="list-disc ml-6 mt-2 space-y-1 text-gray-700">
                <li><b>Eligibility:</b> Open to students from Grade 5 onwards</li>
                <li><b>Curriculum Focus:</b> Language proficiency, classical literature, pronunciation of shlokas and mantras, and cultural studies</li>
            </ul>
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