<?php snippet('head') ?>
<?php snippet('header') ?>

<main>
<section class="shoot-windows">
<?php foreach($page->children() as $shoot): ?>
  <?php snippet('gallery', ['gallery' => $shoot]); ?>
<?php endforeach ?>
</section>


</main>

<?php snippet('footer') ?>
<?php snippet('foot') ?>
