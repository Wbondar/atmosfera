<?php

namespace ControlPanel\Form;

use Zend\Form\Form;

class EditArticleCategoryForm
extends ControlPanelForm
{
    public function __construct ($name = null, $options = array( ))
    {
        parent::__construct($name, $options);
            
        $this->addFieldset(new ArticleCategoryFieldset( ));
        /*
        $this->add
        (
            array 
            (
                'type' => 'ControlPanel\Form\ArticleCategoryFieldset'
                , 'name' => 'article-category-fieldset'
                , 'options' => array
                (
                    'use_as_base_fieldset' => true
                )
            )
        )
        ;
        */
        $this->add
        (
            array 
            (
                  'type'  => 'submit'
                , 'name'  => 'action'
                , 'attributes' => array 
                (
                    'value' => 'Edit article category'
                )
            )
        )
        ;
    }
}