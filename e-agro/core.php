<?php
function loggedin()
{
	if(isset($_SESSION['username']))
		return true;
	else
		return false;
}
?>
	