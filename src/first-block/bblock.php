<?php

/**
 * Block Name: monNouveauBlock
 */


$title = get_field('title');
$intro = get_field('intro');

$class_name = "";
if (!empty($block['align'])) {
    $class_name .= ' align' . $block['align'];
}

// Votre code PHP ici
?>

<div class="bblock is-layout-constrained <?php echo esc_attr($class_name); ?>">
    <div class="bblock__wrapper alignwide">
        Nouveau bloc : bblock
        <h1>titre : <?php the_field('title'); ?></h1>
        <p> intro = <?php the_field('intro'); ?></p>
    </div>
</div>