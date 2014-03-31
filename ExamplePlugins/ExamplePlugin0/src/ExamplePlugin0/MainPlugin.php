<?php

namespace ExamplePlugins\ExamplePlugin0;

use PocketMine\Utils\TextFormat as Colors;

class MainPlugin extends PluginBase{
	public function onLoad(){
		PocketMine\console(Colors::AQUA."Loading ExamplePlugin0!");
	}
	public function onEnable(){
		PocketMine\console(Colors::LIGHT_PURPLE."Enabling ExamplePlugin0!");
	}
	public function onDisable(){
		PocketMine\console(Colors::YELLOW."Disabling ExamplePLugin0!");
	}
}
