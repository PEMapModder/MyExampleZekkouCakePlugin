<?php

namespace PEMapModder\WorldList;

use pocketmine\plugin\PluginBase;
use pocketmine\Player;
use pocketmine\utils\TextFormat as Colors;

class MainPlugin extends PluginBase{
	public function onCommand(CommandSender $issuer, Command $cmd, $label, array $args){
		if(!($issuer instanceof Player)){
			$issuer->sendMessage(Colors::YELLOW."Please run this command in-game."); // lol rub this cmd in gamr
			return true; // not success but still handled
		}
		$list=Player::getAll();
		$ret="List of players at world ".$issuer->level->getName()." (@totalCnt/".count($list).")";
		$cnt=0;
		foreach($list as $p){
			if($p->level->getName()===$issuer->level->getName()){
				$ret.=$p->getDisplayName().", ";
				$cnt++;
			}
		}
		$issuer->sendMessage(substr(str_replace("@totalCnt", "$cnt", $ret), 0, -2);
	}
}
