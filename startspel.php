<?php
require_once __DIR__ . '/kaarten.php';

$deck = new Deck();
$speler1 = new Hand(0);
$speler2 = new Hand(1);
$aantalKaarten = 7;

$deck->schudden();

for ($i = 0; $i < $aantalKaarten; $i++) {
    $speler1->ToevoegenAanHand($deck->rapen());
    $speler2->ToevoegenAanHand($deck->rapen());
}

$D = count($deck->kaarten);
$PK1 = $speler1->getAantalKaarten();
$PK2 = $speler2->getAantalKaarten();
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesten</title>
    <style>
        kaart img { height: 154px; }
        hand { width: 300px; height: 200px; display: block; position: absolute; }
        hand kaart { display: block; position: absolute; bottom: 0; }
        hand kaart:hover { top: 0; bottom: auto; }
        deck, aflegstapel {
            width: 125px;
            height: 175px;
            display: block;
            position: relative;
            float: left;
            left: 250px;
        }
        deck kaart { position: absolute; left: 0; bottom: 0; }
        tafel { width: 250px; left: 250px; top: 250px; position: absolute; }
        <?php for ($d = 1; $d <= $D; $d++) { ?>
        deck kaart:nth-child(<?php echo $d; ?>) {
            left: <?php echo $d; ?>px;
            bottom: <?php echo $d; ?>px;
        }
        <?php } ?>
        .p0 { left: 50px; bottom: 20px; }
        .p1 { transform: rotate(180deg); left: 450px; top: 20px; }
        <?php for ($p1 = 1; $p1 <= $PK1; $p1++) { ?>
        .p0 kaart:nth-child(<?php echo $p1; ?>) {
            left: <?php echo ($p1 - 1) * 100; ?>px;
        }
        <?php } ?>
        <?php for ($p2 = 1; $p2 <= $PK2; $p2++) { ?>
        .p1 kaart:nth-child(<?php echo $p2; ?>) {
            left: <?php echo ($p2 - 1) * 100; ?>px;
        }
        <?php } ?>
    </style>
</head>
<body>
    <h2>Deck</h2>
    <?php $deck->ShowDeck(); ?>
    <h2>Speler 1</h2>
    <?php
    $speler1->ShowHand();
    ?>
    <h2>Speler 2</h2>
    <?php 
    $speler2->ShowHand();
    ?>
</body>
</html>