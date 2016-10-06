<?php

/**
 * 6 Oct, 2016
 * @author     AbdulHakeem A <hakeemtunde@hotmail.com>
 * @copyright  KorBytes
 * @version    CVS: 1.0
 * @link       http://4sightweb.com
 */

/*
 * sample demostration on how to use the wrapper class
 */

require_once 'unirest-php/src/Unirest.php';
require_once 'DndWrapper.php';

$headers = array('X-Mashape-Key'=>'y0InagbMx9msh8KTnNhPxKrQheN2p19ioPgjsnhBtbGmPo5dEA',
                  'Accept' => 'application/json');

$query = array('mobilenos' => '8162469186,8022712307');

$dndwrapper = new DndWrapper($headers, $query);

$dndwrapper->sendRequest();

print_r($dndwrapper->getUnRegisteredNo());
