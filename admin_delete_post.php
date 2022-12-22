<?php
include './database/config.php';

$did = $_GET['id'];

$query = "DELETE FROM posts WHERE post_id='$did'";
$query_run = mysqli_query($conn, $query);
    if ($query_run) {
      echo "<script> 
      alert('Post has been Deleted.');
      window.location.href='admin_posts.php';
      </script>";
      
    } else {
      echo "<script>alert('Cannot Delete Post');
      window.location.href='admin_posts.php';
      </script>";
    }
?>
