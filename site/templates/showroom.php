<?php snippet('head') ?>

<main>

<div class="fancy-border is-text-frame">

  <article class="showroom-hello">
    <?= $page->text()->kt() ?>
  </article>

  <article class="showroom-address">
    <?= $page->showroomAddress()->kt() ?>
  </article>

  <article class="showroom-hours">
    <?= $page->showroomHours()->kt() ?>
  </article>

</div>





</main>




<?php snippet('footer') ?>
<?php snippet('foot') ?>
