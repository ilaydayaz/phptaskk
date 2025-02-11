<?php
include 'database.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM users WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Kayıt silindi!";
    } else {
        echo "Hata: " . $conn->error;
    }
}
?>
