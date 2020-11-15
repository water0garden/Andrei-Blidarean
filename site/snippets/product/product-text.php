<section class="product-text grid-outer-24">
  <article class="product-key-info">
    <p>
      <?= $page->title(); ?><br><br class="desktop-break">
      <span class="bracket-text">$<?= $page->price(); ?></span>
    </p>
  </article>
  <article class="product-description">
    <?php foreach ($page->description()->toStructure() as $descriptionSection): ?>
      <div class="product-line">
        <div class="product-line-subhead"><?= $descriptionSection->subhead(); ?></div>
        <div class="product-line-detail"><?= $descriptionSection->detail(); ?></div>
      </div>
    <?php endforeach ?>
  </article>
  <article class="product-amounts">
    <div class="product-amounts-line">
      <div class="product-amounts-line-subhead">Variants</div>
      <div class="product-amounts-line-detail"><?php foreach ($page->sizing()->toStructure() as $size): ?>
        <?= $size->sizeOption(); ?><br>
      <?php endforeach ?>
      </div>
    </div>
    <div class="product-amounts-line">
      <div class="product-amounts-line-subhead">Quantity</div>
      <div class="product-amounts-line-detail"><button class="boxed-link">-</button>
      <input name="product-amount" type="number" min="1" value="1"></input>
      <button class="boxed-link">+</button>
      </div>
    </div>
  </article>
  <article class="product-purchase">
    <a class="fancy-button" href="https://shop.gloriagloria.com/cart/32900404576317:1">Purchase</a>
  </article>
</section>
