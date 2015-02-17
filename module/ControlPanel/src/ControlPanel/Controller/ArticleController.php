<?php

namespace ControlPanel\Controller;

use Domain\Service\ArticleService;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Form\Form;

class ArticleController
extends AbstractActionController
{
    protected $articleService;
    protected $articleForm;

    public function __construct (ArticleService $articleService, Form $articleForm)
    {
        $this->articleService = $articleService;
        $this->articleForm = $articleForm;
    }

    public function addArticleAction ( )
    {
        return new ViewModel 
        (
            array 
            (
            )
        )
        ;
    }

    public function editArticleAction ( )
    {
        return new ViewModel 
        (
            array 
            (
            )
        )
        ;
    }

    public function removeArticleAction ( )
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