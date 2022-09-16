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
$type = $_GET['type'];
// data delete
if($getid != "" AND $type == "delete"){
    $query = mysqli_query($conn , "delete from `products` WHERE `product_id`='$getid'");
    if($query){
        echo "<script>location.replace('products.php');</script>";
    }
}


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
   

  
    $ins_cat = mysqli_query($conn,"UPDATE `products` SET `product_name`='$product_name',`product_mrp_price`='$product_mrp_price',`product_sale_price`='$product_sale_price',`product_description`='$product_description',`product_specification`='$product_specification'");
         
   

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
                                <h6 class="m-0 font-weight-bold text-primary">Add Product</h6>
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
                           
                        <div class="form-group col-sm-4">
                                <label class=" control-label">Product Name</label>
                                <div>
                                    <input type="text" class="form-control input-md" placeholder="Enter Product Name"
                                        name="product_name" value="<?= $getall_detail['product_name'] ?>" required>
                                </div>
                            </div>

                            <div class="form-group col-sm-4">
                                <label class=" control-label">Product MRP Price</label>
                                <div>
                                    <input type="text" class="form-control input-md" placeholder="Enter Product MRP Price"
                                        name="product_mrp_price" value="<?= $getall_detail['product_mrp_price'] ?>" required>
                                </div>
                            </div>

                            <div class="form-group col-sm-4">
                                <label class=" control-label">Product Sale Price</label>
                                <div>
                                    <input type="text" class="form-control input-md" placeholder="Enter Product Sale Price"
                                        name="product_sale_price" value="<?= $getall_detail['product_sale_price'] ?>" required>
                                </div>
                            </div>
                                        
                            

                                                                                 


                            <div class="form-group col-sm-12">
                                <label class=" control-label">Product Description</label>
                                <div>
                                <textarea placeholder="Enter Product Description" name="product_description" id="ckeditor"  class="form-control input-md ckeditor" required><?= $getall_detail['product_description'] ?></textarea>
                                </div>
                            </div>


                            <div class="form-group col-sm-12">
                                <label class=" control-label">Product Specification</label>
                                <div>
                                <textarea placeholder="Enter Product Description" name="product_specification" id="ckeditor"  class="form-control input-md ckeditor" required><?= $getall_detail['product_specification'] ?></textarea>                                   
                                </div>
                            </div>
                        
                        </div>
                        <div class="text-left">
                            <button type="submit" class="btn btn-primary btn-sm" name="send">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
    </div><!-- /.container-fluid -->
    </section>

<script src="./ckeditor/ckeditor.js"></script>
    <?php 
    include "./include/footer.php";
?>