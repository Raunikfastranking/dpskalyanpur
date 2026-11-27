<section class="about-mv-bg relative md:mt-20 mt-10 pb-15">
    <div class="absolute left-0 top-40 animate-left-to-right">
        <img src="assets/images/leaf.png" class="md:w-[100%] w-[80px]" alt="Leaf">
    </div>
    <div class="absolute right-5 z-100 bottom-0 animate-scale-loop">
        <img src="assets/images/bullets-circle.png" class="md:w-[100%] w-[80px]" alt="Bullet Rainbow">
    </div>
    <div class="comman-container-1050">
        <div class="text-center text-white pt-20">
            <div class="dps-cms-content flex justify-center gap-3 text-[20px] font-[400] items-center">
                <img src="assets/images/icon-arrow-02.png" alt=""><?= $data['content_heading'] ?? "" ?> <img src="assets/images/icon-arrow-1.png" alt="">
            </div>
            <div class="dps-cms-content">
                <?= $data['content'] ?? "" ?>
            </div>
        </div>
         <?php include __DIR__ . '/../includes/sections/section-content.php'; ?>
    </div>
</section>