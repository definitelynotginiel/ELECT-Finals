<?php
   // connection/db_connection.php
   require '../vendor/autoload.php'; // Ensure composer autoload is included

   // Create a MongoDB client
   $m = new MongoDB\Client("mongodb://localhost:27017/");
   $collection = $m->works->projectCollection; // Adjust to your database name


?>

