<?php
/**
 * Created by PhpStorm.
 * User: M.F.J.L
 * Date: 29-6-2018
 * Time: 19:52
 */
//De $db-string definieert de verbinding.
$db = "mysql:host=localhost;dbname=portfolio;port=3306";
$user = "root";
$pass = "";
//Er wordt een nieuw PDO-verbindingsobject aangemaakt en in de variabele $pdo opgeslagen.
$pdo = new PDO($db, $user, $pass);

?>
