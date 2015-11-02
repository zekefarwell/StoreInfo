<?php

class Zf_StoreInfo_Model_System_Config_Backend_Serialized_DateArray
        extends Mage_Adminhtml_Model_System_Config_Backend_Serialized_Array
{
    protected function _beforeSave()
    {
        $array = $this->getValue();

        if (is_array($array)) {
            unset($array['__empty']);
            foreach ($array as $key => $subarray) {
                if (!empty($subarray['date'])) {
                    $dateTimestamp = strtotime($subarray['date']);
                    $array[$key]['date'] = date('Y-m-d', $dateTimestamp);
                }
            }
            $this->setValue($array);
        }
        parent::_beforeSave();
    }

    protected function _afterLoad()
    {
        parent::_afterLoad();
        $array = $this->getValue();

        if (is_array($array)) {
            foreach ($array as $key => $subarray) {
                if (!empty($subarray['date'])) {
                    $dateTimestamp = strtotime($subarray['date']);
                    $array[$key]['date'] = date('m/d/Y', $dateTimestamp);
                }
            }
            $this->setValue($array);
        }
    }

}