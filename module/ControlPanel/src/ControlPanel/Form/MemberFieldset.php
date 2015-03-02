<?php

namespace ControlPanel\Form;

use Zend\Form\Fieldset;

class MemberFieldset
extends Fieldset
{
    public function __construct ( )
    {
        parent::__construct( );
        
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
                  'type' => 'text'
                , 'name' => 'name_first'
                , 'options' => array 
                (
                    'label' => 'First name:'
                )
            )
        )
        ;

        $this->add
        (
            array 
            (
                  'type' => 'text'
                , 'name' => 'name_last'
                , 'options' => array 
                (
                    'label' => 'Last name:'
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
                  'type' => 'password'
                , 'name' => 'password_confirmation'
                , 'options' => array 
                (
                    'label' => 'Repeat password:'
                )
            )
        )
        ;
    }
}