<?php
include './database/config.php';

$did = $_GET['id'];

$query = "DELETE FROM fosters WHERE foster_id='$did'";
$query_run = mysqli_query($conn, $query);
    if ($query_run) {
      echo "<script> 
      alert('Foster has been Deleted.');
      window.location.href='admin_fosters.php';
      </script>";
      
    } else {
      echo "<script>alert('Cannot Delete Foster');
      window.location.href='admin_fosters.php';
      </script>";
    }
?>
