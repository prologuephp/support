<?php

class HelpersTest extends PHPUnit_Framework_TestCase {

	public function testIsFalse()
	{
		$this->assertTrue(is_false(false));
	}

	public function testIsNotFalse()
	{
		$this->assertFalse(is_false(null));
	}

	public function testIsTrue()
	{
		$this->assertTrue(is_true(true));
	}

	public function testIsNotTrue()
	{
		$this->assertFalse(is_true(null));
	}

	public function testLastKey()
	{
		$data = array('foo' => 'bar', 'baz' => 'foz');

		$this->assertSame('baz', last_key($data));
	}

}