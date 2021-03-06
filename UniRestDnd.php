<?php

require_once 'SendRequestInterface.php';

/**
 * Wrapper class for unirest-php
 * 6 Oct, 2016
 * @author     AbdulHakeem A <hakeemtunde@hotmail.com>
 * @copyright  CoreBytes Edge Solution
 * @version    CVS: 1.0
 * @link       http://4sightweb.com
 */

/*
 * This a util class for dnd sms verification
 */

class UniRestDnd implements SendRequestInterface
{
  const REG_STATUS_STR = "Never Registered";

  private $query = "";

  private $headers = array('X-Mashape-Key'=>'sh8KTnNhPxKrQheN2p19ioPgjsn',
    		'Accept' => 'application/json');

  private $responseStatus = 0;

  private $response;

  private $registeredNumbers = [];

  private $unRegisteredNumbers = [];

  public function __construct($query = [])
  {

    $this->query = $query;
    
  }

  public function sendRequest($link ='https://dndcheck.p.mashape.com/index.php')
  {
    $this->response = Unirest\Request::get($link, $this->headers, $this->query);

    if ($this->response->code !== 200) {

      print "Something went wrong: ". $this->response->code;

      return;
    }

    $this->sortNumbers();
  }

  private function sortNumbers()
  {
  	
      foreach($this->response->body as $numberdetail) {

        if ($numberdetail->DND_status == self::REG_STATUS_STR) {
            $this->unRegisteredNumbers[] = $numberdetail->mobilenumber;
        } else {
          $this->registeredNumbers[] = $numberdetail->mobilenumber;
        }
      }

  }

  public function getRegisteredNo()
  {
    return $this->registeredNumbers;
  }

  public function getUnRegisteredNo()
  {
    return $this->unRegisteredNumbers;
  }

  public function getRegisteredNoAsStr()
  {
    return $this->numberToString($this->registeredNumbers);
  }

  public function getUnRegisteredNoAsStr()
  {
    return $this->numberToString($this->unRegisteredNumbers);
  }

  private function numberToString($numbers)
  {
    return implode(',', $numbers);
  }
}
