<?php

class RCMPerson {

	private $properties = array();

	public function __construct() {
	}

	public function removeProperty($key) {
		if( array_key_exists( $key, $this->properties)) {
			unset($this->properties[$key]);
		} else {
			throw new RCMPersonException("Unknown key: $key");
		}
		return true;
	}

	public function addProperty($key, $value) {
		if( array_key_exists( $key, $this->properties)) {
			if( is_array($this->properties[$key]))
				$this->properties[$key][] = $value;
			else
				$this->properties[$key] = array( $this->properties[$key], $value);
		} else {
			$this->properties[$key] = $value;
		}
		return true;
	}

	public function sync() {
	}
}

?>
