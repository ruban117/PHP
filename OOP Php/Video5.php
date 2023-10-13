<?php 
    declare(strict_types=1);
    include 'Includes/Autoload.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OOP vid 5</title>
</head>
<body>
    <?php
        $a=new TypeDeclaration();
        try{
            $a->setname("Ruban");
            echo $a->getname();
        }catch(TypeError $e){
            echo "Please Add The Required Datatype:- ".$e->getMessage();
        }
    ?>
</body>
</html>
