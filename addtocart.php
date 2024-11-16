<?php
session_start();
include('admin/Class/adminBack.php');

$obj = new adminBack();
$ctg = $obj->p_display_category();
$ctgDatas = array();
while ($data = mysqli_fetch_assoc($ctg)) {
    $ctgDatas[] = $data;
}

 
    



if(isset($_SESSION['user_id']))
{
 $userid2=$_SESSION['user_id'];
$num = $obj->total_cart_item($userid2);

if(isset($_GET['status'])){
    $get_id = $_GET['id'];
    if($_GET['status']=='delete'){
        $msg = $obj->delete_cart_item($get_id,$userid2);
    }
}
}

?>

<?php include_once('includes/head.php'); ?>

<body class="biolife-body">
    <?php include_once('includes/preloader.php'); ?>

    <!-- HEADER -->
    <header id="header" class="header-area style-01 layout-03">
        <?php include_once('includes/header_top.php'); ?>
        <?php include_once('includes/header_middle.php'); ?>
        <?php include_once('includes/header_bottom.php'); ?>
    </header>

    <!-- Page Contain -->
    <?php 
            
            if(isset($_SESSION['user_id']))
             {
                $userid=$_SESSION['user_id'];
                $username=$_SESSION['user_name'];
               
                ?>
    <div class="page-contain">

        <!-- Main content -->
        <div id="main-content" class="main-content">
            <div class="container">
                <br>
                <div class="shopping-cart-container">
                    <div class="row">
                        <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                            <h3 class="box-title">Your cart items</h3>
                            <h5 align="center" style="color:green;">  <?php if(isset($msg)){
    echo $msg;
} ?></h5>
                            <form class="shopping-cart-form" action="#" method="post">
                                <table class="shop_table cart-form">
                                    <thead>
                                        <tr>
                                            <th class="product-name">Product Name</th>
                                            <th class="product-price">Quantity</th>
                                            <th class="product-price">Price</th>
                                            <th class="product-price">Total</th>
                                            <th class="product-quantity">Remove</th>
                                            <th class="product-quantity">Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                       $obj = new adminBack();
                                       $ctg = $obj->p_display_cart($userid);
                                     
                                       while ($data = mysqli_fetch_assoc($ctg)) 
                                        {?>
                                            <tr class="cart_item">
                                                <td class="product-thumbnail" data-title="Product Name">
                                                    <a class="prd-thumb" href="#">
                                                        <figure><img width="113" height="113" src="admin/upload/<?php echo $data['pdt_img']; ?>" alt="shipping cart"></figure>
                                                    </a>
                                                    <a class="prd-name" href="#"><?php echo $data['pdt_name']; ?></a>
                                                </td>
                                                <td class="product-price" data-title="Price">
                                                    <div class="price price-contain">
                                                        <ins><span class="price-amount"><?php echo $data['quantity']; ?></span></ins>
                                                    </div>
                                                </td>
                                                
                                                <td class="product-subtotal" data-title="Total">
                                                    <div class="price price-contain">
                                                        <ins><span class="price-amount"><span class="currencySymbol">£</span><?php echo $data['pdt_price'] ?></span></ins>
                                                        <!-- <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del> -->
                                                    </div>
                                                </td>
                                                <td class="product-subtotal" data-title="Total">
                                                    <div class="price price-contain">
                                                        <ins><span class="price-amount"><span class="currencySymbol">£</span><?php echo $data['total'] ?></span></ins>
                                                        <!-- <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del> -->
                                                    </div>
                                                </td>
                                                <td class="product-quantity" data-title="Quantity">
                                                    <!-- <form action="" method="POST"> -->
                                                        <input type="hidden" name="remove_pdt_name" value="<?php echo $data['pdt_name']; ?>">
                                                        <a href="?status=delete&&id=<?php echo $data['pdt_id']; ?>" style="color:red">Remove Product</a>
                                                   
                                                </td>

                                                <td class="product-quantity" data-title="Order">
                                                    <!-- <form action="" method="POST"> -->
                                                        <input type="hidden" name="order_pdt_name" value="<?php echo $data['pdt_name']; ?>">
                                                        <a href="order.php?status=order&&id=<?php echo $data['pdt_id']; ?>" style="color:green;">Buy Now</a>
                                                   
                                                </td>
                                            </tr>
                                            </form>
                                        <?php }?>
                                        <tr class="cart_item wrap-buttons">
                                            <td class="wrap-btn-control" colspan="4">
                                                <a  href="category.php?status=catView&&id=19" class="btn back-to-shop">Back to Shop</a>
                                            
                                                <button class="btn btn-clear" type="reset">clear all</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                        <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                            <div class="shpcart-subtotal-block">
                            
                                <div class="subtotal-line">
                                    <b class="stt-name">ORDER NOW</b>
                                    <!-- <span class="stt-price">SHIPPING COST= RS 0/-</span> -->
                                </div>
                                <div class="tax-fee">
                                    <p class="title" >50% off</p>
                                    <p class="desc">Hurry Up</p>
                                </div>
                                <div class="btn-checkout">
                                    <a href="ordersuc.php" class="btn checkout">Check out</a>
                                </div>
                                <div class="biolife-progress-bar">
                                    <table>
                                        <tr>
                                            <td class="first-position">
                                                <span class="index">$0</span>
                                            </td>
                                            <td class="mid-position">
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td class="last-position">
                                                <span class="index">$99</span>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <p class="pickup-info"><b>Free Pickup</b> is available as soon as today More about shipping and pickup</p>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
    <?php }else{?>
    <div>&nbsp;</div>
    <div>&nbsp;</div>
    <div>&nbsp;</div>
    <div>&nbsp;</div>
<div style="text-align:center;color:#ff0000; background:#fff; font-size:18px; border-radius:10px;padding:10px;"><a href="user_register.php" style="color:#FF0000;">Click Here</a> to Registration !<br> Do you have any account , please <a href="user_login.php" style="color:#FF0000;">click here</a> to Log in your account!!!</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<?php }?>
    <!-- FOOTER -->
    <?php include_once('includes/footer.php'); ?>

    <!--Footer For Mobile-->
    <?php include_once('includes/mobile_footer.php'); ?>

    <?php include_once('includes/mobile_global_block.php'); ?>


    <!-- Scroll Top Button -->
    <a class="btn-scroll-top"><i class="biolife-icon icon-left-arrow"></i></a>
    <?php include_once('includes/scripts.php'); ?>

</body>

</html>