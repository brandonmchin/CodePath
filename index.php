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
                <div id="bill_subtotal_input">Bill subtotal: $ 
                    <input type="text" name="bill_subtotal" 
                        style="background-color: <?php if(strpos($_SESSION['error'], '1')) echo '#ffb6c1'; ?>"
                        value="<?php if(isset($_SESSION['bill_subtotal'])) echo htmlentities($_SESSION['bill_subtotal']); ?>" 
                    />
                </div>

                Tip percentage: 
                <div id="tip_radio_buttons">
                    <?php
                        for($tip_per=10; $tip_per<=20; $tip_per+=5)
                        {
                            $tip_per .= "%";

                            echo '<input type="radio" name="percentage"';

                            if(isset($_SESSION["percentage"]) && $_SESSION["percentage"]==$tip_per)
                                echo 'checked="checked"';

                            if($tip_per=="10%")     // set default percentage
                                echo 'value=' . $tip_per . ' checked="checked" />';
                            else
                                echo 'value=' . $tip_per . ' />';

                            echo '<label>' . $tip_per . '</label>';
                        }
                    ?>

                    <input type="radio" name="percentage" 
                        <?php if(isset($_SESSION['custom'])) echo 'checked="checked"'; ?> value="custom" />
                        <label>Custom: 
                            <input id="custom_input" type="text" name="custom" 
                                style="background-color: <?php if(strpos($_SESSION['error'], '2')) echo '#ffb6c1'; ?>"
                                value="<?php if(isset($_SESSION['custom'])) echo htmlentities($_SESSION['custom']); ?>"
                            /> 
                            % 
                        </label>
                    
                </div>

                <div id="split_input">Split: 
                    <input type="text" name="num_persons"
                        style="background-color: <?php if(strpos($_SESSION['error'], '3')) echo '#ffb6c1'; ?>"
                        value="<?php if(isset($_SESSION['num_persons'])) echo htmlentities($_SESSION['num_persons']); else echo 1; ?>"
                    />
                    person(s)
                </div>
                
                <div style="text-align: center;"><input type="submit" value="Submit" /></div>
            </form>
            <!-- <div id="output_container"> -->
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