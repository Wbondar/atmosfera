<?php

namespace ControlPanel\Controller;

use Domain\Service\ArticleCategoryService;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Form\Form;

use Domain\Model\NativeArticleCategory;
use Domain\Model\ArticleCategory;

use ControlPanel\Form\AddArticleCategoryForm;
use ControlPanel\Form\EditArticleCategoryForm;
use ControlPanel\Form\RemoveArticleCategoryForm;

class ArticleCategoryController
extends AbstractActionController
{
    protected $articleCategoryService;
    protected $addArticleCategoryForm;
    protected $editArticleCategoryForm;
    protected $removeArticleCategoryForm;
    
    public function __construct 
    (
          ArticleCategoryService $articleCategoryService
        , Form                   $addArticleCategoryForm
        , Form                   $editArticleCategoryForm
        , Form                   $removeArticleCategoryForm
    )
    {
        $this->articleCategoryService    = $articleCategoryService;
        $this->addArticleCategoryForm    = $addArticleCategoryForm;
        $this->editArticleCategoryForm   = $editArticleCategoryForm;
        $this->removeArticleCategoryForm = $removeArticleCategoryForm;
        
        if (!isset($_SESSION['member_id']) || empty($_SESSION['member_id']))
        {
            die("Access denied.");
        }
    }

    public function addAction ( )
    {
        $request = $this->getRequest();

        if ($request->isPost( )) 
        {
            $this->addArticleCategoryForm->setData($request->getPost( ));

            if ($this->addArticleCategoryForm->isValid( )) 
            {
                try {
                    $args = $this->addArticleCategoryForm->getData( );
                    $lastAddedArticleCategory = $this->articleCategoryService->add($args);
                    if ($lastAddedArticleCategory instanceof ArticleCategory)
                    {
                        $message = "Success";
                        //return $this->redirect( )->toRoute('control-panel', array('controller' => 'category', 'action' => 'edit', 'id' => $lastAddedArticleCategory->getId( )));
                    } else {
                        throw new \Exception("Failed to add article category to the database.");
                    }
                } catch (\Exception $e) {
                    $message = "Error adding article category: " . $e->getMessage( );
                }
            }
        }

        return new ViewModel 
        (
            array 
            (
                  'articleCategoryService' => $this->articleCategoryService
                , 'addArticleCategoryForm' => $this->addArticleCategoryForm
                , 'message' => isset($message) ? $message : null
            )
        )
        ;
    }

    public function editAction ( )
    {
        $articleCategoryId = $this->params( )->fromRoute('id');
        $request = $this->getRequest( );
        //$this->editArticleCategoryForm->bind($this->articleCategoryService->getById($articleCategoryId));
        if ($request->isPost( )) 
        {
            $this->editArticleCategoryForm->setData($request->getPost( ));

            if ($this->editArticleCategoryForm->isValid( )) 
            {
                try {
                    $args = $this->editArticleCategoryForm->getData( );
                    $this->articleCategoryService->modify($args);
                    $message = "Success.";
                } catch (\Exception $e) {
                    $message = "Error editing article category: " . $e->getMessage( );
                }
            }
        }

        return new ViewModel 
        (
            array 
            (
                  'articleCategory'         => $this->articleCategoryService->getById($articleCategoryId)
                , 'editArticleCategoryForm' => new EditArticleCategoryForm( )
                , 'message'                 => isset($message) ? $message : null
            )
        )
        ;
    }

    public function removeAction ( )
    {
        $articleCategoryId = $this->params( )->fromRoute('id');
        $request = $this->getRequest( );
        //$this->editArticleCategoryForm->bind($this->articleCategoryService->getById($articleCategoryId));
        if ($request->isPost( )) 
        {
            $this->removeArticleCategoryForm->setData($request->getPost( ));

            if ($this->removeArticleCategoryForm->isValid( )) 
            {
                try {
                    $args = $this->removeArticleCategoryForm->getData( );
                    $this->articleCategoryService->remove($articleCategoryId);
                    $message = "Success.";
                } catch (\Exception $e) {
                    $message = "Error removing article category: " . $e->getMessage( );
                }
            }
        }

        return new ViewModel 
        (
            array 
            (
                  'articleCategory'            => $this->articleCategoryService->getById($articleCategoryId)
                , 'removeArticleCategoryForm'  => new RemoveArticleCategoryForm( )
                , 'message'                    => isset($message) ? $message : null
            )
        )
        ;
    }
}