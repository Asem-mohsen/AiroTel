<?php
include '../shared/shared.php';
include '../shared/configuration.php';
include '../sharedd/usernav.php';

if(isset($_SESSION['UID'])){

$select = "SELECT * FROM `country`";
$sc = mysqli_query($conn , $select);



?>


<h1 style="text-align:center; font-family: 'Times New Roman', Times, serif;" class="text-info"> Welcome in Airotel</h1>


<h3 style="font-family: 'Times New Roman', Times, serif;" class="container col-12 mt-5 text-info"> Countries To visit</h3>



<div class="container col-11 mt-3">
  <div class="row">
  <?php foreach($sc as $data){ ?>
    <div class="container col-4 mt-3">
    <div class="card" style="width: 280px;" style="height: 90px;">
    <img  style="width: 278px;" src="../admin/images/<?php echo $data['image']?>" alt="...">
  <div class="card-body">
    <h5 class="card-title text-center" ><?php echo $data['name']?></h5>
    <a href="/semi/user/Allhotels.php?View=<?php echo $data['id']?>" style="width: 240px;" class="btn btn-info">Discover</a>
  </div>
</div>
    </div>
    <?php } ?>
  </div>
</div>




<?php } else{
  echo "not user";
} ?>





