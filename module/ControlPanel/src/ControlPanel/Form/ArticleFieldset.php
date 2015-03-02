<?php

namespace ControlPanel\Form;

use Zend\Form\Fieldset;

use Zend\Form\Element;

class ArticleFieldset
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
                  'type' => 'hidden'
                , 'name' => 'author_id'
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
                , 'name' => 'published_at'
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

        $file = new Element\File('preview');
        $file->setLabel('Static preview:')
             ->setAttribute('id', 'preview');
        $this->add($file);

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
}