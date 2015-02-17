<?php

namespace ControlPanel\Form;

use Zend\Form\Form;

class AddMemberForm
extends Form
{
	public function __construct ( )
	{
		$this->add
		(
			array 
			(
				  'type' => 'ControlPanel\Form\MemberFieldset'
				, 'name' => 'member-fieldset'
			)
		)
		;

        $this->add
        (
            array 
            (
                  'type' => 'password'
                , 'name' => 'password_confirmation'
                , 'options' => array 
                (
                    'label' => 'Repeat password:'
                )
            )
        )
        ;

        $this->add
        (
            array 
            (
                  'type'  => 'submit'
                , 'name'  => 'submit'
                , 'attributes' => array 
                (
                	'value' => 'Add member'
                )
            )
        )
        ;
	}
}