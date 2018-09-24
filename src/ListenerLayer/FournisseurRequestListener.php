<?php

namespace App\ListenerLayer;

use Symfony\Component\EventDispatcher\Event;
use App\ActionLayer\FournisseurAction;
use App\Contrat\IFournisseurService;
use App\Contrat\IRequestAnswer;

class FournisseurRequestListener {

  private $fournisseurService = null;
  private $requestAnswer = null;

  public function __construct(IFournisseurService $service, IRequestAnswer $requestAnswer) {
    $this->fournisseurService = $service;
    $this->requestAnswer = $requestAnswer;
  }

  public function onFournisseurRequestEvent(Event $event) {
    switch($event->getType()) {
      case FournisseurAction::NEW_FOURNISSEUR:
      $event->setResult($this->requestAnswer->buildUpdateRequestMessage($this->fournisseurService->ajouter($event->getPayload())));
      break;
      case FournisseurAction::FIND_ONE:
      $event->setResult($this->requestAnswer->buildSearchRequestMessage($this->fournisseurService->findByID($event->getPayload())));
      break;
      case FournisseurAction::FIND_ALL:
      $event->setResult($this->requestAnswer->buildSearchRequestMessage($this->fournisseurService->findAll()));
      break;
      case FournisseurAction::REMOVE_FOURNISSEUR:
      $event->setResult($this->requestAnswer->buildUpdateRequestMessage($this->fournisseurService->supprimer($event->getPayload())));
      break;
      case FournisseurAction::UPDATE_FOURNISSEUR:
      $event->setResult($this->requestAnswer->buildUpdateRequestMessage($this->fournisseurService->modifie($event->getPayload())));
      break;
    }
  }
}
