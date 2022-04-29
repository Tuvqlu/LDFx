<?php

namespace LDFx\ItsToxicGG\LDForm;

use pocketmine\player\Player;
use Vecnavium\FormsUI\SimpleForm;
use Vecnavium\FormsUI\CustomForm;

class Form extends Form{
  
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
    $form->setButton("§aFly§cSettings");
    $form->setButton("§cEXIT");
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
    $form->setLabel("§fChoose if you want fly to be off or on");
    $form->setToggle("§fFly", false);
    $form->sendToPlayer($player);
    return $form;
  }
}
