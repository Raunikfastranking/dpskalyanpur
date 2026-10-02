<?php
include "includes/apis.php";
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $view_tc_data['data']['title'] ?? "" ?></title>
    <meta name="description" content="<?= $view_tc_data['meta_description'] ?? "" ?>">
    <meta name="keywords" content="<?= $view_tc_data['meta_keywords'] ?? "" ?>">
    <?php include "includes/head.php" ?>
</head>

<body>

    <?php include "includes/header.php" ?>

    <div class="main relative ">
        <div class="bg-[url('assets/images/building.webp')] bg-top flex items-center text-center h-[300px]">
            <div>
                <h1
                    class="text-[32px] sm:hidden block font-[700] text-white text-left pl-4 mb-5 sm:mb-8 hr-line relative leading-9">
                    View TC
                </h1>
            </div>

            <div class="md:w-[100%]">
                <h2
                    class="sm:text-[32px] sm:block hidden font-[700] text-white text-left sm:mb-1 hr-line relative leading-9 ml-[7rem]">
                    View TC
                </h2>
            </div>
        </div>

        <div class="flex m-5" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="index" class="inline-flex items-center text-sm font-medium text-blue-main">
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
                        <p class="ms-1 text-sm font-medium text-blue-main">Admission
                        </p>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-blue-main mx-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4"></path>
                        </svg>
                        <p class="ms-1 text-sm font-medium text-blue-main">Transfer Certificate
                        </p>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-blue-main mx-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4"></path>
                        </svg>
                        <a href="view-tc" class="ms-1 text-sm font-medium text-blue-main">View TC</a>
                    </div>
                </li>
            </ol>
        </div>

        <div class=" mx-4 2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 px-4 mb-20">
            <div class="sm:mt-10 relative">


                <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md mt-10">
                    <form class=" block items-center gap-5" id="transfer-Form">
                        <!-- Admission No. -->
                        <div class="flex flex-col">
                            <label for="admissionNo" class="text-gray-700">Admission No.</label>
                            <input type="text" id="admissionNo" name="admissionNo" class="mt-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                required>
                            <span id="addmission-error" class="text-red-500 text-sm mt-1 block"></span>
                        </div>
                        <!-- Date of Birth -->
                        <div class="flex flex-col sm:mt-5 mt-3">
                            <label for="dob" class="text-gray-700">Date of Birth</label>
                            <input type="date" name="dob"
                                class="mt-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                required>
                            <p class="text-red-500 text-xs mt-1" id="dobError" style="display: none;">This Date
                                of Birth is required.</p>
                        </div>

                        <!-- Search Button -->
                        <div class="mt-6">
                            <button type="submit"
                                class="px-3 py-2 bg-blue-main text-white rounded-md  focus:outline-none focus:ring-2  w-full">
                                Search
                            </button>
                        </div>
                    </form>
                </div>
                <!-- Results Table -->
                <div id="resultContainer" class="mt-6 hidden">
                    <table class="min-w-full border border-gray-300">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-200">
                            <tr class="bg-gray-100">
                                <th class="px-6 py-4">Student Name</th>
                                <th class="px-6 py-4">Admission No.</th>
                                <th class="px-6 py-4">Class</th>
                                <th class="px-6 py-4">Parent Name</th>
                                <th class="px-6 py-4">DOB</th>
                                <th class="px-6 py-4">Download TC</th>
                            </tr>
                        </thead>
                        <tbody id="resultTableBody"></tbody>
                    </table>
                </div>

                <!-- No result message -->
                <p id="noResult" class="text-center text-red-500 mt-4 hidden">No data found.</p>

            </div>
        </div>



        <?php include "includes/footer.php" ?>
    </div>
    <?php include "includes/foot.php" ?>
    <script>
        document.getElementById('transfer-Form').addEventListener('submit', async function(e) {
            e.preventDefault();

            const admissionNo = document.getElementById('admissionNo').value.trim();
            const dob = document.querySelector('input[name="dob"]').value;

            // Clear old results
            document.getElementById('resultContainer').classList.add('hidden');
            document.getElementById('noResult').classList.add('hidden');
            document.getElementById('resultTableBody').innerHTML = '';

            try {
                const response = await fetch('proxy/tc-proxy?branch=9');
                if (!response.ok) {
                    throw new Error('TC lookup failed');
                }
                const resData = await response.json();
                const allData = (resData.data && resData.data.data) ? resData.data.data : [];

                // Filter by admissionNo and dob
                const matched = allData.find(item =>
                    item.admission_no === admissionNo && item.dob === dob
                );

                if (matched) {
                    const row = `
                <tr class="odd:bg-white even:bg-gray-200  text-gray-700 border-b  text-[16px] text-center">
                    <td class="px-6 py-2">${matched.student_name}</td>
                    <td class="px-6 py-2">${matched.admission_no}</td>
                    <td class="px-6 py-2">${matched.class}</td>
                    <td class="px-6 py-2">${matched.parent_name}</td>
                    <td class="px-6 py-2">${matched.dob}</td>
                    <td class="px-6 py-2">
                        <a href="${matched.url}" target="_blank" class="text-blue-600 underline">Download</a>
                    </td>
                </tr>
            `;
                    document.getElementById('resultTableBody').insertAdjacentHTML('beforeend', row);
                    document.getElementById('resultContainer').classList.remove('hidden');
                } else {
                    document.getElementById('noResult').classList.remove('hidden');
                }

            } catch (error) {
                console.error('Error fetching data:', error);
                document.getElementById('noResult').textContent = "Something went wrong. Please try again.";
                document.getElementById('noResult').classList.remove('hidden');
            }
        });
    </script>
</body>

</html>