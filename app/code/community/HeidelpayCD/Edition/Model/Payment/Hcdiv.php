<?php
class HeidelpayCD_Edition_Model_Payment_Hcdiv extends HeidelpayCD_Edition_Model_Payment_Abstract
{  
	protected $_code = 'hcdiv';
	protected $_isGateway = true;
	protected $_canAuthorize = false;
	protected $_canCapture = false;
	protected $_canCapturePartial = false;
	protected $_canRefund = true;
	protected $_canRefundInvoicePartial = true;
	protected $_canVoid = false;
	protected $_canUseInternal = false;
	protected $_canUseCheckout = true;
	protected $_canUseForMultishipping = false;
	protected $_isInitializeNeeded = false;

}

