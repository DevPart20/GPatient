<?php

namespace App\ListenerLayer;

use Symfony\Component\EventDispatcher\Event;
use App\ActionLayer\PatientAction;
use App\Contrat\IPatientService;
use App\Contrat\IRequestAnswer;

class PatientRequestListener {

  private $patientService = null;
  private $requestAnswer = null;

  public function __construct(IPatientService $service, IRequestAnswer $requestAnswer) {
    $this->patientService = $service;
    $this->requestAnswer = $requestAnswer;
  }

  public function onPatientRequestEvent(Event $event) {
    switch($event->getType()) {
      case PatientAction::NEW_PATIENT:
      $event->setResult($this->requestAnswer->buildUpdateRequestMessage($this->patientService->ajouter($event->getPayload())));
      break;
      case PatientAction::FIND_ONE:
      $event->setResult($this->requestAnswer->buildSearchRequestMessage($this->patientService->findByID($event->getPayload())));
      break;
      case PatientAction::FIND_ALL:
      $event->setResult($this->requestAnswer->buildSearchRequestMessage($this->patientService->findAll()));
      break;
      case PatientAction::REMOVE_PATIENT:
      $event->setResult($this->requestAnswer->buildUpdateRequestMessage($this->patientService->supprimer($event->getPayload())));
      break;
      case PatientAction::UPDATE_PATIENT:
      $event->setResult($this->requestAnswer->buildUpdateRequestMessage($this->patientService->modifie($event->getPayload())));
      break;
    }
  }
}
