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
    $query = mysqli_query($conn , "delete from `subcategory` WHERE `subcategory_id`='$getid'");
    if($query){
        echo "<script>location.replace('sub_categories.php');</script>";
    }
}


// data insertion
$success="";
$unsuccess="";
if(isset($_POST['send'])){
    $category = $_POST["category"];    
    $subcategory = $_POST["subcategory"];    
    $check_cat = mysqli_query($conn,"SELECT * FROM `subcategory` WHERE `subcategory_name`='$subcategory'");
    // $cat_num = mysqli_num_rows($check_cat);
    // if($cat_num == 0){   
$ins_cat = mysqli_query($conn,"UPDATE `subcategory` SET `category_name`='$category', `subcategory_name`='$subcategory' where `subcategory_id`='$getid'");
if($ins_cat){
    $success='<div class="alert alert-primary" role="alert">
    Success
    </div>';
    echo "<script>window.location='sub_categories.php';</script>";
}else{
    $unsuccess='<div class="alert alert-danger" role="alert">
    Unsuccess
    </div>';
}

// }else{
//     $unsuccess='<div class="alert alert-danger" role="alert">
//     Already Exist
//     </div>';
// }
}
// data fetch
$check_cat = mysqli_query($conn,"SELECT * FROM `subcategory` WHERE `subcategory_id`='$getid'");
$data = mysqli_fetch_assoc($check_cat);
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
                                <h6 class="m-0 font-weight-bold text-primary">Add Sub Categories</h6>
                            </div>
                            <div class="col-md-2">
                                <a href="sub_categories.php" class="btn btn-primary btn-sm ">View Sub Catergory
                                </a>


                            </div>
                        </div>
                    </div>

                </div>


                <?= $success ?>
                <?= $unsuccess ?>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" class="form-horizontal">


                        <div class="row  p-2">
                            <div class="form-group col-sm-4">
                                <label class=" control-label">Category Name</label>
                                <select id="" class="form-control" name="category">
                                    <option value="<?= $data['category_name'] ?>" selected> <?= $data['category_name'] ?></option>
                                    <?php 
                                             $getcat = mysqli_query($conn,"SELECT * FROM `category`");
                                            while($get = mysqli_fetch_assoc($getcat)){ 
                                                ?>
                                    <option value="<?= $get['cat_name'] ?>" > <?= $get['cat_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                        </div>

                        <div class="row  p-2">
                            <div class="form-group col-sm-4">
                                <label class=" control-label">Sub Category Name</label>
                                <input type="text" class="form-control input-md" placeholder="Enter Sub Category Name"
                                        name="subcategory" value="<?= $data['subcategory_name'] ?>"> 
                            </div>

                        </div>
                        <div class="text-left">
                            <button type="submit" class="btn btn-primary" name="send">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
    </div><!-- /.container-fluid -->
    </section>


    <?php 
    include "./include/footer.php";
?>