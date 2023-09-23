<?php

require ('conexao.php');

$sql="SELECT * FROM login";

$result=$conn->query($sql);

print_r($result);

function insert(string $table,){

}