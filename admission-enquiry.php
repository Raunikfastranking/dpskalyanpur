<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DPS Kalyanpur| Admission Enquiry</title>
    <?php include "includes/head.php" ?>
</head>

<body>
    <style>
        .job-opening-bg {
            position: relative;
        }

        .job-opening-bg::before {
            content: "";
            height: 100%;
            position: absolute;
            opacity: .6;
            width: 100%;
            background: #112759;
        }

        .job-opening-bg {
            position: relative;
        }

        .job-opening-bg::before {
            content: "";
            height: 100%;
            position: absolute;
            opacity: .6;
            width: 100%;
            background: #112759;
        }

        .bg-gredient-image::before {
            content: '';
            position: absolute;
            height: 100%;
            width: 100%;
            background: linear-gradient(270deg, rgba(217, 217, 217, 0) 0%, #132959 88.65%);
        }

        .dropdown {
            position: relative;
            font-size: 14px;
            color: #333;
            border-radius: 5px;

            .dropdown-list {
                padding: 12px;
                background: #fff;
                position: absolute;
                top: 30px;
                left: 2px;
                right: 2px;
                box-shadow: 0 1px 2px 1px rgba(0, 0, 0, .15);
                transform-origin: 50% 0;
                transform: scale(1, 0);
                transition: transform .15s ease-in-out .15s;
                max-height: 66vh;
                overflow-y: scroll;
            }

            .dropdown-option {
                display: block;
                padding: 8px 12px;
                opacity: 0;
                transition: opacity .15s ease-in-out;
            }

            .dropdown-label {
                display: block;
                height: 30px;
                background: #fff;
                border: 1px solid #e5e7eb;
                border-radius: 5px;
                padding: 6px 12px;
                line-height: 1;
                cursor: pointer;
                color: #9d96a9;

                &:before {
                    content: '▼';
                    float: right;
                }
            }

            &.on {
                .dropdown-list {
                    transform: scale(1, 1);
                    transition-delay: 0s;

                    .dropdown-option {
                        opacity: 1;
                        transition-delay: .2s;
                    }
                }

                .dropdown-label:before {
                    content: '▲';
                }
            }

            [type="checkbox"] {
                position: relative;
                top: -1px;
                margin-right: 4px;
            }
        }
    </style>
    <?php include "includes/header.php" ?>

    <div class="main relative  mb-[40px] sm:mb-[120px] ">
        <div class="bg-center flex items-center text-left h-[300px] "
            style=" background-image: url(https://res.cloudinary.com/dj7wogsju/image/upload/v1747062060/Contact_Us_Banner_APS_Bareilly_knymgn.jpg);background-position: top;">
            <div>
                <h1
                    class="text-[32px] sm:hidden block font-[700] text-blue-main text-left mb-5 sm:mb-8 hr-line relative leading-9 pl-4 ">
                    Admission Enquiry
                </h1>
            </div>

            <div class="md:w-[100%]">
                <h1
                    class="sm:text-[32px] sm:block hidden font-[700] text-blue-main text-left sm:mb-1 hr-line relative leading-9 ml-[7rem]">
                    Admission
                    <span class="sm:hidden"></span> Enquiry
                </h1>
            </div>


        </div>

        <div class="flex m-5" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="index.php" class="inline-flex items-center sm:text-sm text-xs font-medium text-blue-main">
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
                        <a href="admission-enquiry.php" class="ms-1 sm:text-sm text-xs font-medium text-blue-main">Admission
                            Enquiry</a>
                    </div>
                </li>
            </ol>
        </div>

        <div class="mt-10 mx-4 2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 px-4">
            <div class="relative">
                <div>
                    <div>
                        <p class="text-[16px] sm:text-left  text-gray-600 ">DPS Public School, Jankipuram, believes in preparing future-ready global citizens by encouraging Academic Excellence, Creativity, and Holistic Development in a values-driven environment.</p>
                        <h3 class="text-[22px] sm:text-left  text-gray-600 font-[650] mt-4">For Classes I – IX & XI</h3>
                        <ul class="mt-3 sm:ml-8 ml-4" style="list-style: disc;">
                            <li class="text-gray-600 text-[16px] mb-2"> Registration is the first step. The prospectus
                                given during Registration
                                gives complete information about the school system.</li>
                            <li class="text-gray-600 text-[16px] mb-2"> Admission to Classes I & above is given based on
                                the result of an admission test conducted by the school and the interaction of
                                shortlisted students & parents with the Principal.</li>
                            <li class="text-gray-600 text-[16px] mb-2"> The date, Time, & Syllabus for the admission test will be intimated at the time of Registration Itself..</li>
                            <li class="text-gray-600 text-[16px] mb-2"> The Result of the admission test will be
                                informed Telephonically.</li>

                        </ul>
                    </div>
                    <div>
                        <h3 class=" font-[700]  mt-5   sm:text-[16px] text-[16px] text-gray-600 "> Documents Required at
                            The Time of Registration / Admission</h3>
                        <ul class="mt-3 sm:ml-8 ml-4" style="list-style: disc;">
                            <li class="text-gray-600 text-[16px] mb-2">Filled up the form and two passport-size photographs.</li>
                            <li class="text-gray-600 text-[16px] mb-2"> Attested copy of the Birth Certificate of the
                                Child.</li>
                            <li class="text-gray-600 text-[16px] mb-2"> Original birth certificate for verification.
                            </li>
                            <li class="text-gray-600 text-[16px] mb-2"> Report card of previous class (Attested).</li>
                            <li class="text-gray-600 text-[16px] mb-2"> T.C. (original) is to be submitted within one
                                month from the admission date.</li>
                            <li class="text-gray-600 text-[16px] mb-2"> Original Character certificate for (Class VII
                                and above)</li>
                            <li class="text-gray-600 text-[16px] mb-2"> Copy of the Aadhar Card of the Child and the Parents, both.</li>
                            <li class="text-gray-600 text-[16px] mb-2"> Caste certificate for SC / ST / OBC / EWS.</li>
                            <li class="text-gray-600 text-[16px] mb-2"> Certificate for disability, if any.</li>
                            <li class="text-gray-600 text-[16px] mb-2"> PEN (Permanent Education Number)</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="sm:mt-20 mt-10 mx-4 2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 px-4">
            <div class="relative">
                <h2 class="text-center sm:text-[32px] text-[28px] font-[700] text-blue-main leading-9">
                    Enquiry Form | Session 2025–2026
                </h2>
                <div class="mt-10">
                    <form id="enquiryForm" method="post">
                        <!-- Class selection -->
                        <div class="mt-4">
                            <select name="class-selection" id="class-selection" required
                                class="w-full border border-gray-300 p-[11px] rounded-md text-[#808080cc]">
                                <option value="" disabled selected>Select Grade</option>
                                <option value="I">I</option>
                                <option value="II">II</option>
                                <option value="III">III</option>
                                <option value="IV">IV</option>
                                <option value="V">V</option>
                                <option value="VI">VI</option>
                                <option value="VII">VII</option>
                                <option value="VIII">VIII</option>
                                <option value="IX">IX</option>
                                <option value="X">X</option>
                                <option value="XI">XI</option>
                                <option value="XII">XII</option>
                            </select>
                        </div>

                        <!-- Student name -->
                        <div class="mt-4">
                            <input type="text" name="student-name" id="student-validate" placeholder="Student Name"
                                pattern="[A-Za-z\s]+" title="Only letters and spaces are allowed"
                                class="w-full border border-gray-300 p-[11px] rounded-md outline-none" required>
                            <span id="studentError" class="text-red-500 text-sm mt-1 block"></span>
                        </div>

                        <!-- Parent name -->
                        <div class="mt-4">
                            <input type="text" name="parent-name" id="parent_val" placeholder="Parents Name"
                                pattern="[A-Za-z\s]+" title="Only letters and spaces are allowed"
                                class="w-full border border-gray-300 p-[11px] rounded-md outline-none">
                            <span id="parent-error" class="text-red-500 text-sm mt-1 block"></span>
                        </div>

                        <!-- Mobile number -->
                        <div class="mt-4">
                            <input type="tel" name="mobile" id="phone-validate" placeholder="Mobile Number"
                                maxlength="10"
                                class="w-full border border-gray-300 p-[11px] rounded-md outline-none">
                            <div id="mobileErrorss" class="text-red-500 text-sm mt-1 hidden">Please enter valid
                                phone number</div>
                        </div>

                        <!-- Email -->
                        <div class="mt-4">
                            <input type="text" name="email" id="email-validate" placeholder="Email"
                                class="w-full border border-gray-300 p-[11px] rounded-md outline-none">
                            <span id="emailErrorss" class="text-red-500 text-sm mt-1 hidden">Please enter a valid
                                email address.</span>
                        </div>

                        <!-- City -->
                        <div class="mt-4">
                            <input type="text" name="city" id="city" placeholder="City"
                                class="w-full border border-gray-300 p-[11px] rounded-md" required>
                            <span id="cityError" class="text-red-500 text-sm hidden">Please enter City.</span>
                        </div>

                        <!-- Pincode -->
                        <div class="mt-4">
                        <div >
                            <input type="text" name="pincode" id="pincode" placeholder="Pincode"
                                class="w-full border border-gray-300 p-[11px] rounded-md" required>
                            <span id="pincodeError" class="text-red-500 text-sm hidden">Please enter a valid Pincode.</span>
                        </div>
                        <!-- Terms -->
                        <div class="mt-4 flex items-center gap-2">
                            <input type="checkbox" id="terms" required>
                            <label for="terms">I agree to <a href="termsandconditions.php"
                                    class="text-blue-500 underline">Terms and
                                    Conditions</a>.</label>
                        </div>

                        <!-- Submit -->
                        <div class="mt-4">
                            <button type="submit"
                                class="p-4 bg-blue-main w-full text-white font-semibold text-[18px] rounded hover:bg-red-500 transition">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>



    </script>


    <?php include "includes/footer.php" ?>
    <?php include "includes/foot.php" ?>


</body>

</html>