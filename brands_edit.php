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
    $query = mysqli_query($conn , "delete from `brands` WHERE `brand_id`='$getid'");
    if($query){
        echo "<script>location.replace('brands.php');</script>";
    }
}

// fetch
$check_cat = mysqli_query($conn,"SELECT * FROM `brands` WHERE `brand_id`='$getid'");
$data = mysqli_fetch_assoc($check_cat);
$img_get = $data['brand_img'];


// data insertion
$success="";
$unsuccess="";
if(isset($_POST['send'])){
    $brand_name = $_POST["brand_name"];    
    $brand_url = $_POST["brand_url"];    
    $brand_img = $_FILES["brand_img"];  
    $brand_img_name = $_FILES["brand_img"]['name'];
    $brand_img_tmp_name = $_FILES["brand_img"]['tmp_name'];
 
    $check_cat = mysqli_query($conn,"SELECT * FROM `brands` WHERE `brand_name`='$brand_name'");
   
        if (!empty($_FILES['brand_img']['tmp_name'])) {
            $brand_data = addslashes(file_get_contents($brand_img_tmp_name));   
            $ins_cat = mysqli_query($conn,"UPDATE `brands` SET `brand_name`='$brand_name',`brand_img`='$brand_data',`brand_url`='$brand_url' where `brand_id`='$getid'");       
        }else{
            
            $ins_cat = mysqli_query($conn,"UPDATE `brands` SET `brand_name`='$brand_name',`brand_url`='$brand_url' where `brand_id`='$getid'");
        }

if($ins_cat){
    $success='<div class="alert alert-primary" role="alert">
    Success
    </div>';
    echo "<script>window.location='brands.php';</script>";
}else{
    $unsuccess='<div class="alert alert-danger" role="alert">
    Unsuccess
    </div>';
}
}
// data fetch
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
                                <h6 class="m-0 font-weight-bold text-primary">Add Brands</h6>
                            </div>
                            <div class="col-md-2">
                                <a href="brands.php" class="btn btn-primary btn-sm ">View Brands
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
                                <label class=" control-label">Brand Name</label>
                                <div>
                                    <input type="text" class="form-control input-md" placeholder="Enter Brand Name"
                                        name="brand_name" value=<?= $data['brand_name']?> >
                                </div>
                            </div>

                            <div class="form-group col-sm-4">
                                <label class=" control-label">Brand Url</label>
                                <div>
                                    <input type="text" class="form-control input-md" placeholder="Enter Brand Name"
                                        name="brand_url" value=<?= $data['brand_url']?> >
                                </div>
                            </div>


                            <div class="form-group col-sm-4">
                                <label class=" control-label">Brand Image</label>
                                <div>
                                <input type="file" class="form-control input-md"  name="brand_img" >
                                </div>
                            </div>


                            <div class="form-group col-sm-4">
                                <label class=" control-label">Brand Image</label>
                                <div>
                                <?php 
                                 $mg = $data['brand_img'];   
                                echo '<img src="data:image/jpeg;base64,'.base64_encode($mg) .'" style="width:100px;"/> '; ?>
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


    <?php 
    include "./include/footer.php";
?>