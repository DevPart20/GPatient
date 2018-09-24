<?php

namespace App\Controller;

use App\Contrat\IPatientService;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\ViewHandlerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use FOS\RestBundle\View\View;
USE FOS\RestBundle\Controller\Annotations\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Patient;
use App\Utils\ObjectMapper;
use App\Utils\ResponseMessageBuilder;
use App\ListenerLayer\PatientEvent;
use App\ActionLayer\PatientAction;
use App\ActionLayer\MyEventDispatcher;
use App\Contrat\IEventDispatcher;

/** @Route("/api/patient") */
class PatientController extends FOSRestController
{
  private $viewHandler = null;
  private $patientEvent = null;
  private $eventDispatcher = null;
  private $config = null;

  public function __construct(ViewHandlerInterface $viewHandler,IEventDispatcher $eventDispatcher) {
    $this->viewHandler = $viewHandler;
    $this->patientEvent = new PatientEvent();
    $this->eventDispatcher = $eventDispatcher;
    $this->config = array('EntityName' => 'Patient','NameSpace' => '\App\Entity\\');
  }

  /**  @Rest\View() @Rest\Post("/") */
  public function newPatient(Request $request) {
    $patient = ObjectMapper::mapObjectToEntity($request->getContent(),$this->config['EntityName'],$this->config['NameSpace']);
    return $this->eventDispatcher->dispatchEvent(PatientEvent::EventName,PatientAction::NEW_PATIENT,$this->patientEvent,$patient);
  }

  /** @Rest\View() @Rest\Put("/") */
  public function updatePatient(Request $request) {
    $patient = ObjectMapper::mapObjectToEntity($request->getContent(),$this->config['EntityName'],$this->config['NameSpace']);
    return $this->eventDispatcher->dispatchEvent(PatientEvent::EventName,PatientAction::UPDATE_PATIENT,$this->patientEvent,$patient);
  }

  /** @Rest\View() @Rest\Delete("/{id}") */
  public function deletePatient($id) {
    return $this->eventDispatcher->dispatchEvent(PatientEvent::EventName,PatientAction::REMOVE_PATIENT,$this->patientEvent,$id);
  }

  /** @Rest\View()  @Rest\Get("/find/{id}")*/
  public function getPatientByID($id) {
    return $this->eventDispatcher->dispatchEvent(PatientEvent::EventName,PatientAction::FIND_ONE,$this->patientEvent,$id);
  }

  /** @Rest\View() @Rest\Get("/findall")*/
  public function getAllPatients() {
    return $this->eventDispatcher->dispatchEvent(PatientEvent::EventName,PatientAction::FIND_ALL,$this->patientEvent,null);
  }


}
