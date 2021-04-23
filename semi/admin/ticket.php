<?php
include '../sharedd/adminshared.php';
include '../shared/configuration.php';
if (isset($_SESSION['admin'])){ 

$select = "SELECT * FROM `ticket`";
$s = mysqli_query($conn , $select);


?>


<br>
<h1 class="text-center text-info" style="font-family: 'Times New Roman', Times, serif;" > Users Booking List</h1>

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

  
          
          <tr>
          <?php foreach($s as $data){ ?>

          <?php
 $JoinAirport = "SELECT airport.name as AirportName FROM airport JOIN ticket ON airport.id = ticket.airid";
$JoinHotel = "SELECT hotel.name as HotelName FROM hotel JOIN ticket ON hotel.id = ticket.hotelid";
$ExecuteJoin1 = mysqli_query($conn,$JoinAirport);
$ExecuteJoin2 = mysqli_query($conn,$JoinHotel);
$FetchJoin1 = mysqli_fetch_assoc($ExecuteJoin1);
$FetchJoin2 = mysqli_fetch_assoc($ExecuteJoin2);
$AirportName = $FetchJoin1['AirportName'];
$HotelName = $FetchJoin2['HotelName'];
 ?>
            <th scope="row"> <?php echo $data['id']; ?> </th>
    
            <td> <?php echo $HotelName ; ?> </td>
            <td> <?php echo $AirportName ; ?> </td>
            <td> <?php echo $data['room']; ?> </td>
            <td> <?php echo $data['class']; ?> </td>
            <td> <button class="btn btn-success"> Check </button> </td> 
  
          </tr>
          <?php } ?>
  
        </tbody>
      </table>

      <?php } else{
  echo "not admin";
}
?> 