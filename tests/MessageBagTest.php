<?php

use Prologue\Support\MessageBag;
use Illuminate\Support\MessageBag as IlluminateMessageBag;

class MessageBagTest extends PHPUnit_Framework_TestCase {

	public function testAddArray()
	{
		$bag = new MessageBag;

		$bag->add('error', array('foo' => 'bar'));

		$messages = $bag->get('error');

		$this->assertSame(array('foo' => 'bar'), $messages[0]);
	}

	public function testAddMessageBag()
	{
		$bag = new MessageBag;

		$bag->add('error', new IlluminateMessageBag);

		$messages = $bag->get('error');

		$this->assertInstanceOf('Illuminate\Support\MessageBag', $messages[0]);
	}

}