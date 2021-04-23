<?php
include '../sharedd/adminshared.php';
include '../shared/configuration.php';
if (isset($_SESSION['admin'])){ 
  $select = "SELECT * FROM `country`";
  $s = mysqli_query($conn , $select);

  if (isset($_GET['Delete'])){
    $id = $_GET['Delete'];
  $delete = "DELETE FROM `country` where id = $id";
 $d = mysqli_query( $conn , $delete );
 
header("location: country.php");
}

if (isset($_GET['Update'])) {
  $id = $_GET['update'];
  $select = "SELECT *FROM `country` where id = $id";
  $s = mysqli_query($conn, $select);
  $row = mysqli_fetch_assoc($s);
  $name = $row['name'];
  $image= $_row['image'];
}
 
?>

<h1 class="text-center mt-5">Country List </h1>
<br>
<div  class="container col-6">
<a href="./addcountry.php" > New Country? Click to Add it..
</a>

<table class="table table-dark">
  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Image</th>
    </tr>
  </thead>
  <tbody>
  <tr>
                        <?php foreach($s as $data){ ?>
                        <td><?php echo$data['id'] ?></td>
                        <td><?php echo$data['name'] ?></td>
                        <td> <img width="100" src=" images/<?php echo$data['image'] ?>" alt="..."></td>
                                        
                        <td class=text-center> <a onclick="return confirm('Are You Sure')"
                                href="/semi/admin/country.php?Delete=<?php echo $data['id']?>"
                                class="btn btn-danger" name="Delete">Delete</a>
                                <a
                                href="./addcountry.php?Update=<?php echo $data['id']?>"
                                class="btn btn-info" name="Update">Update</a></td>


                                
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
