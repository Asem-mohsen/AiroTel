<?php
include '../sharedd/adminshared.php';
include '../shared/configuration.php';
if (isset($_SESSION['admin'])){ 

if(isset($_POST['add'])){
$name = $_POST['name'];
$image_name=$_FILES['image']['name'];
$image_type=$_FILES['image']['type'];
$image_tmp=$_FILES['image']['tmp_name'];
$location="images/";

move_uploaded_file($image_tmp , $location . $image_name);

   $insert = "INSERT INTO `country` VALUES ( NULL , '$name' , '$image_name' )";
  $i = mysqli_query($conn , $insert);
header("location: ./country.php");

}
$name="";
$image="";
$update=false;
if (isset($_GET['Update'])){
  $update=true;
  $id = $_GET['Update'];
$select = "SELECT * FROM `country` where id = $id";
$s = mysqli_query( $conn , $select );
$row = mysqli_fetch_assoc($s);
$name = $row['name'];
$image = $row['image'];
}
if (isset($_POST['Update'])){

  $name = $_POST['name'];
  $image_name=$_FILES['image']['name'];
  $image_type=$_FILES['image']['type'];
  $image_tmp=$_FILES['image']['tmp_name'];
  $location="images/";
  move_uploaded_file($image_tmp , $location . $image_name);
  $update = "UPDATE `country` SET name = '$name' , image = '$image_name' where id = $id";
  $i=mysqli_query($conn , $update);
  header("location: /semi/admin/country.php");
}


?>

<h1 class="text-center text-info mt-5 display-3">Add Country</h1>
<div class="container col-6 mt-5">
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="exampleInputtext1">country Name</label>
                <input type="text" name="name" class="form-control" id="exampleInputPassword1">
                <label for="exampleInputfile1">Image</label>
                <input type="file" name="image" class="form-control" id="exampleInputfile1">
            </div>

    <?php if ($update) : ?>
          <button style="width: 650px;" class="btn btn-outline-success" type="submit" name="Update">Update</button>

    <?php else : ?>
          
  <button type="submit" name="add" class="btn btn-info" style="width:650px;" >Add</button>

        <?php endif;  ?>
 
</form>
</div>
<?php
} else{
  echo "not admin";
}
?> 

<br>
<a href="./country.php">
<i style='font-size:24px' class='fas'>&#xf053;</i>
           </a>