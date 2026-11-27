<section class="bg-[#2c4073] py-10 pb-20 mt-10">
    <div class="comman-container">
        <div class="text-center text-white md:pt-2">
            <div class="dps-cms-content"><?= $data['content_heading'] ?? "" ?></div>
            <div class="dps-cms-content">
                <?= $data['content'] ?? "" ?>
            </div>
        </div>
        <?php include __DIR__ . '/../includes/sections/section-content.php'; ?>
    </div>
</section>