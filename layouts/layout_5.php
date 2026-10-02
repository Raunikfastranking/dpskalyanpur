<section class="about-mv-bg relative md:mt-20 mt-10 pb-15">
    <div class="absolute left-0 top-40 animate-left-to-right">
        <img src="assets/images/leaf.png" class="md:w-[100%] w-[80px]" alt="Leaf">
    </div>
    <div class="absolute right-5 z-100 bottom-0 animate-scale-loop">
        <img src="assets/images/bullets-circle.png" class="md:w-[100%] w-[80px]" alt="Bullet Rainbow">
    </div>
    <div class="comman-container-1050">
        <div class="text-center text-white pt-20">
            <h3 class="flex justify-center gap-3 text-[20px] font-[400]">
                <img src="assets/images/icon-arrow-02.png" alt=""><?= strip_tags($data['content_heading']) ?? "" ?> <img src="assets/images/icon-arrow-1.png" alt="">
            </h3>
            <!-- <h2 class="text-[45px] leading-11 mt-4">At Allen Kids</h2> -->
            <div>
                <?= $data['content'] ?? "" ?>
            </div>
        </div>
         <?php include __DIR__ . '/../includes/sections/section-content.php'; ?>
    </div>
</section>