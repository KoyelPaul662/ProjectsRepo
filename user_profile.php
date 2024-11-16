<?php
session_start();
include('admin/Class/adminBack.php');
$obj = new adminBack();
$ctg = $obj->p_display_category();
$ctgDatas = array();
while ($data = mysqli_fetch_assoc($ctg)) {
    $ctgDatas[] = $data;
}
if(isset($_POST['user_login_btn'])){
    $msg=$obj->user_login($_POST);
}
$userid = $_SESSION['user_id'];
$username = $_SESSION['user_name'];
if($userid == null){
    header("location: user_login.php");
}
if(isset($_GET['logoutuser'])){
    if($_GET['logoutuser']='logout'){
        $obj->user_logout();
    }
}
$num = $obj->total_cart_item($userid);
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
    <div class="page-contain">

        <!-- Main content -->
        <div class="container">
            <h2>User Profile Page</h2>
            <div class="user_info">
                <div class="user_details">
                    <h3>Hello <?php if(isset($username)){echo strtoupper($username);} ?></h3>
                    <a href="?logoutuser=logout">Logout</a>
                </div>
                <div class="history">
                <div class="shopping-cart-container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <h3 class="box-title">Order History</h3>
                            <form class="shopping-cart-form" action="#" method="post">
                                <table class="shop_table cart-form">
                                    <thead>
                                    <tr>
                                        <th class="product-name">Product Name</th>
                                        <th class="product-price">Quantity</th>
                                        <th class="product-price">Price</th>
                                        <th class="product-price">Total Paid</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                       $obj = new adminBack();
                                       $ctg = $obj->p_display_order($userid);
                                     
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
                                        <td class="product-price" data-title="Price">
                                            <div class="price price-contain">
                                                <ins><span class="price-amount"><span class="currencySymbol">Rs</span><?php echo $data['pdt_price']; ?></span></ins>
                                            </div>
                                        </td>

                                        <td class="product-price" data-title="Price">
                                            <div class="price price-contain">
                                                <ins><span class="price-amount"><span class="currencySymbol">Rs</span><?php echo $data['total']; ?></span></ins>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>

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