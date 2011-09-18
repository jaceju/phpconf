<?php

class Phpconf_Form_SessionEdit extends Zend_Form
{

    public function init()
    {
        $this->setName("session-edit")
                ->setMethod('post')
                ->addElement('hidden', 'id', array(
                    'filters' => array('Digits'),
                    'required' => true,
                ))
                ->addElement('hidden', 'conferenceId', array(
                    'filters' => array('Digits'),
                    'required' => true,
                ))
                ->addElement('text', 'subject', array(
                    'filters' => array('StripTags'),
                    'validators' => array(
                        array('StringLength', false, array(1, 200)),
                    ),
                    'required' => true,
                    'label' => '主題',
                ))
                ->addElement('text', 'talker', array(
                    'validators' => array(
                        array('StringLength', false, array(1, 200)),
                    ),
                    'required' => false,
                    'label' => '講者',
                ))
                ->addElement('textarea', 'brief', array(
                    'cols' => 30,
                    'rows' => 10,
                    'validators' => array(
                        array('StringLength', false, array(1, 200)),
                    ),
                    'required' => true,
                    'label' => '摘要',
                ))
                ->addElement('text', 'startTime', array(
                    'class' => 'time',
                    'validators' => array(
                        array('Regexp', false, '^\d{2}:\d{2}:\d{2}$'),
                    ),
                    'required' => true,
                    'label' => '開始時間',
                ))
                ->addElement('text', 'endTime', array(
                    'class' => 'time',
                    'validators' => array(
                        array('Regexp', false, '^\d{2}:\d{2}:\d{2}$'),
                    ),
                    'required' => true,
                    'label' => '結束時間',
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
     * @return Phpconf_Form_SessionEdit
     */
    public function setId($id)
    {
        $element = $this->getElement('id');
        $element->setValue($id);
        return $this;
    }

    /**
     *
     * @param int $conferenceId
     * @return Phpconf_Form_SessionEdit
     */
    public function setConferenceId($conferenceId)
    {
        $element = $this->getElement('conferenceId');
        $element->setValue($conferenceId);
        return $this;
    }
}

