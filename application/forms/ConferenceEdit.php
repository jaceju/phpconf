<?php

class Phpconf_Form_ConferenceEdit extends Zend_Form
{

    public function init()
    {
        $this->setName("conference-edit")
                ->setMethod('post')
                ->addElement('text', 'year', array(
                    'filters' => array('Digits'),
                    'validators' => array(
                        array('Between', false, array(
                                'min' => '2011',
                                'max' => '9999',
                        )),
                    ),
                    'required' => true,
                    'label' => '年度',
                ))
                ->addElement('text', 'startDate', array(
//                    'filters' => array('Digits'),
//                    'validators' => array(
//                        array('Between', false, array(
//                                'min' => '2011',
//                                'max' => '9999',
//                        )),
//                    ),
                    'required' => true,
                    'label' => '開始日期',
                ))
                ->addElement('text', 'endDate', array(
//                    'filters' => array('Digits'),
//                    'validators' => array(
//                        array('Between', false, array(
//                                'min' => '2011',
//                                'max' => '9999',
//                        )),
//                    ),
                    'required' => true,
                    'label' => '結束日期',
                ))
                ->addElement('text', 'registrationUrl', array(
//                    'filters' => array('Digits'),
//                    'validators' => array(
//                        array('Between', false, array(
//                                'min' => '2011',
//                                'max' => '9999',
//                        )),
//                    ),
                    'required' => true,
                    'label' => '報名網址',
                ))                ->addElement('text', 'location', array(
//                    'filters' => array('Digits'),
//                    'validators' => array(
//                        array('Between', false, array(
//                                'min' => '2011',
//                                'max' => '9999',
//                        )),
//                    ),
                    'required' => true,
                    'label' => '地點',
                ))
                ->addElement('text', 'address', array(
//                    'filters' => array('Digits'),
//                    'validators' => array(
//                        array('Between', false, array(
//                                'min' => '2011',
//                                'max' => '9999',
//                        )),
//                    ),
                    'required' => true,
                    'label' => '地址',
                ))
                ->addElement('text', 'mapUrl', array(
//                    'filters' => array('Digits'),
//                    'validators' => array(
//                        array('Between', false, array(
//                                'min' => '2011',
//                                'max' => '9999',
//                        )),
//                    ),
                    'required' => true,
                    'label' => '地圖連結',
                ))
                ->addElement('textarea', 'traffic', array(
                    'cols' => 50,
                    'rows' => 10,
//                    'filters' => array('Digits'),
//                    'validators' => array(
//                        array('Between', false, array(
//                                'min' => '2011',
//                                'max' => '9999',
//                        )),
//                    ),
                    'required' => true,
                    'label' => '交通',
                ))
                ->addElement('textarea', 'description', array(
                    'cols' => 50,
                    'rows' => 10,
//                    'filters' => array('Digits'),
//                    'validators' => array(
//                        array('Between', false, array(
//                                'min' => '2011',
//                                'max' => '9999',
//                        )),
//                    ),
                    'required' => true,
                    'label' => '描述',
                ))
                ->addElement('submit', 'save', array(
                    'required' => false,
                    'ignore' => true,
                    'label' => '儲存',
                ));
    }

}

