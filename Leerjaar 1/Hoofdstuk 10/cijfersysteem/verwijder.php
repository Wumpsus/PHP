<?php
include "connect.php";

if (isset($_GET['ID'])) {
    $id = $_GET['ID'];
    $sql = "DELETE FROM cijfer WHERE ID = ?";
    $stmt= $conn->prepare($sql);
    $stmt->execute([$id]);

    header("Location: cijfersysteem.php");
}
?>
