<?php snippet('head') ?>
<?php snippet('header') ?>

<main>
  <section class="left-text-section grid-outer">
    <article class="text-area">
      <p>
        <?= $page->title() ?>
      </p>
      <?= $page->text()->kt() ?>

      <?php if($page->slug() == 'sizing'): ?>
        <?php snippet('sizing-table'); ?>
      <?php endif; ?>
  </section>
</main>




<?php snippet('footer') ?>
<?php snippet('foot') ?>
