<?php
// Connexion à la base de données AlwaysData
$host = 'mysql-jeremiepoujol.alwaysdata.net';
$dbname = 'jeremiepoujol_evaluationffessm';
$user = '404366';
$pass = '$wC0H2^XG45S'; // Remplace par ton vrai mot de passe
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "<h2>Dernières évaluations IPD</h2>";

    $stmt = $pdo->query("SELECT * FROM evaluations_ipd ORDER BY date_evaluation DESC LIMIT 10");

    echo "<table border='1' cellpadding='5' cellspacing='0'>
            <tr>
                <th>Nom du plongeur</th>
                <th>Date</th>
                <th>Cellule</th>
                <th>Note</th>
                <th>Pénalité</th>
            </tr>";

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>
                <td>{$row['plongeur_nom']}</td>
                <td>{$row['date_evaluation']}</td>
                <td>{$row['reference_cellule']}</td>
                <td>{$row['total_note']}</td>
                <td>{$row['penalite']}</td>
              </tr>";
    }

    echo "</table>";

} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>
