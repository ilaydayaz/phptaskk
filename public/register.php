<?php
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $birth_date = $_POST['birth_date'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $sql = "INSERT INTO users (first_name, last_name, birth_date, email, phone, address) 
            VALUES ('$first_name', '$last_name', '$birth_date', '$email', '$phone', '$address')";

    if ($conn->query($sql) === TRUE) {
        echo "Kayıt başarılı!";
    } else {
        echo "Hata: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Kayıt Formu</title>
</head>
<body>
    <form method="POST" action="register.php">
        <label>Ad:</label>
        <input type="text" name="first_name" required><br>
        
        <label>Soyad:</label>
        <input type="text" name="last_name" required><br>
        
        <label>Doğum Tarihi:</label>
        <input type="date" name="birth_date" required><br>
        
        <label>E-posta:</label>
        <input type="email" name="email" required><br>
        
        <label>Telefon:</label>
        <input type="text" name="phone" required><br>
        
        <label>Adres:</label>
        <textarea name="address" required></textarea><br>
        
        <button type="submit">Kaydol</button>
    </form>
</body>
</html>