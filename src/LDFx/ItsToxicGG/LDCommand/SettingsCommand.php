<?php

namespace LDFx\ItsToxicGG\LDCommand;

use pocketmine\Server;
use pocketmine\player\Player;
use pocketmine\plugin\Plugin;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginOwned;

use LDFx\ItsToxicGG\LDForm\Form;

class SettingsCommand extends Command implements PluginOwned{
    
    private $form;
    public $author = 'ItsToxicGG';

    public function __construct(Form $form){
        $this->form = $form;
        
        parent::__construct("settingsui", "§r§fYour Settings, Plugin By $author", "§cUse: /settings", ["settings"]);
        $this->setPermission("settings.fx");
        $this->setAliases(["settings"]);
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args){
        if(count($args) == 0){
            if($sender instanceof Player) {
                $this->form->SettingsForm($sender);
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
