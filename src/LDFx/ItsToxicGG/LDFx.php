<?php

namespace LDFx\ItsToxicGG;

// LDFX
use LDFx\ItsToxicGG\LDForm\Form;
use LDFx\ItsToxicGG\LDCommand\SettingsCommand;
use LDFx\ItsToxicGG\LDCommand\FlyCommand;
use LDFx\ItsToxicGG\EventListener;
// POCKETMINE
use pocketmine\plugin\PluginBase;
use pocketmine\player\Player;
use pocketmine\Server;

class LDFx extends PluginBase
{
  
  public function onEnable(): void{
      $this->getLogger()->info("Enabled Plugin");
      $this->getServer()->getCommandMap()->register("settings", new SettingsCommand($this));
      $this->getServer()->getCommandMap()->register("fly", new FlyCommand($this));
  }
  
  public function onDiable(): void{
      $this->getLogger()->info("Disabled Plugin");
  }
}
