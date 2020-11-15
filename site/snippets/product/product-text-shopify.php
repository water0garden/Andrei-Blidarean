<?php
$shopifyID = $page->shopifyID();
$url = "https://35610b875133d421eae9fa09cf89764b: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@miss-crabb.myshopify.com/admin/api/2020-10/products.json?ids=" . $shopifyID;
$curl = curl_init( $url );
curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$json_response = curl_exec($curl);
curl_close($curl);
$result = json_decode($json_response, TRUE);

$products = $result['products'];
$productNum = 0;

$value = $products[0];

$productName = preg_replace("/\[.*?\] /", "", $value['title']);
$productSlug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $productName)));
$productID = $value['id'];
$images = $value['images'];
$productPrice = $value['variants'][0]['price'];
$bodyHTML = $value['body_html'];
$price = $value['variants'][0]['price'];

$variantNum = 0;
foreach ($value['variants'] as $variant => $variantvalue) {
  $variantNum++;
  $variantID = $variantvalue['id'];
  $variantQuantity = $variantvalue['inventory_quantity'];
  $variantImage = $variantvalue['image_id'];
  $variantTitle = $variantvalue['title'];
};

$variantCount = count( $value['variants'] );

?>

<section class="product-text grid-outer-24">
  <article class="product-key-info">
    <p>
      <?= $page->title(); ?><br><br class="desktop-break">
      <span class="bracket-text">$<?= $price; ?> NZD</span>
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
    <div class="product-amounts-line" data-variant-count="<?= $variantCount; ?>">
      <div class="product-amounts-line-subhead">Sizing</div>
      <div class="product-amounts-line-detail">
        <?php $variantNum = 0; ?>
        <?php $selectedVariantId = null; ?>
        <?php $selectedUnset = true; ?>
        <?php foreach ($value['variants'] as $variant => $variantvalue): ?>
          <?php $variantNum++; ?>
          <?php $variantID = $variantvalue['id']; ?>
          <?php $variantQuantity = $variantvalue['inventory_quantity']; ?>
          <?php $variantTitle = $variantvalue['title']; ?>
          <button
            data-variant-id="<?= $variantID; ?>"
            data-variant-quantity="<?= $variantQuantity; ?>"
            class="size-button js-size-button
            <?php if($variantQuantity > 0 && $selectedUnset): ?>
              <?php $selectedUnset = false; ?>
               is-selected
               <?php $selectedVariantId = $variantID; ?>
             <?php endif; ?>">
            <?= $variantTitle; ?>
          </button>
        <?php endforeach; ?><br>
        <a class="asterisk-link" href="/sizing">Size Guide</a>
      </div>
    </div>
    <div class="product-amounts-line">
      <div class="product-amounts-line-subhead">Quantity</div>
      <div class="product-amounts-line-detail">
        <button class="boxed-link js-qty-decrease">-</button>
        <input class="js-product-amount" name="product-amount" type="number" min="1" max="10" value="1"></input>
        <button class="boxed-link js-qty-increase">+</button>
      </div>
    </div>
  </article>
  <article class="product-purchase">
    <?php if ($selectedVariantId !== null): ?>
      <a class="fancy-button js-product-purchase-button" href="https://shop.gloriagloria.com/cart/<?= $selectedVariantId; ?>:1">Purchase</a>
    <?php else: ?>
      Sold out
    <?php endif; ?>
  </article>
</section>
