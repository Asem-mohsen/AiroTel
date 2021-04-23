<?php
ob_start();
include '../sharedd/adminshared.php';
include '../shared/configuration.php';
if (isset($_SESSION['admin'])){ 

if(isset($_POST['add'])){
  $name = $_POST['name'];
  $countid = $_POST['countid'];

$image_name=$_FILES['image']['name'];
$image_type=$_FILES['image']['type'];
$image_tmp=$_FILES['image']['tmp_name'];
$location="images/";

move_uploaded_file($image_tmp , $location . $image_name);


   $insert = "INSERT INTO `hotel` VALUES ( NULL , '$name' , '$image_name' , $countid )";
  $i = mysqli_query($conn , $insert);
 header("location: ./hotel.php");

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
$name = "";
$image = "";
$countid = "";
$update = false;

 if (isset($_GET['update'])) {
     $update = true;
  $id = $_GET['update'];
  $select = "SELECT * FROM `hotel` where id = $id";
  $s = mysqli_query( $conn , $select );
  $row = mysqli_fetch_assoc($s);
  $name = $row['name'];
  $image = $row['image'];
  $countid = $row['countid'];

}

 
if (isset($_POST['update'])) {

  $name = $_POST['name'];
  $image_name=$_FILES['image']['name'];
  $image_type=$_FILES['image']['type'];
  $image_tmp=$_FILES['image']['tmp_name'];
  $countid = $_POST['countid'];
  $location="images/";
  move_uploaded_file($image_tmp , $location . $image_name);
  $update = "UPDATE `hotel` SET name= '$name', image= '$image_name', countid= $countid WHERE id= $id ";
  $i=mysqli_query($conn , $update);
  header("location: /semi/admin/country.php"); 
}
?>

<h1 class="text-center text-info mt-5 display-3">Add Hotel</h1>
<div class="container col-6 mt-5">
<form method="POST" enctype="multipart/form-data">
<div class="form-group">
    <label for="exampleInputtext1">Hotel Name</label>
    <input type="text" name="name" class="form-control" id="exampleInputPassword1">
  </div>

  <div class="form-group">
    <label for="exampleInputtext1">Image</label>
    <input type="file" name="image" class="form-control" id="exampleInputfile1">
  </div>

  <div class="form-group">
    <label for="countryID">Country ID</label>
  <select name="countid">
  <?php
  $select = "SELECT * FROM `country`";
  $s = mysqli_query($conn , $select);
  foreach($s as $data){
    ?>
    <option value ="<?php echo $data['id'] ?>"> <?php echo $data['name']?>
  <?php }?>
  
  </select>
  <?php if ($update) : ?>
          <button style="width: 650px;" class="btn btn-outline-info" type="submit" name="update">update</button>

    <?php else : ?>
          
  <button type="submit" name="add" class="btn btn-info" style="width:650px;" >Add</button>

        <?php endif;  ?>
  

</form>
</div>
<?php
} else{
  echo "not admin";
}
ob_end_flush();
?> 



<br>

<br>
<br>

<br>
<br>

</div>
<a href="./hotel.php">
<i style='font-size:24px' class='fas'>&#xf053;</i>
           </a>