<?php

	# Open the database
@ $db = new mysqli('localhost', 'ts_user', 'pa55word', 'tech_support');
if ($db->connect_error) {
	echo "could not connect: " . $db->connect_error;
	exit();
}
?>