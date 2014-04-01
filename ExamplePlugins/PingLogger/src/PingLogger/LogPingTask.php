<?php

namespace PEMapModder\ExamplePlugins\PingLogger;

class LogPingTask extends pocketmine\plugin\PluginTask{
	public function onRun(){
		MainPlugin::$instance->graph();
	}
}
