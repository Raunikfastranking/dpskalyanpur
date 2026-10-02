<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DPS Kalyanpur | Contact Us</title>
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
    "name": "Contact Us",
    "item": "https://dpskalyanpur.com/contact-us"
  }]
}
</script>

</head>

<body>

    <?php include "includes/header.php" ?>

    <div class="main relative">
        <style>
            .bg-gredient-image::before {
                content: '';
                position: absolute;
                height: 100%;
                width: 100%;
                background: linear-gradient(270deg, rgba(217, 217, 217, 0) 0%, #132959 88.65%);
            }
        </style>
        <div class="main relative ">

            <div class="bg-[url('assets/images/building.webp')] bg-top flex items-center text-center h-[300px]">
                <div>
                    <h1
                        class="text-[32px] sm:hidden block font-[700] text-white text-left pl-4 mb-5 sm:mb-8 hr-line relative leading-9">
                        Contact Us
                    </h1>
                </div>

                <div class="md:w-[100%]">
                    <h1
                        class="sm:text-[32px] sm:block hidden font-[700] text-white text-left sm:mb-1 hr-line relative leading-9 ml-[7rem]">
                        Contact Us
                    </h1>
                </div>
            </div>

        </div>
        <div class="flex m-5" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="/" class="inline-flex items-center text-xs sm:text-sm font-medium text-blue-main">
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
                        <a href="contact-us" class="ms-1 text-xs sm:text-sm font-medium text-blue-main"> Contact
                            Us</a>
                    </div>
                </li>
            </ol>
        </div>

        <div class="lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto  sm:px-5 px-5 mb-10 relative mt-10">
            <!-- <div class="absolute top-[50px] sm:left-[50%] -z-50 text-center media-sc hidden">
                <img src="https://res.cloudinary.com/dvzfuapyy/image/upload/v1730307222/Group_53_s3txur.png"
                    class="w-[100%] object-top" alt="">
            </div> -->
            <div class="sm:flex  sm:mx-2 bg-images">
                <div class="sm:w-[50%] sm:mt-4 mt-10">
                    <div class="sm:text-left">
                        <h2 class="sm:text-[32px] text-[28px] font-[700] text-blue-main uppercase leading-9">Connect
                            with us</h2>
                        <p class="sm:text-[20px] text-[18px] text-gray-500 font-[400] sm:mt-3 mt-2">Fill out the form &
                            we'll be in <br> touch soon!</p>
                    </div>
                    <div class=" mt-4 sm:mt-6">
                        <div class="flex gap-2 mb-3">
                            <img src="https://res.cloudinary.com/dk5c1wlzk/image/upload/v1750265813/3_3_hz9m0l.png"
                                alt="" class="w-[28px] block h-[30px] mt-[3px]">
                            <p class="text-gray-700 font-[400] sm:text-[18px] text-[16px]">287-295, Bithoor Rd,
                                Singhpur, Kalyanpur,<br>
                                Kanpur, Gangpur Kachhar, Uttar Pradesh 208017</p>
                        </div>
                        <div class="flex gap-2 mb-3">
                            <img src="https://res.cloudinary.com/dk5c1wlzk/image/upload/v1750265813/2_3_wwdrxy.png"
                                alt="" class="w-[23px] block h-[23px]">
                            <p class="text-gray-700 font-[400] sm:text-[18px] text-[16px]"><a
                                    href="tel:919580362555">+91 9044055605 ,
                                    +91 9580362555</a> </p>
                        </div>

                        <div class="flex gap-2">
                            <img src="https://res.cloudinary.com/dk5c1wlzk/image/upload/v1750265813/1_2_sljgbs.png"
                                alt="" class="w-[23px] block h-[23px]">
                            <p class="text-gray-700 font-[400] sm:text-[18px] text-[16px]"><a
                                    href="mailto:contact@dpskalyanpur.com">contact@dpskalyanpur.com</a></p>
                        </div>

                    </div>
                </div>
                <div class="sm:w-[50%]">
                    <div class="mt-5">
                        
                        <form id="contactForm">
                            <div>
                                <div>
                                    <input type="text" id="cname" placeholder="Name" class="w-full border-[1px] p-[11px] rounded-[5px] outline-none" required>
                                    <span id="cname-error" class="hidden mt-1 text-sm text-red-500">Only letters and spaces allowed.</span>
                                </div>

                                <div class="mt-4">
                                    <input type="text" placeholder="Mobile" id="cmobile"
                                        class="w-full border-[1px] p-[11px] rounded-[5px] outline-none" required>
                                    <div id="mobileErrorss" class="hidden mt-1 text-sm text-red-500">Please enter valid phone number</div>
                                </div>

                                <div class="mt-4">
                                    <input type="text" placeholder="E-mail" id="cemail" class="w-full border-[1px] p-[11px] rounded-[5px] outline-none" required>
                                    <span id="emailErrorss" class="hidden mt-1 text-sm text-red-500">Please enter a valid email address.</span>
                                </div>

                                <div class="mt-4">
                                    <select name="class-selection" id="cquery" required
                                        class="w-full border border-gray-300 p-2 rounded-md text-gray-500 text-[#808080d4]">
                                        <option value="" disabled selected>Select Query</option>
                                        <option value="General">General</option>
                                        <option value="Admission Related">Admission Related</option>
                                        <option value="Job Related">Job Related</option>
                                        <option value="Suggestion/Feedback">Suggestion/Feedback</option>
                                    </select>
                                </div>

                                <div class="mt-4">
                                    <textarea id="cmessage" class="w-full border-[1px] p-[11px] rounded-[5px]"
                                        placeholder="Message" required></textarea>
                                </div>

<div id="successPopup" class="relative hidden px-4 py-2 mb-5 text-white bg-green-500 rounded"
                            style="z-index:999">
                            Form submitted successfully!
                        </div>
                                <div class="mt-4">
                                    <button type="submit" id="contactSubmitBtn"
                                        class="uppercase p-3 bg-[FED72B] w-[100%] text-blue-main  font-[600] text-[18px] transition hover:bg-red-500 hover:text-white">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-10">
            <iframe class="w-full"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3569.841261570951!2d80.25652787599164!3d26.525229276634203!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399c376c42ffffff%3A0xe84f82173790cc3c!2sDelhi%20Public%20School%20Kalyanpur%2CKanpur!5e0!3m2!1sen!2sin!4v1750956536191!5m2!1sen!2sin"
                height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <script>
            // Regex patterns
            const nameRegexs = /^[A-Za-z\s]+$/;
            const mobileRegexs = /^[6-9]\d{9}$/;
            const emailRegexs = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            // DOM elements
            const cnameInput = document.getElementById("cname");
            const cmobileInput = document.getElementById("cmobile");
            const cemailInput = document.getElementById("cemail");

            const cnameError = document.getElementById("cname-error");
            const mobileErrorss = document.getElementById("mobileErrorss");
            const emailErrorss = document.getElementById("emailErrorss");

            // Name validation
            cnameInput.addEventListener("input", function() {
                cnameError.classList.toggle("hidden", !this.value || nameRegexs.test(this.value));
            });

            // Mobile validation
            cmobileInput.addEventListener("input", function() {
                this.value = this.value.replace(/\D/g, '').slice(0, 10); // Digits only, max 10
                mobileErrorss.classList.toggle("hidden", !this.value || mobileRegexs.test(this.value));
            });

            // Email validation
            cemailInput.addEventListener("input", function() {
                this.value = this.value.toLowerCase();
                emailErrorss.classList.toggle("hidden", !this.value || emailRegexs.test(this.value));
            });

            // Form submission
            document.getElementById("contactForm").addEventListener("submit", function(e) {
                e.preventDefault();

                const submitBtns = document.getElementById("contactSubmitBtn");
                submitBtns.disabled = true;
                submitBtns.textContent = "Submitting...";

                // Inputs
                const cname = document.getElementById("cname").value.trim();
                const cmobile = document.getElementById("cmobile").value.trim();
                const cemail = document.getElementById("cemail").value.trim();
                const cquery = document.getElementById("cquery").value;
                const cmessage = document.getElementById("cmessage").value.trim();

                // Error Elements
                const mobileError = document.getElementById("mobileErrorss");
                const emailError = document.getElementById("emailErrorss");
                let isValid = true;
                if (!nameRegexs.test(cname)) {
                    cnameError.textContent = "Only letters and spaces allowed.";
                    isValid = false;
                }
                // Mobile Validation
                const mobileRegex = /^[6-9]\d{9}$/;
                if (!mobileRegex.test(cmobile)) {
                    mobileError.classList.remove("hidden");
                    isValid = false;
                } else {
                    mobileError.classList.add("hidden");
                }
                // Email Validation
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(cemail)) {
                    emailError.classList.remove("hidden");
                    isValid = false;
                } else {
                    emailError.classList.add("hidden");
                }
                if (!isValid) {
                    submitBtns.disabled = false;
                    submitBtns.textContent = "Submit";
                    return;
                }
                // API Payload
                const payload = {
                    name: cname,
                    phone: cmobile,
                    email: cemail,
                    query_type: cquery,
                    message: cmessage,
                    subject: "Contact Us Form Submission",
                    branch_id: 9,
                    school_id: 1,
                    language_id: 1
                };

                fetch(`proxy/contact-proxy`, {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify(payload)
                    })
                    .then(response => {
                        if (!response.ok) throw new Error("Network error or invalid response");
                        return response.json();
                    })
                    .then(data => {
                        // Show success popup
                        const popup = document.getElementById("successPopup");
                        if (popup) {
                            popup.classList.remove("hidden");
                            setTimeout(() => popup.classList.add("hidden"), 20000);
                        }

                        // Reset form
                        document.getElementById("contactForm").reset();
                    })
                    .catch(error => {
                        alert("There was an error submitting the form. Please try again.");
                        console.error("Error:", error);
                    })
                    .finally(() => {
                        // Re-enable button
                        submitBtns.disabled = false;
                        submitBtns.textContent = "Submit";
                    });
            });
        </script>
        <?php include "includes/footer.php" ?>
        <?php include "includes/foot.php" ?>
    </div>
</body>

</html>