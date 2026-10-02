<?php
include "api.php";
// print_r($landing_data);
// print_r($header_footer_data[1]['meta_data']['footer_about']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?= $landing_data['data']['title'] ?? "" ?></title>
  <meta name="description" content="<?= $landing_data['data']['meta_description'] ?? "" ?>">
  <meta name="keywords" content="<?= $landing_data['data']['meta_keywords'] ?? "" ?>">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
  <link rel="icon" href="./assets/images/favicon.png" type="image/x-icon" />
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <link rel="stylesheet" href="assets/css/style.css" />
  <meta name="robots" content="noindex, nofollow" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Pragati+Narrow:wght@400;700&display=swap" rel="stylesheet" />
  <style>
    * {
      font-family: "Pragati Narrow", sans-serif;
    }

    #scroll {
      position: fixed;
      right: 10px;
      bottom: 30px;
      cursor: pointer;
      width: 50px;
      height: 50px;
      background: #fff;
      box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
      text-indent: -9999px;
      display: none;
      border-radius: 60px;
      z-index: 99999;
    }

    #scroll span {
      position: absolute;
      top: 50%;
      left: 50%;
      margin-left: -8px;
      margin-top: -12px;
      height: 0;
      width: 0;
      border: 8px solid transparent;
      border-bottom-color: #000;
    }

    .topper-card::after {
      content: "";
      height: 70%;
      width: 100%;
      background-color: #005427;
      opacity: 1;
      position: absolute;
      bottom: 0;
    }

    @keyframes blinkShadow {

      0%,
      100% {
        box-shadow: 0 0 0 0 rgba(227, 30, 36, 0.5);
      }

      50% {
        box-shadow: 0 0 12px 6px rgba(227, 30, 36, 0.8);
      }
    }

    .blink-button {
      animation: blinkShadow 1s infinite;
    }
  </style>
</head>

<body style="overflow-x: hidden">
  <div id="esuccessPopup" class="fixed right-0 top-1/5 z-[9999] hidden rounded bg-green-500 px-4 py-2 text-white">
    Form submitted successfully!
  </div>

  <div class="main" style="overflow-x: hidden;">
    <header class="sticky top-0 z-90 w-full bg-white sm:h-[100px] sm:px-5" style="z-index: 9999">
      <div class="main-header flex justify-between items-center p-2 pt-6 sm:justify-center lg:pl-[210px] lg:pr-[154px]">
        <div class="sm:flex sm:w-1/2">
          <img
            src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/AONKJFjio6pQUZ1wq39Fg5T483Hp1HBsRNqOkvDI.png"
            alt="logo" class="w-[150px] sm:w-[267px]" />
        </div>
        <div class="flex w-1/2 justify-end">
          <a href="<?= $thankyou_data['data'][0]['pdf_file_path'] ?? "" ?>"
            class="rounded-[25px] bg-[#005427] px-3 py-2 text-[13px] font-medium text-white transition-all hover:bg-[#FFF701] hover:text-[#005427] sm:px-8 sm:py-3 sm:text-[16px] whitespace-nowrap">Download
            E-Brochure</a>
        </div>
      </div>
    </header>

    <main class="main-content">
      <!-- Hero Section -->
     <section id="switchForm" class="relative py-10 lg:py-[80px] hero-bg bg-no-repeat bg-center bg-cover">
        <div class="container mx-auto flex flex-col lg:flex-row px-5 lg:px-0">
          <div class="relative z-10 w-full lg:w-3/5 p-5 pt-24 lg:p-10 lg:pt-[110px] mx-auto">
            <div data-aos="fade-right" data-aos-duration="1500" class="mx-auto max-w-[660px] rounded-[10px]">
                <div>
                <?= $landing_data['data']['sections'][0]['content_heading'] ?? "" ?>
              </div>
            </div>
            <div class="mt-10 flex pl-10 lg:ml-[160px] lg:mt-[234px] mx-auto max-w-[660px]">
              <p class="lg:text-white text-black text-xl lg:text-[40px] leading-snug">
                <?= strip_tags($landing_data['data']['sections'][0]['content']) ?? "" ?>
              </p>
            </div>
          </div>

          <div class="relative z-10 w-full lg:w-2/5 py-1 lg:py-0 mx-4 lg:mx-0">
            <div class="slideLeft rounded-[8px] bg-white p-6 lg:mx-auto lg:m-10 lg:w-[400px] lg:pb-5">
         <form class="space-y-4" id="enquiryForm" action="" method="POST">
    <div>
        <label for="esession" class="block font-medium text-sm text-gray-700">Select Session</label>
        <select name="session" required id="esession"
                class="w-full border border-gray-300 p-2 rounded-md text-gray-500">
            <option value="" disabled selected>Enquiry For Session</option>
            <?php
            $sessions = include "session-api.php";
            foreach ($sessions as $item):
                $sessionValue = trim($item['session'] ?? '');
                if ($sessionValue === '') continue;
            ?>
                <option value="<?= htmlspecialchars($sessionValue, ENT_QUOTES, 'UTF-8') ?>">
                    <?= htmlspecialchars($sessionValue, ENT_QUOTES, 'UTF-8') ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <!-- Hostel facility -->
    <div>
        <p class="text-gray-700 mb-2">Are you looking for Hostel Facility? (Available for Boys only)</p>
        <select id="ehostel_facility" name="hostel_facility" required class="w-full border border-gray-300 p-2 rounded-md text-gray-500">
            <option value="" disabled selected>Select Hostel Facility</option>
            <option value="YES">Yes</option>
            <option value="NO">No</option>
        </select>
        <span id="ehostel-error" class="text-red-500 text-sm hidden">Please select hostel facility option.</span>
    </div>

    <div>
    <label for="egrade" class="block font-medium text-sm text-gray-700">Select Grade</label>
    <select name="grade" required id="egrade"
            disabled class="w-full border border-gray-300 p-2 rounded-md text-gray-500 disabled:bg-gray-100 disabled:text-gray-400">
        <option value="" disabled selected>Select Hostel Facility first</option>
        <?php
        $grades = include 'grade-api.php';
        $seen = [];
        $uniqueGrades = [];

        foreach ($grades as $grade) {
            $original = trim($grade['grades'] ?? '');
            if ($original === '') continue;

            // Normalize: uppercase, collapse spaces, remove dots
            $normalized = preg_replace('/\s+/', ' ', $original);
            $normalized = strtoupper($normalized);
            $normalized = str_replace('.', '', $normalized);  // "P.G" becomes "PG"

            if (!isset($seen[$normalized])) {
                $seen[$normalized] = true;
                $uniqueGrades[] = $original; // keep original formatting for display
            }
        }

        // Desired order (exact display labels)
        $gradeOrder = [
            'P.G', 'Nursery', 'Prep',
            'I', 'II', 'III', 'IV', 'V',
            'VI', 'VII', 'VIII', 'IX', 'X', 'XI', 'XII'
        ];

        usort($uniqueGrades, function($a, $b) use ($gradeOrder) {
            $posA = array_search($a, $gradeOrder);
            $posB = array_search($b, $gradeOrder);
            if ($posA === false) $posA = 999;
            if ($posB === false) $posB = 999;
            return $posA - $posB;
        });

        foreach ($uniqueGrades as $gradeValue):
        ?>
            <option value="<?= htmlspecialchars($gradeValue, ENT_QUOTES, 'UTF-8') ?>">
                <?= htmlspecialchars($gradeValue, ENT_QUOTES, 'UTF-8') ?>
            </option>
        <?php endforeach; ?>
    </select>
    <span id="classError" class="text-red-500 text-sm hidden">Please select a grade.</span>
</div>

    <div>
        <label for="estudent_name" class="block font-medium text-sm text-gray-700">Student Name</label>
        <input type="text" name="student-name" id="estudent_name" placeholder="Student Name"
               class="w-full border border-gray-300 p-2 rounded-md" required>
        <span id="student-error" class="text-red-500 text-sm mt-1 hidden">Only letters and spaces allowed.</span>
    </div>

    <div>
        <label for="eparent_name" class="block font-medium text-sm text-gray-700">Parents Name</label>
        <input type="text" name="parent-name" id="eparent_name" placeholder="Parents Name"
               class="w-full border border-gray-300 p-2 rounded-md" required>
        <span id="parent-error" class="text-red-500 text-sm mt-1 hidden">Only letters and spaces allowed.</span>
    </div>

    <div>
        <label for="emobile" class="block font-medium text-sm text-gray-700">Phone Number</label>
        <input type="text" name="mobile" id="emobile" placeholder="Mobile No."
               class="w-full border border-gray-300 p-2 rounded-md" required maxlength="10">
        <span id="mobile-error" class="text-red-500 text-sm mt-1 hidden">Please enter valid phone number</span>
    </div>

    <div>
        <label for="eemail" class="block font-medium text-sm text-gray-700">Email Address</label>
        <input type="email" name="email" id="eemail" placeholder="E-mail"
               class="w-full border border-gray-300 p-2 rounded-md" required>
        <span id="email-error" class="text-red-500 text-sm mt-1 hidden">Please enter a valid email address.</span>
    </div>

    <div class="mt-4 relative customSelect">
        <label for="ecity" class="block font-medium text-sm text-gray-700">Select City</label>
        <select id="ecity" name="ecity" class="hidden">
            <option value="">Select City</option>
            <?php
            $cities = include 'get-city.php';
            if (!empty($cities)):
                foreach ($cities as $city):
                    $cityValue = trim($city['name'] ?? '');
                    if ($cityValue === '') continue;
            ?>
                    <option value="<?= htmlspecialchars($cityValue, ENT_QUOTES, 'UTF-8') ?>">
                        <?= htmlspecialchars($cityValue, ENT_QUOTES, 'UTF-8') ?>
                    </option>
            <?php
                endforeach;
            else:
            ?>
                <option value="">No cities available</option>
            <?php endif; ?>
        </select>

        <!-- Fake dropdown display -->
        <div class="border border-gray-300 p-[11px] rounded-md bg-white cursor-pointer flex justify-between items-center">
            <span class="selected-text text-[#808080cc]">Select City</span>
            <span>▼</span>
        </div>

        <!-- Dropdown options (for JS search/filter) -->
        <div class="absolute mt-1 border border-gray-300 rounded-md bg-white shadow-md hidden z-50 w-full">
            <input type="text" placeholder="Search..." class="w-full p-2 border-b border-gray-300 outline-none">
            <ul class="max-h-48 overflow-y-auto"></ul>
        </div>
    </div>

    <!-- Pincode -->
    <div>
        <label for="epincode" class="block font-medium text-sm text-gray-700">Pincode</label>
        <input type="text" name="pincode" id="epincode" placeholder="Enter your Pincode"
               class="w-full border border-gray-300 p-2 rounded-md" maxlength="6"
               oninput="this.value=this.value.replace(/\D/g,'')" required>
        <span id="pincode-error" class="text-red-500 text-sm hidden">Please enter a valid Pincode.</span>
    </div>

    <div class="flex items-start gap-2">
        <input type="checkbox" id="popupCheckbox" required />
        <label for="popupCheckbox" class="text-sm">
            I agree to <a href="/termsandconditions" class="text-blue-600 underline">Terms and Conditions</a>.
        </label>
        <span id="checkboxError" class="text-red-500 text-sm hidden">
            You must agree to the terms and conditions.
        </span>
    </div>

    <input type="hidden" id="source" value="">

    <button type="submit" id="submitBtn"
            class="w-full py-2 bg-[#014828] text-white rounded-md hover:bg-[#FED72B] transition">
        Enquire Now
    </button>
</form>

            </div>
          </div>
        </div>
      </section>

      <!-- Why Do Families Choose DPS -->
      <section class="yellow py-3 sm:py-[60px] px-5 sm:px-[100px]">
         
          <?= $landing_data['data']['sections'][1]['content_heading'] ?? "" ?>
       
        <div class="flex flex-col items-center justify-center gap-10 lg:flex-row lg:gap-10">
          <div class="grid w-full grid-cols-2 gap-5 lg:w-1/2 lg:grid-cols-3">
          <?php 
          foreach($landing_data['data']['sections'][1]['columns'][0]['resolved_content']['media'] as $data){
          ?>  
            <div class="flex flex-col items-center gap-5 text-center text-[#014828] sm:text-[30px] font-semibold">
              <img src="<?= empty($data['media_file']) ? $data['media_url'] : $api_url . '/' . $data['media_file'] ?>" alt="<?= strip_tags($data['content']) ?? "" ?>" class="mx-auto" />
              <p><?= $data['content'] ?? "" ?></p>
            </div>
         <?php } ?>  
           </div>
          <div class="w-full lg:w-2/5">
            <img src="<?= $landing_data['data']['sections'][1]['columns'][1]['image_path'] ?? "" ?>" alt="<?= strip_tags($landing_data['data']['sections'][1]['columns'][1]['title']) ?? "" ?>" class="mx-auto" />
          </div>
        </div>
      </section>

     <section class="my-5 sm:my-[60px] px-5 sm:px-[100px]">
        <h2 class="text-center text-2xl font-bold text-[#014828] sm:text-[70px]">
          <?= $landing_data['data']['sections'][2]['title'] ?? "" ?>
        </h2>

        <div class="mt-8 grid 2xl:grid-cols-4 xl:grid-cols-4 lg:grid-cols-4 md:grid-cols-2 px-5 sm:px-0 max-w-[1200px] mx-auto">
          <?php
          foreach ($landing_data['data']['sections'][2]['resolved_content']['media'] as $data) {
            ?>
            <div data-aos="zoom-out" class="cursor-pointer text-center transition-transform hover:-translate-y-1">
              <img src="<?= $api_url ?>/<?= $data["media_file"] ?? "" ?>" alt="<?= strip_tags($data["content"]) ?? "" ?>"
                class="mx-auto" />
              <h3 class="mt-2 text-lg font-bold text-[#014828] sm:text-[30px]">
                <?= strip_tags($data["content"]) ?? "" ?>
              </h3>
            </div>
          <?php } ?>
        </div>
      </section>

      <!-- About Us -->
      <section class="my-10 bg-[#014828] px-5 py-10 sm:my-[60px] sm:px-[100px]">
        <div class="mx-auto flex max-w-[1280px] flex-col items-center justify-center gap-10 lg:flex-row">
          <div data-aos="fade-left" class="w-full text-center text-white lg:w-1/2 lg:text-left">
              <?= $landing_data['data']['sections'][3]['columns'][0]['content'] ?>
            <a href="#enquiryForm">
            <button
              class="mt-10 hidden w-1/3 rounded-full bg-white px-6 py-3 font-bold text-[#014828] lg:block text-lg">
              Enquire Now
            </button>
            </a>
          </div>
          <div class="w-full lg:w-1/2">
            <img
              src="<?= $landing_data['data']['sections'][3]['columns'][1]['image_path'] ?? "" ?>"
              alt="About Us Image" class="w-full"/>
          </div>
        </div>
      </section>

      <!-- Testimonials -->
      <section class="my-5 sm:my-[60px] px-5 sm:px-0">
        <div class="max-w-[1280px] mx-auto px-5 sm:px-0">
          <h2 class="mb-10 text-center text-2xl font-bold text-[#014828] sm:text-[60px]">
            Parent's Testimonials
          </h2>
          <div class="relative mx-auto w-full sm:w-[768px] xl:w-[1280px] lg:w-[1080px]">
            <div class="swiper carousel4 relative mt-10">
              <div class="swiper-wrapper">
            <?php 
          foreach($landing_data['data']['sections'][4]['resolved_content']['items'] as $data){
          ?>  
                <div class="swiper-slide">
                  <div class="relative flex flex-col items-center gap-5 py-5 px-5">
                    <img
                      src="<?=  $api_url . '/' . $data['image_url'] ?>"
                      alt="Testimonial" class="mx-auto" />
                    <div class="mt-5 text-center sm:px-20 px-1">
                       <p class="relative z-10 text-lg text-black">
                          <?= $data['description'] ?>
                      </p>
                     </div>
                  </div>
                </div>
                <?php } ?>
              </div>
              <div class="swiper-button-next !hidden sm:!flex !absolute top-1/2 -right-6 z-50" aria-label="Next">
                <svg width="70" height="70" viewBox="0 0 70 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <circle cx="35" cy="35" r="34" fill="white" stroke="#005427" stroke-width="2" />
                  <path
                    d="M39.0078 44.375C39.375 44.375 39.6982 44.2364 39.959 43.9756L48.4756 35.459C48.7364 35.1982 48.875 34.875 48.875 34.5078C48.875 34.1406 48.7364 33.8174 48.4756 33.5566L39.959 25.04C39.6982 24.7793 39.375 24.6406 39.0078 24.6406C38.6406 24.6406 38.3174 24.7793 38.0566 25.04V25.041C37.7932 25.2868 37.6572 25.6028 37.6572 25.9648C37.6572 26.332 37.7959 26.6552 38.0566 26.916L44.3242 33.1836H22.4492C22.0872 33.1836 21.7674 33.3146 21.5117 33.5703C21.256 33.826 21.125 34.1458 21.125 34.5078C21.125 34.8698 21.256 35.1896 21.5117 35.4453C21.7674 35.701 22.0872 35.832 22.4492 35.832H44.3242L38.0566 42.0996L38.0576 42.1016C37.7916 42.35 37.6573 42.6705 37.6572 43.0371C37.6572 43.4042 37.7911 43.726 38.0576 43.9746L38.0566 43.9756C38.3174 44.2364 38.6406 44.375 39.0078 44.375Z"
                    fill="#005427" stroke="#005427" stroke-width="0.75" />
                </svg>
              </div>
              <div class="swiper-button-prev !hidden sm:!flex !absolute top-1/2 -left-6 z-50" aria-label="Previous">
                <svg width="70" height="70" viewBox="0 0 70 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <circle cx="35" cy="35" r="34" fill="white" stroke="#005427" stroke-width="2" />
                  <path
                    d="M31.9922 44.375C31.625 44.375 31.3018 44.2364 31.041 43.9756L22.5244 35.459C22.2636 35.1982 22.125 34.875 22.125 34.5078C22.125 34.1406 22.2636 33.8174 22.5244 33.5566L31.041 25.04C31.3018 24.7793 31.625 24.6406 31.9922 24.6406C32.3594 24.6406 32.6826 24.7793 32.9434 25.04V25.041C33.2068 25.2868 33.3428 25.6028 33.3428 25.9648C33.3428 26.332 33.2041 26.6552 32.9434 26.916L26.6758 33.1836H48.5508C48.9128 33.1836 49.2326 33.3146 49.4883 33.5703C49.744 33.826 49.875 34.1458 49.875 34.5078C49.875 34.8698 49.744 35.1896 49.4883 35.4453C49.2326 35.701 48.9128 35.832 48.5508 35.832H26.6758L32.9434 42.0996L32.9424 42.1016C33.2084 42.35 33.3427 42.6705 33.3428 43.0371C33.3428 43.4042 33.2089 43.726 32.9424 43.9746L32.9434 43.9756C32.6826 44.2364 32.3594 44.375 31.9922 44.375Z"
                    fill="#005427" stroke="#005427" stroke-width="0.75" />
                </svg>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Advance Academic Model -->
    <section class="star-bg py-5 px-5 sm:py-[40px] sm:px-[100px] bg-cover bg-center">
        <div class="mx-auto max-w-[1200px]">
        <?= $landing_data['data']['sections'][5]['content_heading'] ?? "" ?>
          <div class="grid gap-8 2xl:grid-cols-4 xl:grid-cols-4 lg:grid-cols-4 md:grid-cols-2 sm:gap-10 sm:my-[27px]">
         <?php 
          foreach($landing_data['data']['sections'][5]['resolved_content']['media'] as $data){
          ?> 
            <div class="flex flex-col items-center gap-3 text-center text-white sm:text-[24px]">
              <img src="<?= $api_url ?>/<?= $data['media_file'] ?? "" ?>" alt="<?= strip_tags($data['content']) ?? "" ?>" />
              <p><?= $data['content'] ?? "" ?></p>
            </div>
            <?php } ?>
          </div>
        </div>
      </section>

     <!--==== Start ====-->
     <section class="py-12">
        <div class="max-w-6xl mx-auto grid lg:grid-cols-3 grid-cols-2  gap-6 px-4">
          <!-- Card 1 -->
          <div class="relative rounded-lg overflow-hidden shadow-md sm:mt-0 mt-4">
            <img src="./assets/images/greenbg-card.png" alt="Students"
              class="w-full h-full object-cover absolute inset-0">
            <div class="relative flex flex-col p-4 text-white">
              <div><img
                  src="<?= $api_url ?>/<?= $landing_data['data']['sections'][6]['resolved_content']['media'][0]['media_file'] ?? "" ?>"
                  alt=""></div>
              <?= $landing_data['data']['sections'][6]['resolved_content']['media'][0]['content'] ?? "" ?>
            </div>
          </div>
          <!-- Card 2 -->
          <div class="relative rounded-lg overflow-hidden shadow-md sm:mt-0 mt-4">
            <img src="./assets/images/yellowbg-card.png" alt="Students"
              class="w-full h-full object-cover absolute inset-0">
            <div class="relative flex flex-col p-4 text-[#014828]">
              <div><img
                  src="<?= $api_url ?>/<?= $landing_data['data']['sections'][6]['resolved_content']['media'][1]['media_file'] ?? "" ?>"
                  alt=""></div>
              <?= $landing_data['data']['sections'][6]['resolved_content']['media'][1]['content'] ?? "" ?>
            </div>
          </div>
          <!-- Card 3 -->
          <div class="relative rounded-lg overflow-hidden shadow-md sm:mt-0 mt-4">
            <img src="./assets/images/greenbg-card.png" alt="Students"
              class="w-full h-full object-cover absolute inset-0">
            <div class="relative flex flex-col p-4 text-white">
              <div><img
                  src="<?= $api_url ?>/<?= $landing_data['data']['sections'][6]['resolved_content']['media'][2]['media_file'] ?? "" ?>"
                  alt=""></div>
              <?= $landing_data['data']['sections'][6]['resolved_content']['media'][2]['content'] ?? "" ?>
            </div>
          </div>
          <!-- Wrap 2nd row inside a flex col-span-3 -->
          <div class="sm:col-span-3 sm:flex justify-center gap-6">
            <!-- Card 4 -->
            <div class="relative rounded-lg overflow-hidden shadow-md sm:mt-0 mt-4 w-full lg:max-w-sm">
              <img src="./assets/images/yellowbg-card.png" alt="Students"
                class="w-full h-full object-cover absolute inset-0">
              <div class="relative flex flex-col p-4 text-[#014828]">
                <div><img
                    src="<?= $api_url ?>/<?= $landing_data['data']['sections'][6]['resolved_content']['media'][3]['media_file'] ?? "" ?>"
                    alt=""></div>
                <?= $landing_data['data']['sections'][6]['resolved_content']['media'][3]['content'] ?? "" ?>
              </div>
            </div>
            <!-- Card 5 -->
            <div class="relative rounded-lg overflow-hidden shadow-md sm:mt-0 mt-4 w-full lg:max-w-sm">
              <img src="./assets/images/greenbg-card.png" alt="Students"
                class="w-full h-full object-cover absolute inset-0">
              <div class="relative flex flex-col p-4 text-white">
                <div><img
                    src="<?= $api_url ?>/<?= $landing_data['data']['sections'][6]['resolved_content']['media'][4]['media_file'] ?? "" ?>"
                    alt=""></div>
                <?= $landing_data['data']['sections'][6]['resolved_content']['media'][4]['content'] ?? "" ?>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--==== END ====-->

      <!-- Our Toppers -->
      <section class="yellow py-5 px-5 sm:py-[40px] sm:px-[100px]">
        <div class="mx-auto max-w-[1200px]">
          <h2 class="mb-10 text-center text-3xl font-bold text-[#014828] sm:text-[60px]">
             <?= $landing_data['data']['sections'][7]['content_heading'] ?? "" ?>
          </h2>
          <div class="grid grid-cols-2 gap-5 sm:grid-cols-4">
  <?php 
          foreach($landing_data['data']['sections'][7]['resolved_content']['media'] as $data){
          ?> 
            <div>
              <img src="<?= $data['media_url'] ?? "" ?>" alt="Satpal Singh Rawat" class="mx-auto" />
              <div class="bg-[#F1E70C] py-2 text-center text-lg font-bold text-[#014828] sm:text-[30px]  mx-auto">
                <?= $data['heading'] ?? "" ?>
              </div>
              <p class="mt-1 text-center text-3xl font-bold text-[#005427] sm:text-[60px]  mx-auto">
                <?= $data['content'] ?? "" ?>
              </p>
            </div>
<?php } ?>
            
          </div>
        </div>
      </section>

         <!-- #region   Life At DPS  -->
      <section class=" py-12">
        <div class="lg:max-w-6xl mx-auto px-4">
          <h2
            class="mb-10 text-center text-3xl font-bold text-[#014828]">
            Life At DPS
          </h2>
          <div class="flex gap-5">
            <div>
              <img src="<?= $api_url ?>/<?= $landing_data['data']['sections'][8]['resolved_content']['media'][0]['media_file'] ?? "" ?>" alt="Life 1" />
            </div>
            <div>
              <div>
                <img src="<?= $api_url ?>/<?= $landing_data['data']['sections'][8]['resolved_content']['media'][1]['media_file'] ?? "" ?>" alt="Life 2" />
              </div>
              <div class="mt-5 flex gap-5">
                <div><img src="<?= $api_url ?>/<?= $landing_data['data']['sections'][8]['resolved_content']['media'][2]['media_file'] ?? "" ?>" alt="Life 3" /></div>
                <div><img src="<?= $api_url ?>/<?= $landing_data['data']['sections'][8]['resolved_content']['media'][3]['media_file'] ?? "" ?>" alt="Life 4" /></div>
              </div>
            </div>
            <div>
              <img src="<?= $api_url ?>/<?= $landing_data['data']['sections'][8]['resolved_content']['media'][4]['media_file'] ?? "" ?>" alt="Life 5" />
            </div>
          </div>
        </div>
      </section>

       <!-- Registration Banner -->
      <section class="relative flex h-[600px] w-full items-center justify-center">
        <img src="./assets/images/registration.png" alt="School Event"
          class="absolute inset-0 h-full w-full object-cover" />
        <div class="absolute inset-0 bg-[#014828] opacity-70"></div>
        <div class="">
        <div class="relative z-10 container mx-auto px-4 text-center sm:text-left">
          <?= $landing_data['data']['sections'][9]['columns'][0]['content'] ?? "" ?>
        </div>
        <div class="relative z-20  p-5 ">
        
          <div class="mt-5 w-[50%]">
          <a href="#enquiryForm"
            class="rounded-[25px] bg-[#FFF701] px-3 py-2 text-[13px] font-medium  transition-all hover:bg-[#fff] text-[#005427] sm:px-20 sm:py-3 sm:text-[16px] whitespace-nowrap">Enquire Now</a>
     
</div>
</div>
        </div>
      </section>

      <!-- Footer -->
      <footer class="mt-10 bg-white">
        <div class="flex flex-col-reverse lg:flex-row">
          <div class="lg:w-1/2">

            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3569.8412615709044!2d80.25652787513236!3d26.525229276635688!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399c376c42ffffff%3A0xe84f82173790cc3c!2sDelhi%20Public%20School%20Kalyanpur%2CKanpur!5e0!3m2!1sen!2sin!4v1758972727094!5m2!1sen!2sin"
              width="100%" height="450" style="border:0" allowfullscreen="" loading="lazy"
              referrerpolicy="no-referrer-when-downgrade" title="Allenhouse Public School Location"></iframe>
          </div>
<?php

?>          
          <div class="lg:w-1/2 p-10">
            <h2 class="mb-4 text-center text-4xl font-bold text-black sm:text-left">
              Contact Us
            </h2>
            <ul class="space-y-4 text-black font-semibold">
              <li class="flex flex-col items-center gap-3 sm:flex-row sm:items-center sm:text-left text-center">
                <svg width="33" height="33" viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg"
                  class="mr-3">
                  <circle cx="16.1289" cy="16.5" r="15.5" fill="white" stroke="#014828" />
                  <path
                    d="M9.72852 11.275C9.72852 11.0695 9.81017 10.8723 9.95551 10.727C10.1008 10.5817 10.298 10.5 10.5035 10.5H12.1721C12.3555 10.5001 12.533 10.5652 12.6729 10.6839C12.8129 10.8025 12.9062 10.9669 12.9362 11.1479L13.5097 14.585C13.5371 14.7487 13.5113 14.9169 13.4359 15.0648C13.3606 15.2127 13.2398 15.3325 13.0912 15.4065L11.8915 16.0056C12.3217 17.0717 12.9625 18.0402 13.7754 18.8531C14.5883 19.6661 15.5568 20.3068 16.6229 20.737L17.2228 19.5373C17.2968 19.3889 17.4165 19.2682 17.5642 19.1928C17.7119 19.1175 17.8799 19.0915 18.0435 19.1188L21.4806 19.6923C21.6616 19.7224 21.826 19.8157 21.9446 19.9556C22.0633 20.0955 22.1284 20.273 22.1285 20.4564V22.125C22.1285 22.3305 22.0469 22.5277 21.9015 22.673C21.7562 22.8183 21.5591 22.9 21.3535 22.9H19.8035C14.239 22.9 9.72852 18.3895 9.72852 12.825V11.275Z"
                    fill="#014828" />
                </svg>
                <?= $header_footer_data[1]['meta_data']['footer_phones'] ?? "" ?>
              </li>
              <li class="flex flex-col items-center gap-3 sm:flex-row sm:items-center sm:text-left text-center">
                <svg width="33" height="33" viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg"
                  class="mr-3">
                  <circle cx="16.1289" cy="16.5" r="15.5" fill="white" stroke="#014828" />
                  <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M10.01 13.1608C9.76068 13.3202 9.55511 13.5418 9.4126 13.8048C9.27008 14.0678 9.19531 14.3636 9.19531 14.6643V21.6606C9.19531 22.1308 9.37793 22.5818 9.70299 22.9143C10.0281 23.2468 10.4689 23.4336 10.9286 23.4336H21.3286C21.7884 23.4336 22.2292 23.2468 22.5543 22.9143C22.8794 22.5818 23.062 22.1308 23.062 21.6606V14.6643C23.062 14.3636 22.9872 14.0678 22.8447 13.8048C22.7022 13.5418 22.4966 13.3202 22.2473 13.1608L17.0473 9.8364C16.7718 9.66028 16.4535 9.56689 16.1286 9.56689C15.8038 9.56689 15.4855 9.66028 15.21 9.8364L10.01 13.1608ZM12.2763 15.3088C12.1816 15.2442 12.0754 15.1993 11.9638 15.1766C11.8521 15.154 11.7372 15.1541 11.6256 15.1769C11.5139 15.1997 11.4078 15.2448 11.3132 15.3095C11.2186 15.3743 11.1374 15.4575 11.0742 15.5543C11.0111 15.6512 10.9672 15.7598 10.9451 15.874C10.9229 15.9883 10.923 16.1058 10.9453 16.22C10.9903 16.4506 11.1231 16.6534 11.3143 16.7839L15.6476 19.7386C15.7901 19.8358 15.9574 19.8877 16.1286 19.8877C16.2999 19.8877 16.4672 19.8358 16.6096 19.7386L20.943 16.7839C21.1342 16.6534 21.2669 16.4506 21.312 16.22C21.357 15.9894 21.3106 15.7499 21.183 15.5543C21.0555 15.3587 20.8572 15.2229 20.6317 15.1769C20.4063 15.1308 20.1722 15.1783 19.981 15.3088L16.1286 17.9355L12.2763 15.3088Z"
                    fill="#014828" />
                </svg>
                 <?= $header_footer_data[1]['meta_data']['footer_email'] ?? "" ?>
              </li>
              <li class="flex flex-col items-center gap-3 sm:flex-row sm:items-center sm:text-left text-center">
                <svg width="33" height="33" viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg"
                  class="mr-3">
                  <circle cx="16.1289" cy="16.5" r="15.5" fill="white" stroke="#014828" />
                  <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M10.01 13.1608C9.76068 13.3202 9.55511 13.5418 9.4126 13.8048C9.27008 14.0678 9.19531 14.3636 9.19531 14.6643V21.6606C9.19531 22.1308 9.37793 22.5818 9.70299 22.9143C10.0281 23.2468 10.4689 23.4336 10.9286 23.4336H21.3286C21.7884 23.4336 22.2292 23.2468 22.5543 22.9143C22.8794 22.5818 23.062 22.1308 23.062 21.6606V14.6643C23.062 14.3636 22.9872 14.0678 22.8447 13.8048C22.7022 13.5418 22.4966 13.3202 22.2473 13.1608L17.0473 9.8364C16.7718 9.66028 16.4535 9.56689 16.1286 9.56689C15.8038 9.56689 15.4855 9.66028 15.21 9.8364L10.01 13.1608ZM12.2763 15.3088C12.1816 15.2442 12.0754 15.1993 11.9638 15.1766C11.8521 15.154 11.7372 15.1541 11.6256 15.1769C11.5139 15.1997 11.4078 15.2448 11.3132 15.3095C11.2186 15.3743 11.1374 15.4575 11.0742 15.5543C11.0111 15.6512 10.9672 15.7598 10.9451 15.874C10.9229 15.9883 10.923 16.1058 10.9453 16.22C10.9903 16.4506 11.1231 16.6534 11.3143 16.7839L15.6476 19.7386C15.7901 19.8358 15.9574 19.8877 16.1286 19.8877C16.2999 19.8877 16.4672 19.8358 16.6096 19.7386L20.943 16.7839C21.1342 16.6534 21.2669 16.4506 21.312 16.22C21.357 15.9894 21.3106 15.7499 21.183 15.5543C21.0555 15.3587 20.8572 15.2229 20.6317 15.1769C20.4063 15.1308 20.1722 15.1783 19.981 15.3088L16.1286 17.9355L12.2763 15.3088Z"
                    fill="#014828" />
                </svg>
                 <?= $header_footer_data[1]['meta_data']['footer_about'] ?? "" ?>
              </li>
            </ul>
            <div class="mt-5 hidden sm:flex gap-4">
              <h5 class="font-semibold text-black text-lg">Follow us on :</h5>
              <ul class="flex items-center gap-4">
                <li>
                  <a href="<?= $header_footer_data[1]['meta_data']['footer_facebook'] ?? "" ?>" aria-label="Facebook"><svg width="10" height="18"
                      viewBox="0 0 10 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path
                        d="M2.83154 17.7723V9.77957H0.128906V6.66463H2.83154V4.36746C2.83154 1.70161 4.46757 0.25 6.85711 0.25C8.00172 0.25 8.98546 0.334812 9.27214 0.37272V3.15869L7.61487 3.15944C6.31531 3.15944 6.06368 3.77403 6.06368 4.67589V6.66463H9.16302L8.75947 9.77957H6.06367V17.7723H2.83154Z"
                        fill="#014828" />
                    </svg></a>
                </li>
                <li>
                  <a href="<?= $header_footer_data[1]['meta_data']['footer_instagram'] ?? "" ?>"
                    aria-label="Instagram"><svg width="21" height="21" viewBox="0 0 21 21" fill="none"
                      xmlns="http://www.w3.org/2000/svg">
                      <path
                        d="M10.5678 2.50677C13.1834 2.50677 13.4932 2.51652 14.5265 2.56341C15.1477 2.57098 15.7631 2.68451 16.3458 2.89908C16.7683 3.06126 17.1521 3.30971 17.4723 3.62843C17.7926 3.94715 18.0422 4.32908 18.2052 4.74963C18.4208 5.32955 18.5349 5.94197 18.5425 6.56026C18.5891 7.5886 18.5994 7.89687 18.5994 10.5C18.5994 13.1031 18.5896 13.4114 18.5425 14.4397C18.5349 15.058 18.4208 15.6705 18.2052 16.2504C18.0422 16.6709 17.7926 17.0528 17.4723 17.3716C17.1521 17.6903 16.7683 17.9387 16.3458 18.1009C15.7631 18.3155 15.1477 18.429 14.5265 18.4366C13.4936 18.483 13.1839 18.4932 10.5678 18.4932C7.95172 18.4932 7.64197 18.4835 6.60916 18.4366C5.9879 18.429 5.37254 18.3155 4.78984 18.1009C4.36728 17.9387 3.98352 17.6903 3.66327 17.3716C3.34302 17.0528 3.09337 16.6709 2.93041 16.2504C2.71481 15.6705 2.60074 15.058 2.59313 14.4397C2.54649 13.4114 2.53622 13.1031 2.53622 10.5C2.53622 7.89687 2.54602 7.5886 2.59313 6.56026C2.60074 5.94197 2.71481 5.32955 2.93041 4.74963C3.09337 4.32908 3.34302 3.94715 3.66327 3.62843C3.98352 3.30971 4.36728 3.06126 4.78984 2.89908C5.37254 2.68451 5.9879 2.57098 6.60916 2.56341C7.64244 2.51699 7.95219 2.50677 10.5678 2.50677ZM10.5678 0.75C7.90881 0.75 7.57386 0.761142 6.52892 0.808497C5.71585 0.824592 4.91141 0.977805 4.14982 1.26162C3.49649 1.50659 2.90475 1.89049 2.41587 2.38653C1.917 2.87325 1.53093 3.46251 1.28463 4.11313C0.99945 4.87108 0.845502 5.67168 0.829329 6.48087C0.78268 7.51989 0.771484 7.85323 0.771484 10.4995C0.771484 13.1458 0.78268 13.4792 0.830262 14.5191C0.846435 15.3283 1.00038 16.1289 1.28556 16.8869C1.53159 17.5374 1.91734 18.1267 2.41587 18.6135C2.90502 19.1096 3.49709 19.4935 4.15075 19.7384C4.91234 20.0222 5.71678 20.1754 6.52986 20.1915C7.5748 20.2379 7.90834 20.25 10.5687 20.25C13.2291 20.25 13.5627 20.2389 14.6076 20.1915C15.4207 20.1754 16.2251 20.0222 16.9867 19.7384C17.6373 19.4874 18.2281 19.1041 18.7213 18.6129C19.2145 18.1218 19.5992 17.5336 19.851 16.8859C20.1362 16.128 20.2901 15.3274 20.3063 14.5182C20.3529 13.4792 20.3641 13.1458 20.3641 10.4995C20.3641 7.85323 20.3529 7.51989 20.3054 6.47994C20.2892 5.67075 20.1352 4.87015 19.8501 4.1122C19.604 3.46166 19.2183 2.87241 18.7197 2.3856C18.2306 1.88945 17.6385 1.50555 16.9849 1.26069C16.2233 0.976876 15.4188 0.823664 14.6058 0.807569C13.5618 0.761142 13.2268 0.75 10.5678 0.75Z"
                        fill="#014828" />
                      <path
                        d="M10.5658 5.49316C9.57084 5.49316 8.59821 5.7868 7.77093 6.33693C6.94364 6.88707 6.29885 7.66899 5.91809 8.58383C5.53734 9.49867 5.43771 10.5053 5.63182 11.4765C5.82593 12.4477 6.30505 13.3398 7.0086 14.04C7.71215 14.7402 8.60852 15.217 9.58437 15.4102C10.5602 15.6034 11.5717 15.5042 12.4909 15.1253C13.4102 14.7464 14.1959 14.1046 14.7486 13.2813C15.3014 12.458 15.5964 11.49 15.5964 10.4998C15.5964 9.17195 15.0664 7.89849 14.123 6.95957C13.1796 6.02065 11.9 5.49316 10.5658 5.49316ZM10.5658 13.7496C9.91996 13.7496 9.28862 13.559 8.75162 13.2019C8.21462 12.8448 7.79608 12.3373 7.54893 11.7434C7.30178 11.1496 7.23711 10.4962 7.36311 9.86577C7.4891 9.23536 7.80011 8.65629 8.25679 8.2018C8.71347 7.7473 9.29531 7.43778 9.92875 7.31238C10.5622 7.18699 11.2188 7.25134 11.8154 7.49732C12.4121 7.74329 12.9221 8.15983 13.2809 8.69427C13.6397 9.2287 13.8312 9.85702 13.8312 10.4998C13.8312 11.3617 13.4872 12.1883 12.8748 12.7978C12.2624 13.4072 11.4319 13.7496 10.5658 13.7496Z"
                        fill="#014828" />
                      <path
                        d="M15.7967 6.46489C16.4459 6.46489 16.9722 5.94109 16.9722 5.29494C16.9722 4.6488 16.4459 4.125 15.7967 4.125C15.1474 4.125 14.6211 4.6488 14.6211 5.29494C14.6211 5.94109 15.1474 6.46489 15.7967 6.46489Z"
                        fill="#014828" />
                    </svg></a>
                </li>
                <li>
                  <a href="<?= $header_footer_data[1]['meta_data']['footer_linkedin'] ?? "" ?>" aria-label="LinkedIn"><svg width="19" height="19" viewBox="0 0 19 19" fill="none"
                      xmlns="http://www.w3.org/2000/svg">
                      <g clip-path="url(#clip0_282_2074)">
                        <path
                          d="M14.61 1.67773H17.1401L11.6125 7.99535L18.1152 16.5922H13.0237L9.03576 11.3783L4.47269 16.5922H1.94106L7.85331 9.83481L1.61523 1.67773H6.83607L10.4408 6.44348L14.61 1.67773ZM13.722 15.0778H15.1239L6.07428 3.11258H4.56983L13.722 15.0778Z"
                          fill="#014828" />
                      </g>
                      <defs>
                        <clipPath id="clip0_282_2074">
                          <rect width="18" height="18" fill="white" transform="translate(0.865234 0.25)" />
                        </clipPath>
                      </defs>
                    </svg></a>
                </li>
                <li>
                  <a href="<?= $header_footer_data[1]['meta_data']['footer_youtube'] ?? "" ?>" aria-label="YouTube"><svg
                      width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <g clip-path="url(#clip0_282_2075)">
                        <path
                          d="M22.4163 5.79873C22.2891 5.32006 22.0384 4.88319 21.6893 4.53185C21.3402 4.1805 20.9049 3.92701 20.4271 3.79674C18.668 3.32373 11.6367 3.32373 11.6367 3.32373C11.6367 3.32373 4.60547 3.32373 2.84638 3.79674C2.36853 3.92701 1.93327 4.1805 1.58418 4.53185C1.23508 4.88319 0.98438 5.32006 0.857173 5.79873C0.386719 7.56549 0.386719 11.2499 0.386719 11.2499C0.386719 11.2499 0.386719 14.9342 0.857173 16.701C0.98438 17.1797 1.23508 17.6165 1.58418 17.9679C1.93327 18.3192 2.36853 18.5727 2.84638 18.703C4.60547 19.176 11.6367 19.176 11.6367 19.176C11.6367 19.176 18.668 19.176 20.4271 18.703C20.9049 18.5727 21.3402 18.3192 21.6893 17.9679C22.0384 17.6165 22.2891 17.1797 22.4163 16.701C22.8867 14.9342 22.8867 11.2499 22.8867 11.2499C22.8867 11.2499 22.8867 7.56549 22.4163 5.79873Z"
                          fill="#014828" />
                        <path d="M9.33594 14.5955V7.9043L15.2166 11.2499L9.33594 14.5955Z" fill="white" />
                      </g>
                      <defs>
                        <clipPath id="clip0_282_2075">
                          <rect width="22.5" height="22.5" fill="white" transform="translate(0.365234)" />
                        </clipPath>
                      </defs>
                    </svg></a>
                </li>
              </ul>
            </div>
            <div class="block sm:hidden my-5 flex items-center justify-center gap-4">
              <h5 class="font-semibold text-black text-lg">Follow us on :</h5>
              <ul class="flex items-center gap-4">
                <li>
                  <a href="<?= $header_footer_data[1]['meta_data']['footer_facebook'] ?? "" ?>" aria-label="Facebook">
                    <svg width="10" height="18" viewBox="0 0 10 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path
                        d="M2.83154 17.7723V9.77957H0.128906V6.66463H2.83154V4.36746C2.83154 1.70161 4.46757 0.25 6.85711 0.25C8.00172 0.25 8.98546 0.334812 9.27214 0.37272V3.15869L7.61487 3.15944C6.31531 3.15944 6.06368 3.77403 6.06368 4.67589V6.66463H9.16302L8.75947 9.77957H6.06367V17.7723H2.83154Z"
                        fill="#014828" />
                    </svg>
                  </a>
                </li>
                <li>
                  <a href="<?= $header_footer_data[1]['meta_data']['footer_instagram'] ?? "" ?>">
                    <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path
                        d="M10.5678 2.50677C13.1834 2.50677 13.4932 2.51652 14.5265 2.56341C15.1477 2.57098 15.7631 2.68451 16.3458 2.89908C16.7683 3.06126 17.1521 3.30971 17.4723 3.62843C17.7926 3.94715 18.0422 4.32908 18.2052 4.74963C18.4208 5.32955 18.5349 5.94197 18.5425 6.56026C18.5891 7.5886 18.5994 7.89687 18.5994 10.5C18.5994 13.1031 18.5896 13.4114 18.5425 14.4397C18.5349 15.058 18.4208 15.6705 18.2052 16.2504C18.0422 16.6709 17.7926 17.0528 17.4723 17.3716C17.1521 17.6903 16.7683 17.9387 16.3458 18.1009C15.7631 18.3155 15.1477 18.429 14.5265 18.4366C13.4936 18.483 13.1839 18.4932 10.5678 18.4932C7.95172 18.4932 7.64197 18.4835 6.60916 18.4366C5.9879 18.429 5.37254 18.3155 4.78984 18.1009C4.36728 17.9387 3.98352 17.6903 3.66327 17.3716C3.34302 17.0528 3.09337 16.6709 2.93041 16.2504C2.71481 15.6705 2.60074 15.058 2.59313 14.4397C2.54649 13.4114 2.53622 13.1031 2.53622 10.5C2.53622 7.89687 2.54602 7.5886 2.59313 6.56026C2.60074 5.94197 2.71481 5.32955 2.93041 4.74963C3.09337 4.32908 3.34302 3.94715 3.66327 3.62843C3.98352 3.30971 4.36728 3.06126 4.78984 2.89908C5.37254 2.68451 5.9879 2.57098 6.60916 2.56341C7.64244 2.51699 7.95219 2.50677 10.5678 2.50677ZM10.5678 0.75C7.90881 0.75 7.57386 0.761142 6.52892 0.808497C5.71585 0.824592 4.91141 0.977805 4.14982 1.26162C3.49649 1.50659 2.90475 1.89049 2.41587 2.38653C1.917 2.87325 1.53093 3.46251 1.28463 4.11313C0.99945 4.87108 0.845502 5.67168 0.829329 6.48087C0.78268 7.51989 0.771484 7.85323 0.771484 10.4995C0.771484 13.1458 0.78268 13.4792 0.830262 14.5191C0.846435 15.3283 1.00038 16.1289 1.28556 16.8869C1.53159 17.5374 1.91734 18.1267 2.41587 18.6135C2.90502 19.1096 3.49709 19.4935 4.15075 19.7384C4.91234 20.0222 5.71678 20.1754 6.52986 20.1915C7.5748 20.2379 7.90834 20.25 10.5687 20.25C13.2291 20.25 13.5627 20.2389 14.6076 20.1915C15.4207 20.1754 16.2251 20.0222 16.9867 19.7384C17.6373 19.4874 18.2281 19.1041 18.7213 18.6129C19.2145 18.1218 19.5992 17.5336 19.851 16.8859C20.1362 16.128 20.2901 15.3274 20.3063 14.5182C20.3529 13.4792 20.3641 13.1458 20.3641 10.4995C20.3641 7.85323 20.3529 7.51989 20.3054 6.47994C20.2892 5.67075 20.1352 4.87015 19.8501 4.1122C19.604 3.46166 19.2183 2.87241 18.7197 2.3856C18.2306 1.88945 17.6385 1.50555 16.9849 1.26069C16.2233 0.976876 15.4188 0.823664 14.6058 0.807569C13.5618 0.761142 13.2268 0.75 10.5678 0.75Z"
                        fill="#014828" />
                      <path
                        d="M10.5658 5.49316C9.57084 5.49316 8.59821 5.7868 7.77093 6.33693C6.94364 6.88707 6.29885 7.66899 5.91809 8.58383C5.53734 9.49867 5.43771 10.5053 5.63182 11.4765C5.82593 12.4477 6.30505 13.3398 7.0086 14.04C7.71215 14.7402 8.60852 15.217 9.58437 15.4102C10.5602 15.6034 11.5717 15.5042 12.4909 15.1253C13.4102 14.7464 14.1959 14.1046 14.7486 13.2813C15.3014 12.458 15.5964 11.49 15.5964 10.4998C15.5964 9.17195 15.0664 7.89849 14.123 6.95957C13.1796 6.02065 11.9 5.49316 10.5658 5.49316ZM10.5658 13.7496C9.91996 13.7496 9.28862 13.559 8.75162 13.2019C8.21462 12.8448 7.79608 12.3373 7.54893 11.7434C7.30178 11.1496 7.23711 10.4962 7.36311 9.86577C7.4891 9.23536 7.80011 8.65629 8.25679 8.2018C8.71347 7.7473 9.29531 7.43778 9.92875 7.31238C10.5622 7.18699 11.2188 7.25134 11.8154 7.49732C12.4121 7.74329 12.9221 8.15983 13.2809 8.69427C13.6397 9.2287 13.8312 9.85702 13.8312 10.4998C13.8312 11.3617 13.4872 12.1883 12.8748 12.7978C12.2624 13.4072 11.4319 13.7496 10.5658 13.7496Z"
                        fill="#014828" />
                      <path
                        d="M15.7967 6.46489C16.4459 6.46489 16.9722 5.94109 16.9722 5.29494C16.9722 4.6488 16.4459 4.125 15.7967 4.125C15.1474 4.125 14.6211 4.6488 14.6211 5.29494C14.6211 5.94109 15.1474 6.46489 15.7967 6.46489Z"
                        fill="#014828" />
                    </svg>
                  </a>
                </li>
                <li>
                  <a href="/">
                    <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <g clip-path="url(#clip0_282_2074)">
                        <path
                          d="M14.61 1.67773H17.1401L11.6125 7.99535L18.1152 16.5922H13.0237L9.03576 11.3783L4.47269 16.5922H1.94106L7.85331 9.83481L1.61523 1.67773H6.83607L10.4408 6.44348L14.61 1.67773ZM13.722 15.0778H15.1239L6.07428 3.11258H4.56983L13.722 15.0778Z"
                          fill="#014828" />
                      </g>
                      <defs>
                        <clipPath id="clip0_282_2074">
                          <rect width="18" height="18" fill="white" transform="translate(0.865234 0.25)" />
                        </clipPath>
                      </defs>
                    </svg>
                  </a>
                </li>
                <li>
                  <a href="<?= $header_footer_data[1]['meta_data']['footer_youtube'] ?? "" ?>">
                    <svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <g clip-path="url(#clip0_282_2075)">
                        <path
                          d="M22.4163 5.79873C22.2891 5.32006 22.0384 4.88319 21.6893 4.53185C21.3402 4.1805 20.9049 3.92701 20.4271 3.79674C18.668 3.32373 11.6367 3.32373 11.6367 3.32373C11.6367 3.32373 4.60547 3.32373 2.84638 3.79674C2.36853 3.92701 1.93327 4.1805 1.58418 4.53185C1.23508 4.88319 0.98438 5.32006 0.857173 5.79873C0.386719 7.56549 0.386719 11.2499 0.386719 11.2499C0.386719 11.2499 0.386719 14.9342 0.857173 16.701C0.98438 17.1797 1.23508 17.6165 1.58418 17.9679C1.93327 18.3192 2.36853 18.5727 2.84638 18.703C4.60547 19.176 11.6367 19.176 11.6367 19.176C11.6367 19.176 18.668 19.176 20.4271 18.703C20.9049 18.5727 21.3402 18.3192 21.6893 17.9679C22.0384 17.6165 22.2891 17.1797 22.4163 16.701C22.8867 14.9342 22.8867 11.2499 22.8867 11.2499C22.8867 11.2499 22.8867 7.56549 22.4163 5.79873Z"
                          fill="#014828" />
                        <path d="M9.33594 14.5955V7.9043L15.2166 11.2499L9.33594 14.5955Z" fill="white" />
                      </g>
                      <defs>
                        <clipPath id="clip0_282_2075">
                          <rect width="22.5" height="22.5" fill="white" transform="translate(0.365234)" />
                        </clipPath>
                      </defs>
                    </svg>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
      <!--==== END ====-->
  </div>

  </div>
  <div>
    <a id="scroll" style="display: block;"><span></span></a>
  </div>
  <script>
    const openModalBtn = document.getElementById('openModalBtn');
    const closeModalBtn = document.getElementById('closeModalBtn');
    const videoModal = document.getElementById('videoModal');
    const videoIframe = document.getElementById('videoIframe');

    openModalBtn.addEventListener('click', () => {
      videoModal.classList.remove('hidden');
      videoIframe.src += ''; // Reload video to autoplay
    });

    closeModalBtn.addEventListener('click', () => {
      videoModal.classList.add('hidden');
      videoIframe.src = videoIframe.src; // Reset to stop the video
    });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
  <script>
    const swiper2 = new Swiper('.carousel2', {
      loop: true,
      spaceBetween: 20,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".swiper-pagination",
        dynamicBullets: true,
      },
      breakpoints: {
        320: {
          slidesPerView: 1
        },
        768: {
          slidesPerView: 2
        },
        1024: {
          slidesPerView: 4
        },
        1220: {
          slidesPerView: 4
        },
        1320: {
          slidesPerView: 5
        }
      }
    });
    const swiper3 = new Swiper('.carousel3', {
      loop: true,
      spaceBetween: 15,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      breakpoints: {
        320: {
          slidesPerView: 1
        },
        768: {
          slidesPerView: 2
        },
        1024: {
          slidesPerView: 4
        }
      }
    });
    const swiper4 = new Swiper('.carousel4', {
      loop: true,
      spaceBetween: 20,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      breakpoints: {
        320: {
          slidesPerView: 1
        },
        768: {
          slidesPerView: 1
        },
        1024: {
          slidesPerView: 1
        }
      }
    });


    const ourToppers = new Swiper('.our-toppers', {
      loop: true,
      spaceBetween: 15,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      breakpoints: {
        320: {
          slidesPerView: 1
        },
        768: {
          slidesPerView: 2
        },
        1024: {
          slidesPerView: 4
        },
        1220: {
          slidesPerView: 4
        },
        1320: {
          slidesPerView: 5
        }
      }
    });
  </script>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      window.addEventListener("scroll", function () {
        if (window.scrollY > 100) {
          document.getElementById("scroll").style.display = "block";
        } else {
          document.getElementById("scroll").style.display = "none";
        }
      });

      document.getElementById("scroll").addEventListener("click", function () {
        setTimeout(function () {
          window.scrollTo({
            top: 0,
            behavior: "smooth"
          });
        }, 500); // 500ms delay
      });
    });
  </script>

  <script>
    var swiper = new Swiper(".carousel4", {
      loop: true,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      }
    });
  </script>
 <script>
  (function() {
    function getParam(name) {
        const urlParams = new URLSearchParams(window.location.search);
        return urlParams.get(name);
    }
    var source = getParam("utm_source") || document.referrer || "";
    console.log("Initial Source:", source);
    if (!source) {
        // Case 1: Direct visit
        source = "Landing Page";
    } else if (source.includes("google.")) {
        source = "Google-Ads by Agency";
        console.log("Referrer is Google, setting source to 'Google-Ads by Agency'");
    } else if (source.includes("facebook.")) {
        source = "Facebook by Agency";
    } else if (source.includes("instagram.")) {
        source = "Instagram by Agency";
    } 
    if (!sessionStorage.getItem("leadSource")) {
        sessionStorage.setItem("leadSource", source);
    }
    var finalSource = sessionStorage.getItem("leadSource");
    var sourceInput = document.getElementById("source");
    if (sourceInput) {
        sourceInput.value = finalSource;
    }
    console.log("Captured Source:", finalSource);
})();

// Validation regex patterns
const nameRegex = /^[A-Za-z\s]+$/;
const mobileRegex = /^[6-9]\d{9}$/;
const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
const pincodeRegex = /^[1-9][0-9]{5}$/;

// Error elements
const studentError = document.getElementById("student-error");
const parentError = document.getElementById("parent-error");
const mobileError = document.getElementById("mobile-error");
const emailError = document.getElementById("email-error");
const pincodeError = document.getElementById("pincode-error");
const hostelError = document.getElementById("ehostel-error");
const hostelSelect = document.getElementById("ehostel_facility");
const gradeSelect = document.getElementById("egrade");
const gradeError = document.getElementById("classError");

function normalizeGradeLabel(label) {
    return String(label || "").trim().toUpperCase().replace(/[.\s]/g, "");
}

function gradeToClassNumber(label) {
    const g = normalizeGradeLabel(label);
    if (g === "PG") return 0;
    if (/^\d+$/.test(g)) return Number(g);
    const romanMap = {
        I: 1, II: 2, III: 3, IV: 4, V: 5, VI: 6,
        VII: 7, VIII: 8, IX: 9, X: 10, XI: 11, XII: 12
    };
    return romanMap[g] ?? null;
}

// Build masterGradeOptions from current DOM and deduplicate
let masterGradeOptions = Array.from(gradeSelect?.options || [])
    .map(o => ({ value: o.value, label: (o.textContent || "").trim() }))
    .filter(o => o.value && o.label);

// Deduplicate masterGradeOptions using normalized labels
const seen = new Set();
masterGradeOptions = masterGradeOptions.filter(opt => {
    const norm = normalizeGradeLabel(opt.label);
    if (seen.has(norm)) return false;
    seen.add(norm);
    return true;
});

function setGradeOptions(options) {
    if (!gradeSelect) return;
    gradeSelect.innerHTML = "";

    const placeholder = document.createElement("option");
    placeholder.value = "";
    placeholder.disabled = true;
    placeholder.selected = true;
    placeholder.textContent = "Select Grade";
    gradeSelect.appendChild(placeholder);

    if (!Array.isArray(options) || options.length === 0) {
        const emptyOpt = document.createElement("option");
        emptyOpt.value = "";
        emptyOpt.textContent = "No classes available";
        gradeSelect.appendChild(emptyOpt);
        return;
    }

    options.forEach(opt => {
        const o = document.createElement("option");
        o.value = opt.value;
        o.textContent = opt.label;
        gradeSelect.appendChild(o);
    });
}

function syncGradesWithHostelSelection() {
    if (!gradeSelect) return;
    const hostelFacility = hostelSelect ? hostelSelect.value : "";

    if (!hostelFacility) {
        gradeSelect.disabled = true;
        gradeSelect.innerHTML = "";
        const placeholder = document.createElement("option");
        placeholder.value = "";
        placeholder.disabled = true;
        placeholder.selected = true;
        placeholder.textContent = "Select Hostel Facility first";
        gradeSelect.appendChild(placeholder);
        return;
    }

    // Define allowed grade sets (normalized)
    const allowedYes = new Set(["VI", "VII", "VIII", "IX", "X", "XI", "XII"]);
    const allowedNo = new Set([
        "PG", "NURSERY", "PREP",
        "I", "II", "III", "IV", "V",
        "VI", "VII", "VIII", "IX", "X", "XI", "XII"
    ]);

    const allowedSet = hostelFacility === "YES" ? allowedYes : allowedNo;

    // Filter masterGradeOptions (original labels) using normalized comparison
    const filtered = masterGradeOptions.filter(opt => {
        const norm = normalizeGradeLabel(opt.label);
        return allowedSet.has(norm);
    });

    gradeSelect.disabled = false;
    setGradeOptions(filtered);
}

hostelSelect?.addEventListener("change", function() {
    hostelError?.classList.add("hidden");
    gradeError?.classList.add("hidden");
    syncGradesWithHostelSelection();
});

syncGradesWithHostelSelection();

document.getElementById("estudent_name").addEventListener("input", function() {
    studentError.classList.toggle("hidden", !this.value || nameRegex.test(this.value));
});

document.getElementById("eparent_name").addEventListener("input", function() {
    parentError.classList.toggle("hidden", !this.value || nameRegex.test(this.value));
});

document.getElementById("emobile").addEventListener("input", function() {
    this.value = this.value.replace(/\D/g, '').slice(0, 10);
    mobileError.classList.toggle("hidden", !this.value || mobileRegex.test(this.value));
});

document.getElementById("eemail").addEventListener("input", function() {
    this.value = this.value.toLowerCase();
    emailError.classList.toggle("hidden", !this.value || emailRegex.test(this.value));
});

document.getElementById("epincode").addEventListener("input", function() {
    this.value = this.value.replace(/\D/g, '').slice(0, 6);
    pincodeError.classList.toggle("hidden", !this.value || pincodeRegex.test(this.value));
});

// Submit Validation
document.getElementById("enquiryForm").addEventListener("submit", function(e) {
    e.preventDefault();

    // Inputs
    const hostelFacility = hostelSelect ? hostelSelect.value : "";
    const egrade = gradeSelect ? gradeSelect.value.trim() : "";
    const estudent_name = document.getElementById("estudent_name").value.trim();
    const eparent_name = document.getElementById("eparent_name").value.trim();
    const emobile = document.getElementById("emobile").value.trim();
    const eemail = document.getElementById("eemail").value.trim();
    const ecity = document.getElementById("ecity").value.trim();
    const epincode = document.getElementById("epincode").value.trim();
    const source = sessionStorage.getItem("leadSource") || "Landing Page";
    const esession = document.getElementById("esession").value.trim();

    let isValid = true;

    if (!hostelFacility) {
        hostelError?.classList.remove("hidden");
        isValid = false;
    } else {
        hostelError?.classList.add("hidden");
    }

    if (hostelFacility && !egrade) {
        gradeError?.classList.remove("hidden");
        isValid = false;
    } else {
        gradeError?.classList.add("hidden");
    }

    if (!nameRegex.test(estudent_name)) {
        studentError.textContent = "Only letters and spaces allowed.";
        isValid = false;
    }

    if (!nameRegex.test(eparent_name)) {
        parentError.textContent = "Only letters and spaces allowed.";
        isValid = false;
    }

    if (!mobileRegex.test(emobile)) {
        mobileError.classList.remove("hidden");
        isValid = false;
    }

    if (!emailRegex.test(eemail)) {
        emailError.classList.remove("hidden");
        isValid = false;
    }

    if (!pincodeRegex.test(epincode)) {
        pincodeError.classList.remove("hidden");
        isValid = false;
    }

    if (!isValid) return; // STOP submission if any field is invalid
    const submitBtn = document.getElementById("submitBtn");
    submitBtn.disabled = true;
    submitBtn.textContent = "Submitting...";

    // API Payload
    const payload = {
        session: esession,
        grade: egrade,
        name: estudent_name,
        parent_name: eparent_name,
        phone: emobile,
        email: eemail,
        city: ecity,
        pincode: epincode,
        source: source,
        source_type: "Landing_Page",
        enquiry_type: "Digital",
        message: `Hostel Facility: ${hostelFacility}. This Message From DPS Kalyanpur Landing Page`,
        subject: "Hostel Enquiry",
        hostel: hostelFacility === "YES" ? "1" : "0",
        branch_id: 9,
        school_id: 1,
        language_id: 1
    };

    fetch(`admission-proxy`, {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(payload)
    })
    .then(response => {
        if (!response.ok) throw new Error("Error: " + response.statusText);
        return response.json();
    })
    .then(data => {
        document.getElementById("esuccessPopup").classList.remove("hidden");
   
             window.location.href = "thankyou";
     
        document.getElementById("enquiryForm").reset();
        syncGradesWithHostelSelection();
    })
    .catch(error => {
        alert("There was an error submitting the form.");
        console.error("Error:", error);
    });
});
</script>


  <script>
    document.addEventListener("DOMContentLoaded", function () {
      // Find all custom selects
      document.querySelectorAll(".customSelect").forEach(wrapper => {
        const realSelect = wrapper.querySelector("select");
        const display = wrapper.querySelector(".selected-text");
        const dropdown = wrapper.querySelector("div.absolute");
        const searchInput = dropdown.querySelector("input");
        const optionsList = dropdown.querySelector("ul");

        // Load options into custom dropdown
        function loadOptions(filter = "") {
          optionsList.innerHTML = "";
          Array.from(realSelect.options).forEach(opt => {
            if (opt.value && opt.text.toLowerCase().includes(filter.toLowerCase())) {
              let li = document.createElement("li");
              li.textContent = opt.text;
              li.className = "p-2 hover:bg-gray-100 cursor-pointer";
              li.dataset.value = opt.value;
              optionsList.appendChild(li);
            }
          });
        }

        // Show dropdown
        display.parentElement.addEventListener("click", () => {
          dropdown.classList.toggle("hidden");
          searchInput.value = "";
          loadOptions();
          searchInput.focus();
        });

        // Filter on search
        searchInput.addEventListener("input", () => {
          loadOptions(searchInput.value);
        });

        // Select option
        optionsList.addEventListener("click", (e) => {
          if (e.target.tagName === "LI") {
            const value = e.target.dataset.value;
            const text = e.target.textContent;
            realSelect.value = value; // Set value in real select
            display.textContent = text;
            dropdown.classList.add("hidden");
          }
        });

        // Click outside to close
        document.addEventListener("click", (e) => {
          if (!wrapper.contains(e.target)) {
            dropdown.classList.add("hidden");
          }
        });
      });
    });
  </script>
  <script>
    var swiper = new Swiper(".carousel4", {
      loop: true,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      }
    });
  </script>
</body>

</html>