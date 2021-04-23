<?php
include '../sharedd/adminshared.php';
include '../shared/configuration.php';

if (isset($_POST['signin'])) {
  $name = $_POST['UName'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $phone = $_POST['phone'];

  $insert = "INSERT INTO `user` VALUES ( NULL , '$name' , '$email', '$password', $phone )";
  $i = mysqli_query($conn, $insert);
  if ($i) {
    header ("location: Login.php");
  } else {
    echo "false";
  }
}

if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $select = " SELECT * FROM `user` WHERE email ='$email' and password = '$password' ";
  $s = mysqli_query($conn, $select);
  $row = mysqli_num_rows($s);
  if ($row > 0) {
    $row1 = mysqli_fetch_assoc($s);
    $userid = $row["id"];
    $_SESSION['UName'] = $row1['UName'];
    $_SESSION['UEmail'] = $row1['email'];
    $_SESSION['UID'] = $row1['id'];
    $_SESSION['UPhone'] = $row1['phone'];
    header("location:../user/countries.php");
  } else {
    echo printmessage("Please Make Sure That Email/Passrowd Is Correct", "danger");
  }
}

?>

<nav class="navbar navbar-dark bg-info">
  <a class="navbar-brand" href="./log.php">Airotel</a>

</nav>

<h1 class="text-center text-info" style="font-family: 'Times New Roman', Times, serif;"> Sign Up Now </h1>
<h2 class="text-center text-info" style="font-family: 'Times New Roman', Times, serif;"> For Free </h2>

<div class="container col-7 mt-5">
  <form method="POST">

    <div class="form-group row">
      <label for="inputname" class="col-sm-2 col-form-label">Name</label>
      <div class="col-sm-10">
        <input required type="text" name="UName" class="form-control" id="inputname">
      </div>
    </div>

    <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
      <div class="col-sm-10">
        <input required type="email" name="email" class="form-control" id="inputEmail3">
      </div>
    </div>

    <div class="form-group row">
      <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
      <div class="col-sm-10">
        <input required type="password" name="password" class="form-control" id="inputPassword3">
      </div>
    </div>

    <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Phone</label>
      <div class="col-sm-10">
        <input required type="text" name="phone" class="form-control" id="inputphone3">
      </div>
    </div>

    <div class="form-group row">
      <div class="col-sm-10">
     <button type="submit" name="signin" class=" btn btn-outline-info " style="width: 780px;">Sign in</button>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-10">
       <a href="./Login.php" class=" btn btn-outline-primary " style="width: 780px;">Already have an account, LogIn Now!</button>
      </a>
      </div>
    </div>

    <a href="./adlog.php" type="submit">If You Are An Admin, Click here to LogIn !</a>

  </form>
</div>