<?php
include 'database.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM users WHERE id=$id");
    $row = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $birth_date = $_POST['birth_date'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $sql = "UPDATE users SET first_name='$first_name', last_name='$last_name', birth_date='$birth_date', email='$email', phone='$phone', address='$address' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Kayıt güncellendi!";
    } else {
        echo "Hata: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Kayıt Düzenleme</title>
</head>
<body>
    <form method="POST" action="edit.php">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label>Ad:</label>
        <input type="text" name="first_name" value="<?php echo $row['first_name']; ?>" required><br>
        
        <label>Soyad:</label>
        <input type="text" name="last_name" value="<?php echo $row['last_name']; ?>" required><br>
        
        <label>Doğum Tarihi:</label>
        <input type="date" name="birth_date" value="<?php echo $row['birth_date']; ?>" required><br>
        
        <label>E-posta:</label>
        <input type="email" name="email" value="<?php echo $row['email']; ?>" required><br>
        
        <label>Telefon:</label>
        <input type="text" name="phone" value="<?php echo $row['phone']; ?>" required><br>
        
        <label>Adres:</label>
        <textarea name="address" required><?php echo $row['address']; ?></textarea><br>
        
        <button type="submit">Güncelle</button>
    </form>
</body>
</html>