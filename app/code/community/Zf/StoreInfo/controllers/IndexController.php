<?php
class Zf_StoreInfo_IndexController extends Mage_Core_Controller_Front_Action
{
    public function IndexAction()
    {

        $this->loadLayout();
        $store_name = Mage::getStoreConfig('zfstore/location/store_name');
        $this->getLayout()->getBlock("head")->setTitle($this->__($store_name));
        $breadcrumbs = $this->getLayout()->getBlock("breadcrumbs");
        $breadcrumbs->addCrumb("home", array(
            "label" => $this->__("Home"),
            "title" => $this->__("Home"),
            "link"  => Mage::getBaseUrl()
        ));
        $breadcrumbs->addCrumb("store info", array(
            "label" => $this->__("Retail Store"),
            "title" => $this->__("Retail Store")
        ));

        $this->renderLayout();

    }
}
