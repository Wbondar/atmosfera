<?php

namespace ControlPanel\Form;

use Zend\Form\Fieldset;
use Zend\Stdlib\Hydrator\ClassMethods;

use Domain\Model\NativeArticleCategory;

class ArticleCategoryFieldset
extends Fieldset
{
    public function __construct ($name = null, $options = array( ))
    {
        parent::__construct($name, $options);

        //$this->setHydrator(new ClassMethods(false));
        //$this->setObject(new NativeArticleCategory( ));

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
}