<?php
class ScrollEffect {
	private $value;
	
	public function __construct($value) {
		$this->value = $value;
	}
	
	public function showValue() {
		
		if ($this->value === "none") {
			return '';
		} else {
			$this->value = ' js-scroll '. $this->value;
			return $this->value;
		}
	}
} // class



/*
class WrapperWidth{
	private $width;
	
	public function __construct($width) {
		$this->width = $width;
	}
	
	public function wrapper() {
		return $this->width;
	}
} // class
*/









	
	
