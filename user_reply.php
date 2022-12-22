
<?php
include_once "./database/config.php";

session_start();
date_default_timezone_set("Asia/Dhaka");

$username = $_SESSION["username"];
$img = $_SESSION["image"];

if (!isset($_SESSION["username"])) {
    header("Location: user_login.php");
}

$comment_id = $_GET["comment_id"];
$post_id = $_GET["post_id"];
if (isset($_POST["submit_reply"])) {
    $error = "";
    $cls = "";

    $reply = $_POST["reply"];
    $date = date("Y-m-d h:i:sa");

    $sql = "INSERT INTO comment_reply(comment_id, reply_img, reply_name, reply_message, reply_date, `role`) 
			VALUES ($comment_id, '$img', '$username', '$reply', '$date', '0')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("location: user_post_details.php?post_id=" . $post_id);
    } else {
        $error = "Woops! Someting Went Wrong.";
        $cls = "danger";
    }
}

