<?php

namespace ControlPanel\Form;

use Zend\Form\Form;
use Zend\Form\Fieldset;

abstract class ControlPanelForm
extends Form
{
    public function __construct ( )
    {
        parent::__construct( );
    }

    protected function addFieldset (Fieldset $fieldset)
    {
        foreach ($fieldset->getFieldsets( ) as $childFieldset)
        {
            $this->addFieldset($childFieldset);
        }
        foreach($fieldset->getElements( ) as $element)
        {
            $this->add($element);
        }
    }
}