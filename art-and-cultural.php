<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DPS Kalyanpur| Art and Cultural</title>
    <?php include "includes/head.php" ?>
</head>

<body>

    <?php include "includes/header.php" ?>

    <div class="main relative sm:top-[20px] mb-[40px] sm:mb-[120px] mx-0 sm:mx-2">
        <div class="mt-8 mx-3 2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 px-3">
            <div class="sm:mt-10 relative">

                <h1
                    class="text-[32px] sm:hidden block font-[700] text-blue-main uppercase text-center mb-5 sm:mb-8 hr-line relative leading-9">
                    Art
                             <span class="sm:hidden"> <br></span> and
                            <span class="sm:hidden"> <br></span> Cultural
                </h1>
                <div>

                    <div class="md:w-[100%]">
                        <h1
                            class="sm:text-[32px] sm:block hidden font-[700] text-blue-main uppercase text-center sm:mb-1 hr-line relative leading-9">
                            Art
                             <span class="sm:hidden"> <br></span> and
                            <span class="sm:hidden"> <br></span> Cultural
                        </h1>
                        <div class="my-10">
                            <!-- Accordion Item 1 -->
                            <div class="border-b border-slate-200 bg-blue-main px-4">
                                <button onclick="toggleAccordion(1)"
                                    class="w-full flex justify-between items-center py-2 text-slate-800">
                                    <span class=" text-white font-bold ">Art and Culture</span>
                                    <span id="icon-1" class="text-slate-800 transition-transform duration-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="white"
                                            class="w-4 h-4 ">
                                            <path
                                                d="M8.75 3.75a.75.75 0 0 0-1.5 0v3.5h-3.5a.75.75 0 0 0 0 1.5h3.5v3.5a.75.75 0 0 0 1.5 0v-3.5h3.5a.75.75 0 0 0 0-1.5h-3.5v-3.5Z" />
                                        </svg>
                                    </span>
                                </button>
                                <div id="content-1"
                                    class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                                    <div class="max-w-5xl mx-auto bg-white p-6 rounded-lg shadow-lg my-5">
                                        <img class="w-full" src="https://res.cloudinary.com/dj7wogsju/image/upload/v1736856827/454e202382916464218_nxio0i.jpg">
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
    function toggleAccordion(index) {
        const content = document.getElementById(`content-${index}`);
        const icon = document.getElementById(`icon-${index}`);

        // SVG for Minus icon
        const minusSVG = `
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="white" class="w-4 h-4">
        <path d="M3.75 7.25a.75.75 0 0 0 0 1.5h8.5a.75.75 0 0 0 0-1.5h-8.5Z" />
      </svg>
    `;

        // SVG for Plus icon
        const plusSVG = `
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="white" class="w-4 h-4">
        <path d="M8.75 3.75a.75.75 0 0 0-1.5 0v3.5h-3.5a.75.75 0 0 0 0 1.5h3.5v3.5a.75.75 0 0 0 1.5 0v-3.5h3.5a.75.75 0 0 0 0-1.5h-3.5v-3.5Z" />
      </svg>
    `;

        // Toggle the content's max-height for smooth opening and closing
        if (content.style.maxHeight && content.style.maxHeight !== '0px') {
            content.style.maxHeight = '0';
            icon.innerHTML = plusSVG;
        } else {
            content.style.maxHeight = content.scrollHeight + 'px';
            icon.innerHTML = minusSVG;
        }
    }
    </script>
</body>

</html>