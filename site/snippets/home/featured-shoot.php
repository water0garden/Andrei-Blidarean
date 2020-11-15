<?php $shootURI = $page->featuredShoot(); ?>
<?php $shoot = $site->find($shootURI) ?>

<section class="shoot-section grid-outer">
  <figure class="blur-flower">
    <img src="/assets/media/flower/yellow.jpg">
  </figure>
  <section class="shoot-window">
    <?php snippet('window', ['shoot' => $shoot]); ?>
  </section>
</section>
