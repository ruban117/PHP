<?php include 'Classes/Scope_Resolution_Operator.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scope_Resolution_Operator</title>
</head>
<body>
    <?php
        
        echo First::first();
        Second::second();
        echo Second::$staticproperty;
    ?>
</body>
</html>