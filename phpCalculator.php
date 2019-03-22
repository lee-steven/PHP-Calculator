<!DOCTYPE html>
<html lang="en">
<head>
    <title>PHP Calculator</title>
    <meta charset="UTF-8" >
    <link rel="stylesheet" type="text/css" href="stylesheet.css" />
</head>
<body>

<?php
//defining and setting values as empty
$input1 = $input2 = $function = "";
$input1Err = $input2Err = $funcErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["input1"])) {
      $input1Err = "Input 1 is Required";
    } else {
        $input1 = $_POST["input1"];
    }
    if (empty($_POST["input2"])){
        $input2Err = "Input 2 is Required";
    } else {
        $input2 = $_POST["input2"];
    }
    if (empty($_POST["function"])){
        $funcErr = "Choose a Function";
    } else {
        $function = $_POST["function"];
    }
}
?>

<h1>PHP Calculator</h1>
<span class="error"> * required field </span>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
    Input 1: <input type="number" name="input1" step=0.01 value="<?php echo $input1;?>"> <span class="error">* <?php echo $input1Err;?></span>
    <br>
    Input 2: <input type="number" name="input2" step=0.01 value="<?php echo $input2;?>"> <span class="error">* <?php echo $input2Err;?></span>
    <br>
    Function:
    <input type="radio" name="function" 
    <?php if (isset($function) && $function=="add") echo "checked";?> value="add">Add
    <input type="radio" name="function" 
    <?php if (isset($function) && $function=="subtract") echo "checked";?> value="subtract">Subtract
    <input type="radio" name="function" 
    <?php if (isset($function) && $function=="multiply") echo "checked";?> value="multiply">Multiply  
    <input type="radio" name="function"
    <?php if (isset($function) && $function=="divide") echo "checked";?> value="divide">Divide
    <span class="error">* <?php echo $funcErr; ?></span>
    <br>
    <input type="submit" name="submit" value="Submit">  
</form>


<?php
echo "<h3>Calculation: </h3>";
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["function"]) && !empty($_POST["input1"]) && !empty($_POST["input2"]) ) {
    if($_POST["function"]=="add"){
        $ans = $input1 + $input2;
        echo number_format($ans,2);
    }
    if($_POST["function"]=="subtract"){
        $ans = $input1 - $input2;
        echo number_format($ans,2);
    }
    if($_POST["function"]=="multiply"){
        $ans = $input1 * $input2;
        echo number_format($ans,2);
    }
    if($_POST["function"]=="divide"){
        $ans = $input1 / $input2;
        echo number_format($ans,2);
    }
}
?>
</body>
</html>