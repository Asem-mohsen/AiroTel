<?php
//include '../sharedd/adminshared.php';
//include '../shared/configuration.php';
include '../sharedd/adminshared.php';

//include '../sharedd/usernav.php';

if(isset($_POST['login'])){
    $name = $_POST['name'];
    $password = $_POST['password'];
    
    $select = " SELECT * FROM `admin` WHERE name ='$name' and password = '$password' ";
    $s = mysqli_query($conn , $select);
    $row = mysqli_num_rows($s);
    $mess="Wrong Input";
    if($row > 0  ){
       $_SESSION['admin'] = $name;
     header("location:../sharedd/adminshared.php");
    }
    else{
      echo "<div class='alert alert-danger'>
      $mess
            </div";
    }
}

?>


<nav class="navbar navbar-dark bg-info">
  <a class="navbar-brand" href="./log.php">Airotel</a>

</nav>
<br>

<h1 class="text-center text-info" style="font-family: 'Times New Roman', Times, serif;"> LogIn as Admin </h1>

<br>
<div class="container col-7 mt-5">
<form method="POST">

<div class="form-group row">
    <label for="inputname" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
      <input type="text" name="name" class="form-control" id="inputname">
    </div> 
    </div>

  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="password" name="password" class="form-control" id="inputPassword3">
    </div>
  </div>

  <div class="form-group row">
    <div class="col-sm-10">
    <button type="submit" name="login" class=" btn btn-outline-info " style="width: 780px;">Log in</button>
    </div>
  </div>
</form>
</div>




<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<a href="./log.php">
<i style='font-size:24px' class='fas'>&#xf053;</i>
           </a>
