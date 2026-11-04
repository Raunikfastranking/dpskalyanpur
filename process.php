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
                            <?php
                            $eeFormDomId = 'ee-form-process';
                            $eeFormTitle = 'Enquiry Form';
                            include __DIR__ . '/includes/ee-enquiry-form.php';
                            ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endfor; ?>
        </div>
    </div>

    <?php include "includes/footer.php" ?>

    <script>
        document.querySelectorAll(".tab-btn").forEach(btn => {
            btn.addEventListener("click", () => {
                document.querySelectorAll(".tab-btn").forEach(b => b.classList.remove("active"));
                document.querySelectorAll(".tab-content").forEach(c => c.classList.add("hidden"));
                btn.classList.add("active");
                document.querySelector(`[data-tab-content="${btn.dataset.tab}"]`).classList.remove("hidden");
            });
        });
    </script>

    <?php include "includes/foot.php" ?>
</body>
</html>
