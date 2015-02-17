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
                  'type' => 'hidden'
                , 'name' => 'category_id'
            )
        )
        ;

        $this->add
        (
            array 
            (
                  'type' => 'text'
                , 'name' => 'published'
                , 'options' => array 
                (
                    'label' => 'Date to be published:'
                )
            )
        )
        ;

        $this->add
        (
            array 
            (
                  'type' => 'text'
                , 'name' => 'title'
                , 'options' => array 
                (
                    'label' => 'Title:'
                )
            )
        )
        ;

        $this->add
        (
            array 
            (
                  'type' => 'textarea'
                , 'name' => 'content'
                , 'options' => array 
                (
                    'label' => 'Content:'
                )
            )
        )
        ;
}