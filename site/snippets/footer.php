<footer class="site-footer grid-outer">
  <div class="footer-col">
    <?php
    $items = $pages->listed();
    if($items->isNotEmpty()):
    ?>
    <?php $last = $items->last(); ?>
    <?php foreach($items as $item): ?>
      <?php $template = $item->template(); ?>
      <?php if ($template == 'external-link'): ?>
        <a data-template="<?= $template; ?>"  href="<?= $item->linkTo()->url() ?>"><?= $item->title()->html() ?></a></li><?php if($item != $last): ?>,<?php endif;?>
      <?php else: ?>
        <a data-template="<?= $template; ?>" <?php e($item->isOpen(), ' class="active"') ?> href="<?= $item->url() ?>"><?= $item->title()->html() ?></a><?php if($item != $last): ?>,<?php endif;?>
      <?php endif; ?>
    <?php endforeach ?>
    <?php endif ?>
  </div>

  <?php if($page->template() == 'product'): ?>
  <div class="footer-col footer-views">
    <button>View (1)</button> <button>View (2)</button>
  </div>
  <?php endif; ?>

  <div class="footer-col footer-email">
    ❥❧ Sign up for emails...
  </div>
</footer>
