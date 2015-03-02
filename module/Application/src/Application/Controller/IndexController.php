<?php

namespace Application\Controller;

use Domain\Service\ArticleService;
use Domain\Service\ArticleCategoryService;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController 
extends AbstractActionController
{
    protected $articleService;
    protected $articleCategoryService;

    public function __construct 
    (
          ArticleService $articleService
        , ArticleCategoryService $articleCategoryService
    )
    {
        $this->articleService         = $articleService;  
        $this->articleCategoryService = $articleCategoryService;  
    }

    public function indexAction( )
    {
        $categoryId = $this->params()->fromRoute('id');
        if (isset($categoryId) && !empty($categoryId) && $categoryId > 0)
        {
            $articles = $this->articleService->getActualUnderCategory($categoryId);
            if (empty($articles))
            {
                $message = "No articles were found.";
            }
        } else {
            $articles = $this->articleService->getAllActual( ); 
        }

        return new ViewModel
        (
            array 
            (
                  'articles'               => $articles  
                , 'articleCategories'      => $this->articleCategoryService->getAll( ) 
                , 'message'                => isset($message) ? $message : null
            )
        )
        ;
    }
}
