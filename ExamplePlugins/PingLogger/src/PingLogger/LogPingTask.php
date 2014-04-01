<?php

namespace PEMapModder\ExamplePlugins\PingLogger;

class LogPingTask extends PluginTask{
	public function onRun(){
		MainPlugin::$instance->graph();
	}
}
