<?php
class HeidelpayCD_Edition_Model_Payment_Hcdmk extends HeidelpayCD_Edition_Model_Payment_Abstract
{  
	protected $_code = 'hcdmk';
	protected $_isGateway = true;
	protected $_canAuthorize = false;
	protected $_canCapture = false;
	protected $_canCapturePartial = false;
	protected $_canRefund = false;
	protected $_canRefundInvoicePartial = false;
	protected $_canVoid = false;
	protected $_canUseInternal = false;
	protected $_canUseCheckout = true;
	protected $_canUseForMultishipping = false;
	protected $_isInitializeNeeded = false;
	
	public function isAvailable($quote=null) {
		$currency_code=$this->getQuote()->getQuoteCurrencyCode();
		if (!empty($currency_code) && $currency_code != 'TRY') return false;
		return parent::isAvailable($quote);
	}
	

}

