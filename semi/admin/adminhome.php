<?php
include '../sharedd/adminshared.php';
include '../shared/configuration.php';
include '../sharedd/adminshared.php';

if (isset($_SESSION['admin'])){ 

?>

<h1 class="text-center text-info" style="font-family: 'Times New Roman', Times, serif;"> Welcome Admin</h1>


<?php
} else{
  echo "not admin";
}
?>