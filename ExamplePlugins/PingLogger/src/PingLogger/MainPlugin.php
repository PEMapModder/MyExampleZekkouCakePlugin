<?php

namespace PEMapModder\ExamplePlugins\PingLogger;

use PocketMine\Server;
use PocketMine\Player;
use PocketMine\Utils\Config;

class MainPlugin extends PluginBase{
	private $server;
	public function onEnable(){
		$this->server = Server::getInstance();
		@mkdir($this->dataFolder."players/");
		$this->initialize();
	}
	public function initialize(){ // init() is a final function already
		$config = new Config($this->configFile, Config::YAML, array("time-interval-to-log-in-seconds"=>1));
		$this->server->schedule($config->get("time-interval-to-log-in-seconds"*20), array($this, "graph"));
	}
	public function graph(){
		foreach(Player::getAll() as $p){
			$ping = $p->getLag();
			$path = $this->dataFolder."players/".strtolower($p->getName()).".txt";
			$text = "";
			for($i=0; $i<=$ping; $i+=40)
				$text .= " ";
			$text .= "|\n";
			file_put_contents($path, $text, FILE_APPEND);
		}
	}
}
