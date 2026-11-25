<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesten</title>
</head>
<body>
     <?php
      require_once __DIR__ . '/kaarten.php';
      $deck = new Deck();
      $deck->ShowDeck();
    ?>
</body>
</html>