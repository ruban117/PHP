<?php include 'Includes/Autoload.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OOP Vid 4</title>
</head>
<body>
    <?php
        echo UseStatic::$name;//to access static property
        UseStatic::setname("Soumita");
        echo UseStatic::$name;

        $a=new UseStatic();
        $a->setname2("Madarchod");
        echo $a->getname();
    ?>
</body>
</html>