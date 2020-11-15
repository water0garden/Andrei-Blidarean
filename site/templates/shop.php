<?php snippet('head') ?>
<?php snippet('header') ?>

<main class="flow">

  <section>
    <inner>
      <?php
      $url = "https://35610b875133d421eae9fa09cf89764b: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@miss-crabb.myshopify.com/admin/api/2020-10/products.json";
      $curl = curl_init( $url );
      curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      $json_response = curl_exec($curl);
      curl_close($curl);
      $result = json_decode($json_response, TRUE);
      // var_dump($result);

      $products = $result['products'];
      $productNum = 0;

      foreach ($products as $product => $value) {
        $productNum++;
        $productName = preg_replace("/\[.*?\] /", "", $value['title']);

        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $productName)));
        echo '<article class="product-section js-product-section" '
          . 'id="' . $slug . '"'
          . 'data-open-mobile="false"'
          . '"data-id="' . $value['id'] . '">';
        echo '<hr>';

        echo '<div class="product-images js-product-images" data-default-image="true">';
          foreach ($value['images'] as $image => $imagevalue) {
            $rawImageURL = $imagevalue['src'];
            $compressedImageURL = str_replace('.png', '_240x.png', $rawImageURL);
            echo '<figure class="product-image js-product-image" data-image-id="' . $imagevalue['id'] . '">' .
            '<img width="666" src="' . $compressedImageURL . '">' .
            '</figure>';
          };
          echo '</div>';

          echo '<div class="product-text">';

          echo '<h2 class="text-large product-title js-product-title">'
          . '<span>' . $productName . '</span>'
          . '<span class="mq-lg-up-only">$' . $value['variants'][0]['price'] . '</span>'
          . '<div class="mobile-toggle-open"></div>'
          . '</h2>';

          echo '<div class="text product-mobile-description">'
          . '<span>' . $value['body_html'] . '</span>'
          . '<span>$' . $value['variants'][0]['price'] . '</span>'
          . '</div>';


          $variantNum = 0;
          echo '<div class="product-variants">';
          foreach ($value['variants'] as $variant => $variantvalue) {
            $variantNum++;
            echo '<div class="product-variant js-product-variant" ' .
            'data-variant-id="' . $variantvalue['id'] . '" ' .
            'data-quantity="' . $variantvalue['inventory_quantity'] . '" ' .
            'data-image-id="' . $variantvalue['image_id'] . '" ' .
            '>';
              echo
              '<div class="variant-counter">' . $variantNum . '</div>' .
              '<div class="variant-title">' . $variantvalue['title'] . '</div>' .
              '<div class="variant-description">' . $value['body_html'] . "</div>" .
              '<div class="variant-add-to-cart" data-add-to-cart-id="' . $value['id'] . '">' .
              '<button class="js-add-to-cart">' .
                'Add to Cart' .
              '</button>' .
              '</div>' .
              '<div class="variant-number-selection">'
                . '<button class="qty-btn -increase js-increase-qty"></button>'
                . '<button class="qty-btn -decrease js-decrease-qty"></button>'
                . '<input placeholder="0" '
                  . 'class="js-product-buying-input" '
                  . 'id="product-variant-row-' . $variantvalue['id'] . '" '
                  . 'name="product-variant-' . $variantvalue['id'] . '" '
                  . 'data-product-variant-id="' . $variantvalue['id'] . '" '
                  . 'data-product-cost="' . $value['variants'][0]['price'] . '" '
                  . 'type="number" '
                  . 'value="0" '
                  . 'min="0" '
                  . 'max="' . $variantvalue['inventory_quantity'] . '" '
                  . 'data-max="' . $variantvalue['inventory_quantity']. '" '
                . '/>'
              . '</div>';
            echo '</div>';
          };
          echo '</div>';


        echo '</article>';
      }
      ?>
    </inner>
  </section>
</main>

<a href="/shop" class="js-cart-url">
  <aside class="bottom-banner -checkout">
    <inner>
      <div class="banner-col -left">
        <span class="js-cart-count">0</span> item<span class="multiple-cart-count-s">s</span>
      </div>
      <div class="banner-col -center">
        CHECKOUT
      </div>
      <div class="banner-col -right">
        Total: $<span class="js-cart-cost-total">0.00</span>
      </div>
    </inner>
  </aside>
</a>


<?php snippet('footer') ?>
<?php snippet('foot') ?>
