<?php

   $host = "localhost";
   $dbUsername = "thejahi2_insurance";
   $dbPassword = "Jahidhasan@123";
   $dbName     = "thejahi2_insurance";


// ...................create connection .................
   
   $connect = mysqli_connect($host, $dbUsername, $dbPassword,$dbName);

   if($connect==false){
      
   echo "<center><h1><font color='red'> <i>Error Stablishing Database Connection !</i> <font></h1></center>";
      
   }	
	



?>