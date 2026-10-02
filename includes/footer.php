  <?php
    renderDynamicSections($pageData, $api_url);
    ?>
<style>
    .real-is-hide {
        display: none;
    }


    .real-should-display:hover .real-is-hide {
        display: block;
    }

    .real-should-display:hover .not-real-hide {
        display: none;
    }

    .whatsapp-button {
        position: fixed;
        right: 15px;
        bottom: 15px;
        display: inline-block;
        transition: transform 0.3s ease;
        z-index: 999;
    }

    .whatsapp-button img {
        width: 60px;
        height: 60px;
        border-radius: 50%;
    }

    .whatsapp-button:hover img {
        box-shadow: 0 0 20px #25D366, 0 0 40px #25D366;
        transform: scale(1.1);
    }
</style>
<div id="NewsPopup" class="relative fixed  bg-green-500 text-white px-4 py-2 rounded mb-5 hidden" style="z-index:9999;
    position: fixed;
    right: 0;
    bottom: 20%;">
    Newsletter Subscribed.
</div>
<footer class="py-5 px-4 pmt-20 bg-blue-main flex flex-col sm:flex-row justify-around">

    <div class="sm:mt-3 sm:order-1 order-1 mt-8 ">
        <div>
            <a href="/">
                <img src="<?= $header_footer_data[1]['meta_data']['footer_logo_url'] ?? "" ?>" alt=""
                    class="w-[236px] sm:w-[200px]">
            </a>
        </div>
        <div class="mt-5">
            <div class=" mt-4 sm:mt-6">
                <div class="flex gap-2 mb-3">
                    <p class="text-white font-[400] 2xl:text-[17px] xl:text-[14px] lg:text-[13px] md:text-[12px] text-[12px]">
                        <?php
                        $text = $header_footer_data[1]['meta_data']['footer_about'] ?? "";
                        $words = explode(' ', $text);
                        $chunks = array_chunk($words, 8);

                        foreach ($chunks as $chunk) {
                            echo implode(' ', $chunk) . "<br>";
                        }
                        ?>
                    </p>
                </div>
                <div class="flex gap-2 mb-3 items-center">
                    <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_105_2550)">
                            <path
                                d="M11.388 12.4369C9.20445 11.5124 7.46809 9.772 6.54862 7.58633L9.09841 5.03204L4.4038 0.33368L2.02575 2.71098C1.61328 3.12581 1.28717 3.6183 1.06628 4.15998C0.845385 4.70166 0.734098 5.28176 0.738855 5.86672C0.738855 11.3023 7.67728 18.2407 13.1128 18.2407C13.6977 18.2458 14.2778 18.1347 14.8194 17.9138C15.361 17.6929 15.8534 17.3666 16.2678 16.9538L18.6459 14.5758L13.9475 9.87739L11.388 12.4369ZM15.2067 15.8934C14.9313 16.1664 14.6043 16.3819 14.2449 16.5274C13.8854 16.6729 13.5006 16.7454 13.1128 16.7408C8.43847 16.7408 2.23873 10.5411 2.23873 5.86672C2.23431 5.47888 2.30695 5.09402 2.45242 4.73446C2.59789 4.3749 2.8133 4.04781 3.08616 3.77215L4.4038 2.4545L6.98134 5.03204L4.78027 7.23311L4.964 7.69357C5.5049 9.14043 6.35046 10.4541 7.44341 11.5457C8.53636 12.6372 9.85116 13.481 11.2987 14.02L11.7532 14.1933L13.9475 11.9982L16.525 14.5758L15.2067 15.8934ZM11.238 1.74206V0.242188C13.2263 0.244371 15.1325 1.03518 16.5384 2.44112C17.9444 3.84705 18.7352 5.75328 18.7374 7.74157H17.2375C17.2357 6.15095 16.603 4.62599 15.4783 3.50125C14.3536 2.37651 12.8286 1.74385 11.238 1.74206ZM11.238 4.74182V3.24194C12.431 3.24313 13.5748 3.71758 14.4184 4.56117C15.262 5.40475 15.7364 6.54856 15.7376 7.74157H14.2377C14.2377 6.94598 13.9217 6.18298 13.3591 5.62042C12.7966 5.05786 12.0336 4.74182 11.238 4.74182Z"
                                fill="#FBFBFB" />
                        </g>
                        <defs>
                            <clipPath id="clip0_105_2550">
                                <rect width="17.9985" height="17.9985" fill="white"
                                    transform="translate(0.738953 0.242188)" />
                            </clipPath>
                        </defs>
                    </svg>
                      <?php
                        $phone = trim($header_footer_data[1]['meta_data']['footer_phones'] ?? "");
                        ?>

                        <p class="text-white font-[400] 2xl:text-[17px] xl:text-[14px] lg:text-[13px] md:text-[12px] text-[12px]">
                            <a href="tel:<?= $phone ?>">
                                <?= $phone ?>
                            </a>
                        </p>

                </div>
                <div class="flex gap-2 mb-3 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 32 32">
                        <path fill="#fff"
                            d="M28.516 7.167H3.482L16 14.275zM16.74 17.303a1.5 1.5 0 0 1-1.48 0L2.5 10.06v14.773h27V10.06z" />
                    </svg>
                    <a class="text-white font-[400] sm:text-[18px] text-[14px]"
                        href="mailto:<?= $header_footer_data[1]['meta_data']['footer_email'] ?? "" ?>"><?= $header_footer_data[1]['meta_data']['footer_email'] ?? "" ?></a>
                </div>
            </div>
        </div>
    </div>


  <div class="flex justify-between sm:w-[30%] sm:order-2 order-2">
        <div class="mt-3">
            <h2 class="sm:text-[22px] text-[18px] font-[600] " style="color:#9AE8BC">Important Links</h2>
             <?php
            $footer_data = $footer_link_data['data'][1] ?? null; // "Quick links"
        
             function renderFooterMenu($items)
            {
                if (empty($items)) return '';

                $html = '<ul class="space-y-1">';

                foreach ($items as $link) {
                    $hasChildren = !empty($link['children']);
                    $id = 'submenu-' . $link['id'];

                    if (!$hasChildren) {
                        // Normal link
                        $html .= '<li>
                <a href="' . ltrim($link['url'], "/") . '" 
                   target="' . htmlspecialchars($link['target']) . '" 
                   class="block py-2 px-2 text-white hover:text-[#FED72B] sm:text-[17px] text-[12px]">'
                            . htmlspecialchars($link['title']) .
                            '</a>
            </li>';
                    } else {
                        // Parent with children (arrow only)
                        $html .= '<li>
                <button type="button" class="w-full text-left py-2 px-2 flex justify-between items-center text-white sm:text-[17px] text-[12px] hover:text-[#FED72B]" onclick="toggleSubmenu(\'' . $id . '\', this)">'
                            . htmlspecialchars($link['title']) .
                            ' <span class="arrow text-white"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#fff" d="M13 16.25a.74.74 0 0 1-.53-.22a.75.75 0 0 1 0-1.06l3-3l-3-3A.75.75 0 0 1 13.53 8l3.5 3.5a.75.75 0 0 1 0 1.06L13.53 16a.74.74 0 0 1-.53.25m-5.5 0A.74.74 0 0 1 7 16a.75.75 0 0 1 0-1l3-3l-3-3a.75.75 0 0 1 1-1l3.5 3.5a.75.75 0 0 1 0 1.06L8 16a.74.74 0 0 1-.5.25"/></svg></span>' . // force arrow white
                            '</button>';

                        $html .= '<div id="' . $id . '" class="hidden pl-4">';
                        $html .= renderFooterMenu($link['children']); // recursive
                        $html .= '</div>';

                        $html .= '</li>';
                    }
                }

                $html .= '</ul>';
                return $html;
            }

            if (!empty($footer_data['links'])) {
                echo renderFooterMenu($footer_data['links']);
            }
            ?>

            <script>
                function toggleSubmenu(id, btn) {
                    const submenu = document.getElementById(id);
                    const arrow = btn.querySelector('.arrow');
                    if (submenu) {
                        submenu.classList.toggle('hidden');
                        if (arrow) arrow.classList.toggle('rotate-90'); // rotate arrow
                    }
                }
            </script>

            <style>
                .arrow {
                    display: inline-block;
                    transition: transform 0.3s ease;
                    color: white;
                    /* ensure arrow stays white */
                }

                .rotate-90 {
                    transform: rotate(90deg);
                }
            </style>

        </div>
        <div class="mt-2 sm:mt-4">
            <div>
                <div>
                    <h2 class="sm:text-[22px] text-[18px] font-[600] " style="color:#9AE8BC">Quick links</h2>
                    <ul class="grid grid-cols-1 sm:gap-4 gap-2 mt-2">
                        <?php
                        if (!empty($footer_link_data['data'][0]['links'])) {
                            foreach ($footer_link_data['data'][0]['links'] as $footer_link) {
                        ?>
                                <li>
                                    <a href="<?= $footer_link['url'] ?? "" ?>"
                                        target="<?= $footer_link['target'] ?? "_self" ?>"
                                        class="text-white transition hover:text-[#FED72B] 2xl:text-[17px] xl:text-[14px] lg:text-[13px] md:text-[12px] text-[12px]">
                                        <?= $footer_link['title'] ?? "" ?>
                                    </a>
                                </li>
                        <?php
                            }
                        }
                        ?>

                         <li class="block sm:hidden">
                                <a href="job-openings"
                                    class="text-white transition hover:text-[#FED72B] 2xl:text-[17px] xl:text-[14px] lg:text-[13px] md:text-[12px] text-[12px]">Career
                                </a>
                            </li>
                         <?php
                         $random_id = "001"
                         ?>   
                            <li >
                                <a href="apply-jobs"
                                    class="text-white transition hover:text-[#FED72B] 2xl:text-[17px] xl:text-[14px] lg:text-[13px] md:text-[12px] text-[12px]">Apply Now
                                </a>
                            </li>
                      
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-5 order-3 sm:w-[25%]  sm:mt-8">
        <div>
            <h2 class="sm:text-[22px] text-[18px] font-[600] " style="color:#9AE8BC">Social Media</h2>
            <ul class="flex sm:gap-4 gap-2 mt-2 sm:mt-4">
                <li>
                    <a href="<?= $header_footer_data[1]['meta_data']['footer_youtube'] ?? "" ?>" target="_blank" class="real-should-display transition-all">
                        <svg class="not-real-hide sm:w-10 sm:h-10 w-8 h-8" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24">
                            <path fill="#fff"
                                d="m10 15l5.19-3L10 9zm11.56-7.83c.13.47.22 1.1.28 1.9c.07.8.1 1.49.1 2.09L22 12c0 2.19-.16 3.8-.44 4.83c-.25.9-.83 1.48-1.73 1.73c-.47.13-1.33.22-2.65.28c-1.3.07-2.49.1-3.59.1L12 19c-4.19 0-6.8-.16-7.83-.44c-.9-.25-1.48-.83-1.73-1.73c-.13-.47-.22-1.1-.28-1.9c-.07-.8-.1-1.49-.1-2.09L2 12c0-2.19.16-3.8.44-4.83c.25-.9.83-1.48 1.73-1.73c.47-.13 1.33-.22 2.65-.28c1.3-.07 2.49-.1 3.59-.1L12 5c4.19 0 6.8.16 7.83.44c.9.25 1.48.83 1.73 1.73" />
                        </svg>
                        <svg class="real-is-hide sm:w-10 sm:h-10 w-8 h-8" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 256 180">
                            <path fill="#f00"
                                d="M250.346 28.075A32.18 32.18 0 0 0 227.69 5.418C207.824 0 127.87 0 127.87 0S47.912.164 28.046 5.582A32.18 32.18 0 0 0 5.39 28.24c-6.009 35.298-8.34 89.084.165 122.97a32.18 32.18 0 0 0 22.656 22.657c19.866 5.418 99.822 5.418 99.822 5.418s79.955 0 99.82-5.418a32.18 32.18 0 0 0 22.657-22.657c6.338-35.348 8.291-89.1-.164-123.134" />
                            <path fill="#fff" d="m102.421 128.06l66.328-38.418l-66.328-38.418z" />
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="<?= $header_footer_data[1]['meta_data']['footer_facebook'] ?? "" ?>" target="_blank" class="real-should-display transition-all">
                        <svg class="not-real-hide sm:w-10 sm:h-10 w-8 h-8" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24">
                            <path fill="#fff"
                                d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c5.05-.5 9-4.76 9-9.95" />
                        </svg>
                        <svg class="real-is-hide sm:w-10 sm:h-10 w-8 h-8" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 256 256">
                            <path fill="#1877f2"
                                d="M256 128C256 57.308 198.692 0 128 0S0 57.308 0 128c0 63.888 46.808 116.843 108 126.445V165H75.5v-37H108V99.8c0-32.08 19.11-49.8 48.348-49.8C170.352 50 185 52.5 185 52.5V84h-16.14C152.959 84 148 93.867 148 103.99V128h35.5l-5.675 37H148v89.445c61.192-9.602 108-62.556 108-126.445" />
                            <path fill="#fff"
                                d="m177.825 165l5.675-37H148v-24.01C148 93.866 152.959 84 168.86 84H185V52.5S170.352 50 156.347 50C127.11 50 108 67.72 108 99.8V128H75.5v37H108v89.445A129 129 0 0 0 128 256a129 129 0 0 0 20-1.555V165z" />
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="<?= $header_footer_data[1]['meta_data']['footer_instagram'] ?? "" ?>" target="_blank"
                        class="real-should-display transition-all">
                        <svg class="not-real-hide sm:w-10 sm:h-10 w-8 h-8" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 16 16">
                            <path fill="#fff"
                                d="M8 1c-1.35 0-2.33.016-2.92.047a6 6 0 0 0-1.55.266a3.66 3.66 0 0 0-2.22 2.22a6 6 0 0 0-.266 1.55c-.031.594-.047 1.57-.047 2.92s.016 2.33.047 2.92c.019.525.108 1.05.266 1.55c.182.511.475.976.86 1.36c.38.382.846.666 1.36.828c.497.178 1.02.278 1.55.296c.594.031 1.57.047 2.92.047s2.33-.016 2.92-.047a6 6 0 0 0 1.55-.266a3.67 3.67 0 0 0 2.22-2.22q.236-.754.266-1.55c.031-.594.047-1.57.047-2.92s-.01-2.32-.031-2.91a6.3 6.3 0 0 0-.282-1.56a3.66 3.66 0 0 0-2.219-2.22a6 6 0 0 0-1.55-.266q-.893-.047-2.92-.047zm-.5 12.8q-1.25 0-1.94-.031a6.6 6.6 0 0 1-1.69-.25a2.38 2.38 0 0 1-1.344-1.344a6.6 6.6 0 0 1-.25-1.69c-.021-.458-.031-1.1-.031-1.94v-1q0-1.25.031-1.94c.006-.571.09-1.14.25-1.69a2.26 2.26 0 0 1 1.343-1.343a6.6 6.6 0 0 1 1.69-.25c.458-.021 1.1-.031 1.94-.031h1q1.25 0 1.94.031c.571.006 1.14.09 1.69.25a2.26 2.26 0 0 1 1.344 1.343c.16.549.244 1.12.25 1.69c.02.438.031 1.08.031 1.94v1q0 1.25-.031 1.94a6.6 6.6 0 0 1-.25 1.69a2.38 2.38 0 0 1-1.344 1.344c-.548.16-1.12.244-1.69.25c-.437.02-1.08.031-1.94.031zm4.25-10.4a.87.87 0 0 0-.616 1.49a.85.85 0 0 0 .944.195a.8.8 0 0 0 .272-.195c.16-.168.256-.385.275-.616a.89.89 0 0 0-.875-.875zM8 4.52a3.4 3.4 0 0 0-1.75.472c-.53.307-.971.748-1.28 1.28a3.5 3.5 0 0 0 0 3.5A3.52 3.52 0 0 0 8 11.524a3.515 3.515 0 0 0 3.502-3.502c0-.61-.163-1.22-.472-1.75a3.5 3.5 0 0 0-1.28-1.28A3.4 3.4 0 0 0 8 4.52m0 5.75a2.25 2.25 0 0 1 0-4.5a2.25 2.25 0 0 1 0 4.5" />
                        </svg>
                        <svg class="real-is-hide sm:w-10 sm:h-10 w-8 h-8" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 256 256">
                            <g fill="none">
                                <rect width="256" height="256" fill="url(#skillIconsInstagram0)" rx="60" />
                                <rect width="256" height="256" fill="url(#skillIconsInstagram1)" rx="60" />
                                <path fill="#fff"
                                    d="M128.009 28c-27.158 0-30.567.119-41.233.604c-10.646.488-17.913 2.173-24.271 4.646c-6.578 2.554-12.157 5.971-17.715 11.531c-5.563 5.559-8.98 11.138-11.542 17.713c-2.48 6.36-4.167 13.63-4.646 24.271c-.477 10.667-.602 14.077-.602 41.236s.12 30.557.604 41.223c.49 10.646 2.175 17.913 4.646 24.271c2.556 6.578 5.973 12.157 11.533 17.715c5.557 5.563 11.136 8.988 17.709 11.542c6.363 2.473 13.631 4.158 24.275 4.646c10.667.485 14.073.604 41.23.604c27.161 0 30.559-.119 41.225-.604c10.646-.488 17.921-2.173 24.284-4.646c6.575-2.554 12.146-5.979 17.702-11.542c5.563-5.558 8.979-11.137 11.542-17.712c2.458-6.361 4.146-13.63 4.646-24.272c.479-10.666.604-14.066.604-41.225s-.125-30.567-.604-41.234c-.5-10.646-2.188-17.912-4.646-24.27c-2.563-6.578-5.979-12.157-11.542-17.716c-5.562-5.562-11.125-8.979-17.708-11.53c-6.375-2.474-13.646-4.16-24.292-4.647c-10.667-.485-14.063-.604-41.23-.604zm-8.971 18.021c2.663-.004 5.634 0 8.971 0c26.701 0 29.865.096 40.409.575c9.75.446 15.042 2.075 18.567 3.444c4.667 1.812 7.994 3.979 11.492 7.48c3.5 3.5 5.666 6.833 7.483 11.5c1.369 3.52 3 8.812 3.444 18.562c.479 10.542.583 13.708.583 40.396s-.104 29.855-.583 40.396c-.446 9.75-2.075 15.042-3.444 18.563c-1.812 4.667-3.983 7.99-7.483 11.488c-3.5 3.5-6.823 5.666-11.492 7.479c-3.521 1.375-8.817 3-18.567 3.446c-10.542.479-13.708.583-40.409.583c-26.702 0-29.867-.104-40.408-.583c-9.75-.45-15.042-2.079-18.57-3.448c-4.666-1.813-8-3.979-11.5-7.479s-5.666-6.825-7.483-11.494c-1.369-3.521-3-8.813-3.444-18.563c-.479-10.542-.575-13.708-.575-40.413s.096-29.854.575-40.396c.446-9.75 2.075-15.042 3.444-18.567c1.813-4.667 3.983-8 7.484-11.5s6.833-5.667 11.5-7.483c3.525-1.375 8.819-3 18.569-3.448c9.225-.417 12.8-.542 31.437-.563zm62.351 16.604c-6.625 0-12 5.37-12 11.996c0 6.625 5.375 12 12 12s12-5.375 12-12s-5.375-12-12-12zm-53.38 14.021c-28.36 0-51.354 22.994-51.354 51.355s22.994 51.344 51.354 51.344c28.361 0 51.347-22.983 51.347-51.344c0-28.36-22.988-51.355-51.349-51.355zm0 18.021c18.409 0 33.334 14.923 33.334 33.334c0 18.409-14.925 33.334-33.334 33.334s-33.333-14.925-33.333-33.334c0-18.411 14.923-33.334 33.333-33.334" />
                                <defs>
                                    <radialGradient id="skillIconsInstagram0" cx="0" cy="0" r="1"
                                        gradientTransform="matrix(0 -253.715 235.975 0 68 275.717)"
                                        gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#fd5" />
                                        <stop offset=".1" stop-color="#fd5" />
                                        <stop offset=".5" stop-color="#ff543e" />
                                        <stop offset="1" stop-color="#c837ab" />
                                    </radialGradient>
                                    <radialGradient id="skillIconsInstagram1" cx="0" cy="0" r="1"
                                        gradientTransform="matrix(22.25952 111.2061 -458.39518 91.75449 -42.881 18.441)"
                                        gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#3771c8" />
                                        <stop offset=".128" stop-color="#3771c8" />
                                        <stop offset="1" stop-color="#60f" stop-opacity="0" />
                                    </radialGradient>
                                </defs>
                            </g>
                        </svg>
                    </a>
                </li>


                <li>
                    <a href="<?= $header_footer_data[1]['meta_data']['footer_linkedin'] ?? "" ?>" target="_blank" class="real-should-display transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" class="not-real-hide sm:w-10 sm:h-10 w-8 h-8"
                            viewBox="0 0 128 128">
                            <path fill="#fff"
                                d="M116 3H12a8.91 8.91 0 0 0-9 8.8v104.42a8.91 8.91 0 0 0 9 8.78h104a8.93 8.93 0 0 0 9-8.81V11.77A8.93 8.93 0 0 0 116 3M39.17 107H21.06V48.73h18.11zm-9-66.21a10.5 10.5 0 1 1 10.49-10.5a10.5 10.5 0 0 1-10.54 10.48zM107 107H88.89V78.65c0-6.75-.12-15.44-9.41-15.44s-10.87 7.36-10.87 15V107H50.53V48.73h17.36v8h.24c2.42-4.58 8.32-9.41 17.13-9.41C103.6 47.28 107 59.35 107 75z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="real-is-hide sm:w-10 sm:h-10 w-8 h-8"
                            viewBox="0 0 128 128">
                            <path fill="#0076b2"
                                d="M116 3H12a8.91 8.91 0 0 0-9 8.8v104.42a8.91 8.91 0 0 0 9 8.78h104a8.93 8.93 0 0 0 9-8.81V11.77A8.93 8.93 0 0 0 116 3" />
                            <path fill="#fff"
                                d="M21.06 48.73h18.11V107H21.06zm9.06-29a10.5 10.5 0 1 1-10.5 10.49a10.5 10.5 0 0 1 10.5-10.49m20.41 29h17.36v8h.24c2.42-4.58 8.32-9.41 17.13-9.41C103.6 47.28 107 59.35 107 75v32H88.89V78.65c0-6.75-.12-15.44-9.41-15.44s-10.87 7.36-10.87 15V107H50.53z" />
                        </svg>
                    </a>
                </li>
            </ul>
        </div>

       <div>
            <h2 class="sm:text-[22px] text-[18px] font-[600] mt-3 sm:mt-5" style="color:#9AE8BC">AllenCare App</h2>
           <div class="flex items-center mt-3 gap-1">
                <a href="<?= $header_footer_data[1]['meta_data']['android_app_link'] ?? "" ?>"><img class="w-[140px] "
                        src="https://dps.allenhouseschools.com/<?= $header_footer_data[1]['meta_data']['android_badge_url'] ?? "" ?>"
                        alt=""></a>
                <a href="<?= $header_footer_data[1]['meta_data']['ios_app_link'] ?? "" ?>"><img class="w-[140px] "
                        src="https://dps.allenhouseschools.com/<?= $header_footer_data[1]['meta_data']['ios_badge_url'] ?? "" ?>"
                        alt=""></a>
            </div>
        </div>
        <div class="sm:mt-5 mt-3">
            <h2 class="sm:text-[22px] text-[18px] font-[600] " style="color:#9AE8BC">Newsletter</h2>
            <div class="sm:mt-5 mt-2">
                <!-- <div>
                    <div>
                        <input type="text"
                            class="sm:p-3 p-2 px-3 order-[1px] outline-none rounded-[10px] w-[60%] sm:w-[65%] text-[12px] sm:text-[16px]"
                            placeholder="Type Email" />
                        <button
                            class="bg-[#FED72B] text-[#005224] sm:p-3 p-2 sm:px-4 rounded-[10px] transition-all hover:bg-[#005224] hover:text-[#FED72B]  text-[12px] sm:text-[16px]">Subscribe</button>
                    </div>
                </div> -->
                <form id="newsForm" action="">
                    <div>
                        <div class="flex gap-2">
                            <input type="text"
                                class="sm:p-3 p-2 px-3 order-[1px] outline-none rounded-[10px] w-[60%] sm:w-[65%] text-[12px] sm:text-[16px]"
                                placeholder="Type Email" id="news-email" required />
                            <button type="submit" id="newsSubmit"
                                class="bg-[#FED72B] text-[#005224] sm:p-3 p-2 sm:px-4 rounded-[10px] transition-all hover:bg-red-600 text-[12px] sm:text-[16px]">Subscribe</button>
                        </div>
                        <span id="news-email-error" class="text-red-500 text-sm mt-1 hidden">Please enter a valid email
                            address.</span>
                    </div>
                </form>
                <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d224268.83250915512!2d77.13538245032505!3d28.56374117484149!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390cf0718d9f1e49%3A0xb42a93a4c772a5fa!2sAllenhouse%20Public%20School!5e0!3m2!1sen!2sin!4v1734024015249!5m2!1sen!2sin" class="2xl:w-[600px] xl:w-[450px] md:w-[300px] w-[100%] " height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
            </div>
        </div>
    </div>
</footer>
<div class="by-gray-200 p-3 text-center">
    <p class="text-gray-500 sm:text-[14px] text-[11px]"><?= $header_footer_data[1]['meta_data']['copyright_text'] ?? "" ?> |
        Powered by <a href="https://www.fastranking.co.uk/" target="_blank">Fast Ranking</a></p>
</div>

<div>
    <a href="https://api.whatsapp.com/send?phone=<?= $header_footer_data[1]['meta_data']['whatsapp_number'] ?? "" ?>" class="whatsapp-button" target="_blank">
        <img src="https://i.ibb.co/VgSspjY/whatsapp-button.png" alt="botão whatsapp">
    </a>
</div>
<script>
    // Function to toggle the dropdown visibility
    function toggleDropdown() {
        const dropdown = document.getElementById('dropdown');
        dropdown.classList.toggle('hidden');
    }
</script>

<script>
    // Function to toggle the dropdown visibility
    function toggleDropdowni1() {
        const dropdown = document.getElementById('dropdowni1');
        dropdown.classList.toggle('hidden');
    }
</script>

<script>
    // Function to toggle the dropdown visibility
    function toggleDropdown1() {
        const dropdown = document.getElementById('dropdown1');
        dropdown.classList.toggle('hidden');
    }
</script>

<script>
    function toggleDropdown1() {
        const dropdown1 = document.getElementById('dropdown1');
        const dropdown2 = document.getElementById('dropdown');
        const dropdowni1 = document.getElementById('dropdowni1');

        // Toggle the first dropdown
        dropdown1.classList.toggle('hidden');

        // Hide the other dropdown
        dropdown2.classList.add('hidden');

        dropdowni1.classList.add('hidden');
    }

    function toggleDropdown() {
        const dropdown2 = document.getElementById('dropdown');
        const dropdown1 = document.getElementById('dropdown1');
        const dropdowni1 = document.getElementById('dropdowni1');

        // Toggle the second dropdown
        dropdown2.classList.toggle('hidden');

        // Hide the first dropdown
        dropdown1.classList.add('hidden');

        dropdowni1.classList.add('hidden');
    }

    function toggleDropdowni1() {
        const dropdown1 = document.getElementById('dropdown1');
        const dropdown2 = document.getElementById('dropdown');
        const dropdowni1 = document.getElementById('dropdowni1');

        // Toggle the first dropdown
        dropdown1.classList.toggle('hidden');

        // Hide the other dropdown
        dropdown2.classList.add('hidden');

        dropdowni1.classList.add('hidden');
    }
</script>
<script>
    document.getElementById("information").addEventListener("click", function() {
        var indf_uk = document.getElementById("information-ul-view");
        indf_uk.classList.toggle('active-ul');
    });
</script>
  <script>
      const emailRegexxx = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      const emailErrorss = document.getElementById("news-email-error");

      document.getElementById("news-email").addEventListener("input", function() {
          this.value = this.value.toLowerCase();
          emailErrorss.classList.toggle("hidden", !this.value || emailRegexxx.test(this.value));
      });

      document.getElementById("newsForm").addEventListener("submit", function(e) {
          e.preventDefault();

          const submitBtn = document.getElementById("newsSubmit");
          const newsemail = document.getElementById("news-email").value.trim();
          // Reset any previous error
          emailErrorss.textContent = "";
          emailErrorss.classList.add("hidden");

          // Disable button
          submitBtn.disabled = true;
          submitBtn.textContent = "Subscribing...";

          // Validate email
          if (!emailRegexxx.test(newsemail)) {
              emailErrorss.textContent = "Please enter a valid email address.";
              emailErrorss.classList.remove("hidden");
              submitBtn.disabled = false;
              submitBtn.textContent = "Subscribe";
              return;
          }

          const payload = {
              name: "Test Name",
              email: newsemail,
              phone: "",
              branch_id: 9,
              school_id: 1,
              language_id: 1
          };
          fetch(`proxy/newsletter-proxy`, {
                  method: "POST",
                  headers: {
                      "Content-Type": "application/json"
                  },
                  body: JSON.stringify(payload)
              })
              .then(async (response) => {
                  const data = await response.json();

                  // If not successful, handle gracefully
                  if (!response.ok || data.success === false) {
                      if (data.errors && data.errors.email && data.errors.email[0].includes("already been taken")) {
                          emailErrorss.textContent = "This email is already subscribed.";
                          emailErrorss.classList.remove("hidden");
                      } else {
                          alert("There was an error submitting the form. Please try again later.");
                          console.error("Error:", data);
                      }
                      throw new Error("Submission failed");
                  }

                  // Success popup
                  document.getElementById("NewsPopup").classList.remove("hidden");
                  setTimeout(() => {
                      document.getElementById("NewsPopup").classList.add("hidden");
                  }, 20000);

                  document.getElementById("newsForm").reset();
              })
              .catch((error) => {
                  console.error("Error:", error);
              })
              .finally(() => {
                  submitBtn.disabled = false;
                  submitBtn.textContent = "Subscribe";
              });
      });
  </script>
 