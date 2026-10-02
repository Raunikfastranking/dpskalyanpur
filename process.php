<?php
include "includes/apis.php";

// ✅ FIX: API items reverse order me de raha hai — array_reverse se sahi karo
$processItems = $process_____data['data'][0]['items'] ?? [];
$processItems = array_reverse($processItems);
$totalSteps   = count($processItems);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "includes/head.php" ?>
    <title>DPS Kalyanpur | Process</title>
    <style>
        /* Table and Scroll Fixes */
        html, body { max-width: 100%; overflow-x: hidden; }
        [data-tab-content="step-4"] { max-width: 100%; overflow-x: hidden; overflow-y: visible; }
        [data-tab-content="step-4"] table {
            display: block; max-width: 100%; width: max-content; min-width: 100%;
            overflow-x: auto; overflow-y: hidden; -webkit-overflow-scrolling: touch;
            overscroll-behavior-x: contain;
        }
        [data-tab-content="step-4"] th, [data-tab-content="step-4"] td { white-space: nowrap; }

        @media (max-width: 767px) {
            #tab-buttons { justify-content: flex-start !important; gap: 12px !important; }
            .tab-btn { padding: 8px 16px !important; font-size: 14px !important; white-space: nowrap; flex: 0 0 auto !important; }
            .mt-10.flex.overflow-x-auto { justify-content: flex-start !important; padding-left: 16px !important; }
        }
        .tab-btn.active { background-color: white !important; color: #003618 !important; font-weight: bold; }
    </style>
</head>

<body>
    <?php include "includes/header.php" ?>

    <div class="main relative mb-10">
        <div class="bg-[url('assets/images/building.webp')] bg-top flex items-center text-center h-[300px]">
            <h1 class="sm:text-[32px] text-[28px] font-[700] text-white text-left ml-4 sm:ml-[7rem] hr-line relative">
                Process
            </h1>
        </div>

        <div class="flex m-5 overflow-x-auto text-blue-main text-xs">
            <a href="/">Home</a> <span class="mx-2">></span> <span>Admission</span> <span class="mx-2">></span> <b>Process</b>
        </div>

        <div class="2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 mx-3 sm:py-10 space-y-10 text-gray-600">
            <div>
                <?= $process_____data['data'][0]['description'] ?? "" ?>
            </div>

            <div class="mt-10 flex sm:justify-center p-8 bg-[#003618] rounded-lg overflow-x-auto">
                <ul class="flex gap-8 items-center" id="tab-buttons">
                    <?php for ($i = 1; $i <= $totalSteps; $i++): ?>
                        <li class="tab-btn <?= $i === 1 ? 'active' : '' ?> text-white border border-white p-2 px-6 cursor-pointer rounded whitespace-nowrap" data-tab="step-<?= $i ?>">
                            Step <?= $i ?>
                        </li>
                    <?php endfor; ?>
                </ul>
            </div>

            <?php for ($i = 0; $i < $totalSteps; $i++): ?>
                <div class="tab-content <?= $i === 0 ? '' : 'hidden' ?>" data-tab-content="step-<?= $i + 1 ?>">
                    <div>
                        <?= $processItems[$i]['title'] ?? "" ?>
                        <?= $processItems[$i]['content'] ?? "" ?>
                    </div>

                    <?php if ($i === 0): // Step 1 ke saath form ?>
                        <div class="mt-10 bg-gray-50 p-6 rounded-xl border border-gray-200">
                            <h2 class="text-center text-2xl font-bold text-blue-main mb-6">Enquiry Form</h2>
                            <div id="AdmissionFormPopup" class="hidden bg-green-500 text-white p-3 rounded mb-4 text-center">Form submitted successfully!</div>

                            <form id="AdmissionForm" class="space-y-4">
                                <select id="asession" required class="w-full border p-3 rounded-md">
                                    <option value="" disabled selected>Enquiry For Session</option>
                                    <?php
                                    $sessions = include "includes/session-api.php";
                                    $uniqueSessions = array_unique(array_column($sessions, 'session'));
                                    foreach ($uniqueSessions as $sess): ?>
                                        <option value="<?= htmlspecialchars($sess) ?>"><?= htmlspecialchars($sess) ?></option>
                                    <?php endforeach; ?>
                                </select>

                                <!-- Hostel facility -->
                                <div>
                                    <p class="text-gray-700 mb-2">Are you looking for Hostel Facility? (Available for Boys only)</p>
                                    <select id="ahostel_facility" required class="w-full border p-3 rounded-md text-gray-500">
                                        <option value="" disabled selected>Select Hostel Facility</option>
                                        <option value="YES">Yes</option>
                                        <option value="NO">No</option>
                                    </select>
                                    <div id="ahostel-error" class="text-red-500 text-sm mt-1 hidden">Please select hostel facility option.</div>
                                </div>

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

                                            $uniqueGrades = [];
                                            foreach ($grades as $g) {
                                                $grade = trim($g['grades']);
                                                if ($grade && !in_array($grade, $uniqueGrades)) {
                                                    $uniqueGrades[] = $grade;
                                                }
                                            }

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

                                <input type="text" id="astudent_name" placeholder="Student Name" class="w-full border p-3 rounded-md" required>
                                <input type="text" id="aparent_name" placeholder="Parents Name" class="w-full border p-3 rounded-md">
                                <input type="text" id="amobile" placeholder="Mobile Number" maxlength="10" class="w-full border p-3 rounded-md" required>
                                <input type="email" id="aemail" placeholder="Email Address" class="w-full border p-3 rounded-md">

                                <div class="relative" id="cityWrapper">
                                    <select id="acity" name="city" class="hidden" required>
                                        <option value="">Select City</option>
                                        <?php
                                        $cities = include 'includes/get-city.php';
                                        $uniqueCities = array_unique(array_column($cities, 'name'));
                                        sort($uniqueCities);
                                        foreach ($uniqueCities as $ct): ?>
                                            <option value="<?= htmlspecialchars($ct) ?>"><?= htmlspecialchars($ct) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div id="cityTrigger" class="border p-3 rounded-md bg-white cursor-pointer flex justify-between items-center">
                                        <span class="selected-text text-gray-400">Select City</span>
                                        <span>▼</span>
                                    </div>
                                    <div id="cityDropdown" class="absolute w-full mt-1 border bg-white shadow-lg z-50 hidden rounded-md">
                                        <input type="text" id="citySearch" placeholder="Search city..." class="w-full p-2 border-b outline-none">
                                        <ul id="cityList" class="max-h-40 overflow-y-auto"></ul>
                                    </div>
                                </div>

                                <input type="text" id="apincode" placeholder="Pincode" maxlength="6" class="w-full border p-3 rounded-md" required>

                                <div class="flex items-center gap-2">
                                    <input type="checkbox" id="terms" required>
                                    <label for="terms" class="text-sm">I agree to Terms & Conditions</label>
                                </div>

                                <input type="hidden" id="source" name="source">

                                <button type="submit" id="AsubmitBtn" class="w-full bg-blue-main text-white p-4 rounded-md font-bold hover:bg-red-600 transition-colors">
                                    Submit
                                </button>
                            </form>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endfor; ?>
        </div>
    </div>

    <?php include "includes/footer.php" ?>

    <script>
        // --- 1. Tabs Logic ---
        document.querySelectorAll(".tab-btn").forEach(btn => {
            btn.addEventListener("click", () => {
                document.querySelectorAll(".tab-btn").forEach(b => b.classList.remove("active"));
                document.querySelectorAll(".tab-content").forEach(c => c.classList.add("hidden"));
                btn.classList.add("active");
                document.querySelector(`[data-tab-content="${btn.dataset.tab}"]`).classList.remove("hidden");
            });
        });

        // --- 2. City Dropdown Sync ---
        const wrapper = document.getElementById('cityWrapper');
        const trigger = document.getElementById('cityTrigger');
        const dropdown = document.getElementById('cityDropdown');
        const list = document.getElementById('cityList');
        const hiddenSelect = document.getElementById('acity');
        const searchInput = document.getElementById('citySearch');
        const selectedLabel = trigger.querySelector('.selected-text');

        // Populate list from hidden select
        Array.from(hiddenSelect.options).forEach(opt => {
            if (!opt.value) return;
            const li = document.createElement('li');
            li.className = "p-2 hover:bg-gray-100 cursor-pointer text-sm border-b last:border-0";
            li.textContent = opt.text;
            li.onclick = (e) => {
                e.stopPropagation();
                hiddenSelect.value = opt.value;
                selectedLabel.textContent = opt.text;
                selectedLabel.classList.remove('text-gray-400');
                selectedLabel.classList.add('text-black');
                dropdown.classList.add('hidden');
            };
            list.appendChild(li);
        });

        trigger.onclick = (e) => {
            e.stopPropagation();
            dropdown.classList.toggle('hidden');
            if (!dropdown.classList.contains('hidden')) searchInput.focus();
        };

        searchInput.oninput = (e) => {
            const val = e.target.value.toLowerCase();
            list.querySelectorAll('li').forEach(li => {
                li.style.display = li.textContent.toLowerCase().includes(val) ? '' : 'none';
            });
        };

        document.addEventListener('click', () => dropdown.classList.add('hidden'));

        // --- 3. Source Tracking ---
        (function() {
            const params = new URLSearchParams(window.location.search);
            let source = params.get("utm_source") || document.referrer || "Website";
            const s = source.toLowerCase();
            if (s.includes("google")) source = "Google-Ads by Agency";
            else if (s.includes("facebook")) source = "Facebook by Agency";
            if (!sessionStorage.getItem("leadSource")) sessionStorage.setItem("leadSource", source);
            document.getElementById("source").value = sessionStorage.getItem("leadSource");
        })();

        // --- 4. Validation & Submission ---
        const nameRegex = /^[A-Za-z\s]+$/;
        const mobileRegex = /^[6-9]\d{9}$/;
        const pincodeRegex = /^[1-9][0-9]{5}$/;
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        const hostelSelect = document.getElementById("ahostel_facility");
        const hostelError = document.getElementById("ahostel-error");
        const gradeSelect = document.getElementById("agrade");
        const gradeError = document.getElementById("agrade-error");

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

            const allowedYes = new Set(["VI", "VII", "VIII", "IX", "X", "XI", "XII"]);
            const allowedNo = new Set([
                "PG", "NURSERY", "PREP",
                "I", "II", "III", "IV", "V",
                "VI", "VII", "VIII", "IX", "X", "XI", "XII"
            ]);

            const allowedSet = hostelFacility === "YES" ? allowedYes : allowedNo;

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

        document.getElementById("AdmissionForm").addEventListener("submit", async function(e) {
            e.preventDefault();
            const btn = document.getElementById("AsubmitBtn");

            const name = document.getElementById("astudent_name").value.trim();
            const parent = document.getElementById("aparent_name").value.trim();
            const mobile = document.getElementById("amobile").value.trim();
            const email = document.getElementById("aemail").value.trim();
            const pincode = document.getElementById("apincode").value.trim();
            const session = document.getElementById("asession").value;
            const hostelFacility = hostelSelect ? hostelSelect.value : "";
            const grade = gradeSelect ? gradeSelect.value : "";
            const city = hiddenSelect.value;
            const terms = document.getElementById("terms").checked;

            if (!nameRegex.test(name)) {
                alert("Please enter a valid student name (letters and spaces only).");
                return;
            }
            if (parent && !nameRegex.test(parent)) {
                alert("Please enter a valid parent name (letters and spaces only).");
                return;
            }
            if (!mobileRegex.test(mobile)) {
                alert("Please enter a valid 10-digit mobile number starting with 6-9.");
                return;
            }
            if (email && !emailRegex.test(email)) {
                alert("Please enter a valid email address.");
                return;
            }
            if (!pincodeRegex.test(pincode)) {
                alert("Please enter a valid 6-digit pincode.");
                return;
            }
            if (!session) {
                alert("Please select session.");
                return;
            }
            if (!hostelFacility) {
                hostelError?.classList.remove("hidden");
                alert("Please select hostel facility.");
                return;
            }
            if (!grade) {
                gradeError?.classList.remove("hidden");
                alert("Please select class.");
                return;
            }
            if (!city) {
                alert("Please select city.");
                return;
            }
            if (!terms) {
                alert("Please agree to Terms & Conditions.");
                return;
            }

            btn.disabled = true;
            btn.textContent = "Submitting...";

            const payload = {
                session: session,
                grade: grade,
                grade_name: grade,
                name: name,
                parent_name: parent,
                phone: mobile,
                email: email,
                city: city,
                pincode: pincode,
                source: document.getElementById("source").value,
                branch_id: 9,
                school_id: 1,
                source_type: "Website",
                enquiry_type: "Digital",
                message: `Hostel Facility: ${hostelFacility}. This Message From DPS Kalyanpur Website`,
                subject: "Hostel Enquiry",
                hostel: hostelFacility === "YES" ? "1" : "0",
                language_id: 1
            };

            console.log("Submitting payload:", payload);

            try {
                const res = await fetch("proxy/admission-proxy", {
                    method: "POST",
                    headers: { "Content-Type": "application/json" },
                    body: JSON.stringify(payload)
                });

                const responseData = await res.json().catch(() => ({ error: "Invalid JSON response" }));

                if (!res.ok) {
                    throw new Error(`HTTP ${res.status}: ${responseData.message || JSON.stringify(responseData)}`);
                }

                if (responseData.status === false) {
                    throw new Error(responseData.message || "API returned an error");
                }

                document.getElementById("AdmissionFormPopup").classList.remove("hidden");
                document.getElementById("AdmissionForm").reset();
                syncGradesWithHostelSelection();

                selectedLabel.textContent = "Select City";
                selectedLabel.classList.add('text-gray-400');
                hiddenSelect.value = "";

                setTimeout(() => document.getElementById("AdmissionFormPopup").classList.add("hidden"), 5000);
            } catch (err) {
                console.error("Submission error:", err);
                alert("Submission failed: " + err.message);
            } finally {
                btn.disabled = false;
                btn.textContent = "Submit";
            }
        });
    </script>

    <?php include "includes/foot.php" ?>
</body>
</html>