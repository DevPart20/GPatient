<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Security\Core\User\UserInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use App\Security\WebserviceUser;

class TokenController extends AbstractController {

  private $jwtManager = null;

  public function __construct(JWTTokenManagerInterface $JWTManager) {
    $this->jwtManager = $JWTManager;
  }

  /**
  * @Route("/token", name="token")
  */
  public function index() {
    $user = new WebserviceUser("admin","123",null,array("ROLE_ADMIN"));
    $user2 = new \App\Entity\User();
    $user2->setUsername("admin");
    $user2->setPassword("admin");

    return new JsonResponse(['token' => $this->jwtManager->create($user2)]);
  }
}
