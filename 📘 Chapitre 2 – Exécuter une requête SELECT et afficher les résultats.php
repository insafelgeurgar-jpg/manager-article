CREATE TABLE Utilisateur (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nom VARCHAR(100),
  email VARCHAR(100)
);

INSERT INTO Utilisateur (nom, email)
VALUES ('Alice', 'alice@test.com'), ('Bob', 'bob@test.com');
<?php
require 'connexion.php';

try {
    //1️ نكتب الاستعلام
    $sql = "SELECT * FROM Utilisateur";

    // 2️ ننفذ الاستعلام
    $stmt = $pdo->query($sql);

    // 3️ نجيب جميع النتائج
    $utilisateurs = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Erreur : " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des utilisateurs</title>
</head>
<body>

<h1>Liste des utilisateurs</h1>

<?php if (count($utilisateurs) > 0): ?>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Email</th>
    </tr>

    <?php foreach ($utilisateurs as $user): ?>
        <tr>
            <td><?= $user['id'] ?></td>
            <td><?= $user['nom'] ?></td>
            <td><?= $user['email'] ?></td>
        </tr>
    <?php endforeach; ?>

</table>

<?php else: ?>
    <p>ما كاين حتى مستخدم</p>
<?php endif; ?>

</body>
</html>
