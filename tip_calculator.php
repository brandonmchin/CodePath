<?php
	session_start();

	$_SESSION['error'] = 0;

	////////////////////////////////////////////////////////////////////////////////////////////
	// ERROR CHECK

	if(isset($_POST['bill_subtotal']))
	{
		$_SESSION['bill_subtotal'] = htmlspecialchars($_POST['bill_subtotal']);

		if((!is_numeric($_SESSION['bill_subtotal'])) || ($_SESSION['bill_subtotal'] <= 0))
		{	
			$_SESSION['error'] = -1;
			$_SESSION['bill_subtotal'] = 0;
		}
	}

	if(isset($_POST['percentage']))
	{
		$_SESSION['percentage'] = $_POST['percentage'];
	}
	else if(isset($_POST['custom_percentage']))
	{
		$_SESSION['custom_percentage'] = $_POST['custom_percentage'];
		$_SESSION['percentage'] = $_SESSION['custom_percentage'];
	}
	// else
	// 	$_SESSION['error'] = -2;

	// if(($_SESSION['bill_subtotal'] == 0) && (!isset($_SESSION['percentage'])))
	// {
	// 	$_SESSION['error'] = -3;
	// }

	/////////////////////////////////////////////////////////////////////////////////////////////
	// PROCESS

	if($_SESSION['error'] == 0)
	{
		$_SESSION['tip'] = $_SESSION['bill_subtotal'] * $_SESSION['percentage'] / 100.00;
		$_SESSION['total'] = $_SESSION['bill_subtotal'] + $_SESSION['tip'];

		$_SESSION['output'] = "Tip: $" . number_format(round($_SESSION['tip'], 2), 2) . "<br>" . "Total: $" . number_format(round($_SESSION['total'], 2), 2);
	}

	// return to previous page
	if(isset($_SERVER["HTTP_REFERER"]))
		header("Location: {$_SERVER["HTTP_REFERER"]}");
?>
