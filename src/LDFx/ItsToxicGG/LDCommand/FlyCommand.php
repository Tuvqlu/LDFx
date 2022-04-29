<?php

namespace LDFx\ItsToxicGG\LDCommand;

use pocketmine\Server;
use pocketmine\player\Player;
use pocketmine\plugin\Plugin;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginOwned;

use LDFx\ItsToxicGG\LDForm\Form;

class FlyCommand extends Command implements PluginOwned{
    
    private $form;

    public function __construct(Form $plugin){
        $this->form = $form;
        
        parent::__construct("fly", "§r§fYour Fly Settings, Plugin By ItsToxicGG", "§cUse: /fly", ["flyui"]);
        $this->setPermission("fly.fx");
        $this->setAliases(["flyui"]);
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args){
        if(count($args) == 0){
            if($sender instanceof Player) {
                $this->form->FlyForm($sender);
            } else {
                $sender->sendMessage("Use this command in-game");
            }
        }
        return true;
    }
    
    public function getPlugin(): Form{
        return $this->form;
    }

    public function getOwningPlugin(): Form{
        return $this->form;
    }
}
