<?php
if($_SERVER['REQUEST_METHOD']== 'POST'){
    $cart->adding($_POST['user_id'],$_POST['item_id']);
}

?>

<section id="new-phones">
    <div class="container py-5">
        <h4 class="font-rubik font-size-20">New Phones</h4>
        <hr />
        <div class="owl-carousel owl-theme">
            <?php
            array_map( function ($product) {
                ?>
                <div class="item py-2">
                    <div class="product font-rale">
                        <a href="product.php<?php echo "?item_id=" . $product['item_id']; ?>"><img
                                    src="<?php echo $product['item_image'] ?>" alt="product1" class="img-fluid"/></a>
                        <div class="text-center">
                            <h6><?php echo $product['item_name'] ?? "Unknown"; ?></h6>
                            <div class="rating text-warning font-size-12">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="far fa-star"></i></span>
                            </div>
                            <div class="price py-2">
                                <span><?php echo $product['item_price'] ?></span>
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
            <?php }, $products) ?>

        </div>
    </div>
</section>