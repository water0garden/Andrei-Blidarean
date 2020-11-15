<section class="gallery grid-outer">
  <?php $number = 0; ?>
  <?php foreach($gallery->images() as $image): ?>
    <?php $number = $number + 1; ?>
    <figure class="gallery-image js-gallery-image<?php if($number == 1): ?> is-active<?php endif; ?>">

        <img src="<?= $image->url() ?>" alt="">

    </figure>
  <?php endforeach ?>
</section>
