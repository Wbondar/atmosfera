<?php

namespace ControlPanel\Form;

use Zend\Form\Form;

class AuthorizationForm
extends Form
{
	public function __construct ( )
	{
        parent::__construct( );

        $this->add
        (
            array 
            (
                  'type' => 'email'
                , 'name' => 'username'
                , 'options' => array 
                (
                    'label' => 'Email address:'
                )
            )
        )
        ;

        $this->add
        (
            array 
            (
                  'type' => 'password'
                , 'name' => 'password'
                , 'options' => array 
                (
                    'label' => 'Password:'
                )
            )
        )
        ;

        $this->add
        (
            array 
            (
                  'type'  => 'submit'
                , 'name'  => 'action'
                , 'attributes' => array 
                (
                	'value' => 'Authorization'
                )
            )
        )
        ;
	}
}