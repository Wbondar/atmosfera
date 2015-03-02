<?php

namespace ControlPanel\Form;

class RemoveArticleForm
extends ControlPanelForm
{
    public function __construct ( )
    {
        parent::__construct( );

        $this->addFieldset(new ArticleFieldset( ));
        $this->add
        (
            array 
            (
                  'type'  => 'submit'
                , 'name'  => 'action'
                , 'attributes' => array 
                (
                    'value' => 'Remove article'
                )
            )
        )
        ;
    }
}