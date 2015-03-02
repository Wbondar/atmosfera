<?php

namespace ControlPanel\Form;

use Zend\Form\Form;

class AddArticleCategoryForm
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
                	'value' => 'Add article category'
                )
            )
        )
        ;
	}
}