<?php
include 'database.php';
$result = $conn->query("SELECT * FROM users");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Kayıt Listesi</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
    <h2>Kayıt Listesi</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Ad</th>
            <th>Soyad</th>
            <th>Doğum Tarihi</th>
            <th>E-posta</th>
            <th>Telefon</th>
            <th>Adres</th>
            <th>İşlemler</th>
        </tr>
        <?php while($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['first_name']; ?></td>
            <td><?php echo $row['last_name']; ?></td>
            <td><?php echo $row['birth_date']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td><?php echo $row['address']; ?></td>
            <td>
                <a href="edit.php?id=<?php echo $row['id']; ?>">Düzenle</a>
                <a href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Bu kaydı silmek istediğinize emin misiniz?');">Sil</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>