<?php

  try
  {
      $dbh = new PDO("sqlite:app_data/waterpik.sqlite");
// SET PDO TO TELL US ABOUT WARNINGS OR TO THROW EXCEPTIONS
      $dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
      $dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

      //create the database
    //  $dbh->exec("CREATE TABLE Dogs (Id INTEGER PRIMARY KEY, Breed TEXT, Name TEXT, Age INTEGER)");

      //insert some data...
     /* $dbh->exec("INSERT INTO Dogs (Breed, Name, Age) VALUES ('Labrador', 'Tank', 2);".
          "INSERT INTO Dogs (Breed, Name, Age) VALUES ('Husky', 'Glacier', 7); " .
          "INSERT INTO Dogs (Breed, Name, Age) VALUES ('Golden-Doodle', 'Ellie', 4);");*/

      //now output the data to a simple html table...
      print "<table border=1>";
      print "<tr><td>Id</td><td>Breed</td><td>Name</td><td>Age</td></tr>";
      $result = $dbh->query('SELECT * FROM Dogs');
      $num= $result->fetchColumn();
      echo $num;
      foreach($result as $row)
      {
          print "<tr><td>".$row['Id']."</td>";
          print "<td>".$row['Breed']."</td>";
          print "<td>".$row['Name']."</td>";
          print "<td>".$row['Age']."</td></tr>";
      }
      print "</table>";

      // close the database connection
      $dbh = NULL;
  }
  catch(PDOException $e)
  {
      print 'Exception : '.$e->getMessage();
  }
?>