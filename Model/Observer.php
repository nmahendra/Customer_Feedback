<?php

class Zygnis_Customerfeedback_Model_Observer{
    
    public function beforeCustomerfeedbackDisplayed(Varien_Event_Observer $observer){
        $customerfeedbackItem = $observer->getEvent()->getCustomerfeedbackItem();
        Mage::log('Done');
        $currentDate = Mage::app()->getLocale()->date();
        $customerfeedbackCreatedAt = Mage::app()->getLocale()->date(strtotime($customerfeedbackItem->getCreatedAt()));
        $daysDifference = $currentDate->sub($customerfeedbackCreatedAt)->getTimestamp() / (60 * 60 * 24);

        if ($daysDifference < Mage::helper('zygnis_customerfeedback')->getDaysDifference()) {
            Mage::getSingleton('core/session')->addSuccess(Mage::helper('zygnis_customerfeedback')->__('Recently added'));
        }
    }
}