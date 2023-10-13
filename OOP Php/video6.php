<?php 
    declare(strict_types=1);
    include 'Partials/Calc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php Calculator</title>
</head>
<body>
    <form action="Partials/Calc.php" method="post">
        <label for="num1">Enter 1st Number</label>
        <input type="number" name="num1">
        <label for="oper">Select The Operator</label>
        <select name="oper" id="">
            <option value="add">+</option>
            <option value="sub">-</option>
            <option value="mul">*</option>
            <option value="div">/</option>
        </select>
        <label for="num1">Enter 2nd Number</label>
        <input type="number" name="num2">
        <button name="submit">Calculate</button>
    </form>
</body>
</html>