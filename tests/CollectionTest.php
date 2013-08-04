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

	protected function getCollection()
	{
		return new Collection($this->getTestData());
	}

	public function testFilterBy()
	{
		$expected = array(
			'bar' => array(
				'name' => 'bar',
				'age' => 20,
			),
		);

		$items = $this->getCollection()
		              ->filterBy('age', 20)
		              ->all();

		$this->assertSame($expected, $items);
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

		$items = $this->getCollection()
		              ->orderBy('age')
		              ->all();

		$this->assertSame($expected, $items);
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

		$items = $this->getCollection()
		              ->orderBy('name')
		              ->all();

		$this->assertSame($expected, $items);
	}

	public function testOrderByDescending()
	{
		$expected = array(
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

		$items = $this->getCollection()
		              ->orderBy('age', 'desc')
		              ->all();

		$this->assertSame($expected, $items);
	}

}