<?php

class Zygnis_Customerfeedback_Helper_Data extends Mage_Core_Helper_Data {
    const XML_PATH_ENABLED              =   'customerfeedback/view/enabled';
    const XML_PATH_ITEMS_PER_PAGE       =   'customerfeedback/view/items_per_page';
    const XML_PATH_DAYS_DIFFERENCE      =   'customerfeedback/view/days_difference';
    
    protected $_customerfeedbackItemInstance;
    
    public function isEnabled($store = null){
        return Mage::getStoreConfigFlag(self::XML_PATH_ENABLED,$store);
    }
    
    public function getCustomerfeedbackPerPage($store = null) {
        return abs((int) Mage::getStoreConfig(self::XML_PATH_ITEMS_PER_PAGE, $store));
    }

    public function getDaysDifference($store = null) {
        return abs((int) Mage::getStoreConfig(self::XML_PATH_DAYS_DIFFERENCE, $store));
    }

    public function getCustomerfeedbackItemInstance() {
        if (!$this->_customerfeedbackItemInstance) {
            $this->_customerfeedbackItemInstance = Mage::registry('customerfeedback_item');

            if (!$this->_customerfeedbackItemInstance) {
                Mage::throwException($this->__('Customerfeedback item instance does not exist in Registry'));
            }
        }

        return $this->_customerfeedbackItemInstance;
    }
    
}