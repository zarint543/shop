<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset($_POST['delete-cart-submit'])){
        $deletedrecord = $cart->deleteCart($_POST['delete-cart-submit']);
    }
}
?>

<section id="cart" class="py-3">
    <div class="container-fluid w-75">
        <h5 class="font-baloo font-size-20">Shopping Cart</h5>

        <!--  shopping cart items   -->
        <div class="row">
            <div class="col-sm-9">
                <!-- cart item -->

                <?php


                $money =0;


                function cc ($cartCost) {
                    $GLOBALS['money']= $GLOBALS['money']+ $cartCost;

                };


                $cartData = $product->getData('cart');
                $products = $product->getData();


                $tt = $cart->cartArr($cartData);

                array_map(function ($product) use ($tt) {
                    if (in_array($product['item_id'], $tt)) {
                            cc($product['item_price']);
                        ?>
                        <div class="row border-top py-3 mt-3">
                            <div class="col-sm-2">
                                <img src="<?php echo $product['item_image'] ?>" style="height: 120px;" alt="cart1" class="img-fluid">
                            </div>
                            <div class="col-sm-8">
                                <h5 class="font-baloo font-size-20"><?php echo $product['item_name'] ?></h5>
                                <small>by <?php echo $product['item_brand'] ?></small>
                                <!-- product rating -->
                                <div class="d-flex">
                                    <div class="rating text-warning font-size-12">
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="far fa-star"></i></span>
                                    </div>
                                    <a href="#" class="px-2 font-rale font-size-14">20,534 ratings</a>
                                </div>
                                <!--  !product rating-->

                                <!-- product qty -->
                                <div class="qty d-flex pt-2">

                                    <form method="post">
                                        <button type="submit" name="delete-cart-submit" value="<?php echo $product['item_id'] ?>" class="btn font-baloo text-danger px-3 border-right">Delete
                                        </button>
                                        <button type="submit" class="btn font-baloo text-danger">Save for Later</button>
                                    </form>
                                </div>
                                <!-- !product qty -->

                            </div>

                            <div class="col-sm-2 text-right">
                                <div class="font-size-20 text-danger font-baloo">
                                    $<span class="product_price"><?php echo $product['item_price'] ?></span>
                                </div>
                            </div>
                        </div>
                        <!-- !cart item -->
                        <?php
                    }

                }, $products);
                ?>

            </div>
            <!-- subtotal section-->
            <div class="col-sm-3">
                <div class="sub-total border text-center mt-2">
                    <h6 class="font-size-12 font-rale text-success py-3"><i class="fas fa-check"></i> Your order is
                        eligible for FREE Delivery.</h6>
                    <div class="border-top py-4">
                        <h5 class="font-baloo font-size-20">Subtotal (<?php echo count($tt) ?> item):&nbsp; <span class="text-danger">$<span
                                        class="text-danger" id="deal-price"><?php echo $GLOBALS[ 'money']; ?></span> </span></h5>
                        <button type="submit" class="btn btn-warning mt-3">Proceed to Buy</button>
                    </div>
                </div>
            </div>
            <!-- !subtotal section-->
        </div>
        <!--  !shopping cart items   -->
    </div>
</section>

