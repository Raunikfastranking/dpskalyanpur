<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "includes/head.php" ?>
    <title>DPS Kalyanpur | Online Registration Form</title>
</head>

<body>

    <?php include "includes/header.php" ?>

    <div class="main relative">
        <div class="bg-[url('assets/images/building.webp')] bg-top flex items-center text-center h-[300px]">
            <div>
                <h1 class="text-[32px] sm:hidden block font-[700] text-white text-left pl-4 mb-5 sm:mb-8 hr-line relative leading-9">
                    Online Registration Form
                </h1>
            </div>

            <div class="md:w-[100%]">
                <h1 class="sm:text-[32px] sm:block hidden font-[700] text-white text-left sm:mb-1 hr-line relative leading-9 ml-[7rem]">
                    Online Registration Form
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
                        <p class="ms-1 text-sm font-medium text-blue-main">Admission
                        </p>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-blue-main mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"></path>
                        </svg>
                        <a href="online-registration-form.php" class="ms-1 text-sm font-medium text-blue-main">Online Registration Form</a>
                    </div>
                </li>
            </ol>
        </div>

        <div
            class="2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 mx-3 sm:py-10 py-0 sm:p-20 p-0">

            <div class="max-w-[1200px] mx-auto my-10 border p-6 bg-white shadow-md">
                <div class="bg-gray-700 text-white text-center py-3 text-xl font-semibold">
                    Registration Form
                </div>

                <!-- Top Row -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">
                    <div>
                        <label class="block font-semibold mb-1 text-sm">Session <span class="text-red-500">*</span></label>
                        <select class="w-full border px-3 py-2 rounded text-sm">
                            <option>2025-2026</option>
                        </select>
                    </div>
                    <div>
                        <label class="block font-semibold mb-1 text-sm">Class <span class="text-red-500">*</span></label>
                        <select class="w-full border px-3 py-2 rounded text-sm">
                            <option>Select Class</option>
                            <option value="" selected="selected">Select Class</option>
                            <!-- ngRepeat: cl in ClassList -->
                            <option ng-repeat="cl in ClassList" value="160000001" ng-disabled="!cl.IsActive" class="ng-binding ng-scope">P.G</option><!-- end ngRepeat: cl in ClassList -->
                            <option ng-repeat="cl in ClassList" value="160000002" ng-disabled="!cl.IsActive" class="ng-binding ng-scope">Nursery</option><!-- end ngRepeat: cl in ClassList -->
                            <option ng-repeat="cl in ClassList" value="160000003" ng-disabled="!cl.IsActive" class="ng-binding ng-scope">Prep</option><!-- end ngRepeat: cl in ClassList -->
                            <option ng-repeat="cl in ClassList" value="160000004" ng-disabled="!cl.IsActive" class="ng-binding ng-scope">I</option><!-- end ngRepeat: cl in ClassList -->
                            <option ng-repeat="cl in ClassList" value="160000005" ng-disabled="!cl.IsActive" class="ng-binding ng-scope">II</option><!-- end ngRepeat: cl in ClassList -->
                            <option ng-repeat="cl in ClassList" value="160000006" ng-disabled="!cl.IsActive" class="ng-binding ng-scope">III</option><!-- end ngRepeat: cl in ClassList -->
                            <option ng-repeat="cl in ClassList" value="160000007" ng-disabled="!cl.IsActive" class="ng-binding ng-scope">IV</option><!-- end ngRepeat: cl in ClassList -->
                            <option ng-repeat="cl in ClassList" value="160000008" ng-disabled="!cl.IsActive" class="ng-binding ng-scope">V</option><!-- end ngRepeat: cl in ClassList -->
                            <option ng-repeat="cl in ClassList" value="160000009" ng-disabled="!cl.IsActive" class="ng-binding ng-scope">VI</option><!-- end ngRepeat: cl in ClassList -->
                            <option ng-repeat="cl in ClassList" value="160000010" ng-disabled="!cl.IsActive" class="ng-binding ng-scope">VII</option><!-- end ngRepeat: cl in ClassList -->
                            <option ng-repeat="cl in ClassList" value="160000011" ng-disabled="!cl.IsActive" class="ng-binding ng-scope">VIII</option><!-- end ngRepeat: cl in ClassList -->
                            <option ng-repeat="cl in ClassList" value="160000012" ng-disabled="!cl.IsActive" class="ng-binding ng-scope">IX</option><!-- end ngRepeat: cl in ClassList -->
                            <option ng-repeat="cl in ClassList" value="160000013" ng-disabled="!cl.IsActive" class="ng-binding ng-scope">X</option><!-- end ngRepeat: cl in ClassList -->
                            <option ng-repeat="cl in ClassList" value="160000014" ng-disabled="!cl.IsActive" class="ng-binding ng-scope">XI</option><!-- end ngRepeat: cl in ClassList -->
                            <option ng-repeat="cl in ClassList" value="160000015" ng-disabled="!cl.IsActive" class="ng-binding ng-scope">XII</option><!-- end ngRepeat: cl in ClassList -->
                        </select>
                    </div>
                    <div>
                        <label class="block font-semibold mb-1 text-sm">Amount <span class="text-red-500">*</span></label>
                        <input type="text" class="w-full border px-3 py-2 rounded text-sm" placeholder="Enter Amount">
                    </div>
                </div>

                <!-- Section Title -->
                <h2 class="text-lg font-bold mt-8 mb-3">Student Details</h2>

                <!-- Name Fields -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block font-semibold mb-1 text-sm">First Name <span class="text-red-500">*</span></label>
                        <input type="text" class="w-full border px-3 py-2 rounded text-sm" placeholder="First Name">
                    </div>
                    <div>
                        <label class="block font-semibold mb-1 text-sm">Middle Name</label>
                        <input type="text" class="w-full border px-3 py-2 rounded text-sm" placeholder="Middle Name">
                    </div>
                    <div>
                        <label class="block font-semibold mb-1 text-sm">Last Name</label>
                        <input type="text" class="w-full border px-3 py-2 rounded text-sm" placeholder="Last Name">
                    </div>
                </div>

                <!-- Contact Fields -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
                    <div>
                        <label class="block font-semibold mb-1 text-sm">Parent Email <span class="text-red-500">*</span></label>
                        <input type="email" class="w-full border px-3 py-2 rounded text-sm" placeholder="Parent Email">
                    </div>
                    <div>
                        <label class="block font-semibold mb-1 text-sm">Father/Mother/Guardian Name <span class="text-red-500">*</span></label>
                        <input type="text" class="w-full border px-3 py-2 rounded text-sm" placeholder="Parent Name">
                    </div>
                    <div>
                        <label class="block font-semibold mb-1 text-sm">Parent Contact No. <span class="text-red-500">*</span></label>
                        <input type="text" class="w-full border px-3 py-2 rounded text-sm" placeholder="Parent Contact No.">
                    </div>
                </div>

                <!-- Address Fields -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
                    <div>
                        <label class="block font-semibold mb-1 text-sm">State <span class="text-red-500">*</span></label>
                        <select class="w-full border px-3 py-2 rounded text-sm">
                            <option>Uttar Pradesh</option>
                            <option value="">Select State</option>
                            <!-- ngRepeat: x in Statelist -->
                            <option ng-repeat="x in Statelist" value="1" class="ng-binding ng-scope">Andhra Pradesh</option><!-- end ngRepeat: x in Statelist -->
                            <option ng-repeat="x in Statelist" value="10" class="ng-binding ng-scope">Delhi</option><!-- end ngRepeat: x in Statelist -->
                            <option ng-repeat="x in Statelist" value="11" class="ng-binding ng-scope">Mizoram</option><!-- end ngRepeat: x in Statelist -->
                            <option ng-repeat="x in Statelist" value="12" class="ng-binding ng-scope">Gujarat</option><!-- end ngRepeat: x in Statelist -->
                            <option ng-repeat="x in Statelist" value="13" class="ng-binding ng-scope">Madhya Pradesh</option><!-- end ngRepeat: x in Statelist -->
                            <option ng-repeat="x in Statelist" value="14" class="ng-binding ng-scope">Maharashtra</option><!-- end ngRepeat: x in Statelist -->
                            <option ng-repeat="x in Statelist" value="15" class="ng-binding ng-scope">Manipur</option><!-- end ngRepeat: x in Statelist -->
                            <option ng-repeat="x in Statelist" value="16" class="ng-binding ng-scope">Meghalaya</option><!-- end ngRepeat: x in Statelist -->
                            <option ng-repeat="x in Statelist" value="17" class="ng-binding ng-scope">Karnataka</option><!-- end ngRepeat: x in Statelist -->
                            <option ng-repeat="x in Statelist" value="18" class="ng-binding ng-scope">Nagaland</option><!-- end ngRepeat: x in Statelist -->
                            <option ng-repeat="x in Statelist" value="19" class="ng-binding ng-scope">Odisha</option><!-- end ngRepeat: x in Statelist -->
                            <option ng-repeat="x in Statelist" value="2" class="ng-binding ng-scope">Arunachal Pradesh</option><!-- end ngRepeat: x in Statelist -->
                            <option ng-repeat="x in Statelist" value="20" class="ng-binding ng-scope">Punjab</option><!-- end ngRepeat: x in Statelist -->
                            <option ng-repeat="x in Statelist" value="21" class="ng-binding ng-scope">Lakshadweep</option><!-- end ngRepeat: x in Statelist -->
                            <option ng-repeat="x in Statelist" value="22" class="ng-binding ng-scope">Sikkim</option><!-- end ngRepeat: x in Statelist -->
                            <option ng-repeat="x in Statelist" value="23" class="ng-binding ng-scope">Tamil Nadu</option><!-- end ngRepeat: x in Statelist -->
                            <option ng-repeat="x in Statelist" value="24" class="ng-binding ng-scope">Telangana</option><!-- end ngRepeat: x in Statelist -->
                            <option ng-repeat="x in Statelist" value="25" class="ng-binding ng-scope">Tripura</option><!-- end ngRepeat: x in Statelist -->
                            <option ng-repeat="x in Statelist" value="28" class="ng-binding ng-scope">West Bengal</option><!-- end ngRepeat: x in Statelist -->
                            <option ng-repeat="x in Statelist" value="29" class="ng-binding ng-scope">Andaman and Nicobar Islands</option><!-- end ngRepeat: x in Statelist -->
                            <option ng-repeat="x in Statelist" value="3" class="ng-binding ng-scope">Chhattisgarh</option><!-- end ngRepeat: x in Statelist -->
                            <option ng-repeat="x in Statelist" value="30" class="ng-binding ng-scope">Chandigarh</option><!-- end ngRepeat: x in Statelist -->
                            <option ng-repeat="x in Statelist" value="31" class="ng-binding ng-scope">Jharkhand</option><!-- end ngRepeat: x in Statelist -->
                            <option ng-repeat="x in Statelist" value="32" class="ng-binding ng-scope">Jammu and Kashmir</option><!-- end ngRepeat: x in Statelist -->
                            <option ng-repeat="x in Statelist" value="33" class="ng-binding ng-scope">Rajasthan</option><!-- end ngRepeat: x in Statelist -->
                            <option ng-repeat="x in Statelist" value="34" class="ng-binding ng-scope">Puducherry</option><!-- end ngRepeat: x in Statelist -->
                            <option ng-repeat="x in Statelist" value="35" class="ng-binding ng-scope">Ladakh</option><!-- end ngRepeat: x in Statelist -->
                            <option ng-repeat="x in Statelist" value="38" class="ng-binding ng-scope" selected="selected">Uttar Pradesh</option><!-- end ngRepeat: x in Statelist -->
                            <option ng-repeat="x in Statelist" value="39" class="ng-binding ng-scope">Uttarakhand</option><!-- end ngRepeat: x in Statelist -->
                            <option ng-repeat="x in Statelist" value="4" class="ng-binding ng-scope">Assam</option><!-- end ngRepeat: x in Statelist -->
                            <option ng-repeat="x in Statelist" value="40" class="ng-binding ng-scope">Mizoram</option><!-- end ngRepeat: x in Statelist -->
                            <option ng-repeat="x in Statelist" value="41" class="ng-binding ng-scope">Chandigarh</option><!-- end ngRepeat: x in Statelist -->
                            <option ng-repeat="x in Statelist" value="5" class="ng-binding ng-scope">Bihar</option><!-- end ngRepeat: x in Statelist -->
                            <option ng-repeat="x in Statelist" value="6" class="ng-binding ng-scope">Goa</option><!-- end ngRepeat: x in Statelist -->
                            <option ng-repeat="x in Statelist" value="7" class="ng-binding ng-scope">Kerala</option><!-- end ngRepeat: x in Statelist -->
                            <option ng-repeat="x in Statelist" value="8" class="ng-binding ng-scope">Haryana</option><!-- end ngRepeat: x in Statelist -->
                            <option ng-repeat="x in Statelist" value="9" class="ng-binding ng-scope">Himachal Pradesh</option><!-- end ngRepeat: x in Statelist -->
                            <!-- Add more states as needed -->
                        </select>
                    </div>
                    <div>
                        <label class="block font-semibold mb-1 text-sm">City <span class="text-red-500">*</span></label>
                        <select class="w-full border px-3 py-2 rounded text-sm">
                            <option>Select City</option>
                            <option value="" selected="selected">Select City</option>
                            <!-- ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="4531" class="ng-binding ng-scope">Achhalda</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="4532" class="ng-binding ng-scope">Achhnera</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="4536" class="ng-binding ng-scope">Agra</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="4546" class="ng-binding ng-scope">Prayagraj</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="4575" class="ng-binding ng-scope">Ayodhya</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="4576" class="ng-binding ng-scope">Azamgarh</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="4587" class="ng-binding ng-scope">Budaun</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="4591" class="ng-binding ng-scope">Baheri</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="4603" class="ng-binding ng-scope">Banda</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="4609" class="ng-binding ng-scope">Barabanki</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="4612" class="ng-binding ng-scope">Bareilly</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="4739" class="ng-binding ng-scope">Fatehganj Pashchimi</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="4742" class="ng-binding ng-scope">Fatehpur</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="4759" class="ng-binding ng-scope">Ghaziabad</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="4788" class="ng-binding ng-scope">Handia</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="4799" class="ng-binding ng-scope">Hathras</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="4830" class="ng-binding ng-scope">Jhansi</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="4833" class="ng-binding ng-scope">Jhinjhak</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="4860" class="ng-binding ng-scope">Kannauj</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="4861" class="ng-binding ng-scope">Kanpur Nagar</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="4933" class="ng-binding ng-scope">Lucknow</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="4964" class="ng-binding ng-scope">Mau</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="4974" class="ng-binding ng-scope">Milak</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="4979" class="ng-binding ng-scope">Mirzapur</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="4986" class="ng-binding ng-scope">Moradabad</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="5022" class="ng-binding ng-scope">Noida</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="5029" class="ng-binding ng-scope">Orai</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="5068" class="ng-binding ng-scope">Raebareli</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="5073" class="ng-binding ng-scope">Rampur</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="5101" class="ng-binding ng-scope">Saharanpur</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="5207" class="ng-binding ng-scope">Unnao</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="5211" class="ng-binding ng-scope">Varanasi</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="5214" class="ng-binding ng-scope">Vrindavan</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="5255" class="ng-binding ng-scope">Aliganj</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="5256" class="ng-binding ng-scope">Aonla</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="5257" class="ng-binding ng-scope">Bisauli</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="5258" class="ng-binding ng-scope">Bilsi</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="5259" class="ng-binding ng-scope">Khutar</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="5260" class="ng-binding ng-scope">Powayan</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="5261" class="ng-binding ng-scope">Bisalpur</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="5262" class="ng-binding ng-scope">Puranpur</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="5263" class="ng-binding ng-scope">Bilsanda</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="5264" class="ng-binding ng-scope">Soron</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="5265" class="ng-binding ng-scope">Bilaspur</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="5266" class="ng-binding ng-scope">Mohammadi</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="633" class="ng-binding ng-scope">Aligarh</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="634" class="ng-binding ng-scope">Ambedkar Nagar</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="635" class="ng-binding ng-scope">Amethi</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="636" class="ng-binding ng-scope">Amroha</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="637" class="ng-binding ng-scope">Auraiya</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="640" class="ng-binding ng-scope">Baghpat</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="641" class="ng-binding ng-scope">Bahraich</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="642" class="ng-binding ng-scope">Ballia</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="643" class="ng-binding ng-scope">Balrampur</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="647" class="ng-binding ng-scope">Basti</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="648" class="ng-binding ng-scope">Bhadohi</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="649" class="ng-binding ng-scope">Bijnor</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="651" class="ng-binding ng-scope">Bulandshahr</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="652" class="ng-binding ng-scope">Chandauli</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="653" class="ng-binding ng-scope">Chitrakoot</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="654" class="ng-binding ng-scope">Deoria</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="655" class="ng-binding ng-scope">Etah</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="656" class="ng-binding ng-scope">Etawah</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="657" class="ng-binding ng-scope">Farrukhabad</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="659" class="ng-binding ng-scope">Firozabad</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="660" class="ng-binding ng-scope">Gautam Buddha Nagar</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="662" class="ng-binding ng-scope">Ghazipur</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="663" class="ng-binding ng-scope">Gonda</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="664" class="ng-binding ng-scope">Gorakhpur</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="665" class="ng-binding ng-scope">Hamirpur</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="666" class="ng-binding ng-scope">Hapur</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="667" class="ng-binding ng-scope">Hardoi</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="669" class="ng-binding ng-scope">Jalaun</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="670" class="ng-binding ng-scope">Jaunpur</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="673" class="ng-binding ng-scope">Kanpur Dehat</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="675" class="ng-binding ng-scope">Kasganj</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="676" class="ng-binding ng-scope">Kaushambi</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="677" class="ng-binding ng-scope">Kheri</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="678" class="ng-binding ng-scope">Kushinagar</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="679" class="ng-binding ng-scope">Lalitpur</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="681" class="ng-binding ng-scope">Maharajganj</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="682" class="ng-binding ng-scope">Mahoba</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="683" class="ng-binding ng-scope">Mainpuri</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="684" class="ng-binding ng-scope">Mathura</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="686" class="ng-binding ng-scope">Meerut</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="689" class="ng-binding ng-scope">Muzaffarnagar</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="690" class="ng-binding ng-scope">Pilibhit</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="691" class="ng-binding ng-scope">Pratapgarh</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="696" class="ng-binding ng-scope">Sambhal</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="697" class="ng-binding ng-scope">Sant Kabir Nagar</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="698" class="ng-binding ng-scope">Shahjahanpur</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="699" class="ng-binding ng-scope">Shamli</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="700" class="ng-binding ng-scope">Shravasti</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="701" class="ng-binding ng-scope">Siddharthnagar</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="702" class="ng-binding ng-scope">Sitapur</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="703" class="ng-binding ng-scope">Sonbhadra</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="704" class="ng-binding ng-scope">Sultanpur</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="705" class="ng-binding ng-scope">Lakhimpur Kheri</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="711" class="ng-binding ng-scope">Tilhar</option><!-- end ngRepeat: x in Citylist -->
                            <option ng-repeat="x in Citylist" value="889" class="ng-binding ng-scope">Faizabad</option><!-- end ngRepeat: x in Citylist -->
                        </select>
                    </div>
                    <div>
                        <label class="block font-semibold mb-1 text-sm">Pin Code</label>
                        <input type="text" class="w-full border px-3 py-2 rounded text-sm" placeholder="Enter Your Pin Code">
                    </div>
                </div>

                <!-- Address Field Full Width -->
                <div class="mt-4">
                    <label class="block font-semibold mb-1 text-sm">Address <span class="text-red-500">*</span></label>
                    <textarea rows="3" class="w-full border px-3 py-2 rounded text-sm" placeholder="Enter Your Address"></textarea>
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