<?php
namespace App\Security;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\DependencyInjection\DefinitionDecorator;
use Symfony\Component\Config\Definition\Builder\NodeDefinition;
use Symfony\Bundle\SecurityBundle\DependencyInjection\Security\Factory\SecurityFactoryInterface;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\ChildDefinition;
use App\Security\WsseProvider;
use App\Security\JWTListener;

class WsseFactory implements SecurityFactoryInterface {

  public function create(ContainerBuilder $container, $id, $config, $userProvider, $defaultEntryPoint){

    $providerId = 'security.authentication.provider.wsse.'.$id;
    $container
    ->setDefinition($providerId, new ChildDefinition(WsseProvider::class))
    ->setArgument(0, new Reference($userProvider));

    $listenerId = 'security.authentication.listener.wsse.'.$id;
    $container->setDefinition($listenerId, new ChildDefinition(JWTListener::class));

    return array($providerId, $listenerId, $defaultEntryPoint);
    
  }

  public function getPosition()
  {
    return 'pre_auth';
  }

  public function getKey()
  {
    return 'wsse';
  }

  public function addConfiguration(NodeDefinition $node)
  {

  }
}
