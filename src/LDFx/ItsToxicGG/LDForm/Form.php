<?php

namespace LDFx\ItsToxicGG\LDForm;

use pocketmine\player\Player;
use jojoe7777\FormAPI\SimpleForm;

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
    $form = new SimpleForm(function(Player $player, int $data = null){
        if($data === null){
            return true;
        }
        switch($data){
            case 0:
                  $player->setFlying(true);
                  $player->setAllowFlight(true);
                  $player->sendMessage("§aFly Is Active");
            break;
            
            case 1:
                 $player->setFlying(false);
                 $player->setAllowFlight(true);
                 $player->sendMessage("§cFly Is Disabled");
            break;
            
            case 2:
                $this->SettingsForm($player);
                $player->sendMessage("§aGoing Back To SettingsForm!");
            break;
            
            case 3:
                $player->sendMessage("§aYou Have Left The Form!");
            break;
        }
    });
    $form->setTitle("§aFly§cSettings");
    $form->setContent("§fChoose if you want fly to be off or on");
    $form->setButton("§aFLY ON");
    $form->setButton("§cFLY OFF");
    $form->setButton("§6Go Back To Settings");
    $form->setButton("§cEXIT");
    $form->sendToPlayer($player);
    return $form;
  }
}
