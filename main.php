<?php

require 'vendor/autoload.php';

use JsonSchema\Validator;
use JsonSchema\Constraints\Constraint;


$data = json_decode(file_get_contents('data/data.json'));

$validator = new Validator;
$validator->validate(
    $data,
    (object)['$ref' => 'file://' . realpath('data/schema.json')]
);

if ($validator->isValid()) {
    echo "The supplied JSON validates against the schema.\n";
} else {
    echo "JSON does not validate. Violations:\n";
    foreach ($validator->getErrors() as $error) {
        echo sprintf("[%s] %s\n", $error['property'], $error['message']);
    }
}
