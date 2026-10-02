<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "includes/head.php" ?>
    <title>DPS Kalyanpur |Hindi</title>
</head>

<body>

    <?php include "includes/header.php" ?>

    <div class="main relative">
        <div class="bg-[url('assets/images/building.webp')] bg-top flex items-center text-center h-[300px]">
            <div>
                <h1 class="text-[32px] sm:hidden block font-[700] text-white text-left pl-4 mb-5 sm:mb-8 hr-line relative leading-9">
                    Hindi
                </h1>
            </div>

            <div class="md:w-[100%]">
                <h1 class="sm:text-[32px] sm:block hidden font-[700] text-white text-left sm:mb-1 hr-line relative leading-9 ml-[7rem]">
                    Hindi
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
                        <a href="hindi.php" class="ms-1 text-sm font-medium text-blue-main">Hindi</a>
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
                    <span class="text-[18px] font-[700]">Preserving Heritage, Shaping Futures</span>
                    <br><br>
                    At Delhi Public School Kalyanpur, Kanpur, we believe that language is more than a means of communication; it is a profound symbol of national identity and pride. By offering Hindi as an optional subject, Delhi Public School Kalyanpur reaffirms its commitment to nurturing well-rounded individuals, rooted in culture and ready to contribute meaningfully to society.
                    <br><br>
                    <span class="text-[16px] font-[600]">Why Choose Hindi?</span>
                    <ul class="list-disc ml-6 mt-2 space-y-1 text-gray-700">
                        <li><b>A Symbol of National Pride:</b> Hindi stands alongside the national flag and emblem as a core symbol of India's identity. It connects us to our heritage, instills pride, and strengthens the spirit of unity.</li>
                        <li><b>Rooted in Culture and History:</b> As the voice of India's freedom movement and a vessel for its cultural values, Hindi remains one of the most powerful, expressive, and scientifically structured languages in the world.</li>
                    </ul>

                   
                </div>
            </div>
            <ul>
                <li><b>Holistic Development:</b> Mahatma Gandhi emphasised the importance of mastering one’s mother tongue as a foundation for strength and wisdom. Studying Hindi nurtures character, values, and emotional expression and deepens students' connection to their roots.</li>
               <br> <li><b>Emotional and Practical Relevance:</b> While global languages facilitate international communication, it is in our native language that emotions, dreams, trust, and heartfelt expressions find their truest voice. The depth and sweetness of Hindi create lasting impressions and foster meaningful connections.</li>
            </ul>
             <br>
                    <span class="text-[16px] font-[600]">Program Overview</span>
                    <ul class="list-disc ml-6 mt-2 space-y-1 text-gray-700">
                        <li><b>Eligibility:</b> Available for students in Grades 11 and 12</li>
                        <li><b>Curriculum Focus:</b> Advanced language proficiency, literature, cultural studies, and values-based education</li>
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