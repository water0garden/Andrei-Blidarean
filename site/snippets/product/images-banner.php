<?php $title = $page->title(); ?>
<?php $images = $page->images(); ?>
<?php $imageCount = $images->count(); ?>
<?php if($imageCount > 3): ?>
  <?php $isMoving = 'true'; ?>
<?php else: ?>
  <?php $isMoving = 'false'; ?>
<?php endif; ?>
<section class="images-banner" data-count="<?= $imageCount; ?>" data-is-moving="<?= $isMoving; ?>">
  <div class="moving-image-reel">
    <?php foreach($images as $image): ?>
      <figure class="banner-image js-banner-image is-original">
        <img src="<?= $image->url() ?>" alt="<?= $title; ?>">
      </figure>
    <?php endforeach ?>
    <?php if ($isMoving == 'true'): ?>
      <?php foreach($images as $image): ?>
        <figure class="banner-image js-banner-image is-repeat">
          <img src="<?= $image->url() ?>" alt="<?= $title; ?>">
        </figure>
      <?php endforeach ?>
    <?php endif; ?>
    <?php if ($isMoving == 'true'): ?>
      <?php foreach($images as $image): ?>
        <figure class="banner-image js-banner-image is-repeat">
          <img src="<?= $image->url() ?>" alt="<?= $title; ?>">
        </figure>
      <?php endforeach ?>
    <?php endif; ?>
    <?php if ($isMoving == 'true'): ?>
      <?php foreach($images as $image): ?>
        <figure class="banner-image js-banner-image is-repeat">
          <img src="<?= $image->url() ?>" alt="<?= $title; ?>">
        </figure>
      <?php endforeach ?>
    <?php endif; ?>
  </div>
</section>
