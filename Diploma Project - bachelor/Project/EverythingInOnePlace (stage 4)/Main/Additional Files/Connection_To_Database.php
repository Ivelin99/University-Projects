<?php
// Връзка с базата от данни
 $db_Host = "127.0.0.1";
 $db_Username = "root";
 $db_Password = "";
 $db_Name = "db_diploma_project";
 
 $connDatabase = mysqli_connect($db_Host, $db_Username, $db_Password, $db_Name);
 
 if ($connDatabase->connect_errno) {
	// В случай на неуспешно свързване се извежда съобщението 
	// за грешка, върнато от MySQL.
	print $connDatabase->connect_error;
	// Прекратява се изпълнението на програмата.	
	exit;
	
	// Освобождава паметта, заета от резултата.
    $result->free();

    // Затваря връзката към СУБД.
    $connDatabase->close();
 }
?>