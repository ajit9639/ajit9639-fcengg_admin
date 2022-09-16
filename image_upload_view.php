<?php
include "./include/header.php";
include "./include/sidebar.php";
error_reporting(0);

if(!isset($_SESSION['admin'])){
    echo "<script>location.replace('login.php');</script>";
}else{
    echo "";
}
$getid = $_GET['id'];
$getcat = mysqli_query($conn,"SELECT * FROM `products_detail_image` where `products_ref_id`='$getid'");
$get = mysqli_fetch_assoc($getcat);
$getme = $get['products_image_id'];

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
                            <h6 class="m-0 font-weight-bold text-primary">All Product Images</h6>
                        </div>
                        <div class="col-md-2">
                            <a href="image_upload.php?id=<?= $getid ?>" class="btn btn-primary btn-sm ">Add
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
                                   
                                    <th>Product ID</th>
                                    <th>Product Image</th>
                                    <th>Action</th>
                                    
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                <th>SNO</th>
                               
                                <th>Product ID</th>
                                    <th>Product Image</th>
                                    <th>Action</th>
                                    
                                </tr>
                            </tfoot>
                            <tbody>
                            
                                <?php
                               

                                $s =1;
                                $getcat = mysqli_query($conn,"SELECT * FROM `products_detail_image` where `products_ref_id`='$getid'");
                                while($get = mysqli_fetch_assoc($getcat)){      
                                    $mg =   $get['products_images'];                       
                                ?>
                                <tr>
                                    <td><?= $s?></td>
                                    <td><?= $get['products_ref_id'] ?></td>
                                    <td>                                        
                                        <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($mg) .'" style="width:100px;"/> '; ?>
                                   </td>
                                    <td><a href="image_upload_edit.php?id=<?= $get['products_image_id']?>&& type=edit" class="btn btn-sm btn-success"><i class="fa fa-pen"></i></a> 
                                         <a href="image_upload_edit.php?id=<?= $get['products_image_id']?>&&type=delete" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a></td>
                                    
                                </tr>
                                <?php $s++;} ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->







        <?php 
    include "./include/footer.php";
?>