<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Tip Calculator</title>
    	<link rel='stylesheet' href='style.css'/>
    </head>
    <body>
        <div id="main_container">
            <div id="title">Tip Calculator</div>

            <form action = "tip_calculator.php" method = "post">
                <div id="bill_subtotal_input">Bill Subtotal: $ 
                    <input id="text_input" type="text" 
                        name="bill_subtotal" 
                        style="background-color: <?php if(($_SESSION['error']==-1)||($_SESSION['error']==-3)){echo '#ffe4e1';}?>"
                        value="<?php if(isset($_SESSION['bill_subtotal'])){echo htmlentities($_SESSION['bill_subtotal']);} ?>" 
                    />
                </div>
                
                <div id="tip_radio_buttons">Tip Percentage:
                    <input type="radio" name="percentage" 
                        <?php if(isset($_SESSION['percentage']) && $_SESSION['percentage']=='10%'){echo 'checked';} ?> value="10%" />
                        <label style="color: <?php if(($_SESSION['error']==-2)||($_SESSION['error']==-3)){echo '#ff0000';}?>">10%</label>
                    <input type="radio" name="percentage" 
                        <?php if(isset($_SESSION['percentage']) && $_SESSION['percentage']=='15%'){echo 'checked';} ?> value="15%" />
                        <label style="color: <?php if(($_SESSION['error']==-2)||($_SESSION['error']==-3)){echo '#ff0000';}?>">15%</label>
                    <input type="radio" name="percentage" 
                        <?php if(isset($_SESSION['percentage']) && $_SESSION['percentage']=='20%'){echo 'checked';} ?> value="20%" />
                        <label style="color: <?php if(($_SESSION['error']==-2)||($_SESSION['error']==-3)){echo '#ff0000';}?>">20%</label>
                </div>
                
                <div style="text-align: center;"><input type="submit" value="Submit" /></div>
            </form>
            <div id="output_container" style="display: <?php if(isset($_SESSION['output'])) echo 'block'; else echo 'none'; ?>">
                <?php
                    if($_SESSION['error'] == 0)
                        echo $_SESSION["output"];
                    else
                        echo "ERROR " . $_SESSION['error'];
                    session_unset();
                    session_destroy();
                ?>
            </div>
        </div>
    </body>
</html>