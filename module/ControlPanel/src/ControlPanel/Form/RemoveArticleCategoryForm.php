<?php

namespace ControlPanel\Form;

use Zend\Form\Form;

class RemoveArticleCategoryForm
extends ControlPanelForm
{
	public function __construct ( )
	{
        parent::__construct( );
            
		$this->addFieldset(new ArticleCategoryFieldset( ));

        $this->add
        (
            array 
            (
                  'type'  => 'submit'
                , 'name'  => 'action'
                , 'attributes' => array 
                (
                	'value' => 'Remove article category'
                )
            )
        )
        ;
	}
}