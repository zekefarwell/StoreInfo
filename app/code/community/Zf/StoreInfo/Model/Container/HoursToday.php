<?php

class Zf_StoreInfo_Model_Container_HoursToday extends Enterprise_PageCache_Model_Container_Abstract {

    protected function _getCacheId() {
        return $this->_placeholder->getAttribute('cache_id');
    }

    protected function _renderBlock()
    {
        $blockClass = $this->_placeholder->getAttribute('block');
        $template = $this->_placeholder->getAttribute('template');

        $block = new $blockClass;
        $block->setTemplate($template);

        return $block->toHtml();
    }

}