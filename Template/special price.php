<?php

$products = $product->getData();
$brnd = array_map(function ($item) {
    return $item['item_brand'];
}, $products);
$uniqueBrand = array_unique($brnd);
?>


<section id="special-price">
    <div class="container">
        <h4 class="font-rubik font-size-20">Special Price</h4>
        <div id="filter" class="button-group text-right">
            <button class="btn is-checked" data-filter="*">All Brand</button>

            <?php array_map(function ($b_name) { ?>
                <button class="btn is-checked" data-filter=".<?php echo $b_name ?>"> <?php echo $b_name  ?>
                </button> <?php }, $uniqueBrand) ?>


        </div>

        <div class="grid">
            <?php array_map(function ($product) { ?>

                <div class="grid-item <?php echo $product['item_brand'] ?> border">
                    <div class="item py-2" style="width: 200px">
                        <div class="product font-rale">
                            <a href="product.php<?php echo "?item_id=".$product['item_id']; ?>"><img src="<?php echo $product['item_image'] ?>" alt="product1"
                                             class="img-fluid"/></a>
                            <div class="text-center">
                                <h6><?php echo $product['item_name'] ?></h6>
                                <div class="rating text-warning font-size-12">
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="far fa-star"></i></span>
                                </div>
                                <div class="price py-2">
                                    <span><?php echo $product['item_price'] ?? "Unknown"; ?></span>
                                </div>
                                <form  method="post">
                                    <input type="hidden" name="user_id" value="2">
                                    <input type="hidden" name="item_id" value="<?php echo $product['item_id'] ?>">
                                    <?php
                                    if(in_array($product['item_id'], $GLOBALS['cartData'], true)){
                                        echo '<button type="button" class="btn btn-success font-size-12">Already in the cart</button>';
                                    }else{
                                        echo '<button type="submit" name="submit-button" class="btn btn-warning font-size-12">
                                    Add to Cart
                                </button>';
                                    }
                                    ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            <?php }, $products) ?>


        </div>
    </div>
</section>