<?php

namespace ControlPanel\Form;

class AddArticleForm
extends ControlPanelForm
{
    public function __construct ( )
    {
        parent::__construct( );
        /*  
        $this->add
        (
            array 
            (
                  'type'    => 'ControlPanel\Form\ArticleFieldset'
                , 'name'    => 'article-fieldset'
                , 'options' => array 
                (
                    'use_as_base_fieldset' => true
                )
            )
        )
        ;
        */
        $this->addFieldset(new ArticleFieldset( ));
        $this->add
        (
            array 
            (
                  'type'  => 'submit'
                , 'name'  => 'action'
                , 'attributes' => array 
                (
                    'value' => 'Add article'
                )
            )
        )
        ;
    }
}