<?php

require 'vendor/autoload.php';

use Swaggest\JsonSchema\Schema;


$data = json_decode(file_get_contents('data/data.json'));
$schema = json_decode(file_get_contents('data/schema.json'));

$validator = Schema::import($schema);

try{

    $res = $validator->in($data);

    //print_r(json_decode(json_encode($res), true));

}catch (\Swaggest\JsonSchema\InvalidValue $e){
    echo $e->getMessage() , "\n";
}


