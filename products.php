<?php
include "./include/header.php";
include "./include/sidebar.php";


if(!isset($_SESSION['admin'])){
    echo "<script>location.replace('login.php');</script>";
}else{
    echo "";
}
// location.replace('login.php')



$success="";
$unsuccess="";
if(isset($_POST['send'])){
    $product_name = $_POST['product_name'];
    $product_sale_price = $_POST['product_sale_price'];
    $product_mrp_price = $_POST['product_mrp_price'];
    $product_description = $_POST['product_description'];
    $product_specification = $_POST['product_specification'];

    $product_img = $_FILES["product_img"];  
    $product_img_name = $product_img['name'];
    $product_img_tmp_name = $product_img['tmp_name'];
    $product_data = addslashes(file_get_contents($product_img_tmp_name));

    // $check_cat = mysqli_query($conn,"SELECT * FROM `Banners` WHERE `banner_name`='$banner_name'");
    // $cat_num = mysqli_num_rows($check_cat);
    // echo $cat_num;
    // if($cat_num == 0){   

$ins_cat = mysqli_query($conn,"INSERT INTO `products`(`product_name`, `product_mrp_price`,`product_sale_price`, `product_description`, `product_specification`, `product_image`) VALUES ('$product_name','$product_mrp_price','$product_sale_price','$product_description','$product_specification','$product_data')");
if($ins_cat){
    $success='<div class="alert alert-primary" role="alert">
    Success
    </div>';
}else{
    $unsuccess='<div class="alert alert-danger" role="alert">
    Unsuccess
    </div>';
}
// }else{
//     echo "<script>alert('Alread exist')</script>";
// }
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
                            <h6 class="m-0 font-weight-bold text-primary">All Products</h6>
                        </div>
                        <div class="col-md-2">
                            <a href="product_add.php" class="btn btn-primary btn-sm ">Add
                                New
                                </a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>SNO</th>
                                    
                                    <th>Product Name</th>
                                    <th>MRP Price</th>
                                    <th>Sale Price</th>
                                    <th>Upload Image</th>
                                                                        
                                    <th>Action</th>
                                    
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                <th>SNO</th>
                               
                                    <th>Product Name</th>
                                    <th>MRP Price</th>
                                    <th>Sale Price</th>
                                    <th>Upload Image</th>

                                    <th>Action</th>
                                    
                                </tr>
                            </tfoot>
                            <tbody>
                           
                                <?php
                                $s =1;
                                $getcat = mysqli_query($conn,"SELECT * FROM `products`");
                                while($get = mysqli_fetch_assoc($getcat)){      
                                                       
                                ?>
                                <tr>
                                    <td><?= $s?></td>                                   
                                    <td><?= $get['product_name']?></td>
                                    <td><?= $get['product_mrp_price']?></td>
                                    <td><?= $get['product_sale_price']?></td>
                                    <td><a class="btn btn-info btn-sm" href="image_upload_view.php?id=<?= $get['product_id']?>">Upload</a></td>
                                    
                                    <td>
                                         <a href="product_view.php?id=<?= $get['product_id']?>&& type=view" class="btn btn-sm btn-warning"><i class="fa fa-eye"></i></a> 
                                        <a href="product_edit.php?id=<?= $get['product_id']?>&& type=edit" class="btn btn-sm btn-success"><i class="fa fa-pen"></i></a> 
                                         <a href="product_edit.php?id=<?= $get['product_id']?>&&type=delete" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a></td>
                                    
                                </tr>
                                <?php $s++;} ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->



        <!-- popup model -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Product 
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                     <?= $success ?>
                    <?= $unsuccess ?>
                 <form  method="POST" enctype="multipart/form-data" class="form-horizontal">                        
                        <div class="row  p-2">
                           

                        <div class="form-group col-sm-4">
                                <label class=" control-label">Product Name</label>
                                <div>
                                    <input type="text" class="form-control input-md" placeholder="Enter Product Name"
                                        name="product_name" required>
                                </div>
                            </div>

                            <div class="form-group col-sm-4">
                                <label class=" control-label">Product MRP Price</label>
                                <div>
                                    <input type="text" class="form-control input-md" placeholder="Enter Product MRP Price"
                                        name="product_mrp" required>
                                </div>
                            </div>

                            <div class="form-group col-sm-4">
                                <label class=" control-label">Product Sale Price</label>
                                <div>
                                    <input type="text" class="form-control input-md" placeholder="Enter Product Sale Price"
                                        name="product_sale" required>
                                </div>
                            </div>

                            <div class="form-group col-sm-4">
                                <label class=" control-label">Banner Url</label>
                                <div>
                                    <input type="text" class="form-control input-md" placeholder="Enter Banner Url"
                                        name="banner_url" required>
                                </div>
                            </div>

                            <div class="form-group col-sm-4">
                                <label class=" control-label">Banner Url</label>
                                <div>
                                    <input type="text" class="form-control input-md" placeholder="Enter Banner Url"
                                        name="banner_url" required>
                                </div>
                            </div>




                            <div class="form-group col-sm-4">
                                <label class=" control-label">Banner Image</label>
                                <div>
                                    <input type="file" class="form-control input-md"  name="banner_img" required>
                                </div>
                            </div>


                            <div class="form-group col-sm-4">
                                <label class=" control-label">Banner Url</label>
                                <div>
                                    <input type="text" class="form-control input-md" placeholder="Enter Banner Url"
                                        name="banner_url" required>
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
</div>
<!-- popup model -->




        <?php 
    include "./include/footer.php";
?>