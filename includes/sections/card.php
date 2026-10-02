<div class="mt-10">
    <div class="grid 2xl:grid-cols-4 xl:grid-cols-3 lg:grid-cols-2 md:grid-cols-2 grid-cols-1 gap-5 md:mt-10 mt-5">
        <?php if (!empty($data['resolved_content']['media']) && is_array($data['resolved_content']['media'])) { ?>
            <?php foreach ($data['resolved_content']['media'] as $items) { ?>
                <div class="bg-center p-12 swiper-slide core-value-card md:mb-0 mb-3 swiper-slide-active"
                     style="background: url('assets/images/core-card-bg.png') 0% 0% / cover no-repeat; width: 337.5px; margin-right: 50px;"
                     role="group" aria-label="1 / 4" data-swiper-slide-index="0">
                    <div class="">
                        <img src="<?= $api_url ?>/<?= $items['media_file'] ?? '' ?>" class="mx-auto animated-img" alt="<?= ms_esc_image_alt($items, trim(strip_tags($items['heading'] ?? '')) ?: 'Core value') ?>">
                    </div>
                    <div class="text-center mt-5">
                        <h2 class="text-[#2C4073] text-[24px]"><?= strip_tags($items['heading'] ?? '') ?></h2>
                        <p class="text-[#70747F] text-[16px] mt-3 font-[300] mb-5 text-[18px]"><?= strip_tags($items['content'] ?? '') ?></p>
                    </div>
                </div>
            <?php } ?>
        <?php } else { ?>
            <div class="col-span-full text-center py-5">
                <p class="text-gray-500 text-lg font-medium font-[600]">No data available</p>
            </div>
        <?php } ?>
    </div>
</div>
