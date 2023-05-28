<?php
   // connect to mongodb
   $m = new MongoClient();

   echo "Connection to database successfully<br/>";
   // select a database
   $db = $m->mydb;

   echo "Database mydb selected<br/>Mongodb all OK!<br/><br/>";
?>