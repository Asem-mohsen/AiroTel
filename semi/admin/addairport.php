<?php
include '../sharedd/adminshared.php';
include '../shared/configuration.php';
if (isset($_SESSION['admin'])){ 

if(isset($_POST['add'])){
  $name = $_POST['name'];
   $insert = "INSERT INTO `airport` VALUES ( NULL , '$name')";
  $i = mysqli_query($conn , $insert);
header("location: ./airport.php");

}


?>

<h1 class="text-center text-info mt-5 display-3">Add Airports</h1>
<div class="container col-6 mt-5">
<form method="POST">
<div class="form-group">
    <label for="exampleInputtext1">Airport Name</label>
    <input type="text" name="name" class="form-control" id="exampleInputPassword1">
  </div>

  <button type="submit" name="add" class="btn btn-info" style="width:650px;" > Add </button>
</form>
</div>

<?php
} else{
  echo "not admin";
}
?> 

<br>
<a href="./airport.php">
<i style='font-size:24px' class='fas'>&#xf053;</i>
           </a>