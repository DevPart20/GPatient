<?php

namespace App\Contrat;

interface IEventDispatcher {
  public function dispatchEvent($eventName,$eventType,$event,$payload);
}
