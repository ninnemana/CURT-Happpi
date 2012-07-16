<?php

include './helpers.php';
include './Configuration.php';

class Vehicle {

	protected $config = null;
	protected $helper = null;

	// Vehicle Properties
	private $id = 0;
	private $mount = "";
	private $year = 0;
	private $make = "";
	private $model = "";
	private $style = "";
	private $installTime = "";
	private $drilling = "";
	private $exposed = "";
	private $attributes = array();

	// Vehicle Property options
	private $mountOptions = array("rear" => "Rear Mount", "front" => "Front Mount");
	private $yearOptions = array();
	private $makeOptions = array();
	private $modelOptions = array();
	private $styleOptions = array();

	public function __construct($mount = "", $year = 0, $make = "", $model = "", $style = ""){
		$this->mount = $mount;
		$this->year = $year;
		$this->make = $make;
		$this->model = $model;
		$this->style = $style;

		$this->config = new Configuration;
		$this->helper = new Helper;
	}

	public function __destruct(){
		// Handle garbage cleanup
	}

	/*** Getters/Setters ***/

	/*
	*	Retrieves the value of the mount property
	*
	*	@returns: string
	*/
	public function getMount(){
		return $this->mount;
	}

	/*
	*	Sets the value of the mount property, unless the mount
	*	property already contains this value
	*/
	public function setMount($mount = ""){
		if($mount != $this->mount){
			$this->mount = $mount;
		}
	}

	/*
	*	Retrieves the value of the year property
	*
	*	@returns: int
	*/
	public function getYear(){
		return $this->year;
	}

	/*
	*	Sets the value of the year property, unless the year
	*	property already contains this value
	*/
	public function setYear($year = 0){
		if($year != $this->year){
			$this->year = $year;
		}
	}

	/*
	*	Retrieves the value of the make property
	*
	*	@returns: string
	*/
	public function getMake(){
		return $this->make;
	}

	/*
	*	Sets the value of the make property, unless the make
	*	property already contains this value
	*/
	public function setMake($make = ""){
		if($make != $this->make){
			$this->make = $make;
		}
	}

	/*
	*	Retrieves the value of the model property
	*
	*	@returns: string
	*/
	public function getModel(){
		return $this->model;
	}

	/*
	*	Sets the value of the model property, unless the model
	*	property already contains this value
	*/
	public function setModel($model = ""){
		if($model != $this->model){
			$this->model = $model;
		}
	}

	/*
	*	Retrieves the value of the style property
	*
	*	@returns: string
	*/
	public function getStyle(){
		return $this->model;
	}

	/*
	*	Sets the value of the style property, unless the style
	*	property already contains this value
	*/
	public function setStyle($style = ""){
		if($style != $this->style){
			$this->style = $style;
		}
	}

	public function getMounts(){
		return $this->mountOptions;
	}

	public function getYears(){
		$request = $this->config->getDomain() . "GetYear?mount=" . $this->mount . "&dataType=" . $this->config->getDataType();
		$response = $this->helper->curlGet($request);

		return json_decode($response);
	}

	public function getMakes(){

		$request = $this->config->getDomain() . "GetMake?mount=" . $this->mount;
		$request .= "&year=" . $this->year;
		$request .= "&dataType=" . $this->config->getDataType();

		$resp = $this->helper->curlGet($request);

		return json_decode($resp);

	}

	public function getModels(){

		$request = $this->config->getDomain() . "GetModel?mount=" . $this->mount;
		$request .= "&year=" . $this->year;
		$request .= "&make=" . $this->make;
		$request .= "&dataType=" . $this->config->getDataType();

		$resp = $this->helper->curlGet($request);

		return json_decode($resp);

	}

	public function getStyles(){

		$request = $this->config->getDomain() . "GetStyle?mount=" . $this->mount;
		$request .= "&year=" . $this->year;
		$request .= "&make=" . $this->make;
		$request .= "&model=" . $this->model;
		$request .= "&dataType=" . $this->config->getDataType();

		$resp = $this->helper->curlGet($request);

		return json_decode($resp);

	}

	public function getVehicle(){

		$req = $this->config->getDomain() . "GetVehicle";
		$req .= "?year=" . $this->year;
		$req .= "&make=" . $this->make;
		$req .= "&model=" . $this->model;
		$req .= "&style=" . $this->style;
		$req .= "&dataType=" . $this->config->getDataType();

		$resp = $this->helper->curlGet($req);

		$obj_arr = json_decode($resp);
		$vehicle_arr = array();

		foreach ($obj_arr as $obj) {
			$v = $this->castToVehicle($obj);
			array_push($vehicle_arr, $v);
		}
		return $vehicle_arr;
	}

	public function getVehiclesByPart($partID = 0){

		$req = $this->config->getDomain() . "GetPartVehicles";
		$req .= "?dataType=" . $this->config->getDataType();
		$req .= "&partID=" . $partID;

		$resp = $this->helper->curlGet($req);
		$vehicle_arr = array();
		foreach (json_decode($resp) as $obj) {
			$v = $this->castToVehicle($obj);
			array_push($vehicle_arr, $v);
		}

		return $vehicle_arr;
	}

	public function getParts($vehicleID = 0, $mount = "", $year = "", $make = "", $model = "", $style = ""){
		$req = "";
		if($vehicleID > 0){
			$req = $this->config->getDomain() . "GetParts";

			$req .= "&dataType=" . $this->config->getDataType();
		}else{

		}
		$resp = $this->helper->curlGet($req);
		$part_arr = array();
		foreach (json_decode($resp) as $part) {
			$part_arr.push($part);
		}

		return $part_arr;
	}


	/*** Private Functions ***/
	private function castToVehicle($obj){
		$v = new Vehicle();
		if(isset($obj->mount)){
			$v->setMount($obj->mount); 
		}
		if(isset($obj->year)){
			$v->setYear($obj->year); 
		}
		if(isset($obj->make)){
			$v->setMake($obj->make); 
		}
		if(isset($obj->model)){
			$v->setModel($obj->model); 
		}
		if(isset($obj->style)){
			$v->setStyle($obj->style); 
		}
		if(isset($obj->vehicleID)){
			$v->id = $obj->vehicleID;
		}
		if(isset($obj->installTime)){
			$v->installTime = $obj->installTime; 
		}
		if(isset($obj->drilling)){
			$v->drilling = $obj->drilling; 
		}
		if(isset($obj->exposed)){
			$v->exposed = $obj->exposed; 
		}
		if(isset($obj->attributes)){
			$v->attributes = $obj->attributes; 
		}

		return $v;
	}
}


?>