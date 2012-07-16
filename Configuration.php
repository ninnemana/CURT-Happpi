<?php

class Configuration{

	private $domain = "http://api.curtmfg.com/v2/";
	private $data_type = "json";
	private $customerID = 0;
	private $integrated = false;

	public function getDomain(){
		return $this->domain;
	}

	public function getDataType(){
		return $this->data_type;
	}

	public function getCustomerID(){
		return $this->customerID;
	}

	public function isIntegrated(){
		return $this->isIntegrated;
	}
}

?>