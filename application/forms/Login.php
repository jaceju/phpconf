<?php

class Phpconf_Form_Login extends Zend_Form
{

    public function init()
    {
        $this->setName("login")
                ->setMethod('post')
                ->addElement('password', 'password', array(
                    'filters' => array('StringTrim'),
                    'validators' => array(
                        array('StringLength', false, array(0, 50)),
                    ),
                    'required' => true,
                    'label' => 'Password:',
                ))
                ->addElement('submit', 'login', array(
                    'required' => false,
                    'ignore' => true,
                    'label' => 'Login',
                ));
    }

}

