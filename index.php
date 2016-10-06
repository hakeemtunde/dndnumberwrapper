<?php
/*
 * sample demostration on how to use the wrapper class
 */

require_once 'unirest-php/src/Unirest.php';
require_once 'DndWrapper.php';

$headers = array('X-Mashape-Key'=>'$key',
                  'Accept' => 'application/json');

$query = array('mobilenos' => '8162469186,8022712307');

$dndwrapper = new DndWrapper($headers, $query);

$dndwrapper->sendRequest();

print_r($dndwrapper->getUnRegisteredNo());
