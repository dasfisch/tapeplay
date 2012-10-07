<?php
  $conn = mysql_connect('127.0.0.1:3306', 'root', 'n3uraxis');
  
  $db = mysql_select_db('dev_tapeplay');

  $results = mysql_query('SELECT id, city FROM schools');

  while($assoc = mysql_fetch_assoc($results)) {
    $schools[] = $assoc;
  }

  foreach($schools as $school) {
    $schoolName = explode(' ', $school['city']);

    foreach($schoolName as $key=>$part) {
      if($part !== 'of' && $part !== 'the') {
        $schoolName[$key] = ucfirst(strtolower($part));
      }
    }

    $school['city'] = implode(' ', $schoolName);
    
    if(mysql_query('UPDATE schools SET city="'.$school['city'].'" WHERE id='.$school['id'])) {
      echo $school['city'].' was successfully change'."\n";
    }
  }
