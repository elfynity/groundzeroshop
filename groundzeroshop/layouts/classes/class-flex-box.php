<?php 
class Flexbox{
	private $flex_basis;
	private $gap;
	private $min_width;
	private $max_width;
	
	public function __construct($flex_basis, $gap, $min_width, $max_width) {
		$this->flex_basis = $flex_basis;
		$this->gap = $gap;
		$this->min_width = $min_width;
		$this->max_width = $max_width;
	}
	
	public function showValue() {
		
		if($this->flex_basis) {
			$flexBasis = 'flex-basis: calc('.$this->flex_basis.'% - '. $this->gap.'px); ';
		} else {
			$flexBasis = '';
		}
		
		
		if($this->min_width) {
			$min_width = 'min-width:'.$this->min_width.'px; '; 
		} else {
			$min_width = '';
		}
		
		if($this->max_width) {
			$max_width = 'max-width:'.$this->max_width.'px; ';
		} else{
			$max_width = '';
		}
		
		
		return $flexBasis.$min_width.$max_width;
	}
	
	public function flexGap() {
		if($this->gap) {
			return $this->gap;
		}
	}
	
} // class

