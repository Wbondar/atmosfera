<?php

namespace ControlPanel\Form;

use Zend\Form\Form;

class EditMemberForm
extends ControlPanelForm
{
	public function __construct ( )
	{
        parent::__construct( );

        $this->addFieldset(new MemberFieldset( ));

        $this->add
        (
            array 
            (
                  'type'  => 'submit'
                , 'name'  => 'action'
                , 'attributes' => array 
                (
                	'value' => 'Edit member'
                )
            )
        )
        ;
	}
}