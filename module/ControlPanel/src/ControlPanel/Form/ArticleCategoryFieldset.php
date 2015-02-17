<?php

namespace ControlPanel\Form;

use Zend\Form\Fieldset

class ArticleCategoryFieldset
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
                , 'name' => 'parent_id'
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
}