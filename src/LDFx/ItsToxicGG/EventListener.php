<?php

namespace LDFx\ItsToxicGG;

use pocketmine\entity\Entity;
use pocketmine\event\entity\EntityTeleportEvent;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat;
use pocketmine\event\player\PlayerJoinEvent;
use LDFx\ItsToxicGG\LDFx;

class EventListener implements Listener{
	
	private function FlyMWCheck(Entity $entity) : bool{
		if(!$entity instanceof Player) return false;
		if($this->getConfig()->get("FLY-MW") === "on"){
			if(!in_array($entity->getWorld()->getDisplayName(), $this->getConfig()->get("Worlds"))){
				$entity->sendMessage(self::PREFIX . TextFormat::RED . "This world does not allow flight!");
				if(!$entity->isCreative()){
					$entity->setFlying(false);
					$entity->setAllowFlight(false);
				}
				return false;
			}
		}elseif($this->getConfig()->get("FLY-MW") === "off") return true;
		return true;
	}

	public function onJoin(PlayerJoinEvent $event) : void{
		$player = $event->getPlayer();
		if($this->getConfig()->get("JFlyReset") === true){
			if($player->isCreative()) return;
			$player->setAllowFlight(false);
			$player->sendMessage($this->getConfig()->get("FDMessage"));
		}
	}

	public function onLevelChange(EntityTeleportEvent $event) : void{
		$entity = $event->getEntity();
		if($entity instanceof Player) $this->FlyMWCheck($entity);
	}
	
}
