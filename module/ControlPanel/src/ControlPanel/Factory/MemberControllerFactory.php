<?php

namespace ControlPanel\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

use ControlPanel\Controller\MemberController;

class MemberControllerFactory
implements FactoryInterface
{
    public function createService (ServiceLocatorInterface $serviceLocator)
    {
        $serviceLocator = $serviceLocator->getServiceLocator( );

        $name = "Domain\Service\MemberService";
        if ($serviceLocator->has($name))
        {
            $memberService = $serviceLocator->get($name);
        } else {
            throw new Exception ("Unable to locate " . $name . ".");
        }
        
        $name = "ControlPanel\Form\AddMemberForm";
        if ($serviceLocator->get('FormElementManager')->has($name))
        {
            $memberForm = $serviceLocator->get('FormElementManager')->get($name);
        } else {
            throw new \Exception ("Unable to locate " . $name . ".");
        }

        return new MemberController ($memberService, $memberForm);
    }
}