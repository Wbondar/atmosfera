<?php

namespace ControlPanel\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Form\Form;

use Domain\Service\MemberService;

class MemberController
extends AbstractActionController
{
    protected $memberService;
    protected $memberForm;

    public function __construct (MemberService $memberService, Form $memberForm)
    {
        $this->memberService = $memberService;
        $this->memberForm = $memberForm;
    }

    public function addMemberAction ( )
    {
        return new ViewModel 
        (
            array 
            (
            )
        )
        ;
    }

    public function editMemberAction ( )
    {
        return new ViewModel 
        (
            array 
            (
            )
        )
        ;
    }

    public function removeMemberAction ( )
    {
        return new ViewModel 
        (
            array 
            (
            )
        )
        ;
    }
}