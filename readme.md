# Prologue Support

[![Latest Stable Version](https://poser.pugx.org/prologue/support/v/stable.png)](https://packagist.org/packages/prologue/support) [![Total Downloads](https://poser.pugx.org/prologue/support/downloads.png)](https://packagist.org/packages/prologue/support) [![Build Status](https://travis-ci.org/Prologue/Support.png)](https://travis-ci.org/Prologue/Support)

Prologue Support is an extension for [Illuminate Support](https://github.com/illuminate/support). It provides you with extra helper functionality for your application.

Maintained by [Dries Vints](https://github.com/driesvints)  
[@driesvints](https://twitter.com/driesvints)  
[driesvints.com](http://driesvints.com)  

## Table of Contents

- [Installation](#installation)
- [Usage](#usage)
	- [Collection](#collection)
	- [MessageBag](#messagebag)
	- [Helper Functions](#helper-functions)
- [Changelog](#changelog)
- [License](#license)

## Installation

You can install Prologue Support for your project through Composer.

Require the package in your `composer.json`.

```
"prologue/support": "dev-master"
```

Run composer to install or update the package.

```bash
$ composer update
```

## Usage

### Collection

The `Collection.php` class in Prologue Support comes with some additional functions.

#### filterBy($key, $value)

Used to filter for records which have a specific value set for a given key.

```php
$data = array(
	array('name' => 'foo', 'age' => 21),
	array('name' => 'bar', 'age' => 20),
	array('name' => 'baz', 'age' => 9),
);

$collection = new Prologue\Support\Collection($data);

// Will return only records with an age of 20.
$items = $collection->filterBy('age', 20)->all();
```

#### orderBy($key, $direction)

Used to order records by a given key.

```php
$data = array(
	array('name' => 'foo', 'age' => 21),
	array('name' => 'bar', 'age' => 20),
	array('name' => 'baz', 'age' => 9),
);

$collection = new Prologue\Support\Collection($data);

// Will order the records by its age in ascending order.
$items = $collection->orderBy('age')->all();
```

You can also order in a descending way.

```php
$items = $collection->orderBy('age', 'desc')->all();
```

### MessageBag

The MessageBag class in Prologue Support offers the ability to add arrays or other MessageBags as messages.

```php
$bag = new Prologue\Support\MessageBag;
$bag->add('error', array(
	'email' => 'Incorrect email address',
	'url'   => 'Incorrect url',
));
$messages = $bag->get('error'); 
```

Now `$messages` equals to:

```php
array(
	array(
		'email' => 'Incorrect email address',
		'url'   => 'Incorrect url',
	)
);
```

You see? One of the messages is the array we added.

The same goes for instances of `Illuminate\Support\MessageBag`.

```php
$bag->add('error', new Illuminate\Support\MessageBag);
```

### Helper Functions

#### is_true($value)

Determine if a value is true.

```php
$result = is_true(true) // true
$result = is_true(null) // false
```

#### is_false($value)

Determine if a value is false.

```php
$result = is_false(false) // true
$result = is_false(null) // false
```

#### last_key(array $value)

Get the last key from an array.

```php
$data = array('foo' => 'bar', 'baz' => 'foz');
$result = last_key($data); // 'baz'
```

## Changelog

You view the changelog for this package [here](https://github.com/Prologue/Support/releases).

## License

Prologue Support is licensed under the [MIT License](https://github.com/Prologue/Support/blob/master/license.md).
