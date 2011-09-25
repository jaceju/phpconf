<?php

class Phpconf_Form_AnnouncementEdit extends Zend_Form
{

    public function init()
    {
        $this->setName("announcement-edit")
                ->setMethod('post')
                ->addElement('hidden', 'id', array(
                    'filters' => array('Digits'),
                    'required' => true,
                ))
                ->addElement('hidden', 'conferenceId', array(
                    'filters' => array('Digits'),
                    'required' => true,
                ))
                ->addElement('text', 'title', array(
                    'filters' => array('StripTags'),
                    'validators' => array(
                        array('StringLength', false, array(1, 200)),
                    ),
                    'required' => true,
                    'label' => '標題',
                ))
                ->addElement('textarea', 'content', array(
                    'cols' => 50,
                    'rows' => 10,
                    'class' => 'html',
                    'validators' => array(
                        array('StringLength', false, array(1, 200)),
                    ),
                    'required' => true,
                    'label' => '內容',
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
     * @return Phpconf_Form_AnnouncementEdit
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
     * @return Phpconf_Form_AnnouncementEdit
     */
    public function setConferenceId($conferenceId)
    {
        $element = $this->getElement('conferenceId');
        $element->setValue($conferenceId);
        return $this;
    }

}

