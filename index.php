<?php
require 'vendor/autoload.php';

$connext           = new \GB\Exchange();
include 'test.php';

echo '<pre>';
print_r($connext->exe('ls -l'));
print_r($connext->test());
print_r($connext->getErrors());
print_r($connext);
echo '</pre>';
