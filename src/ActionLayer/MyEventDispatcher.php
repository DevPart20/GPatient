<?php
namespace App\ActionLayer;

use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use App\Action\PatientAction;
use App\Contrat\IEventDispatcher;

class MyEventDispatcher implements IEventDispatcher{

  public $eventDispatcher = null;

  public function __construct(EventDispatcherInterface $eventDispatcher) {
    $this->eventDispatcher = $eventDispatcher;
  }

  public function dispatchEvent($eventName,$eventType,$event,$payload) {
    $event->setType($eventType);
    if($payload) $event->setPayload($payload);
    $this->eventDispatcher->dispatch($eventName, $event);
    return $event->getResult();
  }

}
