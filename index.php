<?php
/*
 * sample demostration on how to use the wrapper class
 */

require_once 'unirest-php/src/Unirest.php';
require_once 'UniRestDnd.php';

$query = array('mobilenos' => '8022712307');

$dndwrapper = new UniRestDnd($query);

$dndwrapper->sendRequest();

print_r($dndwrapper->getUnRegisteredNo());
