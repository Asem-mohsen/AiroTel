<?php
include '../sharedd/adminshared.php';
include '../shared/configuration.php';
if (isset($_SESSION['admin'])){ 

$select = "SELECT * FROM `feedback`";
$s = mysqli_query($conn , $select);
if (isset($_GET['Delete'])){
  $id = $_GET['Delete'];
$delete = "DELETE FROM `feedback` where id = $id";
$d = mysqli_query( $conn , $delete );

header("location: /semi/admin/feed.php");
}

?>

<h1 class="text-center mt-5"> Feedback List </h1>

<div class="container col-6 mt-5">
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">User Name</th>
      <th scope="col">Email</th>
      <th scope="col">Rate</th>
    </tr>
  </thead>
  <tbody>
  <tr>
                        <?php foreach($s as $data){ ?>
                        <td><?php echo$data['id'] ?></td>
                        <td><?php echo$data['username'] ?></td>
                        <td><?php echo$data['email'] ?></td>
                        <td><?php echo$data['rate'] ?></td>
                                                
                        <td class=text-center> <a onclick="return confirm('Are You Sure')"
                                href="/semi/admin/feed.php?Delete=<?php echo $data['id']?>"
                                class="btn btn-danger">Delete</a></td>
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