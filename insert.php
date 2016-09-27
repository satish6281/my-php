<?php
   $dbhost = 'localhost:3306';
   $dbuser = 'admin';
   $dbpass = 'secret';
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
   
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }
   
   echo 'Connected successfully';
   
   $sql = 'CREATE Database dockerdb';
   $retval = mysql_query( $sql, $conn );
   
   if(! $retval ) {
      die('Could not create database: ' . mysql_error());
   }
   
   echo "Database dockerdb created successfully\n";

   mysql_select_db( 'dockerdb' );

      $sql = 'CREATE TABLE dockertable( '.
      'fname VARCHAR(20) NOT NULL, '.
      'lname  VARCHAR(20) NOT NULL, '.
      ')';   

   $sql = "INSERT INTO dockertable (fname, lname)VALUES ('$_POST[fname]','$_POST[lname]')";
 
    if (!mysql_query($conn, $sql))
     {
      die('Error: ' . mysql_error());
     }
    echo "1 record added";

   mysql_close($conn);
?>
