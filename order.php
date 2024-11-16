<?php
session_start();
include('admin/Class/adminBack.php');

$obj = new adminBack();
$ctg = $obj->p_display_category();
$ctgDatas = array();
while ($data = mysqli_fetch_assoc($ctg)) {
    $ctgDatas[] = $data;
}

$obj_adminBack = new adminBack();
    if(isset($_POST['ordernow'])){
        $return_mesg=$obj_adminBack->addtoorder($_POST);
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
                            <h3 class="box-title">ORDER NOW</h3>
                        
                           
                                <table class="shop_table cart-form">
                                    <thead>
                                        <tr>
                                            <th class="product-name">Product Name</th>
                                            <th class="product-price">Quantity</th>
                                            <th class="product-price">Price</th>
                                            <th class="product-price">Total</th>
                                            
                                            
                                        </tr>
                                    </thead>
                                  
                                    <tbody>
                                       
                                     <?php 
                                     if(isset($_GET['status'])){
                                        $get_id = $_GET['id'];
                                        if($_GET['status']=='order'){
                                            $msg = $obj->p_display_cartById($userid,$get_id);
                                        }
                                    }
                                       while ($data = mysqli_fetch_assoc($msg)) 
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
                                                
                                            </tr>
                                       
                                       
                                        <tr class="cart_item wrap-buttons">
                                            <td class="wrap-btn-control" colspan="4">
                                                <a  href="category.php?status=catView&&id=19" class="btn back-to-shop">Back to Shop</a>
                                            
                                                <!-- <button class="btn btn-clear" type="reset">clear all</button> -->
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                    
                                </table>
                                        
                        </div>
                        
                        <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                            <div class="shpcart-subtotal-block">
                            
                                <div class="subtotal-line">
                                <h5 align="center" style="color:green;">  <?php if(isset($return_mesg)){
    echo $return_mesg;
} ?></h5>
                                    <b class="stt-name">Delivery Address:</b>
                                    <!-- <span class="stt-price">SHIPPING COST= RS 0/-</span> -->
                                </div>
                                <form  action="#" method="post">
                                <div class="address" >
                                                        <input type="text" class="input-qty" name="address" id="address" placeholder="Enter Your Address" required>
                                                    </div>
                                                    <?php 
                                                    if(isset($_GET['status'])){
                                        $get_id1 = $_GET['id'];
                                        if($_GET['status']=='order'){
                                            $msgs = $obj->p_display_cartById($userid,$get_id1);
                                        }
                                    }
                                    while ($datas = mysqli_fetch_assoc($msgs)) 
                                        {?> 
                                
                                        <input type="hidden" name="userid" value="<?php echo $userid; ?>">
                                        <input type="hidden" name="username" value="<?php echo $username; ?>">
                                        <input type="hidden" name="pdt_id" value="<?php echo $datas['pdt_id']; ?>">
                                            <input type="hidden" name="pdt_name" value="<?php echo $datas['pdt_name']; ?>">
                                            <input type="hidden" name="pdt_img" value="<?php echo $datas['pdt_img']; ?>">
                                            <input type="hidden" name="pdt_price" value="<?php echo $datas['pdt_price']; ?>">
                                            <input type="hidden" name="pdt_ctg" value="<?php echo $datas['pdt_ctg']; ?>">
                                            <input type="hidden" name="qty" value="<?php echo $datas['quantity']; ?>">
                                            <input type="hidden" name="total" value="<?php echo $datas['total']; ?>">
                                            <input type="hidden" name="pdt_des" value="<?php echo $datas['pdt_des']; ?>">
                                            <?php } ?>
                                            <div>&nbsp;</div>
                                            <div>&nbsp;</div>
                                <input type="submit" name="ordernow" id="ordernow" value="Order Now" class="btn btn-block add-to-cart-btn" onClick="return confirm('Are you sure want to purchase this product?');" style="background:green;color:white;">
                                
                                </form>
                               
                                
                                
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
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
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