<?php
include("database.php");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $website = $_POST['website'];
    $password = $_POST['password'];

    if (empty($username) || empty($website) || empty($password)) {
        echo "Please fill out all fields.";
        exit;
    }

    $sql = "INSERT INTO passwords (username, website, password) VALUES ('$username', '$website', '$password')";
  if (mysqli_query($conn, $sql)) {

        header("Location: index.php");
        echo "New password added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];

    $sql = "DELETE FROM passwords WHERE id = '$delete_id'";
  if (mysqli_query($conn, $sql)) {

        header("Location: index.php");
        echo "Password deleted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
