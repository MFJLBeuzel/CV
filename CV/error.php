<?php
/**
 * Created by PhpStorm.
 * User: M.F.J.L
 * Date: 2-7-2018
 * Time: 22:14
 */

try {

    $db = "mysql:host=localhost;dbname=portfolio;port=3306";
    $pdo = new PDO($db, "root", "");
    //andere code
} catch (PDOException $e) {
    print("Error!: " . $e->getMessage());
}

