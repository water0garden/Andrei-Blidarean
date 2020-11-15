<section class="left-text-section grid-outer">
  <article class="text-area">
    <?= $page->introductionText()->kt(); ?>
  </article>
  <article class="iris-home js-iris-home">
    <figure>
      <img src="/assets/media/perfume/iris.png">
    </figure>
  </article>
  <article class="image-right">
    <figure>
     <img src="<?= $page->introductionImage()->toFile()->url(); ?>">
    </figure>
  </article>
</section>
