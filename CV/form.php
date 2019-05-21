<?php

include 'includes/connect.inc.php';
include 'includes/header.inc.php';


if (isset($_GET['submit'])) {
    $stmt = $pdo->prepare("INSERT INTO werkervaring (persoon_id, beginjaar, eindjaar, omschrijving, werkgever_id, 
    id) VALUES (?, ?, ?, ?, ?, ?); INSERT INTO werkgever (werkgever_id, werkgevernaam, vestigingsplaats, link) VALUES (?, ?, ?, ?);");
    $stmt->execute(array($_GET["persoon_id"], $_GET["beginjaar"], $_GET["eindjaar"], $_GET["omschrijving"], $_GET["werkgever_id"]
    , $_GET["id"], $_GET["werkgever_id"], $_GET["werkgevernaam"], $_GET["vestigingsplaats"], $_GET["link"]));
    $count = $stmt->execute();

    if ($count == 1) {
        echo 'Er is een rij toegevoegd!';
    }
}

//Overzicht genereren

$stmt = $pdo->prepare("SELECT * FROM werkervaring, werkgever WHERE werkervaring.werkgever_id = werkgever.werkgever_id");
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

//Maak tabelheader
$tr = '';
$th = '';
foreach ($result[0] as $veldnaam => $waarde) {
    $th .= '<th>' . $veldnaam . '</th>';
}
$tr .= '<tr>' . $th . '</tr>';

//Maak tabelrijen
$td = '';
foreach ($result as $row) {
    foreach ($row as $veldnaam => $waarde) {
        $td .= '<td>' . $waarde . '</td>';
    }
    $td .= "<td><a href=\"wijzig.php?id="
        . $row['werkgever_id'] . "\">Wijzig</a></td>"
        . "<td><a href=\"verwijder.php?id="
        . $row['werkgever_id'] . "\">Verwijder</a></td>";

    $tr .= '<tr>' . $td . '</tr>';
    $td = '';
}

//Print de gehele tabel
$table = '<table>' . $tr . '</table>';
echo $table;

?>

    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="get">
        <table>
            <tr><th>persoon_id</th>
                <th>beginjaar</th>
                <th>eindjaar</th>
                <th>omschrijving</th>
                <th>werkgever_id</th>
                <th>id</th>
                <th>werkgevernaam</th>
                <th>vestigingsplaats</th>
                <th>link</th>
            </tr>
            <tr><td><input type="text" name="persoon_id" value=""></td>
                <td><input type="text" name="beginjaar" value=""></td>
                <td><input type="text" name="eindjaar" value=""></td>
                <td><input type="text" name="omschrijving" value=""></td>
                <td><input type="text" name="werkgever_id" value=""></td>
                <td><input type="text" name="id" value=""></td>
                <td><input type="text" name="werkgevernaam" value=""></td>
                <td><input type="text" name="vestigingsplaats" value=""></td>
                <td><input type="text" name="link" value=""></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="Opslaan"></td>
            </tr>
        </table>
    </form>

<?php
include 'includes/footer.inc.php';
include 'includes/close.inc.php';

?>