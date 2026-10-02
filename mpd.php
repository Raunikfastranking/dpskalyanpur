<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "includes/head.php" ?>
    <title>DPS Kalyanpur | About Us</title>
</head>

<body>

    <?php include "includes/header.php" ?>

    <div class="main relative">
    <div class="px-6 py-10 max-w-6xl mx-auto">

  <div class="space-y-10 text-[1rem] leading-relaxed">
    <div>
      <h2 class="text-2xl text-blue-main font-semibold mb-2">1. General Information</h2>
      <a class="text-blue-600 underline" href="https://dpskalyanpur.com/Site/testimonials/160000001_160000011_160000051_Home-GeneralInformation" target="_blank" rel="noopener noreferrer">
        View General Information
      </a>
    </div>

    <div>
      <h2 class="text-2xl text-blue-main font-semibold mb-2">2. Documents and Information</h2>
      <a class="text-blue-600 underline" href="https://dpskalyanpur.com/Site/DocumentAndInformation/160000001_160000011_160000052_Home-DocumentsandInformation" target="_blank" rel="noopener noreferrer">
        View Documents and Information
      </a>
    </div>

    <div>
      <h2 class="text-2xl text-blue-main font-semibold mb-2">3. Results and Academics</h2>
      <a class="text-blue-600 underline" href="https://dpskalyanpur.com/Site/DocumentAndInformation/160000001_160000011_160000053_Home-ResultsandAcademics" target="_blank" rel="noopener noreferrer">
        View Results and Academic Records
      </a>
    </div>

    <div>
      <h2 class="text-2xl text-blue-main font-semibold mb-2">4. Staff (Teaching)</h2>
      <a class="text-blue-600 underline" href="https://dpskalyanpur.com/Site/testimonials/160000001_160000011_160000054_Home-Staff(Teaching)" target="_blank" rel="noopener noreferrer">
        View Teaching Staff
      </a>
    </div>

    <div>
      <h2 class="text-2xl text-blue-main font-semibold mb-2">5. School Infrastructure</h2>
      <a class="text-blue-600 underline" href="https://dpskalyanpur.com/Site/testimonials/160000001_160000011_160000055_Home-SchoolInfrastructure" target="_blank" rel="noopener noreferrer">
        View Infrastructure Details
      </a>
    </div>

    <div>
      <h2 class="text-2xl text-blue-main font-semibold mb-2">6. Capacity Development Programme</h2>
      <ul class="list-disc ml-6 space-y-2">
        <li><strong>DPSS – Human Resource Development Council:</strong> Aims to continually enhance the skills and mindset of educators through structured and reflective learning programs.</li>
        <li><strong>CBSE Training:</strong> Equips educators with modern teaching methodologies aligned with the dynamic academic landscape of CBSE.</li>
        <li><strong>Superhouse Education Foundation:</strong> Provides foundational training modules enhancing delivery standards at various academic levels.</li>
        <li><strong>Debriefing Sessions:</strong> Post-training sessions conducted in-house to maintain uniformity in instructional methods among all teachers.</li>
      </ul>
    </div>

    <div>
      <h2 class="text-2xl text-blue-main font-semibold mb-2">7. Committees</h2>
      <ul class="list-disc ml-6 space-y-2">
        <li><strong>Anti-Bullying Committee:</strong> Ensures a safe and supportive environment for students by addressing bullying incidents promptly.</li>
        <li><strong>Discipline Committee:</strong> Maintains decorum and enforces behavioral expectations across the campus.</li>
        <li><strong>Safety and Security:</strong> Focuses on maintaining physical and psychological safety of all stakeholders.</li>
        <li><strong>POSH (Prevention of Sexual Harassment):</strong> Handles grievances related to workplace harassment in a confidential and structured manner.</li>
        <li><strong>POCSO (Protection of Children from Sexual Offences):</strong> Works to safeguard children’s rights by ensuring awareness, action, and protection under POCSO Act.</li>
      </ul>
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