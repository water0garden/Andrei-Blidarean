<?php snippet('head') ?>
<?php snippet('header') ?>

<main>
<?php $images = $page->images(); ?>
<?php $imageCount = $images->count(); ?>

<section class="shoot-section grid-outer">
  <?php foreach($images as $image): ?>
    <figure class="shoot-figure">
      <img src="<?= $image->url() ?>">
      <figcaption>
        <?= $image->filename(); ?>
      </figcaption>
    </figure>
  <?php endforeach ?>
</section>

<div class="shoot-title">
Gloria Shoot 001. 19. 03.2020. Images by Andrei Blidarean, Model Catherine Boddy
</div>


</main>
<?php snippet('footer') ?>
<?php snippet('foot') ?>
