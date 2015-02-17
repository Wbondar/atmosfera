<?php

namespace ControlPanel\Controller;

use Domain\Service\ArticleCategoryService;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ArticleCategoryController
extends AbstractActionController
{
    protected $articleCategoryService;
    
    public function __construct (ArticleCategoryService $articleCategoryService)
    {
        $this->articleCategoryService = $articleCategoryService;
    }

    public function addArticleCategoryAction ( )
    {
        return new ViewModel 
        (
        )
        ;
    }

    public function editArticleCategoryAction ( )
    {
        return new ViewModel 
        (
        )
        ;
    }

    public function removeArticleCategoryAction ( )
    {
        return new ViewModel 
        (
        )
        ;
    }
}