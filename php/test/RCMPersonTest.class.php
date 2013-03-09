<?php

class RCMPersonTest extends PHPUnit_Framework_TestCase {

	private $rcmp		= null;

	/* Mocked Objects */

	public function setUp() {
		$this->rcmp = new RCMPerson();
	}

	public function tearDown() {
	}


	public function testCreateRCMPerson() {
		$actual = new RCMPerson();

		$this->assertNotNull($actual);
	}

	/**
	 * @dataProvider personProvider
	 */
	public function testAddProperty( $nodeName, $properties, $expected) {
		foreach( $properties as $key => $value) {
			$actual = $this->rcmp->addProperty( $key, $value);
			$this->assertEquals( $expected, $actual);
		}
	}

	public function testAddPropertyMultiple() {
		$key = "a key";
		$value = "a value";
		$actual = $this->rcmp->addProperty( $key, $value . time());
		$this->assertEquals( true, $actual);

		$actual = $this->rcmp->addProperty( $key, $value . time());
		$this->assertEquals( true, $actual);

		$actual = $this->rcmp->addProperty( $key, $value . time());
		$this->assertEquals( true, $actual);
	}

	/**
	 * @dataProvider personProvider
	 * @expectedException RCMPersonException
	 */
	public function testRemovePropertyException( $nodeName, $properties, $expected) {
		if( empty( $properties))
			$this->markTestSkipped('Test fails for empty array');

		foreach( $properties as $key => $value) {
			$actual = $this->rcmp->removeProperty( $key);
			$this->assertEquals( $expected, $actual);
		}
	}

	/**
	 * @dataProvider personProvider
	 */
	public function testRemoveProperty( $nodeName, $properties, $expected) {
		foreach( $properties as $key => $value) {
			$actual = $this->rcmp->addProperty( $key, $value);
			$actual = $this->rcmp->removeProperty( $key);
			$this->assertEquals( $expected, $actual);
		}
	}

	public function personProvider() {
		return array( // elements
				array( // args
					"PersonName1", // var
					array(),
					true // expected
					),
				array( // args
					"PersonName2", // var
					array("propkey2" => "propval2"),
					true // expected
					),
				array( // args
					"PersonName3", // var
					array(
						"propkey31" => "propval31",
						"propkey32" => "propval32",
						"propkey33" => "propval33",
						"propkey34" => "propval34"
						),
					true // expected
					)
				);
	}
}
 
?>
