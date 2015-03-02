<?php

namespace ControlPanel\Controller;

use Zend\Crypt\Password\Bcrypt;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Form\Form;

use Domain\Service\MemberService;

class MemberController
extends AbstractActionController
{
    protected $memberService;
    protected $addMemberForm;

    public function __construct 
    (
          MemberService $memberService
        , Form $addMemberForm
    )
    {
        $this->memberService = $memberService;
        $this->addMemberForm = $addMemberForm;
        
        if (!isset($_SESSION['member_id']) || empty($_SESSION['member_id']))
        {
            die("Access denied.");
        }
    }

    public function addAction ( )
    {
        $request = $this->getRequest( );

        if ($request->isPost( )) 
        {
            $this->addMemberForm->setData($request->getPost( ));

            if ($this->addMemberForm->isValid( )) 
            {
                try 
                {
                    $data = $this->addMemberForm->getData( );
                    if ($data['password'] == $data['password_confirmation'])
                    {
                        $member = $this->memberService->add(array($data['email_address'], password_hash($data['password'], PASSWORD_DEFAULT), $data['name_first'], $data['name_last']));
                        if ($member instanceof Member)
                        {
                            $message = "Success.";
                        }
                    } else {
                        throw new \Exception("Passwords doesn't match.");
                    }
                } catch (\Exception $e) {
                    $message = "Failed to add member: " . $e->getMessage( );
                }
            }
        }

        return new ViewModel 
        (
            array 
            (
                  'message'           => isset($message) ? $message : null
                , 'addMemberForm'     => $this->addMemberForm
            )
        )
        ;
    }
    
    public function editAction ( )
    {
        return new ViewModel 
        (
            array 
            (
            )
        )
        ;
    }

    public function removeAction ( )
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