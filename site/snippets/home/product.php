<section class="step-text">
  <?php $productURI = $page->featuredProduct(); ?>
  <?php $product = $site->find($productURI) ?>
  <h3>
    <a href="<?= $product->url(); ?>"><?= $product->title(); ?></a><br>
    <span class="bracket-text">$<?= $product->price()->html();?></span>
  </h3>

  <?= $page->featuredProductDescription()->kirbytext(); ?>

  <p>
    <a class="fancy-button" href="<?= $product->url(); ?>">
      View item...
    </a>
  </p>
</section>
