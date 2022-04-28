<?php

namespace LDFx\ItsToxicGG;

// LDFX
use LDFx\ItsToxicGG\LDForm\Form;
use LDFx\ItsToxicGG\LDCommand\FXCommand;
use LDFx\ItsToxicGG\EventListener;
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
