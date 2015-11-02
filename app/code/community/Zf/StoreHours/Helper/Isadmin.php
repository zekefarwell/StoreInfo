<?php

/**
 * @author Alan Storm
 * @url http://stackoverflow.com/questions/9693020/magento-request-frontend-or-backend
 */

class Zf_StoreInfo_Helper_Isadmin extends Mage_Core_Helper_Abstract
{
    public function isAdmin()
    {
        if(Mage::app()->getStore()->isAdmin())
        {
            return true;
        }

        if(Mage::getDesign()->getArea() == 'adminhtml')
        {
            return true;
        }

        return false;
    }
}