<style>
    table{
       
        width: 100%!important;
         margin-bottom: 1rem!important;
         color: #858796!important;
           }
           tr{
            /* border-top: 2px solid #e7e7e7; */
            border-bottom: 2px solid #e7e7e7;
           }
           table td, table th {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 1px solid #e3e6f0;
            }
    
</style>
<?php
include "./include/header.php";
include "./include/sidebar.php";
// check session start
if(!isset($_SESSION['admin'])){
    echo "<script>location.replace('login.php');</script>";
}else{
    echo "";
}

$getid = $_GET['id'];
$success="";
$unsuccess="";
if(isset($_POST['send'])){
    $product_name = $_POST['product_name'];
    $product_sale_price = $_POST['product_sale_price'];
    $product_mrp_price = $_POST['product_mrp_price'];
    $product_description = $_POST['product_description'];
    $product_specification = $_POST['product_specification'];

    // $product_img = $_FILES["product_image"];  
    // $product_img_name = $product_img['name'];
    // $product_img_tmp_name = $product_img['tmp_name'];
    // $product_data = addslashes(file_get_contents($product_img_tmp_name));   

$ins_cat = mysqli_query($conn,"INSERT INTO `products`(`product_name`, `product_mrp_price`,`product_sale_price`, `product_description`, `product_specification`) VALUES ('$product_name','$product_mrp_price','$product_sale_price','$product_description','$product_specification')");
if($ins_cat){
    $success='<div class="alert alert-primary" role="alert">
    Success
    </div>';
    echo "<script>location.replace('products.php');</script>";
}else{
    $unsuccess='<div class="alert alert-danger" role="alert">
    Unsuccess
    </div>';
}
// }else{
//     echo "<script>alert('Alread exist')</script>";
// }
}

$getall_detail = mysqli_fetch_assoc(mysqli_query($conn , "SELECT * FROM `products` WHERE `product_id`='$getid'"));
?>



<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <?php
            include "./include/head.php";
         ?>

        <section class="content-header">
            <div class="container-fluid">
                <div class="card shadow mb-4">
                    <div class="card-header ">
                        <!-- <h6 class="m-0 font-weight-bold text-primary">All Categories</h6> -->
                        <div class="row">
                            <div class="col-md-10">
                                <h6 class="m-0 font-weight-bold text-primary">View Product Detail</h6>
                            </div>
                            <div class="col-md-2">
                                <a href="products.php" class="btn btn-primary btn-sm ">View Products
                                </a>
                            </div>
                        </div>
                    </div>                   
                </div>


                <?= $success ?>
                    <?= $unsuccess ?>
                <div class="card-body">
                <form  method="POST" enctype="multipart/form-data" class="form-horizontal">                        
                        <div class="row  p-2">
                           

                        <div class="form-group col-sm-6">
                                <label class=" control-label"><b>Product Name</b></label>
                                <div>                                   
                                        <p><?= $getall_detail['product_name'] ?></p>
                                </div>
                            </div>

                            <div class="form-group col-sm-3">
                                <label class=" control-label"><b>Product MRP Price</b></label>
                                <div>                                   
                                        <p>Rs <?= $getall_detail['product_mrp_price'] ?></p>
                                </div>
                            </div>

                            <div class="form-group col-sm-3">
                                <label class=" control-label"><b>Product Sale Price</b></label>
                                <div>                                    
                                        <p>Rs <?= $getall_detail['product_sale_price'] ?></p>
                                </div>
                            </div>

                                                                                 
                           


                            <div class="form-group col-sm-12">
                                <label class=" control-label"><b>Product Description</b></label>
                                <div>
                                
                                <p><?= $getall_detail['product_description'] ?></p>
                            </div>
                            </div>


                            <div class="form-group col-sm-12">
                                <label class=" control-label"><b>Product Specification</b></label>
                                <div>
                                <!-- <textarea placeholder="Enter Product Description" name="product_specification" id="ckeditor"  class="form-control input-md ckeditor" required></textarea>                                    -->
                                <p><?= $getall_detail['product_specification'] ?></p>
                            </div>
                            </div>
                        

                        </div>
                        <!-- <div class="text-left">
                            <button type="submit" class="btn btn-primary btn-sm" name="send">Submit</button>
                        </div> -->
                    </form>
                </div>
            </div>
    </div><!-- /.container-fluid -->
    </section>

<script src="./ckeditor/ckeditor.js"></script>
    <?php 
    include "./include/footer.php";
?>