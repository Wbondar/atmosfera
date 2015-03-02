<?php

namespace ControlPanel\Controller;

use Domain\Model\Member;
use Domain\Service\MemberService;
use Domain\Service\ArticleService;
use Domain\Service\ArticleCategoryService;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Form\Form;

class IndexController
extends AbstractActionController
{
    protected $memberService;
    protected $authorizationForm;

    public function __construct 
    (
          MemberService          $memberService
        , ArticleService         $articleService
        , ArticleCategoryService $articleCategoryService
        , Form                   $authorizationForm
    )
    {
        $this->memberService          = $memberService;
        $this->articleService         = $articleService;
        $this->articleCategoryService = $articleCategoryService;
        $this->authorizationForm      = $authorizationForm;
    }

    public function indexAction ( )
    {
        if (isset($_SESSION['member_id']) && !empty($_SESSION['member_id']))
        {
        } else {
            return $this->redirect( )->toRoute("control-panel", array ('controller'=>'index', 'action'=>'enter'));
        }

        return new ViewModel 
        (
            array 
            (
                  'memberService'     => $this->memberService
                , 'categories'        => $this->articleCategoryService->getAll( )
                , 'message'           => isset($message) ? $message : null
            )
        )
        ;
    }

    public function enterAction ( )
    {
        try 
        {
            $request = $this->getRequest( );
            if ($request->isPost( )) 
            {
                $this->authorizationForm->setData($request->getPost( ));

                if ($this->authorizationForm->isValid( )) 
                {
                        $data = $this->authorizationForm->getData( );
                        $member = $this->memberService->authenticate($data['username'], $data['password']);
                        if ($member instanceof Member)
                        {
                            $message = "Welcome, " . $member->getNameFirst( ) . "!";
                            $_SESSION['member_id'] = $member->getId( );
                            $message = "Success.";
                            return $this->redirect( )->toRoute("control-panel", array ('controller'=>'index', 'action'=>'index'));
                        } else {
                            throw new \Exception("Failed to authenticate user.");
                        }
                } else {
                    throw new \Exception("Form is invalid.");
                }
            }
        } catch (\Exception $e) {
            $message = "Authorization failed: " . $e->getMessage( );
        }
        return new ViewModel 
        (
            array 
            (
                  'memberService'     => $this->memberService
                , 'message'           => isset($message) ? $message : null
                , 'authorizationForm' => $this->authorizationForm
            )
        )
        ;
    }

    public function exitAction ( )
    {
        session_destroy( );
        return $this->redirect( )->toRoute("control-panel", array ('controller'=>'index', 'action'=>'index'));
    }

    public function categoryAction ( )
    {
        $categoryId = $this->params()->fromRoute('id');
        return new ViewModel
        (
            array 
            (
                'articles' => $this->articleService->getUnderCategory($categoryId)
            )
        )
        ;
    }
}