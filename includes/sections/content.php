<style>
    table{
        margin: auto;
    }
    ol{
        list-style: decimal;
    }
</style>
<div class="md:grid grid-cols-2 gap-10   items-center justify-between gap-6">
    <?php if (!empty($data['columns'])): ?>
    <?php foreach ($data['columns'] as $column): ?>
    <div class="w-full">
        <?php
        $columnImage = $column['image_path'] ?? $column['image_url'] ?? '';
        if ($column['content_type'] === 'image' && $columnImage !== ''):
        ?>
        <div data-aos="zoom-in-right" data-aos-duration="1000" class="aos-init aos-animate mb-6 mt-6">
            <img src="<?= htmlspecialchars($columnImage, ENT_QUOTES, 'UTF-8'); ?>"
                alt="<?= ms_esc_image_alt($column, 'section-image'); ?>" class="w-[100%] rounded-xl">
        </div>
        <?php elseif ($column['content_type'] === 'text' && !empty($column['content'])): ?>
        <div class="dps-cms-content text-content">
            <?= $column['content']; ?>
        </div>
        <?php endif; ?>
    </div>
    <?php endforeach; ?>
    <?php endif; ?>
</div>