<?php
/**
 * @Author       : Apptha team
 * @package      : Apptha_Request_Coupon
 * @copyright    : Copyright (c) 2011 (www.apptha.com)
 * @license      : http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @Date         : July 2012
 */
class Apptha_Reqforcoupon_Block_Adminhtml_Reqforcoupon_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'reqforcoupon';
        $this->_controller = 'adminhtml_reqforcoupon';
        
        $this->_updateButton('save', 'label', Mage::helper('reqforcoupon')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('reqforcoupon')->__('Delete Item'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('reqforcoupon_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'reqforcoupon_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'reqforcoupon_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('reqforcoupon_data') && Mage::registry('reqforcoupon_data')->getId() ) {
            return Mage::helper('reqforcoupon')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('reqforcoupon_data')->getTitle()));
        } else {
            return Mage::helper('reqforcoupon')->__('Add Item');
        }
    }
}