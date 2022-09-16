<?php
include "./include/header.php";
include "./include/sidebar.php";


if(!isset($_SESSION['admin'])){
    echo "<script>location.replace('login.php');</script>";
}else{
    echo "";
}
// location.replace('login.php')
$product_id = $_GET['id'];
// echo "SELECT * FROM `products_detail_image` WHERE `products_ref_id`='$product_id'";
// $get = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `products_detail_image` WHERE `products_ref_id`='$product_id'"));
// $getid = $get['products_image_id'];

$success="";
$unsuccess="";
if(isset($_POST['send'])){
    $product_id = $_POST["product_id"];    
  
    $product_img = $_FILES["product_img"];  
    $product_img_name = $product_img['name'];
    $product_img_tmp_name = $product_img['tmp_name'];
    $product_data = addslashes(file_get_contents($product_img_tmp_name));

    
$ins_cat = mysqli_query($conn,"INSERT INTO `products_detail_image`(`products_images`, `products_ref_id`) VALUES ('$product_data','$product_id')");
if($ins_cat){
    $success='<div class="alert alert-primary" role="alert">
    Success
    </div>';
    echo "<script>location.replace('image_upload_view.php?id=$product_id')</script>";
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
                            <h6 class="m-0 font-weight-bold text-primary">Add Product Image</h6>
                        </div>
                        <div class="col-md-2">
                            <a href="image_upload_view.php?id=<?= $product_id ?>" class="btn btn-primary btn-sm ">View Image
                                </a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                <form  method="POST" enctype="multipart/form-data" class="form-horizontal">                        
                        <div class="row  p-2">
                            <div class="col-md-12">
                            <?= $success ?>
                          <?= $unsuccess ?>
                            </div>
                                                 

                            <div class="form-group col-sm-4">
                                <label class=" control-label">Brand Image</label>
                                <div>
                                    <input type="file" class="form-control input-md"  name="product_img" required>
                                </div>
                            </div>


                            <div class="form-group col-sm-4">
                                <!-- <label class=" control-label">Brand Url</label> -->
                                <div>
                                    <input type="hidden" class="form-control input-md" placeholder="Enter Brand Url"
                                        name="product_id" value="<?= $product_id ?>" required>
                                </div>
                            </div>

                        </div>
                        <div class="text-left">
                            <button type="submit" class="btn btn-primary btn-sm" name="send">Submit</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->



     




        <?php 
    include "./include/footer.php";
?>