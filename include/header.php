<?php
include "config.php";
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Fire Care Engineers</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="assets/css/plugins.css">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

    <!--Offcanvas menu area start-->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="canvas_open1">
                    <a onclick="myFunction()" href="javascript:void(0)">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!--Offcanvas menu area end-->
    <script>
        function myFunction() {
            var x = document.getElementById("myDIV");
            if (x.style.display == "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
    </script>
    <!--header area start-->
    <header>
        <div class="main_header">
            <div class="container" style="padding-left: 0px;">
                <!--header top start-->
                <div class="header_top">
                    <div class="row align-items-center">
                        <div class="col-lg-4 col-md-5">
                            <div class="antomi_message">
                          
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-7">
                            <div class="header_top_settings text-right">
                                <ul>
                                    <li> Feel Free To Connect Us :  <a href="tel:+0123456789">0123456789 </a></li>
                                    <li><a href="#">Info@fcengg.com</a></li>
                                    <!-- <li><a href="#">Track Your Order</a></li> -->
                                    <!-- <li>Hotline: <a href="tel:+0123456789">0123456789 </a></li> -->
                                    <li><div class="">
                                <ul>
                                    <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                                    <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a class="rss" href="#"><i class="fa fa-rss"></i></a></li>
                                </ul>
                            </div></li>
                                    <li><figure class="app_img">
                                    <a href="#">India</a>
                                </figure></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!--header top start-->

                <!--header middel start-->
                <div class="header_middle sticky-header">
                    <div class="row align-items-center">
                        <div class="col-lg-4 col-md-3 col-6">
                            <div class="logo">
                                <a href="index.html"><img src="assets/img/logo/logo.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-12">
                            <div class="search_container">
                                <form action="#">
                                    <div class="search_box">
                                        <input placeholder="Search product..." type="text">
                                        <button type="submit">Search</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-7 col-4">
                            <div class="header_configure_area">
                                <div class="header_wishlist">
                                    <a href="wishlist.html"><i class="ion-android-favorite-outline"></i>
                                        <span class="wishlist_count">3</span>
                                    </a>
                                </div>
                                <div class="mini_cart_wrapper">
                                    <a href="javascript:void(0)">
                                        <i class="fa fa-shopping-bag"></i>
                                        <span class="cart_price">$152.00 <i class="ion-ios-arrow-down"></i></span>
                                        <span class="cart_count">2</span>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--header middel end-->

                <!--mini cart-->
                <div class="mini_cart">
                    <div class="cart_close">
                        <div class="cart_text">
                            <h3>cart</h3>
                        </div>
                        <div class="mini_cart_close">
                            <a href="javascript:void(0)"><i class="ion-android-close"></i></a>
                        </div>
                    </div>
                    <div class="cart_item">
                        <div class="cart_img">
                            <a href="#"><img src="assets/img/s-product/product.jpg" alt=""></a>
                        </div>
                        <div class="cart_info">
                            <a href="#">Primis In Faucibus</a>
                            <p>Qty: 1 X <span> $60.00 </span></p>
                        </div>
                        <div class="cart_remove">
                            <a href="#"><i class="ion-android-close"></i></a>
                        </div>
                    </div>
                    <div class="cart_item">
                        <div class="cart_img">
                            <a href="#"><img src="assets/img/s-product/product2.jpg" alt=""></a>
                        </div>
                        <div class="cart_info">
                            <a href="#">Letraset Sheets</a>
                            <p>Qty: 1 X <span> $60.00 </span></p>
                        </div>
                        <div class="cart_remove">
                            <a href="#"><i class="ion-android-close"></i></a>
                        </div>
                    </div>
                    <div class="mini_cart_table">
                        <div class="cart_total">
                            <span>Sub total:</span>
                            <span class="price">$138.00</span>
                        </div>
                        <div class="cart_total mt-10">
                            <span>total:</span>
                            <span class="price">$138.00</span>
                        </div>
                    </div>
                    <div class="mini_cart_footer">
                        <div class="cart_button">
                            <a href="cart.html">View cart</a>
                        </div>
                        <div class="cart_button">
                            <a class="active" href="checkout.html">Checkout</a>
                        </div>

                    </div>
                </div>
                <!--mini cart end-->


                <!--header bottom satrt-->
                <div class="header_bottom">
                    <div class="row align-items-center">
                        <div class="column1 col-lg-3 col-md-6 col-12">
                            <div class="Offcanvas_menu_wrapper">
                                <div class="search_box">
                                    <input placeholder="Search product..." type="text">
                                    <button type="submit">Search</button>
                                </div>
                            </div>
                            <div class="categories_menu">
                                <div id="myDIV" class="search_box">
                                    <input placeholder="Search product..." type="text">
                                    <button type="submit">Search</button>
                                </div>
                                <div class="categories_title">
                                    <h2 class="categori_toggle">ALL CATEGORIES</h2>
                                </div>
                                <div class="categories_menu_toggle">
                                    <ul>
                                    <?php
                                    $category = mysqli_query($conn, "SELECT * FROM `category`");
                                    while($get_category = mysqli_fetch_assoc($category)){
                                        $catnm = $get_category['cat_name'];
                                        ?>
                                        <li class="menu_item_children"><a href="#"><?= $catnm?> <i class="fa fa-angle-right"></i></a>
                                            <ul class="categories_mega_menu">

                                                <li class="menu_item_children"><a href="#"><?= $catnm?></a>
                                                    <ul class="categorie_sub_menu">
                                                    <?php 
                                                    $subcategory = mysqli_query($conn, "SELECT * FROM `subcategory` where `category_name`='$catnm'");
                                                   while($get_subcategory = mysqli_fetch_assoc($subcategory)){?>
                                                        <li><a href="#"><?= $get_subcategory['subcategory_name']?></a></li>
                                                       <?php } ?>
                                                    </ul>
                                                </li>

                                               
                                            </ul>
                                        </li>
                                       
                                       <?php } ?>
                                        <!-- <li class="hidden"><a href="#">New Sofas</a></li> -->

                                      
                                        <!-- <li><a href="#" id="more-btn"><i class="fa fa-plus" aria-hidden="true"></i> More Categories</a></li> -->
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--header bottom end-->
            </div>
        </div>
    </header>
    <!--header area end-->
   