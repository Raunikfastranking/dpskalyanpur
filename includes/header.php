<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PGPM9GFR"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<?php
include_once "includes/apis.php";
require_once "layouts/layout-function.php";
$currentPage = basename($_SERVER['PHP_SELF'], '.php');
// echo $currentPage;
// print_r($header_footer_data[1]['meta_data']['android_badge_url']);
$pageDataMap = [
    "mission" => $mv_data,
    "index" => $home_data,
    "excellence-in-action" => $excellence_data,
    "celebrating-excellence" => $celebrating_data,
    "excellence-in-spotlight" => $spotlight_data,
    "embark-on-journey" => $embark_data,
    "principal-message" => $principal_data,
    "chairman-message" => $chairman_data,
    // "dps-history" => $h_data,
    "dps-society" => $society_data,
    "our-motto" => $our_moto_data,
    "management-committee" => $management_data,
    "school-faculty" => $staff_data,
    "national-cadet-corps" => $national_cadet_data,
    "senior-wing-faculty" => $senior_data,
    "primary-wing-faculty" => $preparatory_data,
    "middle-wing-faculty" => $middle_data,
    "preparatory-wing-faculty" => $preparatory_data,
    "physical-health-fitness-development" => $phfd_data,
    "art-department-faculty" => $art_department_data,
    "foundational-wing-faculty" =>  $foundational_data,
    "music-dance-department" => $music_data,
    "preparatory-stage" => $preparatory_data,
    "middle-stage" => $middle_stage_data,
    "secondary-stage" => $secondary_stage_data,
    "senior-secondary-stage" => $sr_secondary_stage_data,
    "activity-faculty" => $phfd_data,
    "pedagogy" => null,
    "facilities" => $infrastructure_data,
    "smart-classrooms" => $smart_class_data,
    "classrooms" => null,
    "junior-lab" => $junior_lab_data,
    "senior-lab" => $senior_labs_data,
    "our-curriculum" => $ourcurriculum_data,
    "animation" => $animation_data,
    "coding" => $coding_data,
    "robotics" => $robotics_data,
    "financial-literacy" => $financial_literacy_data,
    "oluxi-smart-skill" => $oluxi_smart_data,
    "north-west-sports-academy" => $north_west_sports_data,
    "career-counselling-cell" => $career_guidance_data,
    "reading-programme" => $reading_programme_data,
    "house-system" => $house_system_data,
    "leadership-programme" => $leadership_data,
    "school-clubs" => $club_activities_data,
    "health-and-wellbeing" => $health_and_well_data,
    "mental-health-wellness" => $mental_health_data,
    "panorama" => $panorama_data,
    "peer-educator-program" => $peer_educato_data,
    "shiksha-kendra" => $shiksha_kendr_data,
    "sewa" => $sewa_data,
    "career-guidence-program" => $career_guidance_data,

    "admission-overview" => $admission_overview_data,
    "admission-criteria" => $admission_criteria_data,
    "fee-structure" => $feestructure_data,
    "online-enquiry-form" => $online_enquiry_data,
    "withdrawal-policy" => $withdrawal_policy_data,
    "transfer-certificate-guidelines" => $transfer_certificate_data,
    "group-transfer-policy" => $group_transfer_data,
    "bus-routes" => $bus_routes_data,
    "school-rules" => $school_guidelines_data,
    "view-tc" => $view_tc_data,
    "school-awards" => $school_awards_data,
    "principal-awards" => $principal_awards_data,
    "dance-music" => $music_data,
    "academic-achievement" => $academic_achievements_data,
    "extra-curricular" => $extra_currucular_data,
    "sports-academy-achievement" => $sport_academy_data,
    "allumni-placement" => $alumni_placements_data,
    "school-faculty-awards" => $school_faculty_data,

    "contact-us" => $contact_data,
    "our_story_data" => $our_story_data,
    "other-information" => $other_information_data,
    "parent-teacher-association" => $parent_teacher_data,
    "teachers-details" => $teacher_details_data,
    "leadership-team" => $leadership_team_data,
    "school-guidelines" => $school_guidelines_data,
    "general-information" => $general_information_data,
    "documents-and-information" => $documents_information_data,
    "results-and-academics" => $results_academic_data,
    "staff-teaching" => $staff_data,
    "school-infrastructure" => $infrastructure_data,
    "dpss-human-resource-department-mpd" => $dpss_human_data,
    "cbse-mpd" => $cbse_data,
    "superhouse-education-mpd" => $superhouse_education_data,
    "debriefing-sessions-mpd" => $debriefing_data,
    "safe-and-healthy-food-committee" => $safety_and_security,
    "pocso_data" => $pocso_data,
    "posh" => $sexual_harassment_data,
    "sexual-harassment-committee" => $sexual_harassment_data,
    "anti-bullying-committee" => $anti_bullying,
    "discipline_committee" => $discipline_committee,
    "safety_and_security" => $safety_and_security,
    'terms_and_conditions' => $terms_and_conditions,
    "campus-tour" => $campus_tour,
    

];
$pageData = $pageDataMap[$currentPage] ?? null; // null if page not found
?>


<style>
    @keyframes slideInfinite {
        0% {
            transform: translateX(100%);
        }

        100% {
            transform: translateX(-100%);
        }
    }

    .animate-slide {
        animation: slideInfinite 20s linear infinite;
    }

    .animate-slide:hover {
        animation-play-state: paused;
    }
    #popupForm.hidden {
        display: none !important;
    }
    #popupForm {
    /* already has: */
    /* position: fixed; inset-0; ... */

    overflow-y: auto;
    -webkit-overflow-scrolling: touch;
    padding: 1rem;
}

/* Better: let the inner white box scroll instead of the overlay */
#popupForm > div {   /* the bg-white one */
    max-height: 90vh;           /* ← very important */
    overflow-y: auto;
    -webkit-overflow-scrolling: touch;
}
</style>

<div
    class="fixed right-0 top-1/2 -translate-y-1/2 pointer-events-none z-[9999] transform rotate-90 right-[-50px] sm:hidden">
    <a href="#" id="openPopupMobile"
        class="text-gray-500 border-[1px] border-white bg-blue-main px-5 py-2 text-lg origin-right pointer-events-auto no-underline text-white transition">
        Enquire Now
    </a>
</div>
<div id="esuccessPopup" class="relative fixed  bg-green-500 text-white px-4 py-2 rounded mb-5 hidden" style="z-index:9999;
    position: fixed;
    right: 0;
    top: 20%;">
    Form submitted successfully!
</div>
<div id="popupForm" class="fixed inset-0 bg-black/60 flex items-start md:items-center justify-center z-[9998] overflow-y-auto hidden">
    <div class="bg-white p-5 sm:p-6 rounded-2xl shadow-2xl w-full max-w-md mx-4 my-8 md:my-0 relative">

        <!-- Close Button – bigger hit area, better contrast -->
        <button id="closePopup" class="absolute top-3 right-3 md:top-4 md:right-4 text-gray-600 hover:text-red-600 text-3xl font-bold leading-none z-10 w-10 h-10 flex items-center justify-center">
            ×
        </button>

        <h2 class="text-xl sm:text-2xl font-semibold mb-5">Enquiry Form</h2>
     <form id="enquiryForm" class="space-y-4 sm:space-y-5">
            <div>
                 <select name="session" required id="esession"
        class="w-full border border-gray-300 p-2 rounded-md text-gray-500">
        <option value="" disabled selected>Enquiry For Session</option>
        <?php
        $sessions = include "session-api.php";
        foreach ($sessions as $item): 
        ?>
            <option value="<?= htmlspecialchars($item['session'] ?? '') ?>">
                <?= htmlspecialchars($item['session'] ?? 'Unknown Session') ?>
            </option>
        <?php endforeach; ?>
    </select>
             </div>
            <div>
                <p class="text-gray-700 mb-2">Are you looking for Hostel Facility?
                    <br>
                    (Available for Boys only)</p>
                <select id="ehostel_facility" name="hostel_facility" required class="w-full border border-gray-300 p-2 rounded-md text-gray-500">
                    <option value="" disabled selected>Select Hostel Facility</option>
                    <option value="YES">Yes</option>
                    <option value="NO">No</option>
                </select>
                <div id="ehostel-error" class="text-red-500 text-sm mt-1 hidden">Please select hostel facility option.</div>
            </div>
           <div>
        <select name="class-selection" required disabled id="egrade" class="w-full border border-gray-300 p-2 rounded-md text-gray-500 disabled:bg-gray-100 disabled:text-gray-400">
            <option value="" disabled selected>Select Hostel Facility first</option>

            <?php
            $grades = include 'grade-api.php';

            if (!empty($grades)) {

                $gradeOrder = [
                    'P.G','Nursery', 'Prep',
                    'I','II','III','IV','V',
                    'VI','VII','VIII','IX',
                    'X','XI','XII'
                ];

                // remove duplicates
                $uniqueGrades = [];
                foreach ($grades as $g) {
                    $grade = trim($g['grades']);
                    if ($grade && !in_array($grade, $uniqueGrades)) {
                        $uniqueGrades[] = $grade;
                    }
                }

                // safe sorting
                usort($uniqueGrades, function ($a, $b) use ($gradeOrder) {

                    $posA = array_search($a, $gradeOrder);
                    $posB = array_search($b, $gradeOrder);

                    $posA = ($posA === false) ? 999 : $posA;
                    $posB = ($posB === false) ? 999 : $posB;

                    return $posA - $posB;
                });

                foreach ($uniqueGrades as $gr):
            ?>
            <option value="<?= htmlspecialchars($gr, ENT_QUOTES, 'UTF-8') ?>">
            <?= htmlspecialchars($gr, ENT_QUOTES, 'UTF-8') ?>
            </option>
            <?php endforeach; } else { ?>
            <option value="">No grades available</option>
            <?php } ?>

        </select>
        <span id="classError" class="text-red-500 text-sm hidden">Please select a class.</span>
    </div>

            <div>
                <input type="text" name="student-name" id="estudent_name" placeholder="Student Name"
                    class="w-full border border-gray-300 p-2 rounded-md" required maxlength="50">
                <span id="student-error" class="text-red-500 text-sm mt-1 hidden">Only letters and spaces
                    allowed.</span>
            </div>

            <div>
                <input type="text" name="parent-name" id="eparent_name" placeholder="Parents Name"
                    class="w-full border border-gray-300 p-2 rounded-md" required maxlength="50">
                <span id="parent-error" class="text-red-500 text-sm mt-1 hidden">Only letters and spaces allowed.</span>
            </div>

            <div>
                <input type="text" name="mobile" id="emobile" placeholder="Mobile No."
                    class="w-full border border-gray-300 p-2 rounded-md" required maxlength="10">
                <span id="mobile-error" class="text-red-500 text-sm mt-1 hidden">Please enter valid phone number</span>
            </div>

            <div>
                <input type="text" name="email" id="eemail" placeholder="E-mail"
                    class="w-full border border-gray-300 p-2 rounded-md" required>
                <span id="email-error" class="text-red-500 text-sm mt-1 hidden">Please enter a valid email
                    address.</span>
            </div>

         <div class="mt-4 relative customSelect">
               <select id="ecity" name="ecity" class="hidden">
    <option value="">Select City</option>
    <?php
    $cities = include 'get-city.php';
    ?>
    <?php if (!empty($cities)): ?>
        <?php foreach ($cities as $city): ?>
            <?php if (empty($city['name'])) continue; ?>
            <option value="<?= htmlspecialchars($city['name'], ENT_QUOTES, 'UTF-8') ?>">
                <?= htmlspecialchars($city['name'], ENT_QUOTES, 'UTF-8') ?>
            </option>
        <?php endforeach; ?>
    <?php else: ?>
        <option value="">No cities available</option>
    <?php endif; ?>
</select>


                <!-- Fake dropdown display -->
                <div class="border border-gray-300 p-[11px] rounded-md bg-white cursor-pointer flex justify-between items-center">
                    <span class="selected-text text-[#808080cc]">Select City</span>
                    <span>▼</span>
                </div>

                <!-- Dropdown options -->
                <div class="absolute mt-1 border border-gray-300 rounded-md bg-white shadow-md hidden z-50 w-full">
                    <input type="text" placeholder="Search..."
                        class="w-full p-2 border-b border-gray-300 outline-none">
                    <ul class="max-h-48 overflow-y-auto"></ul>
                </div>

            </div>
            <span id="city-error" class="text-red-500 text-sm mt-1 hidden">
                Please select a city.
            </span>
            <!-- Pincode -->
            <div>
                <input type="text" name="pincode" id="epincode" placeholder="Enter your Pincode"
                    class="w-full border border-gray-300 p-2 rounded-md" maxlength="6"
                    oninput="this.value=this.value.replace(/\D/g,'')" required>
                <span id="pincode-error" class="text-red-500 text-sm hidden">Please enter a valid Pincode.</span>
            </div>


            <div class="flex items-start gap-2">
                <input type="checkbox" id="popupCheckbox" required />
                <label for="popupCheckbox" class="text-sm">I agree to <a href="termsandconditions"
                        class="text-blue-600 underline">Terms
                        and Conditions</a>.</label>
                <span id="checkboxError" class="text-red-500 text-sm hidden">You must agree to the terms and
                    conditions.</span>
            </div>
            <input type="hidden" id="source" value="">
            <button type="submit" id="submitBtn"
                class="w-full py-2 bg-blue-main text-white rounded-md hover:[#FED72B] transition">Submit</button>
        </form>
        
    </div>
</div>

<div class="bg-blue-main p-2 px-10 lg:flex hidden justify-between items-center text-[12px]">


    <div class="sm:w-[10%]">
        <a href="tel:<?= $header_footer_data[0]['meta_data']['phones'] ?? "" ?>" class="gap-1 flex items-center text-white transition-all  whitespace-nowrap">
            <svg width="22" height="23" viewBox="0 0 22 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M17.7875 19.5793C15.8778 19.5793 13.991 19.1631 12.1271 18.3308C10.2632 17.4985 8.56736 16.3181 7.03958 14.7897C5.51181 13.2613 4.33175 11.5655 3.49942 9.7022C2.66708 7.83892 2.25061 5.95212 2.25 4.04178C2.25 3.76678 2.34167 3.53762 2.525 3.35428C2.70833 3.17095 2.9375 3.07928 3.2125 3.07928H6.925C7.13889 3.07928 7.32986 3.15201 7.49792 3.29745C7.66597 3.4429 7.76528 3.61462 7.79583 3.81262L8.39167 7.02095C8.42222 7.2654 8.41458 7.47165 8.36875 7.6397C8.32292 7.80776 8.23889 7.9529 8.11667 8.07512L5.89375 10.321C6.19931 10.8862 6.562 11.4323 6.98183 11.959C7.40167 12.4858 7.86397 12.994 8.36875 13.4835C8.84236 13.9571 9.33889 14.3965 9.85833 14.8016C10.3778 15.2068 10.9278 15.5771 11.5083 15.9126L13.6625 13.7585C13.8 13.621 13.9797 13.518 14.2015 13.4495C14.4233 13.3811 14.6409 13.3618 14.8542 13.3918L18.0167 14.0335C18.2306 14.0946 18.4062 14.2055 18.5438 14.3662C18.6812 14.5269 18.75 14.7063 18.75 14.9043V18.6168C18.75 18.8918 18.6583 19.121 18.475 19.3043C18.2917 19.4876 18.0625 19.5793 17.7875 19.5793Z"
                    class="fill-white transition-all group-hover:fill-red-500" fill="white" />
            </svg>
            <?= $header_footer_data[0]['meta_data']['phones'] ?? "" ?>
        </a>
    </div>

    <div class=" overflow-hidden sm:w-[60%] ">
        <div>
            <p class="flex  items-center justify-between animate-slide sm:gap-0 gap-10 text-white">
                <?= $scroll_text_data['data'][0]['content'] ?? "" ?>
            </p>
        </div>
    </div>

    <div class="hidden sm:block">
        <ul class="flex  items-center gap-4 sm:w-[30%]">
            <li>
                <a href="<?= $header_footer_data[0]['meta_data']['primary_cta_url'] ?? "" ?>"
                    class="gap-1 flex items-center text-white transition-all  whitespace-nowrap">

                    <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M15.5 12.3293L11.5 8.32928M15.5 12.3293L11.5 16.3293M15.5 12.3293H5.5M10.5 21.3293C11.6819 21.3293 12.8522 21.0965 13.9442 20.6442C15.0361 20.1919 16.0282 19.529 16.864 18.6932C17.6997 17.8575 18.3626 16.8654 18.8149 15.7734C19.2672 14.6815 19.5 13.5112 19.5 12.3293C19.5 11.1474 19.2672 9.97706 18.8149 8.88513C18.3626 7.7932 17.6997 6.80105 16.864 5.96532C16.0282 5.1296 15.0361 4.46666 13.9442 4.01437C12.8522 3.56208 11.6819 3.32928 10.5 3.32928"
                            class=" transition-all group-hover:stroke-red-500" stroke="white" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>

                    <?= $header_footer_data[0]['meta_data']['primary_cta_text'] ?? "" ?>
                </a>
            </li>
            <li>
                <a href="<?= $header_footer_data[0]['meta_data']['secondary_cta_url'] ?? "" ?>"
                    class="gap-1 flex items-center text-white transition-all  whitespace-nowrap">

                    <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M18.5 19.7543V20.9793C18.5 21.2626 18.404 21.5003 18.212 21.6923C18.02 21.8843 17.7827 21.98 17.5 21.9793C17.2173 21.9786 16.98 21.883 16.788 21.6923C16.596 21.5016 16.5 21.264 16.5 20.9793V17.8293C16.5 17.4126 16.646 17.0586 16.938 16.7673C17.23 16.476 17.584 16.33 18 16.3293H21.15C21.4333 16.3293 21.671 16.4253 21.863 16.6173C22.055 16.8093 22.1507 17.0466 22.15 17.3293C22.1493 17.612 22.0537 17.8496 21.863 18.0423C21.6723 18.235 21.4347 18.3306 21.15 18.3293H19.9L22.15 20.5793C22.3333 20.7626 22.425 20.992 22.425 21.2673C22.425 21.5426 22.3333 21.78 22.15 21.9793C21.95 22.1793 21.7127 22.2793 21.438 22.2793C21.1633 22.2793 20.9257 22.1793 20.725 21.9793L18.5 19.7543ZM12.5 22.3293C11.1167 22.3293 9.81667 22.0666 8.6 21.5413C7.38334 21.016 6.325 20.3036 5.425 19.4043C4.525 18.505 3.81267 17.4466 3.288 16.2293C2.76333 15.012 2.50067 13.712 2.5 12.3293C2.49933 10.9466 2.762 9.64662 3.288 8.42929C3.814 7.21195 4.52633 6.15362 5.425 5.25428C6.32367 4.35495 7.382 3.64262 8.6 3.11728C9.818 2.59195 11.118 2.32928 12.5 2.32928C13.882 2.32928 15.182 2.59195 16.4 3.11728C17.618 3.64262 18.6763 4.35495 19.575 5.25428C20.4737 6.15362 21.1863 7.21195 21.713 8.42929C22.2397 9.64662 22.502 10.9466 22.5 12.3293C22.5 12.496 22.496 12.6793 22.488 12.8793C22.48 13.0793 22.4673 13.2626 22.45 13.4293C22.4167 13.7126 22.3 13.9336 22.1 14.0923C21.9 14.251 21.65 14.33 21.35 14.3293C21.0833 14.3293 20.8583 14.2126 20.675 13.9793C20.4917 13.746 20.4167 13.496 20.45 13.2293C20.4833 13.0626 20.5 12.9126 20.5 12.7793V12.3293C20.5 11.996 20.479 11.6626 20.437 11.3293C20.395 10.996 20.3327 10.6626 20.25 10.3293H16.85C16.9 10.6626 16.9377 10.996 16.963 11.3293C16.9883 11.6626 17.0007 11.996 17 12.3293V12.8673C17 13.0586 16.9917 13.2376 16.975 13.4043C16.9417 13.6876 16.825 13.9126 16.625 14.0793C16.425 14.246 16.1833 14.3293 15.9 14.3293C15.6333 14.3293 15.4043 14.221 15.213 14.0043C15.0217 13.7876 14.9423 13.546 14.975 13.2793C14.9917 13.1126 15 12.9543 15 12.8043V12.3293C15 11.996 14.9877 11.6626 14.963 11.3293C14.9383 10.996 14.9007 10.6626 14.85 10.3293H10.15C10.1 10.6626 10.0627 10.996 10.038 11.3293C10.0133 11.6626 10.0007 11.996 10 12.3293C9.99933 12.6626 10.012 12.996 10.038 13.3293C10.064 13.6626 10.1013 13.996 10.15 14.3293H12.5C12.7833 14.3293 13.021 14.4253 13.213 14.6173C13.405 14.8093 13.5007 15.0466 13.5 15.3293C13.4993 15.612 13.4033 15.8496 13.212 16.0423C13.0207 16.235 12.7833 16.3306 12.5 16.3293H10.6C10.8 17.046 11.0583 17.7336 11.375 18.3923C11.6917 19.051 12.0667 19.68 12.5 20.2793C12.6667 20.2793 12.8333 20.2836 13 20.2923C13.1667 20.301 13.3333 20.2966 13.5 20.2793C13.7833 20.246 14.0167 20.317 14.2 20.4923C14.3833 20.6676 14.475 20.8966 14.475 21.1793C14.475 21.4793 14.4 21.7293 14.25 21.9293C14.1 22.1293 13.8833 22.246 13.6 22.2793C13.4333 22.296 13.25 22.3086 13.05 22.3173C12.85 22.326 12.6667 22.33 12.5 22.3293ZM4.75 14.3293H8.15C8.1 13.996 8.06267 13.6626 8.038 13.3293C8.01333 12.996 8.00067 12.6626 8 12.3293C7.99933 11.996 8.012 11.6626 8.038 11.3293C8.064 10.996 8.10134 10.6626 8.15 10.3293H4.75C4.66667 10.6626 4.60433 10.996 4.563 11.3293C4.52167 11.6626 4.50067 11.996 4.5 12.3293C4.49933 12.6626 4.52033 12.996 4.563 13.3293C4.60567 13.6626 4.668 13.996 4.75 14.3293ZM9.9 19.8793C9.6 19.3126 9.33734 18.7336 9.112 18.1423C8.88667 17.551 8.69934 16.9466 8.55 16.3293H5.6C6.08333 17.1793 6.69167 17.9086 7.425 18.5173C8.15833 19.126 8.98333 19.58 9.9 19.8793ZM5.6 8.32928H8.55C8.7 7.71262 8.88767 7.10862 9.113 6.51728C9.33833 5.92595 9.60067 5.34662 9.9 4.77928C8.98333 5.07928 8.15833 5.53362 7.425 6.14228C6.69167 6.75095 6.08333 7.47995 5.6 8.32928ZM10.6 8.32928H14.4C14.2 7.61262 13.9417 6.92528 13.625 6.26728C13.3083 5.60928 12.9333 4.97995 12.5 4.37928C12.0667 4.97928 11.6917 5.60862 11.375 6.26728C11.0583 6.92595 10.8 7.61328 10.6 8.32928ZM16.45 8.32928H19.4C18.9167 7.47928 18.3083 6.75028 17.575 6.14228C16.8417 5.53428 16.0167 5.07995 15.1 4.77928C15.4 5.34595 15.6627 5.92528 15.888 6.51728C16.1133 7.10928 16.3007 7.71328 16.45 8.32928Z"
                            class="fill-white transition-all group-hover:fill-red-500" fill="white" stroke="#053B7A"
                            stroke-width="0.5" />
                    </svg>
                    <?= $header_footer_data[0]['meta_data']['secondary_cta_text'] ?? "" ?>
                </a>
            </li>
            <li>
                <a href="contact-us" class="gap-1 flex items-center text-white transition-all  whitespace-nowrap">
                    <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M16.5 2.32928V4.32928M7.5 22.3293V20.3293C7.5 19.7989 7.71071 19.2901 8.08579 18.9151C8.46086 18.54 8.96957 18.3293 9.5 18.3293H15.5C16.0304 18.3293 16.5391 18.54 16.9142 18.9151C17.2893 19.2901 17.5 19.7989 17.5 20.3293V22.3293M8.5 2.32928V4.32928"
                            class="stroke-white transition-all group-hover:stroke-red-500" stroke="white"
                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path
                            d="M12.5 14.3293C14.1569 14.3293 15.5 12.9861 15.5 11.3293C15.5 9.67243 14.1569 8.32928 12.5 8.32928C10.8431 8.32928 9.5 9.67243 9.5 11.3293C9.5 12.9861 10.8431 14.3293 12.5 14.3293Z"
                            class="stroke-white transition-all group-hover:stroke-red-500" stroke="white"
                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path
                            d="M19.5 4.32928H5.5C4.39543 4.32928 3.5 5.22472 3.5 6.32928V20.3293C3.5 21.4339 4.39543 22.3293 5.5 22.3293H19.5C20.6046 22.3293 21.5 21.4339 21.5 20.3293V6.32928C21.5 5.22472 20.6046 4.32928 19.5 4.32928Z"
                            class="stroke-white transition-all group-hover:stroke-red-500" stroke="white"
                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Contact Us
                </a>
            </li>

            <li>
                <a href="job-openings" class="gap-1 flex items-center text-white transition-all  whitespace-nowrap">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <g fill="none" stroke="#fff" stroke-width="1.5">
                            <path stroke-linecap="round" d="M11.007 21H9.605c-3.585 0-5.377 0-6.491-1.135S2 16.904 2 13.25c0-3.653 0-5.48 1.114-6.615S6.02 5.5 9.605 5.5h3.803c3.585 0 5.378 0 6.492 1.135c.857.873 1.054 2.156 1.1 4.365" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20.017 20.023L22 22m-.947-4.474a3.527 3.527 0 1 0-7.053 0a3.527 3.527 0 0 0 7.053 0" />
                            <path d="m16 5.5l-.1-.31c-.495-1.54-.742-2.31-1.331-2.75C13.979 2 13.197 2 11.63 2h-.263c-1.565 0-2.348 0-2.937.44c-.59.44-.837 1.21-1.332 2.75L7 5.5" />
                        </g>
                    </svg>
                    Career
                </a>
            </li>

        </ul>
    </div>


</div>

<div class="bg-blue-main lg:hidden text-[10px] p-2 ">

    <div class="flex justify-between items-center overflow-x-auto">
        <div>
            <a href="tel:<?= $header_footer_data[0]['meta_data']['phones'] ?? "" ?>" class="gap-1 flex items-center text-white transition-all  whitespace-nowrap">
                <svg width="12" height="12" viewBox="0 0 22 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M17.7875 19.5793C15.8778 19.5793 13.991 19.1631 12.1271 18.3308C10.2632 17.4985 8.56736 16.3181 7.03958 14.7897C5.51181 13.2613 4.33175 11.5655 3.49942 9.7022C2.66708 7.83892 2.25061 5.95212 2.25 4.04178C2.25 3.76678 2.34167 3.53762 2.525 3.35428C2.70833 3.17095 2.9375 3.07928 3.2125 3.07928H6.925C7.13889 3.07928 7.32986 3.15201 7.49792 3.29745C7.66597 3.4429 7.76528 3.61462 7.79583 3.81262L8.39167 7.02095C8.42222 7.2654 8.41458 7.47165 8.36875 7.6397C8.32292 7.80776 8.23889 7.9529 8.11667 8.07512L5.89375 10.321C6.19931 10.8862 6.562 11.4323 6.98183 11.959C7.40167 12.4858 7.86397 12.994 8.36875 13.4835C8.84236 13.9571 9.33889 14.3965 9.85833 14.8016C10.3778 15.2068 10.9278 15.5771 11.5083 15.9126L13.6625 13.7585C13.8 13.621 13.9797 13.518 14.2015 13.4495C14.4233 13.3811 14.6409 13.3618 14.8542 13.3918L18.0167 14.0335C18.2306 14.0946 18.4062 14.2055 18.5438 14.3662C18.6812 14.5269 18.75 14.7063 18.75 14.9043V18.6168C18.75 18.8918 18.6583 19.121 18.475 19.3043C18.2917 19.4876 18.0625 19.5793 17.7875 19.5793Z"
                        class="fill-white transition-all group-hover:fill-red-500" fill="white" />
                </svg>
                <div>
                    <?= $header_footer_data[0]['meta_data']['phones'] ?? "" ?>
                </div>
                <!-- <span class="hidden sm:block">, 9044055605</span> -->
            </a>
        </div>

        <div>
            <ul class="flex  items-center gap-2">
                <li>
                    <a href="<?= $header_footer_data[0]['meta_data']['primary_cta_url'] ?? "" ?>"
                        class="gap-1 flex items-center text-white transition-all  whitespace-nowrap">

                        <svg width="14" height="14" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M15.5 12.3293L11.5 8.32928M15.5 12.3293L11.5 16.3293M15.5 12.3293H5.5M10.5 21.3293C11.6819 21.3293 12.8522 21.0965 13.9442 20.6442C15.0361 20.1919 16.0282 19.529 16.864 18.6932C17.6997 17.8575 18.3626 16.8654 18.8149 15.7734C19.2672 14.6815 19.5 13.5112 19.5 12.3293C19.5 11.1474 19.2672 9.97706 18.8149 8.88513C18.3626 7.7932 17.6997 6.80105 16.864 5.96532C16.0282 5.1296 15.0361 4.46666 13.9442 4.01437C12.8522 3.56208 11.6819 3.32928 10.5 3.32928"
                                class=" transition-all group-hover:stroke-red-500" stroke="white" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <?= $header_footer_data[0]['meta_data']['primary_cta_text'] ?? "" ?>
                    </a>
                </li>
                <li>
                    <a href="<?= $header_footer_data[0]['meta_data']['secondary_cta_url'] ?? "" ?>"
                        class="gap-1 flex items-center text-white transition-all  whitespace-nowrap">

                        <svg width="14" height="14" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M18.5 19.7543V20.9793C18.5 21.2626 18.404 21.5003 18.212 21.6923C18.02 21.8843 17.7827 21.98 17.5 21.9793C17.2173 21.9786 16.98 21.883 16.788 21.6923C16.596 21.5016 16.5 21.264 16.5 20.9793V17.8293C16.5 17.4126 16.646 17.0586 16.938 16.7673C17.23 16.476 17.584 16.33 18 16.3293H21.15C21.4333 16.3293 21.671 16.4253 21.863 16.6173C22.055 16.8093 22.1507 17.0466 22.15 17.3293C22.1493 17.612 22.0537 17.8496 21.863 18.0423C21.6723 18.235 21.4347 18.3306 21.15 18.3293H19.9L22.15 20.5793C22.3333 20.7626 22.425 20.992 22.425 21.2673C22.425 21.5426 22.3333 21.78 22.15 21.9793C21.95 22.1793 21.7127 22.2793 21.438 22.2793C21.1633 22.2793 20.9257 22.1793 20.725 21.9793L18.5 19.7543ZM12.5 22.3293C11.1167 22.3293 9.81667 22.0666 8.6 21.5413C7.38334 21.016 6.325 20.3036 5.425 19.4043C4.525 18.505 3.81267 17.4466 3.288 16.2293C2.76333 15.012 2.50067 13.712 2.5 12.3293C2.49933 10.9466 2.762 9.64662 3.288 8.42929C3.814 7.21195 4.52633 6.15362 5.425 5.25428C6.32367 4.35495 7.382 3.64262 8.6 3.11728C9.818 2.59195 11.118 2.32928 12.5 2.32928C13.882 2.32928 15.182 2.59195 16.4 3.11728C17.618 3.64262 18.6763 4.35495 19.575 5.25428C20.4737 6.15362 21.1863 7.21195 21.713 8.42929C22.2397 9.64662 22.502 10.9466 22.5 12.3293C22.5 12.496 22.496 12.6793 22.488 12.8793C22.48 13.0793 22.4673 13.2626 22.45 13.4293C22.4167 13.7126 22.3 13.9336 22.1 14.0923C21.9 14.251 21.65 14.33 21.35 14.3293C21.0833 14.3293 20.8583 14.2126 20.675 13.9793C20.4917 13.746 20.4167 13.496 20.45 13.2293C20.4833 13.0626 20.5 12.9126 20.5 12.7793V12.3293C20.5 11.996 20.479 11.6626 20.437 11.3293C20.395 10.996 20.3327 10.6626 20.25 10.3293H16.85C16.9 10.6626 16.9377 10.996 16.963 11.3293C16.9883 11.6626 17.0007 11.996 17 12.3293V12.8673C17 13.0586 16.9917 13.2376 16.975 13.4043C16.9417 13.6876 16.825 13.9126 16.625 14.0793C16.425 14.246 16.1833 14.3293 15.9 14.3293C15.6333 14.3293 15.4043 14.221 15.213 14.0043C15.0217 13.7876 14.9423 13.546 14.975 13.2793C14.9917 13.1126 15 12.9543 15 12.8043V12.3293C15 11.996 14.9877 11.6626 14.963 11.3293C14.9383 10.996 14.9007 10.6626 14.85 10.3293H10.15C10.1 10.6626 10.0627 10.996 10.038 11.3293C10.0133 11.6626 10.0007 11.996 10 12.3293C9.99933 12.6626 10.012 12.996 10.038 13.3293C10.064 13.6626 10.1013 13.996 10.15 14.3293H12.5C12.7833 14.3293 13.021 14.4253 13.213 14.6173C13.405 14.8093 13.5007 15.0466 13.5 15.3293C13.4993 15.612 13.4033 15.8496 13.212 16.0423C13.0207 16.235 12.7833 16.3306 12.5 16.3293H10.6C10.8 17.046 11.0583 17.7336 11.375 18.3923C11.6917 19.051 12.0667 19.68 12.5 20.2793C12.6667 20.2793 12.8333 20.2836 13 20.2923C13.1667 20.301 13.3333 20.2966 13.5 20.2793C13.7833 20.246 14.0167 20.317 14.2 20.4923C14.3833 20.6676 14.475 20.8966 14.475 21.1793C14.475 21.4793 14.4 21.7293 14.25 21.9293C14.1 22.1293 13.8833 22.246 13.6 22.2793C13.4333 22.296 13.25 22.3086 13.05 22.3173C12.85 22.326 12.6667 22.33 12.5 22.3293ZM4.75 14.3293H8.15C8.1 13.996 8.06267 13.6626 8.038 13.3293C8.01333 12.996 8.00067 12.6626 8 12.3293C7.99933 11.996 8.012 11.6626 8.038 11.3293C8.064 10.996 8.10134 10.6626 8.15 10.3293H4.75C4.66667 10.6626 4.60433 10.996 4.563 11.3293C4.52167 11.6626 4.50067 11.996 4.5 12.3293C4.49933 12.6626 4.52033 12.996 4.563 13.3293C4.60567 13.6626 4.668 13.996 4.75 14.3293ZM9.9 19.8793C9.6 19.3126 9.33734 18.7336 9.112 18.1423C8.88667 17.551 8.69934 16.9466 8.55 16.3293H5.6C6.08333 17.1793 6.69167 17.9086 7.425 18.5173C8.15833 19.126 8.98333 19.58 9.9 19.8793ZM5.6 8.32928H8.55C8.7 7.71262 8.88767 7.10862 9.113 6.51728C9.33833 5.92595 9.60067 5.34662 9.9 4.77928C8.98333 5.07928 8.15833 5.53362 7.425 6.14228C6.69167 6.75095 6.08333 7.47995 5.6 8.32928ZM10.6 8.32928H14.4C14.2 7.61262 13.9417 6.92528 13.625 6.26728C13.3083 5.60928 12.9333 4.97995 12.5 4.37928C12.0667 4.97928 11.6917 5.60862 11.375 6.26728C11.0583 6.92595 10.8 7.61328 10.6 8.32928ZM16.45 8.32928H19.4C18.9167 7.47928 18.3083 6.75028 17.575 6.14228C16.8417 5.53428 16.0167 5.07995 15.1 4.77928C15.4 5.34595 15.6627 5.92528 15.888 6.51728C16.1133 7.10928 16.3007 7.71328 16.45 8.32928Z"
                                class="fill-white transition-all group-hover:fill-red-500" fill="white" stroke="#053B7A"
                                stroke-width="0.5" />
                        </svg>
                        <?= $header_footer_data[0]['meta_data']['secondary_cta_text'] ?? "" ?>
                    </a>
                </li>
                <li>
                    <a href="contact-us"
                        class="gap-1 flex items-center text-white transition-all  whitespace-nowrap">

                        <svg width="14" height="14" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M16.5 2.32928V4.32928M7.5 22.3293V20.3293C7.5 19.7989 7.71071 19.2901 8.08579 18.9151C8.46086 18.54 8.96957 18.3293 9.5 18.3293H15.5C16.0304 18.3293 16.5391 18.54 16.9142 18.9151C17.2893 19.2901 17.5 19.7989 17.5 20.3293V22.3293M8.5 2.32928V4.32928"
                                class="stroke-white transition-all group-hover:stroke-red-500" stroke="white"
                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M12.5 14.3293C14.1569 14.3293 15.5 12.9861 15.5 11.3293C15.5 9.67243 14.1569 8.32928 12.5 8.32928C10.8431 8.32928 9.5 9.67243 9.5 11.3293C9.5 12.9861 10.8431 14.3293 12.5 14.3293Z"
                                class="stroke-white transition-all group-hover:stroke-red-500" stroke="white"
                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M19.5 4.32928H5.5C4.39543 4.32928 3.5 5.22472 3.5 6.32928V20.3293C3.5 21.4339 4.39543 22.3293 5.5 22.3293H19.5C20.6046 22.3293 21.5 21.4339 21.5 20.3293V6.32928C21.5 5.22472 20.6046 4.32928 19.5 4.32928Z"
                                class="stroke-white transition-all group-hover:stroke-red-500" stroke="white"
                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                        Contact Us
                    </a>
                </li>



            </ul>
        </div>
    </div>

    <div class=" overflow-hidden text-[10px] mt-1">
        <div class="w-full">
            <p class="animate-slide  text-white">
                <?= $scroll_text_data['data'][0]['content'] ?? "" ?>
            </p>
        </div>
    </div>

</div>

<?php
$menu_data = $menu_data['data']['menu_items'] ?? [];

function renderMenu($items, $isSub = false)
{
    if (empty($items)) return;

    echo $isSub ? '<ul class="dps-menu-open">' : '<ul class="NavMenu MobileNav" id="NavMenu">';

    foreach ($items as $item) {
        $hasChildren = !empty($item['descendants']);
        $url = trim($item['url'] ?? '');
        $target = htmlspecialchars($item['target'] ?? '', ENT_QUOTES);
        $name = preg_replace('/\s*Page$/i', '', $item['name']);
        if ($name === strtoupper($name)) {
            $name = ucfirst(strtolower($name));
        }

        // Determine full URL safely
        if (
            preg_match('#^(https?:)?//#i', $url) || // external or protocol-relative
            strpos($url, 'mailto:') === 0 ||
            strpos($url, 'tel:') === 0
        ) {
            // Leave external links untouched
            $fullUrl = $url;
        } elseif ($url === '' || $url === '/') {
            $fullUrl = '/';
        } else {
            // Internal relative link
            $fullUrl = '/' . ltrim($url, '/');
        }

        echo '<li>';

        if ($hasChildren) {
            // Parent menu with arrow & toggle
            echo '<a class="hover:text-[#FED72B] dps-menu-toggle flex items-center gap-2 group">';
            echo htmlspecialchars($name);

            // ▼ arrow icon
            echo '<svg width="8" height="5" viewBox="0 0 8 5" xmlns="http://www.w3.org/2000/svg" 
                     class="transition fill-white lg:fill-black group-hover:fill-[#FED72B]">
                      <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M0.699203 0.281451C0.825931 0.154761 0.997788 0.0835904 1.17698 0.0835904C1.35617 0.0835904 1.52803 0.154761 1.65476 0.281451L3.88011 2.5068L6.10546 0.281451C6.1678 0.216906 6.24237 0.165424 6.32482 0.130007C6.40727 0.0945895 6.49594 0.0759472 6.58567 0.0751674C6.6754 0.0743877 6.76439 0.091486 6.84744 0.125465C6.93049 0.159444 7.00595 0.209623 7.0694 0.273074C7.13285 0.336525 7.18303 0.411978 7.21701 0.495029C7.25099 0.57808 7.26808 0.667067 7.2673 0.756797C7.26652 0.846527 7.24788 0.935203 7.21246 1.01765C7.17705 1.1001 7.12557 1.17467 7.06102 1.23701L4.35789 3.94014C4.23116 4.06683 4.0593 4.138 3.88011 4.138C3.70092 4.138 3.52906 4.06683 3.40233 3.94014L0.699203 1.23701C0.572513 1.11028 0.501343 0.938422 0.501343 0.759229C0.501343 0.580035 0.572513 0.408179 0.699203 0.281451Z"/>
                  </svg>';
            echo '</a>';

            // Render children recursively
            renderMenu($item['descendants'], true);
        } else {
            // Normal menu link
            echo '<a href="' . htmlspecialchars($fullUrl, ENT_QUOTES) . '" target="' . $target . '" class="hover:text-[#FED72B]">';
            echo htmlspecialchars($name);
            echo '</a>';
        }

        echo '</li>';
    }

    echo '</ul>';
}
?>

<header>
    <nav>
        <div class="logo">
            <a href="/"><img src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/AONKJFjio6pQUZ1wq39Fg5T483Hp1HBsRNqOkvDI.png" class="w-44" alt=""></a>
        </div>
        <label for="menubrop" class="bartoggle">≡</label>
        <div class="onMobileEffect" id="onMobileEffect" style="transform: translateX(-100%);">
            <input type="checkbox" id="menubrop">
            <div class="NavMenuLogo bg-white py-5 justify-between px-2">
                <a href="/">
                    <img src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/AONKJFjio6pQUZ1wq39Fg5T483Hp1HBsRNqOkvDI.png" class="w-[200px]" alt="">
                </a>
                <button id="closeMenu">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 32 32">
                        <path fill="#f11e1e"
                            d="M16 2C8.2 2 2 8.2 2 16s6.2 14 14 14s14-6.2 14-14S23.8 2 16 2m5.4 21L16 17.6L10.6 23L9 21.4l5.4-5.4L9 10.6L10.6 9l5.4 5.4L21.4 9l1.6 1.6l-5.4 5.4l5.4 5.4z" />
                    </svg>
                </button>
            </div>
        </div>
        <?php renderMenu($menu_data); ?>

        <div class="sm:ml-12 sm:mt-[-1px] mt-5 ml-5 desktopEnquiry">
            <button onclick="openPopup()" id="openPopupDesktop" class="px-4 py-2 bg-blue-main text-white ">Enquiry Form</button>
        </div>
    </nav>
</header>


<script>
    function openPopup() {
        const popup = document.getElementById("popupForm");
        popup.classList.remove("hidden");
        popup.style.display = "flex";
    }

    function closePopup() {
        const popup = document.getElementById("popupForm");
        popup.classList.add("hidden");
        popup.style.display = "none";
    }
</script>
