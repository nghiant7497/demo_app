<section class="flat-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumbs">
                    <li class="trail-item">
                        <a href="<?php echo $this->Url->build('/') ?>" title="">Home</a>
                        <span><img src="<?php echo $this->Url->image('front/icons/arrow-right.png')?>" alt=""></span>
                    </li>
                    <li class="trail-item">
                        <a href="#" title="">Shop</a>
                        <span><img src="<?php echo $this->Url->image('front/icons/arrow-right.png')?>" alt=""></span>
                    </li>
                    <li class="trail-end">
                        <a href="#" title="">Cart</a>
                    </li>
                </ul><!-- /.breacrumbs -->
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section>

<section class="flat-shop-cart">
    <div class="container">
        <?= $this->Form->create(null, ['url' => ['controller' => 'Cart', 'action' => 'update'], 'id' => 'my_form']) ?>
            <div class="row">
                <div class="col-lg-8">
                    <div class="flat-row-title style1">
                        <h3>Shopping Cart</h3>
                    </div>
                    <div class="table-cart">
                        <table>
                            <thead>
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(isset($carts['Orderproducts'])): ?>
                            <?php foreach ($carts['Orderproducts'] as $cart): ?>
                                <tr>
                                    <td>
                                        <div class="img-product">
                                            <img src="<?php echo $this->Url->build('/img/product_img/'.$cart['image_link']);?>" alt="">
                                        </div>
                                        <div class="name-product">
                                            <?php echo $cart['name']; ?>
                                        </div>
                                        <div class="price">
                                            <?php echo number_format($cart['price']); ?> đ
                                        </div>
                                        <div class="clearfix"></div>
                                    </td>
                                    <td>
                                        <div class="quanlity">
                                            <span class="btn-down"></span>
                                            <input type="number" name="qty_<?php echo $cart['product_id'] ?>" value="<?php echo $cart['quantity']; ?>" min="1" max="100" placeholder="Quanlity">
                                            <span class="btn-up"></span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="total">
                                            <?php echo number_format($cart['subtotal']); ?>đ
                                        </div>
                                    </td>
                                    <td>
                                        <a href="<?php echo $this->Url->build('/cart/delete/'.$cart['product_id']) ?>" title="">
                                            <img src="<?php echo $this->Url->image('front/icons/delete.png')?>" alt="">
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <?php else:?>
                                <tr>
                                    <td colspan="3">Cart empty</td>
                                </tr>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div><!-- /.table-cart -->
                </div><!-- /.col-lg-8 -->
                <div class="col-lg-4">
                    <div class="cart-totals">
                        <h3>Cart Totals</h3>
                        <table>
                            <tbody>
                            <tr>
                                <td>Total</td>
                                <td class="price-total"><?php echo number_format($carts['Order']['total']); ?>đ</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="btn-cart-totals">
                            <button type="submit">Update Cart</button>
                            <a href="<?php echo $this->Url->build('order/checkout') ?>" class="checkout" title="">Proceed to Checkout</a>
                        </div><!-- /.btn-cart-totals -->
                    </div><!-- /.cart-totals -->
                </div><!-- /.col-lg-4 -->
            </div><!-- /.row -->
        <?= $this->Form->end() ?>
    </div><!-- /.container -->
</section><!-- /.flat-shop-cart -->
