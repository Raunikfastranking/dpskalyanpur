<section class="bg-[#2c4073] py-10 pb-20 mt-10">
    <div class="comman-container">
        <div class="text-center text-white md:pt-2">
            <h2 class="md:text-[45px] text-[32px] leading-11 mt-4"><?= strip_tags($data['content_heading']) ?? "" ?></h2>
            <div>
                <?= $data['content'] ?? "" ?>
            </div>
        </div>
        <?php include __DIR__ . '/../includes/sections/section-content.php'; ?>
    </div>
</section>