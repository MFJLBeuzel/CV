<?php
include 'includes/connect.inc.php';
include 'includes/header.inc.php';

?>

<?php
$stmt = $pdo->prepare("DELETE FROM werkervaring WHERE id = ?");

$count = $stmt->execute(array($_GET["id"]));

if ($count == 1) {
    echo 'Er is een rij verwijderd!' . '<br>';
}
?>

<a href="form.php">Terug<a><br>

<?php

include 'includes/footer.inc.php';

?>

