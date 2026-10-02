<?php
$page = "detail";
include "includes/apis.php";
$blogData22 = $blogData;
$slug = $_GET['slug'] ?? null;
$selectedBlog = null;

// Find blog by slug
if (!empty($slug) && !empty($blogData22['data'])) {
    foreach ($blogData22['data'] as $blog) {
        if ($blog['slug'] === $slug) {
            $selectedBlog = $blog;
            break;
        }
    }
}


?>

<html lang="en">

<head>
    <base href="https://dpskalyanpur.com">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $selectedBlog ? htmlspecialchars($selectedBlog['meta_title']) : 'Blog Detail' ?></title>
    <meta name="description" content="<?= $selectedBlog ? htmlspecialchars($selectedBlog['meta_description']) : 'Blog Detail' ?>">
    <meta name="keywords" content="">
    <?php include "includes/head.php" ?>
</head>

<body>

    <?php include "includes/header.php"; ?>

    <div class="main relative sm:top-[20px] sm:mb-[120px] mx-0 sm:mx-2">
        <section class="mt-10 mb-10">
            <div class="xl:w-[1280px] lg:w-[1080px] sm:mx-auto mx-4 px-2">

                <?php if ($selectedBlog): ?>

                    

                    <!-- CATEGORIES -->
                    <div class="text-[#172B4D] text-[15px] tracking-[2px] mb-2">
                        CATEGORY:
                        <?php
                        $total = count($selectedBlog['categories']);
                        foreach ($selectedBlog['categories'] as $i => $cat): ?>
                            <strong><?= htmlspecialchars($cat['name']) ?><?= $i < $total - 1 ? ',' : '' ?></strong>
                        <?php endforeach; ?>
                    </div>

                    <!-- DATE -->
                    <?php
                    $date = $selectedBlog['date'] !== "0002-02-02"
                        ? $selectedBlog['date']
                        : $selectedBlog['created_at'];
                    ?>
                    <div class="text-[#172B4D] text-[15px] mb-1">
                        Published on <strong><?= date("d F Y", strtotime($date)) ?></strong>
                    </div>

                    <!-- TAGS -->
                    <div class="text-[#172B4D] text-[15px] mb-4">
                        Tags:
                        <?php
                        $total = count($selectedBlog['tag']);
                        foreach ($selectedBlog['tag'] as $i => $tag): ?>
                            <strong><?= htmlspecialchars($tag['name']) ?><?= $i < $total - 1 ? ',' : '' ?></strong>
                        <?php endforeach; ?>
                    </div>

                    <!-- MAIN TITLE -->
                    <h1 class="text-[#2B3C6B] text-[40px] font-bold leading-tight mb-4">
                        <?= htmlspecialchars($selectedBlog['main_title']) ?>
                    </h1>

                    <!-- MAIN DESCRIPTION -->
                    <p class="text-[#70747F] text-[20px] mb-10">
                        <?= $selectedBlog['main_description'] ?>
                    </p>

                    <!-- BLOG SECTIONS -->
                    <?php foreach ($selectedBlog['blogdetails'] as $detail): ?>
                        <div class="mb-12">

                            <img src="<?= $detail['image_url'] ?>"
                                alt="<?= ms_esc_image_alt($detail, 'Blog Section Image') ?>"
                                class="w-full mb-4 rounded-[10px]" />

                            <h2 class="text-[#2B3C6B] text-[32px] md:leading-10 mt-3 font-semibold">
                                <?= htmlspecialchars($detail['title']) ?>
                            </h2>

                            <p class="w-[90%] text-[#70747F] text-[20px] mt-2">
                                <?= $detail['description'] ?>
                            </p>

                        </div>
                    <?php endforeach; ?>

                <?php else: ?>
                    <p class="text-red-600 text-lg">No blog found for this slug.</p>
                <?php endif; ?>

            </div>
        </section>
    </div>

    <?php include "includes/footer.php"; ?>
    <?php include "includes/foot.php"; ?>

</body>

</html>