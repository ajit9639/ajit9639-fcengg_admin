<style>
    .hrr{
        border-top: 1px solid rgb(237 237 237);
        width:100%;
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



$check_cat = mysqli_query($conn,"SELECT * FROM `sidebanner`");
$getsidebanner = mysqli_fetch_assoc($check_cat);
$sidebanner1 = $getsidebanner['sidebanner1'];
$sidebannerid1 = $getsidebanner['id'];

$sidebanner2 = $getsidebanner['sidebanner2'];
$sidebannerid2= $getsidebanner['id'];

$sidebanner3 = $getsidebanner['sidebanner3'];
$sidebannerid3 = $getsidebanner['id'];


// data insertion
$success="";
$unsuccess="";
if(isset($_POST['submit1']) AND $_POST['banner_img1id'] == 1){
      
    $banner_img = $_FILES["banner_img1"];  
    $banner_img_name = $banner_img['name'];
    $banner_img_tmp_name = $banner_img['tmp_name'];
    $banner_data = addslashes(file_get_contents($banner_img_tmp_name));  

    $ins_cat = mysqli_query($conn,"UPDATE `sidebanner` SET `sidebanner1`='$banner_data' WHERE `id`='$sidebannerid1'");
   
}elseif(isset($_POST['submit2']) AND $_POST['banner_img2id'] == 2){
    $banner_img = $_FILES["banner_img2"];  
    $banner_img_name = $banner_img['name'];
    $banner_img_tmp_name = $banner_img['tmp_name'];
    $banner_data = addslashes(file_get_contents($banner_img_tmp_name));  

    $ins_cat = mysqli_query($conn,"UPDATE `sidebanner` SET `sidebanner2`='$banner_data' WHERE `id`='$sidebannerid2'");
}else{
    $banner_img = $_FILES["banner_img3"];  
    $banner_img_name = $banner_img['name'];
    $banner_img_tmp_name = $banner_img['tmp_name'];
    $banner_data = addslashes(file_get_contents($banner_img_tmp_name));  

    $ins_cat = mysqli_query($conn,"UPDATE `sidebanner` SET `sidebanner3`='$banner_data' WHERE `id`='$sidebannerid3'");
} 
    

// if($ins_cat){
//     $success='<div class="alert alert-primary" role="alert">
//     Success
//     </div>';
//     echo "<script>window.location='banner.php';</script>";
// }else{
//     $unsuccess='<div class="alert alert-danger" role="alert">
//     Unsuccess
//     </div>';
// }

// }
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
                                <h6 class="m-0 font-weight-bold text-primary">Update Side banners</h6>
                            </div>
                            <!-- <div class="col-md-2">
                                <a href="banners.php" class="btn btn-primary btn-sm ">View banners
                                </a>


                            </div> -->
                        </div>
                    </div>                   
                </div>


                <?= $success ?>
                    <?= $unsuccess ?>
                <div class="card-body">
                    <form  method="POST" enctype="multipart/form-data" class="form-horizontal">

                        
                        <div class="row  p-2">                                                      

                            <div class="form-group col-sm-4">
                                <label class=" control-label">Update Banner Image</label>
                                <div>
                                <input type="file" class="form-control input-md"  name="banner_img1" >
                                <input type="text" class="form-control input-md"  name="banner_img1id" value="<?= $sidebannerid1 ?>">
                                </div>
                            </div>


                            <div class="form-group col-sm-4">
                                <label class=" control-label">U</label>
                                <div>
                                <input type="submit" class="btn btn-info btn-sm"  name="submit1" >
                                </div>
                            </div>

                            <div class="form-group col-sm-4">
                                <label class=" control-label">Banner Image</label>
                                <div>
                                <?php 
                                  
                                echo '<img src="data:image/jpeg;base64,'.base64_encode($sidebanner1) .'" style="width:100px;"/> '; ?>
                                </div>
                            </div>
                            <hr class="hrr">



                            <div class="form-group col-sm-4">
                                <label class=" control-label">Update Banner Image</label>
                                <div>
                                <input type="file" class="form-control input-md"  name="banner_img2" >
                                <input type="text" class="form-control input-md"  name="banner_img2id" value="<?= $sidebannerid2 ?>">
                                </div>
                            </div>


                            <div class="form-group col-sm-4">
                                <label class=" control-label">U</label>
                                <div>
                                <input type="submit" class="btn btn-info btn-sm"  name="submit2" >
                                </div>
                            </div>

                            <div class="form-group col-sm-4">
                                <label class=" control-label">Banner Image</label>
                                <div>
                                <?php 
                                  
                                echo '<img src="data:image/jpeg;base64,'.base64_encode($sidebanner2) .'" style="width:100px;"/> '; ?>
                                </div>
                            </div>
                            <hr class="hrr">




                             <div class="form-group col-sm-4">
                                <label class=" control-label">Update Banner Image</label>
                                <div>
                                <input type="file" class="form-control input-md"  name="banner_img3" >
                                <input type="text" class="form-control input-md"  name="banner_img3id" value="<?= $sidebannerid3 ?>">
                                </div>
                            </div>


                            <div class="form-group col-sm-4">
                                <label class=" control-label">U</label>
                                <div>
                                <input type="submit" class="btn btn-info btn-sm"  name="submit3" >
                                </div>
                            </div>

                            <div class="form-group col-sm-4">
                                <label class=" control-label">Banner Image</label>
                                <div>
                                <?php 
                                  
                                echo '<img src="data:image/jpeg;base64,'.base64_encode($sidebanner3) .'" style="width:100px;"/> '; ?>
                                </div>
                            </div>
                            <hr class="hrr">

                        </div>
                        <!-- <div class="text-left">
                            <button type="submit" class="btn btn-primary btn-sm" name="send">Submit</button>
                        </div> -->
                    </form>
                </div>
            </div>
    </div><!-- /.container-fluid -->
    </section>


    <?php 
    include "./include/footer.php";
    ?>