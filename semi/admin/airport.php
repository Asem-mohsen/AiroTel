<?php
include '../sharedd/adminshared.php';
include '../shared/configuration.php';

$select = "SELECT * FROM `airport`";
$s = mysqli_query($conn , $select);

if (isset($_GET['Delete'])){
        $id = $_GET['Delete'];
      $delete = "DELETE FROM `airport` where id = $id";
     $d = mysqli_query( $conn , $delete );
     
header("location: airport.php");
}
?>

<h1 class="text-center mt-5">Airports List </h1>
<br>
<div  class="container col-6">
<a href="./addairport.php" > New Airport? Click to Add it..
</a>

<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
    </tr>
  </thead>
  <tbody>
  <tr>
                        <?php foreach($s as $data){ ?>
                        <td><?php echo$data['id'] ?></td>
                        <td><?php echo$data['name'] ?></td>
                        <td class=text-center> 
                             <a onclick="return confirm('Are You Sure')" href="/semi/admin/airport.php?Delete=<?php echo $data['id']?>" class="btn btn-danger">Delete</a>
                        </td>
     </tr>
                    <?php } ?>
  </tbody>                  
</table>
</div>