<?php
namespace App\ResponseLayer;

use App\Contrat\IRequestAnswer;

class ResponseMessageBuilder implements IRequestAnswer {

  public function buildUpdateRequestMessage($result) {
    $updateResponse = new ResponseModel();
    if($result === true) {
      $updateResponse->setMessage("success");
    }else {
      $updateResponse()->setError(1);
      if($result === null) $updateResponse()->setMessage("server internal error");
      else $updateResponse()->setMessage($result);
    }
    return $updateResponse;
  }

  public function buildSearchRequestMessage($result) {
    $searchResponse = new ResponseModel();
    if(count($result) > 0) {
      $searchResponse->setMessage("success");
      $searchResponse->setPayload($result);
    }else {
      if($result != null ) {
        $searchResponse->setError(1);
        $searchResponse->setMessage("server internal error");
      }else{
        $searchResponse->setMessage("success");
        $searchResponse->setPayload("no result found!");
      }
    }
    return $searchResponse;
  }

}


class ResponseModel {

  private $error = 0;
  private $message = null;
  private $payload  = null;

  public function getError()
  {
    return $this->error;
  }

  public function setError($error)
  {
    $this->error = $error;
    return $this;
  }


  public function getMessage()
  {
    return $this->message;
  }


  public function setMessage($message)
  {
    $this->message = $message;

    return $this;
  }


  public function getPayload()
  {
    return $this->payload;
  }

  public function setPayload($payload)
  {
    $this->payload = $payload;

    return $this;
  }

}
