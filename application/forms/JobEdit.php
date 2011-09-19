<?php

class Phpconf_Form_JobEdit extends Zend_Form
{

    public function init()
    {
        $this->setName("job-edit")
                ->setMethod('post')
                ->addElement('hidden', 'id', array(
                    'filters' => array('Digits'),
                    'required' => true,
                ))
                ->addElement('text', 'name', array(
                    'filters' => array('StripTags'),
                    'validators' => array(
                        array('StringLength', false, array(1, 200)),
                    ),
                    'required' => true,
                    'label' => '名稱',
                ))
                ->addElement('text', 'sortOrder', array(
                    'required' => true,
                    'label' => '排列順序',
                ))
                ->addElement('submit', 'save', array(
                    'required' => false,
                    'ignore' => true,
                    'label' => '儲存',
                ));
    }

    /**
     *
     * @param int $id
     * @return Phpconf_Form_StaffEdit
     */
    public function setId($id)
    {
        $element = $this->getElement('id');
        $element->setValue($id);
        return $this;
    }
}

