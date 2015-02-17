<?php

namespace ControlPanel\Form;

use Zend\Form\Fieldset

class MemberFieldset
extends Fieldset
{
    public function __construct ( )
    {
        $this->add
        (
            array 
            (
                  'type' => 'hidden'
                , 'name' => 'id'
            )
        )
        ;

        $this->add
        (
            array 
            (
                  'type' => 'email'
                , 'name' => 'email_address'
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
}