<?php

namespace App\Security;

use App\Security\WebserviceUser;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\Exception\AuthenticationException;

class WebserviceUserProvider implements UserProviderInterface
{
  public function loadUserByUsername($user)
  {

    // get user from LDAP

    $user =  new WebserviceUser("admin", "admin", "ddd", array("ROLE_ADMIN"));

    return $user;

    //  return $this->fetchUser($username);
  }

  public function loadUserByUsernameAndPassword($payload)
  {


    $user =  new WebserviceUser("admin", "admin", "ddd", array("ROLE_ADMIN"));

    //  throw new AuthenticationException();
    return $user;
    //  return $this->fetchUser($username);
  }

  public function refreshUser(UserInterface $user)
  {
    if (!$user instanceof WebserviceUser) {
      throw new UnsupportedUserException(
        sprintf('Instances of "%s" are not supported.', get_class($user))
      );
    }

    $username = $user->getUsername();

    return $this->fetchUser($username);
  }

  public function supportsClass($class)
  {
    return WebserviceUser::class === $class;
  }

  private function fetchUser($username)
  {

    $user =  new WebserviceUser("admin", "admin", null, array("ROLE_ADMIN"));

    return $user;

    throw new UsernameNotFoundException(
      sprintf('Username "%s" does not exist.', $username)
    );
  }


}
