<?php
include '../sharedd/adminshared.php';
include '../shared/configuration.php';
if (isset($_SESSION['admin'])){ 
$select = "SELECT * FROM `user`";
$s = mysqli_query($conn , $select);

if (isset($_GET['Delete'])){
  $id = $_GET['Delete'];
$delete = "DELETE FROM `user` where id = $id";
$d = mysqli_query( $conn , $delete );

header("location: user.php");
}

?>

<h1 class="text-center mt-5"> Users List </h1>

<div class="container col-6 mt-5">
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
      <th scope="col">Phone</th>

    </tr>
  </thead>
  <tbody>
  <tr>
                        <?php foreach($s as $data){ ?>
                        <td><?php echo$data['id'] ?></td>
                        <td><?php echo$data['name'] ?></td>
                        <td><?php echo$data['email'] ?></td>
                        <td><?php echo$data['password'] ?></td>
                        <td><?php echo$data['phone'] ?></td>

                                              
                        <td class=text-center> <a onclick="return confirm('Are You Sure')"
                                href="/semi/admin/user.php?Delete=<?php echo $data['id']?>"
                                class="btn btn-danger"> Block</a></td>
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


