<?php

namespace LDFx\ItsToxicGG;

// LDFX
use LDFx\ItsToxicGG\LDCommand\SettingsCommand;
use LDFx\ItsToxicGG\LDCommand\FlyCommand;
use LDFx\ItsToxicGG\EventListener;
// POCKETMINE
use pocketmine\plugin\PluginBase;
use pocketmine\player\Player;
use pocketmine\Server;
// FORM
use Vecnavium\FormsUI\CustomForm;
use Vecnavium\FormsUI\SimpleForm;

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
  
  public function SettingsForm($player){
       $form = new SimpleForm(function(Player $player, int $data = null){
            if($data === null){
                return true;
            }
            switch($data){
                case 0:
                    $this->FlyForm($player);
                    $player->sendMessage("§aYou Have Left the Settings to FlyForm!");
                break;
            
                case 1:
                    $player->sendMessage("§aYou Have Left The Form!");
                break;
            
            }
       });
       $form->setTitle("§bSettings");
       $form->setContent("§fPick THe Setting!");
       $form->addButton("§aFly§cSettings");
       $form->addButton("§cEXIT");
       $form->sendToPlayer($player);
       return $form;
  }
  
  public function FlyForm($player){
      $form = new CustomForm(function(Player $player, $data){
          if($data === null){
              return true;
          }
          switch($data){
              case true:
                  $player->setFlying(true);
                  $player->setAllowFlight(true);
                  $player->sendMessage("§aFly Is Active");
              break;
            
              case false:
                  $player->setFlying(false);
                  $player->setAllowFlight(true);
                  $player->sendMessage("§cFly Is Disabled");
              break;
           }
      });
      $form->setTitle("§aFly§cSettings");
      $form->addLabel("§fChoose if you want fly to be off or on");
      $form->addToggle("§fFly", false);
      $form->sendToPlayer($player);
      return $form;
  }
}
 
