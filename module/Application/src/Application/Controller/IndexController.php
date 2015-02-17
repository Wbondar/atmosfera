<?php

namespace Application\Controller;

use Domain\Service\ArticleService;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController 
extends AbstractActionController
{
    protected $service;

    public function __construct (ArticleService $service)
    {
        $this->service = $service;  
    }

    public function indexAction( )
    {
        $this->service->getAllActual( );
        return new ViewModel
        (
            array 
            (
                'articles' => $this->service->getAllActual( )       
            )
        )
        ;
    }

    public function openArticleAction ( )
    {
        $articleId = $this->params( )->fromRoute('id');
        return new ViewModel
        (
            array 
            (
                'article' => $this->service->getById($articleId)
            )
        )
        ;
    }

    public function openCategoryAction ( )
    {
        $categoryId = $this->params( )->fromRoute('id');
        return new ViewModel
        (
            array 
            (
                'articles' => $this->service->getAllActualUnderCategory($categoryId)
            )
        )
        ;
    }
}
