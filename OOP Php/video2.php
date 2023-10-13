<?php include 'Includes/Autoload.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OOP Vid 2</title>
</head>
<body>
    <?php
        $a=new Setter();
        $a->setProperty("Ruban Pathak",20,"Black");
        echo $a->name." ".$a->age." ".$a->eyecolor;

        $b=new Setter();
        $b->setProperty("Khudiram Basu",20,"Black");
        echo $b->name." ".$b->age." ".$b->eyecolor;
    ?>
</body>
</html>