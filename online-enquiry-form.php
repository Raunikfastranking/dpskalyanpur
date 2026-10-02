<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "includes/head.php" ?>
    <title>DPS Kalyanpur | Online Enquiry Form</title>
</head>

<body>

    <?php include "includes/header.php" ?>

    <div class="main relative">
        <div class="bg-[url('assets/images/building.webp')] bg-top flex items-center text-center h-[300px]">
            <div>
                <h1
                    class="text-[32px] sm:hidden block font-[700] text-white text-left pl-4 mb-5 sm:mb-8 hr-line relative leading-9">
                    Online Enquiry Form
                </h1>
            </div>

            <div class="md:w-[100%]">
                <h2
                    class="sm:text-[32px] sm:block hidden font-[700] text-white text-left sm:mb-1 hr-line relative leading-9 ml-[7rem]">
                    Online Enquiry Form
                </h2>
            </div>
        </div>

        <div class="flex m-5" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="/" class="inline-flex items-center text-sm font-medium text-blue-main">
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
                        <p class="ms-1 text-sm font-medium text-blue-main">Online
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
                        <a href="online-enquiry-form" class="ms-1 text-sm font-medium text-blue-main">Online Enquiry
                            Form</a>
                    </div>
                </li>
            </ol>
        </div>

        <div class="sm:mt-20 mt-10 mx-4 2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 px-4">



            <div class="relative">
                <h2 class="text-center sm:text-[32px] text-[28px] font-[700] text-blue-main leading-9">
                    Enquiry Form | Session 2026–2027
                </h2>
                <div id="AdmissionFormPopup"
                    class="relative mt-5  bg-green-500 text-white px-4 py-2 rounded mb-5 hidden" style="z-index:999">
                    Form submitted successfully!
                </div>
                <div class="mt-10">
                    <form id="AdmissionForm" method="post">
                       <div class="mt-4">
    <select name="session" required id="asession"
        class="w-full border border-gray-300 p-2 rounded-md text-gray-500">
        <option value="" disabled selected>Enquiry For Session</option>
        <?php
        $sessions = include "includes/session-api.php";
        foreach ($sessions as $item):
            $sessionName = trim($item['session'] ?? '');
            if ($sessionName === '') continue;
        ?>
            <option value="<?= htmlspecialchars($sessionName) ?>">
                <?= htmlspecialchars($sessionName) ?>
            </option>
        <?php endforeach; ?>
    </select>
</div>
                        <!-- Hostel facility -->
                        <div class="mt-4">
                            <p class="text-gray-700 mb-2">Are you looking for Hostel Facility? (Available for Boys only)</p>
                            <select id="ahostel_facility" name="hostel_facility" required class="w-full border border-gray-300 p-2 rounded-md text-gray-500">
                               
                                <option value="" disabled selected>Select Hostel Facility</option>
                                <option value="YES">Yes</option>
                                <option value="NO">No</option>
                            </select>
                            <div id="ahostel-error" class="text-red-500 text-sm mt-1 hidden">Please select hostel facility option.</div>
                        </div>

                        <!-- Class selection -->
         <div class="mt-4">
    <select id="agrade" required disabled class="w-full border p-3 rounded-md disabled:bg-gray-100 disabled:text-gray-400">
                                    <option value="" disabled selected>Select Hostel Facility first</option>
                                        <?php
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
                                <div id="agrade-error" class="text-red-500 text-sm mt-1 hidden">Please select a class.</div>
</div>

                        <!-- Student name -->
                        <div class="mt-4">
                            <input type="text" name="student-name" id="astudent_name" placeholder="Student Name"
                                class="w-full border border-gray-300 p-[11px] rounded-md outline-none" required>
                            <span id="astudent-error" class="text-red-500 text-sm mt-1 hidden">Only letters and spaces allowed.</span>
                        </div>

                        <!-- Parent name -->
                        <div class="mt-4">
                            <input type="text" name="parent-name" id="aparent_name" placeholder="Parents Name"
                                class="w-full border border-gray-300 p-[11px] rounded-md outline-none">
                            <span id="aparent-error" class="text-red-500 text-sm mt-1 hidden">Only letters and spaces allowed.</span>
                        </div>

                        <!-- Mobile number -->
                        <div class="mt-4">
                            <input type="text" name="mobile" id="amobile" placeholder="Mobile Number" maxlength="10"
                                class="w-full border border-gray-300 p-[11px] rounded-md outline-none">
                            <div id="amobile-error" class="text-red-500 text-sm mt-1 hidden">Please enter valid phone number</div>
                        </div>

                        <!-- Email -->
                        <div class="mt-4">
                            <input type="text" name="email" id="aemail" placeholder="Email"
                                class="w-full border border-gray-300 p-[11px] rounded-md outline-none">
                            <span id="aemail-error" class="text-red-500 text-sm mt-1 hidden">Please enter a valid email address.</span>
                        </div>

                        <!-- City -->
      <div class="mt-4 relative customSelect">
    <select id="acity" name="city" class="hidden">
        <option value="">Select City</option>
        <?php
        $cities = include 'includes/get-city.php';
        ?>
        <?php if (!empty($cities)): ?>
            <?php foreach ($cities as $city): ?>
                <?php 
                $cityName = trim($city['name'] ?? '');
                if ($cityName === '') continue; 
                ?>
                <option value="<?= htmlspecialchars($cityName, ENT_QUOTES, 'UTF-8') ?>">
                    <?= htmlspecialchars($cityName, ENT_QUOTES, 'UTF-8') ?>
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

                        <!-- Pincode -->
                        <div class="mt-4">
                            <div>
                                <input type="text" name="pincode" id="apincode" placeholder="Pincode"
                                    class="w-full border border-gray-300 p-[11px] rounded-md" maxlength="6" oninput="this.value=this.value.replace(/\D/g,'')" required>
                                <span id="apincode-error" class="text-red-500 text-sm hidden">Please enter a valid Pincode.</span>
                            </div>
                            <!-- Terms -->
                            <div class="mt-4 flex items-center gap-2">
                                <input type="checkbox" id="terms" required>
                                <label for="terms">I agree to <a href="termsandconditions"
                                        class="text-blue-500 underline">Terms and
                                        Conditions</a>.</label>
                            </div>
                            <input type="hidden" name="source" id="source">
                            <div id="successPopup" class="relative hidden px-4 py-2 mb-5 text-white bg-green-500 rounded"
                                style="z-index:999">
                                Form submitted successfully!
                            </div>
                            <!-- Submit -->
                            <div class="mt-4">
                                <button type="submit" id="AsubmitBtn"
                                    class="p-4 bg-blue-main w-full text-white font-semibold text-[18px] rounded hover:bg-red-500 transition">
                                    Submit
                                </button>
                            </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <?php include "includes/footer.php" ?>
    </div>

    <script>
        // (function() {
        //     function getParam(name) {
        //         const urlParams = new URLSearchParams(window.location.search);
        //         return urlParams.get(name);
        //     }
        //     var source = getParam("utm_source") || document.referrer || "";
        //     console.log("Initial Source:", source);
        //     if (!source) {
        //         // Case 1: Direct visit
        //         source = "Website";
        //     } else if (source.includes("google.")) {
        //         source = "Google-Ads by Agency";
        //         console.log("Referrer is Google, setting source to 'Google-Ads by Agency'");
        //     } else if (source.toLowerCase().includes("facebook.") || source.toLowerCase().includes("meta")) {
        //         source = "Facebook by Agency";
        //     } else if (source.includes("instagram.")) {
        //         source = "Instagram by Agency";
        //     } else if (!getParam("utm_source")) {
        //         source = "Others";
        //     }
        //     if (!sessionStorage.getItem("leadSource")) {
        //         sessionStorage.setItem("leadSource", source);
        //     }
        //     var finalSource = sessionStorage.getItem("leadSource");
        //     var sourceInput = document.getElementById("source");
        //     if (sourceInput) {
        //         sourceInput.value = finalSource;
        //     }
        //     console.log("Captured Source:", finalSource);
        // })();

        (function() {
            function getParam(name) {
                const urlParams = new URLSearchParams(window.location.search);
                return urlParams.get(name);
            }

            let source = getParam("utm_source") || document.referrer || "";
            console.log("Initial Source:", source);

            const src = source.toLowerCase();

            // Determine the correct source
            if (!source) {
                source = "Website";
            } else if (src.includes("google")) {
                source = "Google-Ads by Agency";
                console.log("Referrer is Google, setting source to 'Google-Ads by Agency'");
            } else if (src.includes("facebook") || src.includes("meta")) {
                source = "Facebook by Agency";
            } else if (src.includes("instagram") || src.includes("ig")) {
                source = "Instagram by Agency";
            } else {
                // Any unknown platform → set to "Others"
                source = "Others";
                console.log("Unrecognized platform, setting source to 'Others'");
            }

            // Save in sessionStorage only if not already saved
            if (!sessionStorage.getItem("leadSource")) {
                sessionStorage.setItem("leadSource", source);
            }

            const finalSource = sessionStorage.getItem("leadSource");
            const sourceInput = document.getElementById("source");

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
        const studentError = document.getElementById("astudent-error");
        const parentError = document.getElementById("aparent-error");
        const mobileError = document.getElementById("amobile-error");
        const emailError = document.getElementById("aemail-error");
        const pincodeError = document.getElementById("apincode-error");
        const hostelError = document.getElementById("ahostel-error");
        const gradeError = document.getElementById("agrade-error");
        const hostelSelect = document.getElementById("ahostel_facility");
        const gradeSelect = document.getElementById("agrade");

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

        const masterGradeOptions = Array.from(gradeSelect?.options || [])
            .map(o => ({ value: o.value, label: (o.textContent || "").trim() }))
            .filter(o => o.value && o.label);

        function setGradeOptions(options) {
            if (!gradeSelect) return;
            gradeSelect.innerHTML = "";

            const placeholder = document.createElement("option");
            placeholder.value = "";
            placeholder.disabled = true;
            placeholder.selected = true;
            placeholder.textContent = "Select Class";
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


        document.getElementById("astudent_name").addEventListener("input", function() {
            studentError.classList.toggle("hidden", !this.value || nameRegex.test(this.value));
        });

        document.getElementById("aparent_name").addEventListener("input", function() {
            parentError.classList.toggle("hidden", !this.value || nameRegex.test(this.value));
        });

        document.getElementById("amobile").addEventListener("input", function() {
            this.value = this.value.replace(/\D/g, '').slice(0, 10);
            mobileError.classList.toggle("hidden", !this.value || mobileRegex.test(this.value));
        });

        document.getElementById("aemail").addEventListener("input", function() {
            this.value = this.value.toLowerCase();
            emailError.classList.toggle("hidden", !this.value || emailRegex.test(this.value));
        });

        document.getElementById("apincode").addEventListener("input", function() {
            this.value = this.value.replace(/\D/g, '').slice(0, 6);
            pincodeError.classList.toggle("hidden", !this.value || pincodeRegex.test(this.value));
        });

        // Submit Validation
        document.getElementById("AdmissionForm").addEventListener("submit", function(e) {
            e.preventDefault();
            const AsubmitBtn = document.getElementById("AsubmitBtn");
            AsubmitBtn.disabled = true;
            AsubmitBtn.textContent = "Submitting...";
            // Inputs
            const hostelFacility = hostelSelect ? hostelSelect.value : "";
            const agrade = gradeSelect ? gradeSelect.value.trim() : "";
            const astudent_name = document.getElementById("astudent_name").value.trim();
            const aparent_name = document.getElementById("aparent_name").value.trim();
            const amobile = document.getElementById("amobile").value.trim();
            const aemail = document.getElementById("aemail").value.trim();
            const acity = document.getElementById("acity").value.trim();
            const apincode = document.getElementById("apincode").value.trim();
            const source = sessionStorage.getItem("leadSource") || "Website";
            const asession = document.getElementById("asession").value.trim();

            let isValid = true;

            if (!hostelFacility) {
                hostelError?.classList.remove("hidden");
                isValid = false;
            } else {
                hostelError?.classList.add("hidden");
            }

            if (hostelFacility && !agrade) {
                gradeError?.classList.remove("hidden");
                isValid = false;
            } else {
                gradeError?.classList.add("hidden");
            }

            if (!nameRegex.test(astudent_name)) {
                studentError.textContent = "Only letters and spaces allowed.";
                isValid = false;
            }

            if (!nameRegex.test(aparent_name)) {
                parentError.textContent = "Only letters and spaces allowed.";
                isValid = false;
            }

            if (!mobileRegex.test(amobile)) {
                mobileError.classList.remove("hidden");
                isValid = false;
            }

            if (!emailRegex.test(aemail)) {
                emailError.classList.remove("hidden");
                isValid = false;
            }

            if (!pincodeRegex.test(apincode)) {
                pincodeError.classList.remove("hidden");
                isValid = false;
            }

            if (!isValid) {
                AsubmitBtn.disabled = false;
                AsubmitBtn.textContent = "Submit";
                return;
            }

            // API Payload
            const payload = {
                session: asession,
                grade: agrade,
                name: astudent_name,
                parent_name: aparent_name,
                phone: amobile,
                email: aemail,
                city: acity,
                pincode: apincode,
                source: source,
                source_type: "Website",
                enquiry_type: "Digital",
                message: `Hostel Facility: ${hostelFacility}. This Message From DPS Kalyanpur Website`,
                subject: "Hostel Enquiry",
                hostel: hostelFacility === "YES" ? "1" : "0",
                branch_id: 9,
                school_id: 1,
                language_id: 1
            };

            fetch(`proxy/admission-proxy`, {
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
                    document.getElementById("AdmissionFormPopup").classList.remove("hidden");
                    setTimeout(() => {
                        document.getElementById("AdmissionFormPopup").classList.add("hidden");
                    }, 20000);
                    document.getElementById("AdmissionForm").reset();
                    syncGradesWithHostelSelection();
                })
                .catch(error => {
                    alert("There was an error submitting the form.");
                    console.error("Error:", error);
                })
                .finally(() => {
                    // Re-enable button
                    AsubmitBtn.disabled = false;
                    AsubmitBtn.textContent = "Submit";
                });
        });
    </script>
    <?php include "includes/foot.php" ?>
</body>

</html>
