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
      $this->getLogger()->info("§aEnabled LDFx");
      $this->getServer()->getCommandMap()->register("settings", new SettingsCommand($this));
      $this->getServer()->getCommandMap()->register("fly", new FlyCommand($this));
  }
  
  public function onDiable(): void{
      $this->getLogger()->info("§cDisabled LDFx");
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
  
  public function NickColorForm(Player $player){
		  $form = new SimpleForm(function (Player $player, $data = null){
			    if($data === null){
		          return true;
	        }
		      switch($data){
				      case 0:
					        $player->setDisplayName("§f" . $player->getName() . "§f");
					        $player->setNameTag("§f" . $player->getName() . "§f");
					        $player->sendMessage("§anickname color has been changed to §fWhite!");
				      break;

				      case 1:
					        $player->setDisplayName("§c" . $player->getName() . "§f");
					        $player->setNameTag("§c" . $player->getName() . "§f");
					        $player->sendMessage("§aYour nickname color has been changed to §cRed!");
				      break;

				      case 2:
					        $player->setDisplayName("§b" . $player->getName() . "§f");
					        $player->setNameTag("§b" . $player->getName() . "§f");
					        $player->sendMessage("§aYour nickname color has been changed to §bBlue!");
				      break;

				      case 3:
					        $player->setDisplayName("§e" . $player->getName() . "§f");
					        $player->setNameTag("§e" . $player->getName() . "§f");
					        $player->sendMessage("§aYour nickname color has been changed to §eYellow!");
				      break;

				      case 4:
					        $player->setDisplayName("§6" . $player->getName() . "§f");
					        $player->setNameTag("§6" . $player->getName() . "§f");
					        $player->sendMessage("§aYour nickname color has been changed to §6Orange!");
				      break;

				      case 5:
					        $player->setDisplayName("§d" . $player->getName() . "§f");
					         $player->setNameTag("§d" . $player->getName() . "§f");
					         $player->sendMessage("§aYour nickname color has been changed to §dPurple!");
				      break;
           
              case 6:
					         $player->setDisplayName("§0" . $player->getName() . "§f");
					         $player->setNameTag("§0" . $player->getName() . "§f");
					         $player->sendMessage("§aYour nickname color has been changed to §0Black!");
              break;
			      }
		     return true;
      });
		  $form->setTitle("§bNicknameColors");
		  $form->setContent("§fSelect your color you prefer to your nickname!");
		  $form->addButton("White");
		  $form->addButton("§cRed");
		  $form->addButton("§bBlue");
		  $form->addButton("§eYellow");
		  $form->addButton("§6Orange");
		  $form->addButton("§dPurple");
                  $form->addButton("§0Black");
		  $form->sendToPlayer($player);
		  return $form;
  }
}
 
