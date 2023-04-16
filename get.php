<?php

$sql = "SELECT * FROM post";
$result = ($sql);
while($row = $result->fetch_assoc()){
    $json[] = $row;

}

$data['data'] = $json;
return json_encode($data);


?>