<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/api/handle_api.php';

$response = isset( $_POST['search'] ) ? search_data( $_POST['search'] ) : get_data();

if ( count( $response ) <= 0 ) {
	echo '<p>No result!</p>';
} else {
	echo '<table>';

	foreach ( $response as $key => $data ) {
		?>
    <tr>
      <td>
        <div class="container">
          <div class="left-column">
            <img data-image="red" class="active" src="<?php
						echo $data["img_url"] ?>" alt="">
          </div>
          <div class="right-column">
            <!-- Product Description -->
            <div class="product-description">
              <h1><?php
								echo $data["description"] ?></h1>
              <p><?php
								echo $data["extdescription"] ?></p>
            </div>
            <!-- Product Pricing -->
            <div class="product-price">
                <span><?php
									echo $data["currency"] . "$" . $data["unit_price"] ?></span>
              <a href="#" class="cart-btn">Add to cart</a>
            </div>
          </div>
        </div>
      </td>
    </tr>
		<?php
	}
	echo '</table>';
}
