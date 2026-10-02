
<!-- Glide.js Script -->
<script src="https://cdn.jsdelivr.net/npm/@glidejs/glide/dist/glide.min.js"></script>

<div class="relative w-full carousel-new mt-5 py-10">
    <div class="overflow-hidden " data-glide-el="track">
        <ul class="relative w-full overflow-hidden   p-0 whitespace-no-wrap flex flex-no-wrap [backface-visibility: hidden] [transform-style: preserve-3d] [touch-action: pan-Y] [will-change: transform]">
            <?php
            foreach ($data['resolved_content']['items'] as $items) {
            ?>
                <li>
                    <img src="<?= $api_url ?>/<?= $items['image_url'] ?? '' ?>" alt="<?= ms_esc_image_alt($items, $items['title'] ?? '') ?>" class="w-[100%] rounded-[12px]">
                    <div class="mt-2">
                        <h2 class="text-[18px] font-[700] leading-5 text-blue-main"><?= $items['title'] ?? "" ?></h2>
                        <p class="text-gray-600 text-[16px] mt-1"><?= $items['description'] ?? "" ?></p>
                    </div>
                </li>
            <?php } ?>
        </ul>
    </div>

</div>


<script>
var carouselnew = new Glide('.carousel-new', {
    type: 'carousel',
    perView: 3,
    focusAt: 'center',
    autoplay: 3500,
    animationDuration: 700,
    gap: 15,
    classes: {
        activeNav: '[&>*]:bg-slate-700',
    },
    breakpoints: {
        1680: {
            perView:4
        },
        1380: {
            perView:3
        },
        1024: {
            perView:2
        },
        767: {
            perView:2
        },
        640: {
            perView: 1
        }
    },
});
carouselnew.mount();
</script>