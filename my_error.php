<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My error</title>
</head>
<body>
    <form action="my_error.php" method="GET">
    <input type="text" name="num1" placeholder="Number 1">
    <input type="text" name="num2" placeholder="Number 2"> 
    <select name="operator">
        <option>Devide</option>
        
    </select><br>
    
    <button name="submit" value="submit" type="submit">Calculate</button>
    </form>
    <p>The answer is: </p>
    <?php
    if(!isset($_GET['submit'])) {
    exit;
    }
       
else
    {
        $result1 = $_GET['num1'];
        $result2 = $_GET['num2'];
        $operator = $_GET['operator'];
    }
    
    set_error_handler(function () {
        throw new Exception('Ach!');
    });
    
    try {
        echo $result1 / $result2;
    } catch( Exception $e ){
        echo "Er is iets fout gegaan!".PHP_EOL;
        $result = 0;
    }
    
    restore_error_handler();
    
?>

  
</body>
</html>