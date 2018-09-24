<?php

namespace App\Controller;

use App\Contrat\IFournisseurService;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\ViewHandlerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use FOS\RestBundle\View\View;
USE FOS\RestBundle\Controller\Annotations\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Fournisseur;
use App\Utils\ObjectMapper;
use App\Utils\ResponseMessageBuilder;
use App\ListenerLayer\FournisseurEvent;
use App\ActionLayer\FournisseurAction;
use App\ActionLayer\MyEventDispatcher;
use App\Contrat\IEventDispatcher;

/** @Route("/api/fournisseur") */
class FournisseurController extends FOSRestController
{
  private $viewHandler = null;
  private $FournisseurEvent = null;
  private $eventDispatcher = null;
  private $config = null;

  public function __construct(ViewHandlerInterface $viewHandler,IEventDispatcher $eventDispatcher) {
    $this->viewHandler = $viewHandler;
    $this->FournisseurEvent = new FournisseurEvent();
    $this->eventDispatcher = $eventDispatcher;
    $this->config = array('EntityName' => 'Fournisseur','NameSpace' => '\App\Entity\\');
  }

  /**  @Rest\View() @Rest\Post("/") */
  public function newFournisseur(Request $request) {
    $Fournisseur = ObjectMapper::mapObjectToEntity($request->getContent(),$this->config['EntityName'],$this->config['NameSpace']);
    return $this->eventDispatcher->dispatchEvent(FournisseurEvent::EventName,FournisseurAction::NEW_FOURNISSEUR,$this->FournisseurEvent,$Fournisseur);
  }

  /** @Rest\View() @Rest\Put("/") */
  public function updateFournisseur(Request $request) {
    $Fournisseur = ObjectMapper::mapObjectToEntity($request->getContent(),$this->config['EntityName'],$this->config['NameSpace']);
    return $this->eventDispatcher->dispatchEvent(FournisseurEvent::EventName,FournisseurAction::UPDATE_FOURNISSEUR,$this->FournisseurEvent,$Fournisseur);
  }

  /** @Rest\View() @Rest\Delete("/{id}") */
  public function deleteFournisseur($id) {
    return $this->eventDispatcher->dispatchEvent(FournisseurEvent::EventName,FournisseurAction::REMOVE_FOURNISSEUR,$this->FournisseurEvent,$id);
  }

  /** @Rest\View()  @Rest\Get("/find/{id}")*/
  public function getFournisseurByID($id) {
    return $this->eventDispatcher->dispatchEvent(FournisseurEvent::EventName,FournisseurAction::FIND_ONE,$this->FournisseurEvent,$id);
  }

  /** @Rest\View() @Rest\Get("/findall")*/
  public function getAllFournisseurs() {
    return $this->eventDispatcher->dispatchEvent(FournisseurEvent::EventName,FournisseurAction::FIND_ALL,$this->FournisseurEvent,null);
  }


}
