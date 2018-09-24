<?php

namespace App\Converter;

use App\Entity\Patient;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterInterface;
use Symfony\Component\HttpFoundation\Request;

class PatientConverter implements ParamConverterInterface {

  public function apply(Request $request, ParamConverter $configuration)
  {
    $id = $request->attributes->get("id");
    $p = new Patient();
    $p->setNom("test");
    $p->setPrenom("test");
    $request->attributes->set($configuration->getName(),$p);
    return true;
  }


  public function supports(ParamConverter $configuration)
  {
    return true;
  }

}
