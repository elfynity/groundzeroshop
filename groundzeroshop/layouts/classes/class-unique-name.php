<?php
class UniqueName{
	public function manipulate($name) {
		$lowercase = strtolower($name);
    $name = str_replace(' ', '-', $lowercase);
    return $name;		
	}
}