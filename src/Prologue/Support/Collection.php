<?php namespace Prologue\Support\Collection;

use Illuminate\Support\Collection as BaseCollection;

class Collection extends BaseCollection {

	/**
	 * Take the first {$limit} items.
	 *
	 * @param  int  $limit
	 * @return \Prologue\Support\Collection
	 */
	public function take($limit)
	{
		return $this->slice(0, $limit);
	}

	/**
	 * Take the last {$limit} items.
	 *
	 * @param  int  $limit
	 * @return \Prologue\Support\Collection
	 */
	public function takeLast($limit)
	{
		return $this->slice(-$limit, $limit);
	}

	/**
	 * Tries to filter items by a key/value pair.
	 *
	 * @param  string  $key
	 * @param  mixed   $value
	 * @return \Prologue\Support\Collection
	 */
	public function filterBy($key, $value)
	{
		return $this->filter(function($item) use ($key, $value)
		{
			$itemValue = is_object($item) ? $item->{$key} : $item[$key];

			return $itemValue == $value;
		});
	}

	/**
	 * Orders items by a key.
	 *
	 * @param  string  $key
	 * @return \Prologue\Support\Collection
	 */
	public function orderBy($key)
	{
		return $this->sort(function($a, $b) use ($key)
		{
			$valueA = is_object($a) ? $a->{$key} : $a[$key];
			$valueB = is_object($b) ? $b->{$key} : $b[$key];

			if ($valueA == $valueB) return 0;

			return ($valueA < $valueB) ? 1 : -1;
		});
	}

}