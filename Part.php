<?php

class Part{

	private $partID = 0;
	private $custPartID = 0;
	private $status = 0;
	private $dateModified = "";
	private $dateAdded = "";
	private $shortDesc = "";
	private $oldPartNumber = "";
	private $listPrice = "";
	private $attributes = array(); // Array Attribute objects
	private $vehicleAttributes = array(); // Array Attribute objects
	private $content = array(); // Array Attribute objects
	private $pricing = array(); // Array Attribute objects
	private $reviews = array(); // Array Review objects
	private $images = array(); // Array Image objects
	private $videos = array(); // Array Video objects
	private $pClass = array();
	private $relatedCount = 0;
	private $installTime = 0;
	private $averageReview = 0;
	private $drilling = "";
	private $exposed = "";
	private $vehicleID = 0;
	private $priceCode = 0;



	private function castToPart($obj){
		if(isset($obj->partID)){
			$this->partID = $obj->partID;
		}
		if(isset($obj->custPartID)){
			$this->custPartID = $obj->custPartID;
		}
		if(isset($obj->status)){
			$this->status = $obj->status;
		}
		if(isset($obj->dateModified)){
			$this->dateModified = $obj->dateModified;
		}
		if(isset($obj->dateAdded)){
			$this->dateAdded = $obj->dateAdded;
		}
		if(isset($obj->shortDesc)){
			$this->shortDesc = $obj->shortDesc;
		}
		if(isset($obj->oldPartNumber)){
			$this->oldPartNumber = $obj->oldPartNumber;
		}
		if(isset($obj->listPrice)){
			$this->listPrice = $obj->listPrice;
		}
		if(isset($obj->attributes)){
			$this->attributes = $obj->attributes;
		}
		if(isset($obj->vehicleAttributes)){
			$this->vehicleAttributes = $obj->vehicleAttributes;
		}
		if(isset($obj->content)){
			$this->content = $obj->content;
		}
		if(isset($obj->pricing)){
			$this->pricing = $obj->pricing;
		}
		if(isset($obj->reviews)){
			$this->reviews = $obj->reviews;
		}
		if(isset($obj->images)){
			$this->images = $obj->images;
		}
		if(isset($obj->videos)){
			$this->videos = $obj->videos;
		}
		if(isset($obj->pClass)){
			$this->pClass = $obj->pClass;
		}
		if(isset($obj->relatedCount)){
			$this->relatedCount = $obj->relatedCount;
		}
		if(isset($obj->installTime)){
			$this->installTime = $obj->installTime;
		}
		if(isset($obj->averageReview)){
			$this->averageReview = $obj->averageReview;
		}
		if(isset($obj->drilling)){
			$this->drilling = $obj->drilling;
		}
		if(isset($obj->exposed)){
			$this->exposed = $obj->exposed;
		}
		if(isset($obj->vehicleID)){
			$this->vehicleID = $obj->vehicleID;
		}
		if(isset($obj->priceCode)){
			$this->priceCode = $obj->priceCode;
		}
	}


}


?>