<?php

if ( ! function_exists('is_false'))
{
	/**
	 * Finds whether a value is FALSE.
	 *
	 * @param  mixed  $value
	 * @return bool
	 */
	function is_false($value)
	{
		return $value === false;
	}
}

if ( ! function_exists('is_true'))
{
	/**
	 * Finds whether a value is TRUE.
	 *
	 * @param  mixed  $value
	 * @return bool
	 */
	function is_true($value)
	{
		return $value === true;
	}
}