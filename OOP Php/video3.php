<?php include 'Includes/Autoload.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OOP Vid 3</title>
</head>
<body>
    <?php
        $a=new UsingConstructor("Ruban",20,"Black");
        //unset($a);
        echo $a->getvalue();
    ?>
</body>
</html>