<?php

use Prologue\Support\Collection;

class CollectionTest extends PHPUnit_Framework_TestCase {

	protected function getTestData()
	{
		return array(
			'foo' => array(
				'name' => 'foo',
				'age' => 21,
			),
			'bar' => array(
				'name' => 'bar',
				'age' => 20,
			),
			'baz' => array(
				'name' => 'baz',
				'age' => 9,
			),
		);
	}

	public function testFilterBy()
	{
		$expected = array(
			'bar' => array(
				'name' => 'bar',
				'age' => 20,
			),
		);

		$collection = new Collection($this->getTestData());

		$items = $collection->filterBy('age', 20)->all();

		$this->assertEquals($expected, $items);
	}

	public function testOrderByNumber()
	{
		$expected = array(
			'baz' => array(
				'name' => 'baz',
				'age' => 9,
			),
			'bar' => array(
				'name' => 'bar',
				'age' => 20,
			),
			'foo' => array(
				'name' => 'foo',
				'age' => 21,
			),
		);

		$collection = new Collection($this->getTestData());

		$items = $collection->orderBy('age')->all();

		$this->assertEquals($expected, $items);
	}

	public function testOrderByString()
	{
		$expected = array(
			'bar' => array(
				'name' => 'bar',
				'age' => 20,
			),
			'baz' => array(
				'name' => 'baz',
				'age' => 9,
			),
			'foo' => array(
				'name' => 'foo',
				'age' => 21,
			),
		);

		$collection = new Collection($this->getTestData());

		$items = $collection->orderBy('name')->all();

		$this->assertEquals($expected, $items);
	}

}