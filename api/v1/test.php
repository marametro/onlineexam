<?php
require_once '../include/DbOperation.php';
 $db = new DbOperation();
 $result = $db->getAllparticipant();
 
  while($row = $result->fetch_assoc()){
        $temp = array();
       echo $temp['id'] = $row['id'];
        echo $temp['name'] = $row['name'];
        echo  $temp['username'] = $row['username'];
        
    }


?>