<div class="window-frame">
  <div class="fancy-border fancy-window is-reflection">
    <?php foreach($shoot->images()->limit(4) as $image): ?>
      <figure class="fancy-figure">
        <img src="<?= $image->url() ?>">
      </figure>
    <?php endforeach ?>
  </div>
  <a class="fancy-border fancy-window" href="<?= $shoot->url(); ?>" id="window-<?= $shoot->slug(); ?>">
    <?php foreach($shoot->images()->limit(4) as $image): ?>
      <figure class="fancy-figure">
        <img src="<?= $image->url() ?>">
      </figure>
    <?php endforeach ?>
  </a>
</div>
