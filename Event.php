<?php

namespace Plugin\Event;

class Event
{
	public static function ipBeforeController()
	{
		ipAddJs('assets/event.js');
	}
}