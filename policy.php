
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "includes/head.php" ?>
    <title>DPS Kalyanpur | Policy</title>
</head>

<body>

    <?php include "includes/header.php" ?>

    <div class="main relative">
        <div class="bg-[url('assets/images/building.webp')] bg-top flex items-center text-center h-[300px]">
            <div>
                <h1 class="text-[32px] sm:hidden block font-[700] text-white text-left pl-4 mb-5 sm:mb-8 hr-line relative leading-9">
                   Policy
                </h1>
            </div>

            <div class="md:w-[100%]">
                <h1 class="sm:text-[32px] sm:block hidden font-[700] text-white text-left sm:mb-1 hr-line relative leading-9 ml-[7rem]">
                   Policy
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
                        <a href="policy.php" class="ms-1 text-sm font-medium text-blue-main">Policy</a>
                    </div>
                </li>
            </ol>
        </div>

        <div
            class="2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 mx-3 sm:py-10 py-0 sm:p-20 p-0">
                 <div class="border border-gray-500  rounded-md p-5">
                <div class="">
                    <div style="margin: auto">
                        <form class="p-0 ng-pristine ng-valid ng-valid-maxlength" method="post">
                            <div class="contact-body p-0">
                                <div class=" p-0 level fill-height">
                                    <div class="col">
                                        <div class="space xlarge"></div>
                                        <div class="padded">
                                            <h1 class="u-text-center u-font-alt ng-binding"></h1>
                                            <div class="divider"></div>
                                            <p class="u-text-center ng-binding"></p>
                                            <div class="divider"></div>
                                            <div class="w-full">
                                                <div class="w-full">
                                                    <div class="w-full flex gap-6">               
                                                    <div class="w-[50%]">
                                                        <label  class="text-blue-main font-[500]">Select Session</label>
                                                        <div class="w-full flex border border-gray-500 bg-gray-50 mb-4 rounded-md p-1 rounded-md">
                                                            <label class="form-group-label">
                                                                <span class="icon">
                                                              
                                                                </span>
                                                            </label>
                                                            <select id="ddlSession" class="py-1 px-2 bg-gray-50 w-full" ng-model="ddlSession" ng-init="GetSession()">
                                                                <option value="">Select Session</option>
                                                                <!-- ngRepeat: sl in SessionList -->
                                                                <option ng-repeat="sl in SessionList" value="1" class="ng-binding ng-scope">2021-2022</option><!-- end ngRepeat: sl in SessionList -->
                                                                <option ng-repeat="sl in SessionList" value="2" class="ng-binding ng-scope">2022-2023</option><!-- end ngRepeat: sl in SessionList -->
                                                                <option ng-repeat="sl in SessionList" value="3" class="ng-binding ng-scope">2023-2024</option><!-- end ngRepeat: sl in SessionList -->
                                                                <option ng-repeat="sl in SessionList" value="4" class="ng-binding ng-scope">2024-2025</option><!-- end ngRepeat: sl in SessionList -->
                                                                <option ng-repeat="sl in SessionList" value="6" class="ng-binding ng-scope" selected="selected">2025-2026</option><!-- end ngRepeat: sl in SessionList -->
                                                            </select>
                                                        </div>
                                                        <label class="text-blue-main font-[500]">Select Class</label>
                                                        <div class="w-full flex items-center border border-gray-500 bg-gray-50 mb-4 p-1 rounded-md">
                                                           
                                                                <span class="icon">
                                                                    <i class="icon-hospital"></i>
                                                                </span>
                                                           
                                                            <select id="ddlClass" class="py-1 px-2 bg-gray-50 w-full" ng-model="ClassCode" ng-init="GetClasses()">
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
                                                        <label class="text-blue-main font-[500]">Father/Mother/Guardian Name:</label>
                                                        <div class="w-full flex border border-gray-500 bg-gray-50 mb-4 rounded-md p-1 rounded-md">
                                                            <label class="form-group-label">
                                                                <span class="icon">
                                                                    <i class="icon-edit"></i>
                                                                </span>
                                                            </label>
                                                            <input type="text" class="py-1 px-2 bg-gray-50" placeholder="Enter Your Guardian Name" ng-model="Name">
                                                        </div>
                                                        <label class="text-blue-main font-[500]">Email</label>
                                                        <div class="w-full flex border border-gray-500 bg-gray-50 mb-4 rounded-md p-1 rounded-md">
                                                            <label class="form-group-label">
                                                                <span class="icon">
                                                                    <i class="icon-envelope"></i>
                                                                </span>
                                                            </label>
                                                            <input id="txtEmail" type="text" class="py-1 px-2 bg-gray-50" placeholder="Enter your mail" ng-model="Email" ng-blur="validateEmail('#txtEmail')">
                                                        </div>
                                                    </div>
                                                    <div class="w-full md:w-[50%]">
                                                        <label  class="text-blue-main font-[500]">Country</label>
                                                        <div class="w-full flex border border-gray-500 bg-gray-50 mb-4 rounded-md p-1 rounded-md">
                                                            <label class="form-group-label">
                                                                <span class="icon">
                                                                    <i class="icon-map-marker"></i>
                                                                </span>
                                                            </label>
                                                            <select id="ddlCountry" class="py-1 px-2 bg-gray-50 w-full" ng-model="CountryCode" ng-init="GetCountry();" ng-change="GetState(CountryCode)">
                                                                <option value="">Select Country</option>
                                                                <!-- ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="1" class="ng-binding ng-scope">Afghanistan</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="10" class="ng-binding ng-scope">Argentina</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="100" class="ng-binding ng-scope">Iceland</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="101" class="ng-binding ng-scope" selected="selected">India</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="102" class="ng-binding ng-scope">Indonesia</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="103" class="ng-binding ng-scope">Iran</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="104" class="ng-binding ng-scope">Iraq</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="105" class="ng-binding ng-scope">Ireland</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="106" class="ng-binding ng-scope">Israel</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="107" class="ng-binding ng-scope">Italy</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="108" class="ng-binding ng-scope">Jamaica</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="109" class="ng-binding ng-scope">Japan</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="11" class="ng-binding ng-scope">Armenia</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="110" class="ng-binding ng-scope">Jersey</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="111" class="ng-binding ng-scope">Jordan</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="112" class="ng-binding ng-scope">Kazakhstan</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="113" class="ng-binding ng-scope">Kenya</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="114" class="ng-binding ng-scope">Kiribati</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="115" class="ng-binding ng-scope">Korea North</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="116" class="ng-binding ng-scope">Korea South</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="117" class="ng-binding ng-scope">Kuwait</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="118" class="ng-binding ng-scope">Kyrgyzstan</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="119" class="ng-binding ng-scope">Laos</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="12" class="ng-binding ng-scope">Aruba</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="120" class="ng-binding ng-scope">Latvia</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="121" class="ng-binding ng-scope">Lebanon</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="122" class="ng-binding ng-scope">Lesotho</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="123" class="ng-binding ng-scope">Liberia</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="124" class="ng-binding ng-scope">Libya</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="125" class="ng-binding ng-scope">Liechtenstein</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="126" class="ng-binding ng-scope">Lithuania</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="127" class="ng-binding ng-scope">Luxembourg</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="128" class="ng-binding ng-scope">Macau S.A.R.</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="129" class="ng-binding ng-scope">Macedonia</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="13" class="ng-binding ng-scope">Australia</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="130" class="ng-binding ng-scope">Madagascar</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="131" class="ng-binding ng-scope">Malawi</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="132" class="ng-binding ng-scope">Malaysia</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="133" class="ng-binding ng-scope">Maldives</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="134" class="ng-binding ng-scope">Mali</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="135" class="ng-binding ng-scope">Malta</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="136" class="ng-binding ng-scope">Man (Isle of)</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="137" class="ng-binding ng-scope">Marshall Islands</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="138" class="ng-binding ng-scope">Martinique</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="139" class="ng-binding ng-scope">Mauritania</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="14" class="ng-binding ng-scope">Austria</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="140" class="ng-binding ng-scope">Mauritius</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="141" class="ng-binding ng-scope">Mayotte</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="142" class="ng-binding ng-scope">Mexico</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="143" class="ng-binding ng-scope">Micronesia</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="144" class="ng-binding ng-scope">Moldova</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="145" class="ng-binding ng-scope">Monaco</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="146" class="ng-binding ng-scope">Monlia</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="147" class="ng-binding ng-scope">Montserrat</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="148" class="ng-binding ng-scope">Morocco</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="149" class="ng-binding ng-scope">Mozambique</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="15" class="ng-binding ng-scope">Azerbaijan</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="150" class="ng-binding ng-scope">Myanmar</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="151" class="ng-binding ng-scope">Namibia</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="152" class="ng-binding ng-scope">Nauru</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="153" class="ng-binding ng-scope">Nepal</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="154" class="ng-binding ng-scope">Netherlands Antilles</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="155" class="ng-binding ng-scope">Netherlands The</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="156" class="ng-binding ng-scope">New Caledonia</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="157" class="ng-binding ng-scope">New Zealand</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="158" class="ng-binding ng-scope">Nicaragua</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="159" class="ng-binding ng-scope">Niger</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="16" class="ng-binding ng-scope">Bahamas The</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="160" class="ng-binding ng-scope">Nigeria</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="161" class="ng-binding ng-scope">Niue</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="162" class="ng-binding ng-scope">Norfolk Island</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="163" class="ng-binding ng-scope">Northern Mariana Islands</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="164" class="ng-binding ng-scope">Norway</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="165" class="ng-binding ng-scope">Oman</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="166" class="ng-binding ng-scope">Pakistan</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="167" class="ng-binding ng-scope">Palau</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="168" class="ng-binding ng-scope">Palestinian Territory Occupied</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="169" class="ng-binding ng-scope">Panama</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="17" class="ng-binding ng-scope">Bahrain</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="170" class="ng-binding ng-scope">Papua new Guinea</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="171" class="ng-binding ng-scope">Paraguay</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="172" class="ng-binding ng-scope">Peru</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="173" class="ng-binding ng-scope">Philippines</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="174" class="ng-binding ng-scope">Pitcairn Island</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="175" class="ng-binding ng-scope">Poland</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="176" class="ng-binding ng-scope">Portugal</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="177" class="ng-binding ng-scope">Puerto Rico</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="178" class="ng-binding ng-scope">Qatar</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="179" class="ng-binding ng-scope">Reunion</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="18" class="ng-binding ng-scope">Bangladesh</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="180" class="ng-binding ng-scope">Romania</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="181" class="ng-binding ng-scope">Russia</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="182" class="ng-binding ng-scope">Rwanda</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="183" class="ng-binding ng-scope">Saint Helena</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="184" class="ng-binding ng-scope">Saint Kitts And Nevis</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="185" class="ng-binding ng-scope">Saint Lucia</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="186" class="ng-binding ng-scope">Saint Pierre and Miquelon</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="187" class="ng-binding ng-scope">Saint Vincent And The Grenadines</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="188" class="ng-binding ng-scope">Samoa</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="189" class="ng-binding ng-scope">San Marino</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="19" class="ng-binding ng-scope">Barbados</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="190" class="ng-binding ng-scope">Sao Tome and Principe</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="191" class="ng-binding ng-scope">Saudi Arabia</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="192" class="ng-binding ng-scope">Senegal</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="193" class="ng-binding ng-scope">Serbia</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="194" class="ng-binding ng-scope">Seychelles</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="195" class="ng-binding ng-scope">Sierra Leone</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="196" class="ng-binding ng-scope">Singapore</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="197" class="ng-binding ng-scope">Slovakia</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="198" class="ng-binding ng-scope">Slovenia</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="199" class="ng-binding ng-scope">Smaller Territories of the UK</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="2" class="ng-binding ng-scope">Albania</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="20" class="ng-binding ng-scope">Belarus</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="200" class="ng-binding ng-scope">Solomon Islands</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="201" class="ng-binding ng-scope">Somalia</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="202" class="ng-binding ng-scope">South Africa</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="203" class="ng-binding ng-scope">South Georgia</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="204" class="ng-binding ng-scope">South Sudan</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="205" class="ng-binding ng-scope">Spain</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="206" class="ng-binding ng-scope">Sri Lanka</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="207" class="ng-binding ng-scope">Sudan</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="208" class="ng-binding ng-scope">Suriname</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="209" class="ng-binding ng-scope">Svalbard And Jan Mayen Islands</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="21" class="ng-binding ng-scope">Belgium</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="210" class="ng-binding ng-scope">Swaziland</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="211" class="ng-binding ng-scope">Sweden</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="212" class="ng-binding ng-scope">Switzerland</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="213" class="ng-binding ng-scope">Syria</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="214" class="ng-binding ng-scope">Taiwan</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="215" class="ng-binding ng-scope">Tajikistan</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="216" class="ng-binding ng-scope">Tanzania</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="217" class="ng-binding ng-scope">Thailand</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="218" class="ng-binding ng-scope">Togo</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="219" class="ng-binding ng-scope">Tokelau</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="22" class="ng-binding ng-scope">Belize</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="220" class="ng-binding ng-scope">Tonga</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="221" class="ng-binding ng-scope">Trinidad And Toba</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="222" class="ng-binding ng-scope">Tunisia</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="223" class="ng-binding ng-scope">Turkey</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="224" class="ng-binding ng-scope">Turkmenistan</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="225" class="ng-binding ng-scope">Turks And Caicos Islands</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="226" class="ng-binding ng-scope">Tuvalu</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="227" class="ng-binding ng-scope">Uganda</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="228" class="ng-binding ng-scope">Ukraine</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="229" class="ng-binding ng-scope">United Arab Emirates</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="23" class="ng-binding ng-scope">Benin</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="230" class="ng-binding ng-scope">United Kingdom</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="231" class="ng-binding ng-scope">United StateMaster</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="232" class="ng-binding ng-scope">United StateMaster Minor Outlying Islands</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="233" class="ng-binding ng-scope">Uruguay</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="234" class="ng-binding ng-scope">Uzbekistan</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="235" class="ng-binding ng-scope">Vanuatu</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="236" class="ng-binding ng-scope">Vatican City State (Holy See)</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="237" class="ng-binding ng-scope">Venezuela</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="238" class="ng-binding ng-scope">Vietnam</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="239" class="ng-binding ng-scope">Virgin Islands (British)</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="24" class="ng-binding ng-scope">Bermuda</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="240" class="ng-binding ng-scope">Virgin Islands (US)</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="241" class="ng-binding ng-scope">Wallis And Futuna Islands</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="242" class="ng-binding ng-scope">Western Sahara</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="243" class="ng-binding ng-scope">Yemen</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="244" class="ng-binding ng-scope">Yuslavia</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="245" class="ng-binding ng-scope">Zambia</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="246" class="ng-binding ng-scope">Zimbabwe</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="25" class="ng-binding ng-scope">Bhutan</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="26" class="ng-binding ng-scope">Bolivia</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="27" class="ng-binding ng-scope">Bosnia and Herzevina</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="28" class="ng-binding ng-scope">Botswana</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="29" class="ng-binding ng-scope">Bouvet Island</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="3" class="ng-binding ng-scope">Algeria</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="30" class="ng-binding ng-scope">Brazil</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="31" class="ng-binding ng-scope">British Indian Ocean Territory</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="32" class="ng-binding ng-scope">Brunei</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="33" class="ng-binding ng-scope">Bulgaria</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="34" class="ng-binding ng-scope">Burkina Faso</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="35" class="ng-binding ng-scope">Burundi</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="36" class="ng-binding ng-scope">Cambodia</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="37" class="ng-binding ng-scope">Cameroon</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="38" class="ng-binding ng-scope">Canada</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="39" class="ng-binding ng-scope">Cape Verde</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="4" class="ng-binding ng-scope">American Samoa</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="40" class="ng-binding ng-scope">Cayman Islands</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="41" class="ng-binding ng-scope">Central African Republic</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="42" class="ng-binding ng-scope">Chad</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="43" class="ng-binding ng-scope">Chile</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="44" class="ng-binding ng-scope">China</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="45" class="ng-binding ng-scope">Christmas Island</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="46" class="ng-binding ng-scope">Cocos (Keeling) Islands</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="47" class="ng-binding ng-scope">Colombia</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="48" class="ng-binding ng-scope">Comoros</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="49" class="ng-binding ng-scope">Republic Of The Con</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="5" class="ng-binding ng-scope">Andorra</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="50" class="ng-binding ng-scope">Democratic Republic Of The Con</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="51" class="ng-binding ng-scope">Cook Islands</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="52" class="ng-binding ng-scope">Costa Rica</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="53" class="ng-binding ng-scope">Cote D'Ivoire (Ivory Coast)</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="54" class="ng-binding ng-scope">Croatia (Hrvatska)</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="55" class="ng-binding ng-scope">Cuba</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="56" class="ng-binding ng-scope">Cyprus</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="57" class="ng-binding ng-scope">Czech Republic</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="58" class="ng-binding ng-scope">Denmark</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="59" class="ng-binding ng-scope">Djibouti</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="6" class="ng-binding ng-scope">Anla</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="60" class="ng-binding ng-scope">Dominica</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="61" class="ng-binding ng-scope">Dominican Republic</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="62" class="ng-binding ng-scope">East Timor</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="63" class="ng-binding ng-scope">Ecuador</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="64" class="ng-binding ng-scope">Egypt</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="65" class="ng-binding ng-scope">El Salvador</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="66" class="ng-binding ng-scope">Equatorial Guinea</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="67" class="ng-binding ng-scope">Eritrea</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="68" class="ng-binding ng-scope">Estonia</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="69" class="ng-binding ng-scope">Ethiopia</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="7" class="ng-binding ng-scope">Anguilla</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="70" class="ng-binding ng-scope">External Territories of Australia</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="71" class="ng-binding ng-scope">Falkland Islands</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="72" class="ng-binding ng-scope">Faroe Islands</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="73" class="ng-binding ng-scope">Fiji Islands</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="74" class="ng-binding ng-scope">Finland</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="75" class="ng-binding ng-scope">France</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="76" class="ng-binding ng-scope">French Guiana</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="77" class="ng-binding ng-scope">French Polynesia</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="78" class="ng-binding ng-scope">French Southern Territories</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="79" class="ng-binding ng-scope">Gabon</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="8" class="ng-binding ng-scope">Antarctica</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="80" class="ng-binding ng-scope">Gambia The</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="81" class="ng-binding ng-scope">Georgia</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="82" class="ng-binding ng-scope">Germany</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="83" class="ng-binding ng-scope">Ghana</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="84" class="ng-binding ng-scope">Gibraltar</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="85" class="ng-binding ng-scope">Greece</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="86" class="ng-binding ng-scope">Greenland</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="87" class="ng-binding ng-scope">Grenada</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="88" class="ng-binding ng-scope">Guadeloupe</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="89" class="ng-binding ng-scope">Guam</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="9" class="ng-binding ng-scope">Antigua And Barbuda</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="90" class="ng-binding ng-scope">Guatemala</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="91" class="ng-binding ng-scope">Guernsey and Alderney</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="92" class="ng-binding ng-scope">Guinea</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="93" class="ng-binding ng-scope">Guinea-Bissau</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="94" class="ng-binding ng-scope">Guyana</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="95" class="ng-binding ng-scope">Haiti</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="96" class="ng-binding ng-scope">Heard and McDonald Islands</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="97" class="ng-binding ng-scope">Honduras</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="98" class="ng-binding ng-scope">Hong Kong S.A.R.</option><!-- end ngRepeat: x in Countrylist -->
                                                                <option ng-repeat="x in Countrylist" value="99" class="ng-binding ng-scope">Hungary</option><!-- end ngRepeat: x in Countrylist -->
                                                            </select>



                                                        </div>
                                                        <label class="text-blue-main font-[500]">State</label>
                                                        <div class="w-full flex border border-gray-500 bg-gray-50 mb-4 rounded-md p-1 rounded-md">
                                                            <label class="form-group-label">
                                                                <span class="icon">
                                                                    <i class="icon-map-marker"></i>
                                                                </span>
                                                            </label>
                                                            <select id="ddlState" class="py-1 px-2 bg-gray-50 w-full" ng-model="StateCode" ng-change="GetCity(StateCode)">
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
                                                            </select>
                                                        </div>
                                                        <label class="text-blue-main font-[500]">City</label>
                                                        <div class="w-full flex border border-gray-500 bg-gray-50 mb-4 rounded-md p-1 rounded-md">
                                                            <label class="form-group-label">
                                                                <span class="icon">
                                                                    <i class="icon-map-marker"></i>
                                                                </span>
                                                            </label>

                                                            <select id="ddlCity" class="py-1 px-2 bg-gray-50 w-full" ng-model="CityCode" ng-change="ddl_CityChange()">
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
                                                        <label class="text-blue-main font-[500]">Mobile</label>
                                                        <div class="w-full flex border border-gray-500 bg-gray-50 mb-4 rounded-md p-1 rounded-md">
                                                            <label class="form-group-label">
                                                                <span class="icon">
                                                                    <i class="icon-phone-sign"></i>
                                                                </span>
                                                            </label>
                                                            <input id="txtContact" type="text" class="py-1 px-2 bg-gray-50" placeholder="Mobile number" ng-model="Contact" maxlength="10" ng-blur="validatePhoneNo('#txtContact','PN');">
                                                        </div>
                                                    </div>
                                                     </div>
                                                     <label class="text-blue-main font-[500]">Remark</label>
                                                    <div class="w-[49%] flex border border-gray-500 bg-gray-50 mb-4 rounded-md">
                                                        
                                                        <div class="p-1 ">
                                                            <label class="form-group-label" style="height: 100px;">
                                                                <span class="icon">
                                                                    <i class="icon-edit"></i>
                                                                </span>
                                                            </label>
                                                            <textarea class="py-1 px-2 bg-gray-50" placeholder="" ng-model="Remark" maxlength="250"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="btn-group">
                                                            <button class="bg-blue-main py-2 px-5 text-white cursor pointer rounded-md" id="btnSave" type="button" value="Save" name="saveButton" ng-model="Save" ng-click="SaveRecord()" ng-init="Save='Save'" ng-disabled="flag" disabled="disabled">
                                                                Submit
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-5">
                                                    <img src="">
                                                </div>
                                            </div>
                                            <div class="space"></div>
                                        </div>
                                        <div class="space xlarge"></div>
                                    </div>

                                </div>

                            </div>

                        </form>


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