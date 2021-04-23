<?php
include '../shared/shared.php';
include '../shared/configuration.php';
include '../sharedd/usernav.php';
if(isset($_SESSION['UID'])){

  if(isset($_POST['send'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $rate = $_POST['rate'];

    $insert = "INSERT INTO `feedback` VALUES ( NULL , '$username' , '$email' , '$rate' )";
    $i = mysqli_query($conn , $insert);
    if($i){
      echo "<div class='alert alert-primary'>
      Feedback Sent Done Successfully!
    </div>";
    }
    else{
      echo "<div class='alert alert-danger'>
      False
    </div>".mysqli_error($conn);
    }
  }


  ?>
  
  
   
        <style>
.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}
        </style>   
    

<br>
<h1 style="text-align:center; font-family: 'Times New Roman', Times, serif;" class="text-info"> Feedback </h1>
<div class="container col-7 mt-5">
 
<form method="POST">
  <div class="form-group">
    <label for="exampleFormControlInput1">Name</label>
    <input type="text"  name="username" class="form-control" id="exampleFormControlInput1">
  </div>

  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
      <input type="email" name="email" class="form-control" id="inputEmail3">
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Write Your Feedback</label>
    <textarea class="form-control" name="rate" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>

<p style="color: gray;">Your feedbacks are important to us, help us to improve our service</p>
 
<button type="submit" name="send"  class="btn btn-info btn-block" style="width: 760px;"> Send Your Feedback</button>

</div>
</form>
</div>


<?php } else{
  echo "not user";
} ?>