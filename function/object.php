<?php

class category{
	private $type;

	
	public function __tostring(){
		return "Type : ".$this->type."<br>";
	}

	public function __construct($type){
		$this->type=$type;
	}

	public function get_type(){
		return $this->type;
	}
	public function set_type($type){
		$this->type=$type;
	}
}

class body extends category{
	private $fullname;
	private $gender;
	private $eyes;
	private $size;
	private $weight;

	public function __toString(){
		return "Profil : <br>".$this->fullname."<br>".$this->gender."<br>".
		$this->eyes."<br>".$this->size."<br>".$this->weight."<br>";
	}

	public function __construct($fullname, $gender, $eyes, $size, $weight){
		$this->fullname=$fullname;
		$this->gender = $gender;
		$this->eyes = $eyes;
		$this->size = $size;
		$this->weight = $weight;
	}

	public function get_fullname(){
		return $this->fullname;
	}
	public function set_fullname($fullname){
		$this->fullname=$fullname;
	}
	public function get_gender(){
		return $this->gender;
	}
	public function set_gender($gender){
		$this->gender=$gender;
	}
	public function get_eyes(){
		return $this->eyes;
	}
	public function set_eyes($eyes){
		$this->eyes=$eyes;
	}
	public function get_size(){
		return $this->size;
	}
	public function set_size($size){
		$this->size=$size;
	}
	public function get_weight(){
		return $this->weight;
	}
	public function set_weight($weight){
		$this->weight=$weight;
	}

}

?>
