<?php
	session_start();
	// Finally, destroy the session.
	session_destroy();

	header("Location:./index.php");
?>