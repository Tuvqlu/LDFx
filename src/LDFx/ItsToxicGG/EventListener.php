<?php

namespace LDFx\ItsToxicGG;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;

class EventListener implements Listener{
  
	public function onJoin(PlayerJoinEvent $event){
        $player = $event->getPlayer();
        $event->setJoinMessage("Thanks For Installing LDFx By ItsToxicGG");
  }
}
