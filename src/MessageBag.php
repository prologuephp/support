<?php namespace Prologue\Support;

use Illuminate\Support\MessageBag as BaseMessageBag;

class MessageBag extends BaseMessageBag {

	/**
	 * Format an array of messages.
	 *
	 * @param  array   $messages
	 * @param  string  $format
	 * @param  string  $messageKey
	 * @return array
	 */
	protected function transform($messages, $format, $messageKey)
	{
		$messages = (array) $messages;

		// We will simply spin through the given messages and transform each one
		// replacing the :message place holder with the real message allowing
		// the messages to be easily formatted to each developer's desires.
		foreach ($messages as $key => &$message)
		{
			$replace = array(':message', ':key');

			if ($message instanceof BaseMessageBag)
			{
				// Do nothing.
			}

			elseif (is_array($message))
			{
				foreach ($message as $k => &$m)
				{
					$m = str_replace($replace, array($m, $messageKey), $format);
				}
			}

			else
			{
				$message = str_replace($replace, array($message, $messageKey), $format);
			}
		}

		return $messages;
	}

}