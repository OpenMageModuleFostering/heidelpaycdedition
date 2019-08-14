<?php
class HeidelpayCD_Edition_Model_Payment_Hcdpal extends HeidelpayCD_Edition_Model_Payment_Abstract
{  
	/**
	* unique internal payment method identifier
	*    
	* @var string [a-z0-9_]   
	**/
	protected $_code = 'hcdpal';
	protected $_isGateway = true;
	protected $_canAuthorize = true;
	protected $_canCapture = true;
	protected $_canCapturePartial = true;
	protected $_canRefund = false;
	protected $_canRefundInvoicePartial = false;
	protected $_canVoid = false;
	protected $_canUseInternal = false;
	protected $_canUseCheckout = true;
	protected $_canUseForMultishipping = false;
	protected $_isInitializeNeeded = false;
	
	
	/*
	 * PayPal seller protection, need shipping adress instead of billing (PAYPAL REV 20141215) 
	 */
	public function getUser($order, $isReg=false) {
		
		$user = array();
		
		$user = parent::getUser($order, $isReg);
		$shipping	= $order->getShippingAddress();
		$email = ($order->getShippingAddress()->getEmail()) ? $order->getShippingAddress()->getEmail() : $order->getCustomerEmail();
		
		
		$user['IDENTIFICATION.SHOPPERID'] 	= $shipping->getCustomerId();
		if ($shipping->getCompany() == true) $user['NAME.COMPANY']	= trim($shipping->getCompany());
		$user['NAME.GIVEN']			= trim($shipping->getFirstname());
		$user['NAME.FAMILY']		= trim($shipping->getLastname());
		$user['ADDRESS.STREET']		= $shipping->getStreet1()." ".$shipping->getStreet2();
		$user['ADDRESS.ZIP']		= $shipping->getPostcode();
		$user['ADDRESS.CITY']		= $shipping->getCity();
		$user['ADDRESS.COUNTRY']	= $shipping->getCountry();
		$user['CONTACT.EMAIL']		= $email;
		
		return $user;	
	}
	
}

