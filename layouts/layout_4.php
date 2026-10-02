<section class="relative py-5 md:bg-[url('assets/images/img/o-c-bg.png')] bg-[#FF454A] mt-10">
    <div class="absolute animate-left-to-right">
        <img src="assets/images/img/animate-team1.png" class="md:w-[100%] w-[100px]" alt="Image Counter">
    </div>
    <div class="absolute right-[0px] mb:bottom-auto bottom-3 mn animate-left-to-right">
        <img src="assets/images/img/img-counter-01.png" class="md:w-[100%] w-[100px]" alt="Image Counter">
    </div>
    <div class="text-center text-white pt-10">
        <h2 class="md:text-[45px] text-[32px] leading-11 mt-4 text-[#2C4073]"><?= strip_tags($data['content_heading']) ?? "" ?></h2>
        <div>
            <?= $data['content'] ?? "" ?>
        </div>
    </div>
    <div class="comman-container-1050s">
        <?php include __DIR__ . '/../includes/sections/section-content.php'; ?>
    </div>
</section>