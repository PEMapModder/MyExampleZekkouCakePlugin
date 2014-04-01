<?php

namespace PEMapModder\ExamplePlugins\PingLogger;

use PocketMine\Server;
use PocketMine\Player;
use PocketMine\Utils\Config;

class MainPlugin extends PluginBase{
	public static $instance=false;
	private $server = null, $unit = 40;
	public function onEnable(){
		$this->server = Server::getInstance();
		@mkdir($this->dataFolder."players/");
		$this->initialize();
	}
	public function initialize(){ // init() is a final function already
		$config = new Config($this->configFile, Config::YAML, array(
			"time-interval-to-log-in-seconds"=>1, "graphing"=>array(
				"milliseconds-per-space"=>40)));
		$interval=$config->get("time-interval-to-log-in-seconds"*20);
		$this->server->getScheduler()->scheduleRepeatingTask(new LogDataPath($this), $interval);
		$this->unit=$config->get("milliseconds-per-space");
	}
	public function graph(){
		foreach(Player::getAll() as $p){
			$ping = $p->getLag();
			$path = $this->dataFolder."players/".strtolower($p->getName()).".txt";
			$text = "";
			for($i=0; $i<=$ping; $i+=$this->unit)
				$text .= " ";
			$text .= "|\n";
			file_put_contents($path, $text, FILE_APPEND);
		}
	}
}
