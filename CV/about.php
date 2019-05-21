<?php

include 'includes/connect.inc.php';
include 'includes/header.inc.php';

?>

<div class="portfolio-resume row">

    <div class="large-4 columns">
        <div class="portfolio-resume-wrapper">
            <img class="portfolio-resume-headshot" src="img/HEADSHOT_MAARTEN_BEUZEL.jpg" alt="headshot">
            <h3 class="portfolio-resume-header">Over mij</h3>
            <p>Gezocht: Een werkgever uit de omgeving Doetinchem/Arnhem/Apeldoorn die met mij het avontuur wil aangaan
                om de vierjarige HBO deeltijdopleiding Infrastructure Design and Security tot een succes te maken. Mijn
                naam is Maarten: een loyaal en leergierig persoon die op zoek is naar een kans om zichzelf verder te
                ontwikkelen op ICT gebied en zo waarde toe te voegen binnen een onderneming. Mijn interesses liggen met
                name op het gebied van infrastructuur, security en business IT.
                Twee dagen in de week (dinsdag en donderdag) volg ik college aan de HBO instelling Windesheim Zwolle.
                Verdere informatie opleiding:
                https://www.windesheim.nl/studeren/opleidingen/techniek-en-ict/hbo-ict/inhoud-opleiding/infrastructure-design-and-security/
            </p>
            <div class="portfolio-resume-contact-info">
                <?php
                $stmt = $pdo->prepare("SELECT * FROM persoon");

                //uitvoeren
                $stmt->execute();

                //loop langs alle rijen
                while ($row = $stmt->fetch()) {
                    //haal de kolom 'naam' op
                    $email = $row["email"];
                    $telnr = $row["telnr"];
                    echo '<a href="mailto:#"><i class="fa fa-envelope" aria-hidden="true"></i>' . $email . '</a>' . '<br>';
                    echo '<a href="tel:+31623701389"><i class="fa fa-phone" aria-hidden="true"></i>' . $telnr . '</a>' . '<br>';
                }
                ?>
            </div>
        </div>
    </div>

    <div class="large-4 columns">
        <div class="portfolio-resume-wrapper">
            <h3 class="portfolio-resume-header">Vaardigheden</h3>
            <ul>
                <li>HTML 5, CSS 3, Framework Foundation 6, PHP 7</li>
                <li>MySQL</li>
                <li>Windows Powershell</li>
                <li>BPMN</li>
                <li>Arduino Uno</li>
                <li>UML</li>
                <li>Microsoft Office 365</li>
            </ul>
        </div>
    </div>

    <div class="large-4 columns">
        <div class="portfolio-resume-wrapper">
            <h3 class="portfolio-resume-header">Werkervaring</h3>

            <?php
            $stmt = $pdo->prepare("SELECT * FROM werkervaring, werkgever WHERE werkervaring.werkgever_id = werkgever.werkgever_id");

            //uitvoeren
            $stmt->execute();

            echo '<div class="portfolio-resume-spacing">';
            //loop langs alle rijen
            while ($row = $stmt->fetch()) {
                //haal de kolom 'naam' op
                $werkgevernaam = $row["werkgevernaam"];
                $vestiginsplaats = $row["vestigingsplaats"];
                $beginjaar = $row["beginjaar"];
                $eindjaar = $row["eindjaar"];
                $omschrijving = $row["omschrijving"];

                echo '<h5><strong>' . $werkgevernaam . ' ' . $vestiginsplaats . '</strong></h5>' . '<br>';
                echo '<p>' . $omschrijving . '</p>' . '<br>';
                echo '<ul><li>' . $beginjaar . '-' . $eindjaar . '</li></ul>' . '<br>';

            }
            echo '</div>';

            ?>
        </div>
    </div>

    <div class="large-4 columns">
        <div class="portfolio-resume-wrapper">
            <h3 class="portfolio-resume-header">Scholing</h3>
            <div class="portfolio-resume-spacing">
                <h5><strong>Hogeschool Windesheim Zwolle — HBO-ICT Infrastructure Design & Security</strong></h5>
                <p>2017 - heden</p>
            </div>
            <div class="portfolio-resume-spacing">
                <h5><strong>Radboud Universiteit Nijmegen — Bachelor Nederlands recht</strong></h5>
                <p>Niet behaald. 164 ECTS totaal.</p>
            </div>
            <div class="portfolio-resume-spacing">
                <h5><strong>Radboud Universiteit Nijmegen — Propedeuse Nederlands recht</strong></h5>
                <p>2003-2005</p>
                <p>Behaald.</p>
            </div>
            <div class="portfolio-resume-spacing">
                <h5><strong>Graafschap College Doetinchem / Rietveld Lyceum Doetinchem — VWO</strong></h5>
                <p>1997 - 2003</p>
                <p>Behaald.</p>
            </div>
        </div>
    </div>

    <div class="large-4 columns">
        <div class="portfolio-resume-wrapper">
            <h3 class="portfolio-resume-header">Hobby's</h3>
            <ul>
                <?php
                $stmt = $pdo->prepare("SELECT * FROM persoon");

                //uitvoeren
                $stmt->execute();

                //loop langs alle rijen
                while ($row = $stmt->fetch()) {
                    //haal de kolom 'naam' op
                    $hobby = $row["hobby"];
                    echo '<li>' . $hobby . '</li><br>';
                }
                ?>
            </ul>
        </div>
    </div>

</div>

<?php

include 'includes/footer.inc.php';
include 'includes/close.inc.php';

?>
