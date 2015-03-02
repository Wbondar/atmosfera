<?php

namespace ControlPanel\Controller;

use Domain\Model\Article;

use Domain\Service\ArticleService;
use Domain\Service\ArticleCategoryService;

use ControlPanel\Form\AddArticleForm;
use ControlPanel\Form\EditArticleForm;
use ControlPanel\Form\RemoveArticleForm;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Form\Form;
use Zend\Form\FormInterface;
use Zend\Stdlib\Hydrator\ObjectProperty;

class ArticleController
extends AbstractActionController
{
    protected $articleService;
    protected $articleCategoryService;
    protected $addArticleForm;
    protected $editArticleForm;
    protected $removeArticleForm;

    public function __construct 
    (
          ArticleService         $articleService
        , ArticleCategoryService $articleCategoryService
        , Form                   $addArticleForm          
        , Form                   $editArticleForm         
        , Form                   $removeArticleForm       
    )
    {
        $this->articleService         = $articleService;
        $this->articleCategoryService = $articleCategoryService;
        $this->addArticleForm         = $addArticleForm;
        $this->editArticleForm        = $editArticleForm;
        $this->removeArticleForm      = $removeArticleForm;

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
            $post = array_merge_recursive
            (
                  $request->getPost( )->toArray( )
                , $request->getFiles( )->toArray( )
            );
            $this->addArticleForm->setData($post);

            if ($this->addArticleForm->isValid( )) 
            {
                try {
                    $data = $this->addArticleForm->getData( );
                    
                    $path = $data['preview']['tmp_name'];
                    if (isset($path) && !empty($path) && $path != "")
                    {
                        $data['preview']['path'] = $path;
                    } else {
                        throw new \Exception("Failed to upload preview image file.");
                    }

                    $lastAddedArticle = $this->articleService->add($data);

                    $message = "Success.";
                    //return $this->redirect( )->toRoute('cpanel/edit/article/' . $lastAddedArticle->getId( ));
                } catch (\Exception $e) {
                    $message = ("Error adding article: " . $e->getMessage( ));
                }
            }
        }

        return new ViewModel 
        (
            array 
            (
                  'addArticleForm'         => $this->addArticleForm
                , 'articleCategoryService' => $this->articleCategoryService
                , 'message'                => isset($message) ? $message : null
            )
        )
        ;
    }

    public function editAction ( )
    {
        try {   
            $form = $this->editArticleForm;
            $articleId = $this->params( )->fromRoute('id');
            $article = $this->articleService->getById($articleId);
            if (!($article instanceof Article))
            {
                throw new \Exception("Article is missing.");
                //return $this->redirect( )->toRoute('control-panel', array('controller' => 'article', 'action' => 'add'));   
            }
            
            $request = $this->getRequest( );
            //$form->bind($article);
            if ($request->isPost( )) 
            {
                $post = array_merge_recursive
                (
                      $request->getPost( )->toArray( )
                    , $request->getFiles( )->toArray( )
                );
                $form->setData($post);

                if ($form->isValid( )) 
                {
                    $args = $form->getData(FormInterface::VALUES_AS_ARRAY);
                    $args['preview']['path'] = $args['preview']['tmp_name'];
                    $this->articleService->modify($args);
                    $message = "Success.";
                    return $this->redirect( )->toRoute('control-panel', array('controller' => 'article', 'action' => 'edit', 'id' => $articleId));   
                } else {
                    throw new \Exception("Form is invalid");
                }
            }
        } catch (\Exception $e) {
            $message = "Error editing article: " . $e->getMessage( );
        }

        return new ViewModel 
        (
            array 
            (
                  'article'           => isset($article) ? $article : null
                , 'articleCategories' => $this->articleCategoryService->getAll( )
                , 'editArticleForm'   => $form
                , 'message'           => isset($message) ? $message : null
            )
        )
        ;
    }

    public function removeAction ( )
    {
        $articleId = $this->params( )->fromRoute('id');
        $this->articleService->remove($articleId);

        return $this->redirect( )->toRoute('control-panel', array('controller' => 'index', 'action' => 'index'));   
    }
}