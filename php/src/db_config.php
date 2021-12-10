<?php

/** The name of the database for WordPress */
$db_Name = 'blackpepper_db';

/** MySQL database username */
$db_User = 'blackpepper_user'; //only use user with read-only permission

/** MySQL database password */
$db_Password = 'blackpepper_password';

/** MySQL hostname */
$db_Host = 'db';

$db_connection = new mysqli( $db_Host, $db_User, $db_Password, $db_Name );

/** Check connection */
if ( $db_connection->connect_error ) {
	echo "Failed to connect to MySQL: " . $db_connection->connect_error;
	exit;
} else {

}