<?php
include "./include/header.php";
include "./include/sidebar.php";


if(!isset($_SESSION['admin'])){
    echo "<script>location.replace('login.php');</script>";
}else{
    echo "";
}

$single_product_image_upload = $_GET['id'];
$type = $_GET['type'];


$get = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `products_detail_image` WHERE `products_image_id`='$single_product_image_upload'"));
$getmemyid = $get['products_ref_id'];

if($type == "delete"){
 $delet =  mysqli_query($conn , "DELETE FROM `products_detail_image` WHERE `products_image_id`='$single_product_image_upload'");
 if($delet){
    echo "<script>location.replace('image_upload_view.php?id=$getmemyid')</script>";
 }
}




$success="";
$unsuccess="";
if(isset($_POST['send'])){
    $product_id = $_POST["product_id"];    
  
    $product_img = $_FILES["product_img"];  
    $product_img_name = $product_img['name'];
    $product_img_tmp_name = $product_img['tmp_name'];
    $product_data = addslashes(file_get_contents($product_img_tmp_name));
// echo "UPDATE `products_detail_image` SET `products_images`='$product_data' WHERE `products_image_id`='$single_product_image_upload'";exit;
    
$ins_cat = mysqli_query($conn,"UPDATE `products_detail_image` SET `products_images`='$product_data' WHERE `products_image_id`='$single_product_image_upload'");
if($ins_cat){
    $success='<div class="alert alert-primary" role="alert">
    Success
    </div>';
    echo "<script>location.replace('image_upload_view.php?id=$getmemyid')</script>";
}else{
    $unsuccess='<div class="alert alert-danger" role="alert">
    Unsuccess
    </div>';
}
}


?>
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <?php
            include "./include/head.php";
         ?>


        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1> -->


            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header ">
                    <!-- <h6 class="m-0 font-weight-bold text-primary">All Categories</h6> -->
                    <div class="row">
                        <div class="col-md-10">
                            <h6 class="m-0 font-weight-bold text-primary">Edit Product Image</h6>
                        </div>
                        <!-- <div class="col-md-2">
                            <a data-toggle="modal" data-target="#exampleModal" class="btn btn-primary btn-sm ">Add
                                New
                                </a>

                        </div> -->
                    </div>
                </div>

                <div class="card-body">
                <form  method="POST" enctype="multipart/form-data" class="form-horizontal">                        
                        <div class="row  p-2">
                        <?= $success ?>
                          <?= $unsuccess ?>

                           

                            <div class="form-group col-sm-4">
                                <label class=" control-label">Add New Image</label>
                                <div>
                                    <input type="file" class="form-control input-md"  name="product_img" required>
                                </div>
                            </div>


                            <div class="form-group col-sm-4">
                                <!-- <label class=" control-label">Brand Url</label> -->
                                <div>
                                    <input type="hidden" class="form-control input-md" placeholder="Enter Brand Url"
                                        name="product_id" value="<?= $single_product_image_upload ?>" required>
                                </div>
                            </div>

                        </div>
                        <div class="text-left">
                            <button type="submit" class="btn btn-primary btn-sm" name="send">Update</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->



       




        <?php 
    include "./include/footer.php";
?>