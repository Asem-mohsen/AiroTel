<?php
include '../sharedd/usernav.php';
include '../shared/configuration.php';
if (isset($_SESSION['UID'])) {


  $mess = "done";
  function testMessage($condition, $mess)
  {
    if ($condition) {

      echo "<div class='alert alert-primary' >
                  $mess
                </div";
    } else {
      echo "<div class='alert alert-danger' >
            $mess
          </div";
    }
  }

  if (isset($_GET['Delete'])) {
    $id = $_GET['Delete'];
    $Delete = "DELETE FROM `ticket` where id = $id";

    $f =  mysqli_query($conn, $Delete);
    testMessage($f, "Deleted");
  }


  //edit part
  if (isset($_GET['update'])) {
    $id = $_GET['update'];
    $select = "SELECT *FROM `ticket` where id = $id";
    $s = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($s);
    $airid = $row['flightname'];
    $Room = $_row['Room'];
    $Class = $_row['Class'];
  }



  $userid= $_SESSION['UID'];           
  $select=" SELECT * FROM `ticket` WHERE userid= $userid";
  $s = mysqli_query($conn, $select);



?>

  <br>



  <h1 class="text-center text-info" style="font-family: 'Times New Roman', Times, serif;"> Booked</h1>

  <br>
  <div class="container col-9 mt-3">
    <table class="table">
      <thead class="thead-dark">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Hotel</th>
            <th scope="col">Flight</th>
            <th scope="col">Room</th>
            <th scope="col">Class</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <?php
        $userid= $_SESSION['UID'];           
        $select=" SELECT * FROM `ticket` WHERE userid= $userid";
           $lk=mysqli_query($conn, $select);
           $fetchquery = mysqli_fetch_assoc($lk);
        $ticketairid= $fetchquery['airid'];
        $tickethotelid= $fetchquery['hotelid'];
  ?>
   
        <tr>
            <?php

            
            $JoinAirport = "SELECT airport.name as AirportName FROM airport JOIN ticket ON airport.id = $ticketairid";
            $JoinHotel = "SELECT hotel.name as HotelName FROM hotel JOIN ticket ON hotel.id = $tickethotelid";
            $ExecuteJoin1 = mysqli_query($conn, $JoinAirport);
            $ExecuteJoin2 = mysqli_query($conn, $JoinHotel);
            $FetchJoin1 = mysqli_fetch_assoc($ExecuteJoin1);
            $FetchJoin2 = mysqli_fetch_assoc($ExecuteJoin2);
            $AirportName = $FetchJoin1['AirportName'];
            $HotelName = $FetchJoin2['HotelName'];
?>
          <?php foreach ($s as $data) { ?>


            <th scope="row"> <?php echo $data['id']; ?> </th>

            <td> <?php echo $HotelName; ?> </td>
            <td> <?php echo $AirportName; ?> </td>
            <td> <?php echo $data['room']; ?> </td>
            <td> <?php echo $data['class']; ?> </td>
            <td> <a onclick="return confirm ('Are you Sure')" href="BookingList.php?Delete=<?php echo $data['id'] ?>" class="btn btn-danger"> Delete </a href=""> 
             <a  href="Tickets.php?update=<?php echo $data['id']?>" class="btn btn-info"href="" name="update"> Update </td>


        </tr>
      <?php } ?>

      </tbody>
    </table>

  <?php } else {
  echo "not user";
} ?>



  </div>

