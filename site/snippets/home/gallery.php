<section class="gallery grid-outer">
  <div class="spacer"></div>
  <div class="spacer"></div>
  <div class="spacer"></div>
  <?php $number = 0; ?>
  <?php foreach($page->galleryImages()->toFiles() as $image): ?>
    <?php $number = $number + 1; ?>
    <figure class="gallery-image js-gallery-image<?php if($number == 1): ?> is-active<?php endif; ?>">
        <img src="<?= $image->url() ?>" alt="">
    </figure>
  <?php endforeach ?>
</section>
