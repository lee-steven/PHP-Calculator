<!DOCTYPE html>
<html lang="en">
<head>
    <title>PHP Calculator</title>
    <meta charset="UTF-8" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="stylesheets2.css" />
</head>
<body>

    <h1>PHP Calculator</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
        
    <div id="background">

            <div class="calc-view">
                <?php
                    if(!empty($_POST["input1"]) && !empty($_POST["input2"]) && isset($_POST["operator"])){
                        if($_POST["operator"]=="add"){
                            $ans = $_POST["input1"] + $_POST["input2"];
                            echo number_format($ans,2);
                        }
                        if($_POST["operator"]=="subtract"){
                            $ans = $_POST["input1"] - $_POST["input2"];
                            echo number_format($ans,2);
                        }
                        if($_POST["operator"]=="multiply"){
                            $ans = $_POST["input1"] * $_POST["input2"];
                            echo number_format($ans,2);
                        }
                        if($_POST["operator"]=="divide"){
                            $ans = $_POST["input1"] / $_POST["input2"];
                            echo number_format($ans,2);
                        }
                    }
                    else{
                        echo "0.00";
                    }
                ?>
            </div>

   
            <input type="number" name="input1" step=0.01 value="<?php echo $_POST["input1"];?>"/>
            <input type="number" name="input2" step=0.01 value="<?php echo $_POST["input2"];?>"/>
            <div class="row">
                    <span>
                        <input type="submit" name="submit" class="equalButton" value="=">      
                    </span>

                    <div>
                            <input type="radio" id="add" value="add" name="operator"/>
                            <label for="add">+</label>
                    </div>
                    <div>
                            <input type="radio" id="subtract" value="subtract" name="operator"/>
                            <label for="subtract">-</label> 
                    </div>
                    <div>
                            <input type="radio" id="multiply" value="multiply" name="operator"/>
                            <label for="multiply">x</label>
                    </div>
                    <div>
                            <input type="radio" id="divide" value="divide" name="operator"/>
                            <label for="divide">&#247;</label>
                    </div>

                </div>
            </div>
        </div>
       
        <div class="result">
            <?php
            if(isset($_POST["submit"])){
                if(empty($_POST["input1"])){
                    echo "<h4>Please type in a number in the first box!</h4>";
                }
                if(empty($_POST["input2"])){
                    echo "<h4>Please type in a number in the second box!</h4>";
                }
                if(!isset($_POST["operator"])){
                    echo "<h4>Please choose an operation!</h4>";
                }
            }
            ?>
        </div>
    </form>

  
</body>
</html>