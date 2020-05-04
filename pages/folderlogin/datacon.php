<?php
 $server="localhost";
 $dbuser="r43949el_admin";
 $dbpass="r43949el_";
 $dbname="r43949el_Stoodle";

 $connection=mysqli_connect($server,$dbuser,$dbpass,$dbname);
 if (!$connection) {
   die("Connection failed:  ".mysqli_connect_error());
 }
