<?php

include 'includes/connect.inc.php';
include 'includes/header.inc.php';

?>

<?php
//Eerst aanpassen als om een aanpassing is gevraagd.....
if (isset($_GET['submit'])) { //Er is op submit gedrukt!
    $stmt = $pdo->prepare('UPDATE werkervaring SET persoon_id =?, beginjaar =?, eindjaar =?, omschrijving =?, werkgever_id =?
, id =? WHERE id =?; UPDATE werkgever SET werkgever_id =?, werkgevernaam =?, vestigingsplaats =?, link = ? WHERE id =?;');
    $stmt->execute(array($_GET["persoon_id"], $_GET["beginjaar"], $_GET["eindjaar"], $_GET["omschrijving"], $_GET["werkgever_id"]
    , $_GET["id"], $_GET["werkgever_id"], $_GET["werkgevernaam"], $_GET["vestigingsplaats"], $_GET["link"]));
    $count = $stmt->execute();

    if ($count == 1) {
        echo 'Er is een rij aangepast!';
    }
}

//Ophalen gegevens
$stmt = $pdo->prepare("SELECT * FROM werkervaring, werkgever WHERE werkervaring.werkgever_id = werkgever.werkgever_id");
$stmt->execute(array($_GET["id"]));

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
print_r($result);
$persoon_id = $result[0]["persoon_id"];
$beginjaar = $result[0]["beginjaar"];
$eindjaar = $result[0]["eindjaar"];
$omschrijving = $result[0]["omschrijving"];
$werkgever_id = $result[0]["werkgever_id"];
$id = $result[0]["id"];
$werkgevernaam = $result[0]["werkgevernaam"];
$vestigingsplaats = $result[0]["vestigingsplaats"];
$link = $result[0]["link"];
?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
    <table>
        <tr>
            <th>persoon_id</th>
            <th>beginjaar</th>
            <th>eindjaar</th>
            <th>omschrijving</th>
            <th>werkgever_id</th>
            <th>id</th>
            <th>werkgevernaam</th>
            <th>vestigingsplaats</th>
            <th>link</th>
        </tr>
        <tr>
            <td><input type="text" name="persoon_id" value="<?php echo $persoon_id; ?>"></td>
            <td><input type="text" name="beginjaar" value="<?php echo $beginjaar; ?>"></td>
            <td><input type="text" name="eindjaar" value="<?php echo $eindjaar; ?>"></td>
            <td><input type="text" name="omschrijving" value="<?php echo $omschrijving; ?>"></td>
            <td><input type="text" name="werkgever_id" value="<?php echo $werkgever_id; ?>"></td>
            <td><input type="text" name="id" value="<?php echo $id; ?>"></td>
            <td><input type="text" name="werkgevernaam" value="<?php echo $werkgevernaam; ?>"></td>
            <td><input type="text" name="vestigingsplaats" value="<?php echo $vestigingsplaats; ?>"></td>
            <td><input type="text" name="link" value="<?php echo $link; ?>"></td>
        </tr>
        <tr>
            <td><input type="submit" name="submit" value="Aanpassen"></td>
        </tr>
    </table>
</form>
<a href="form.php">Terug<a><br>


        <?php

        include 'includes/footer.inc.php';

        ?>

