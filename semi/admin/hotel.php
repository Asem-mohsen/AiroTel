<?php
include '../sharedd/adminshared.php';
include '../shared/configuration.php';

if (isset($_SESSION['admin'])){ 
  $select = "SELECT * FROM `hotel`";
  $s = mysqli_query($conn , $select);

  if (isset($_GET['Delete'])){
    $id = $_GET['Delete'];
    $delete = "DELETE FROM `hotel` where id = $id";
    $d = mysqli_query( $conn , $delete );
 
        header("location: hotel.php");
        }




if (isset($_GET['update'])) {
  $id = $_GET['update'];
  $select = "SELECT *FROM `hotel` where id = $id";
  $s = mysqli_query($conn, $select);
  $row = mysqli_fetch_assoc($s);
  $name = $row['nameHotel'];
  $image= $_row['hotelImage'];
  $CountryID = $_row['nameCountry'];
}




 
?>

<h1 class="text-center mt-5"> Hotels List </h1>
<br>
<div  class="container col-6">
<a href="./addhotel.php" > New Hotel? Click to Add it..
</a>

<table class="table table-dark">
  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Image</th>
      <th>Country</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>


  <tr>

  <?php
$JoinCountry = "SELECT hotel.id as IDhotel, hotel.name as nameHotel, hotel.image as hotelImage, country.name as nameCountry
                 FROM `country` JOIN `hotel` ON country.id = hotel.countid";
$ExecuteJoin1 = mysqli_query($conn,$JoinCountry);
$FetchJoin1 = mysqli_fetch_assoc($ExecuteJoin1);

 ?>
          <?php foreach($ExecuteJoin1 as $data){ ?>


           <th scope="row"> <?php echo $data['IDhotel']; ?> </th>
           <td><?php echo $data['nameHotel'] ?></td>
           <td> <img width="100" src=" images/<?php echo$data['hotelImage'] ?>" alt="..."></td>
           <td><?php echo $data['nameCountry']; ?></td>
          <td class=text-center> <a onclick="return confirm('Are You Sure')"
                                href="./hotel.php?Delete= <?php echo $data['IDhotel']?>"
                                class="btn btn-danger">Delete</a>
                                <a  href="./addhotel.php?update=<?php echo $data['IDhotel']?>" class="btn btn-info"  name="update"> Update </td>

                 
                    </tr>
          
          <?php } ?>

  </tbody>
</table>
</div>
<?php
} else{
  echo "not admin";
}
?> 









