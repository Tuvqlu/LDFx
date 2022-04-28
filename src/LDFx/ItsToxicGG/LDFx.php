<?php

namespace LDFx\ItsToxicGG;

// LDFX
use LDFx\LDForm\Form;
use LDFx\LDCommand\Command;
use LDFx\EventListener;
// POCKETMINE
use pocketmine\plugin\PluginBase;
use pocketmine\player\Player;

class LDFx extends PluginBase
{
  
  public function onEnable(): void{
      $this->getLogger()->info("Enabled Plugin");
  }
  
  public function onDiable(): void{
      $this->getLogger()->info("Disabled Plugin");
  }
}
