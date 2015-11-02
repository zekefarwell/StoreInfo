<?php
class Zf_StoreInfo_Block_Adminhtml_System_Config_HoursExceptions extends Mage_Adminhtml_Block_System_Config_Form_Field_Array_Abstract
{
    public function __construct()
    {
        $this->addColumn('date', array(
                'label' => Mage::helper('adminhtml')->__('Date'),
                'style' => 'width:80px',
        ));
        $this->addColumn('hours', array(
                'label' => Mage::helper('adminhtml')->__('Hours'),
                'style' => 'width:110px',
        ));
        $this->addColumn('note', array(
                'label' => Mage::helper('adminhtml')->__('Note'),
                'style' => 'width:200px',
        ));
        $this->_addAfter = false;
        $this->_addButtonLabel = Mage::helper('adminhtml')->__('Add Exception');
        parent::__construct();
    }
}
