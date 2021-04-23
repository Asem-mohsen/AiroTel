<?php
include '../sharedd/usernav.php';
include '../shared/configuration.php';
include '../user/css.php';

if (isset($_SESSION['UID'])) {
  $userid = $_SESSION['UID'];
  $UserEmail = $_SESSION['UEmail'];
  $UserPhone = $_SESSION['UPhone'];
  $update = false;

  
  if (isset($_POST['Pay'])) {
    $hotelid = $_GET['HOTELID'];
    $airid = $_POST['flightname'];
    $Room = $_POST['Room'];
    $Class = $_POST['Class'];
    $insert = "INSERT INTO `ticket` VALUES ( NULL , $userid , $hotelid , $airid , '$Room' , '$Class')";
    $i = mysqli_query($conn, $insert);
    header("location: /semi/user/BookingList.php");
    if ($i) {
      echo printmessage("Done", "normal");
    } else {
      echo printmessage("Failed", "danger");
    }

  }
    $userid = $_SESSION['UID'];
    //$hotelid = $_GET['HOTELID'];
    $airid = "";
    $Room = "";
    $Class = "";
    $update = false;

     if (isset($_GET['update'])) {
         $update = true;
      $id = $_GET['update'];

     }
    if (isset($_POST['update'])) {
    
      $airid = $_POST['flightname'];
      $Room = $_POST['Room'];
      $Class = $_POST['Class'];
      $update = "UPDATE `ticket` SET airid= $airid , room= '$Room', class= '$Class' where id = $id ";
      $h = mysqli_query($conn, $update);
      if($h){
        echo"done";
      } else{ echo"nor yet";}
     header("location: /semi/user/BookingList.php");
    }



  

?>

  <br>
  <h1 class="text-info" style="text-align:center; font-family:'Times New Roman', Times, serif ;">Book In Just a Minute</h1>
  <div class="row">
    <div class="col-75">
      <div class="container">
        <form method="POST">
          <div class="row">
            <div class="col-50">
              <h3 class=text-center>Hotel Reservation</h3>
              <label for="email"><i class="fa fa-envelope"></i> Email</label>
              <input type="text" disabled id="email" name="email" value="<?php echo $UserEmail; ?>" placeholder="user@example.com">
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Phone</label>
                <input type="number" disabled class="form-control" value="<?php echo $UserPhone ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
              <div class="input-group mb-3">
               
                <label for="custom-select">Rooms</label>
                <div style="margin-left: 50px;">
                  <select name="Room" value="<?php echo$Room; ?>" class="custom-select" id="inputGroupSelect01">

                    <option value="Single">Single</option>
                    <option value="Double">Double</option>
                    <option value="Trible">Trible</option>
                  </select>
                </div>
              </div>
              <div class="col-50">
                <h3 class=text-center>Flight Ticket</h3>



                <select name="Class" style=" height:50px;" value="<?php echo$Class; ?>" class="custom-select container mt-3" id="inputGroupSelect01">
                  <option>class</option>
                  <option value="Economic">Economic</option>
                  <option value="business">business</option>
                </select>


                <div class="container mt-3">
                  Departure
                  <select class="btn btn-info" value="<?php echo$airid; ?>" name="flightname">
                    <?php

                   $select = "SELECT * FROM `airport` ";
                    $y = mysqli_query($conn, $select);
                    foreach ($y as $data) {

                    ?>
                      <option value="<?php echo $data['id'] ?>"> <?php echo $data['name'] ?> </option>

                    <?php } ?>
                  </select>





                </div>





              </div>




              <div class="col-75">
                <br>
                <h3 class=text-center>Payment Method</h3>
                <label for="cname">Name on Card</label>
                <input type="text" id="cname" name="cardname" placeholder="User name">
                <label for="ccnum">Credit card number</label>
                <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">



                <p style="color: gray;">Make sure that we will never share your information with anyone else</p>

              </div>
              <label>
              <input type="checkbox" checked="checked" name="sameadr"> Are you Sure
            </label>

            <?php if ($update) : ?>
              <button style="width: 1100px;" class="btn btn-outline-success" type="submit" name="update">Update</button>

            <?php else : ?>
          
              <button style="width: 1100px;" class="btn btn-outline-info" type="submit" name="Pay">Pay</button>

            <?php endif;  ?>

            </div>

         

        </form>
      </div>
    </div>

    <a href="./countries.php">
    <i style='font-size:24px' class='fas'>&#xf053;</i>
  </a>
  </div>




<?php } else {
  echo printmessage("You're Not A User", "danger");
} ?>