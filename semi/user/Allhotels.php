<?php
include '../shared/shared.php';
include '../shared/configuration.php';
include '../sharedd/usernav.php';


if(isset($_SESSION['UID'])){

  if (isset($_GET['View'])){
    $id = $_GET['View'];
  $select = "SELECT * FROM `hotel` where $id = countid ";
  $s = mysqli_query( $conn , $select );
  
  
  
  }

?>

  


<h1 class="text-center text-info"> Hotels </h1>



<div class="container col-11 mt-4">
  <div class="row">
  <?php 
  foreach($s as $data){ ?>
    <div class="container col-4 mt-3">
    <div class="card" style="width: 280px;" style="height: 90px;">
  <img src="../admin/images/<?php echo $data['image']?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title  text-center"><?php echo$data['name'] ?></h5>
    <a href="./Tickets.php?HOTELID=<?php echo $data['id'] ?>" name="Book Now" style="width: 240px;" class="btn btn-primary">Book Now</a>
  </div>
</div>
    </div>
    <?php } ?>
  </div>
</div>


<?php } else{
  echo printmessage("You're Not A User","danger");
} ?>





