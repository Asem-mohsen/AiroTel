<?php
include '../sharedd/adminshared.php';
include '../shared/configuration.php';


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

<div class="container col-7 mt-5">
    <form method="POST">
        <label for="inputemail" class="col-sm-2 col-form-label">Email</label>
        <input required type="email" name="email" class="form-control " placeholder="Email">
        <label for="inputpassword" class="col-sm-2 col-form-label">Passowrd</label>
        <input required type="password" name="password" class="  form-control " placeholder="Password">
<br>
        <button class="btn btn-outline-info" style="width: 770px;" type="submit" name="login">LogIn</button>
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

<br>










        <a href="./log.php">
            <i style='font-size:24px' class='fas'>&#xf053;</i>
        </a>