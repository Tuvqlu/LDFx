<?php

namespace LDFx\ItsToxicGG\LDCommand;
// pocketmine
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
// LDFx
use LDFx\ItsToxicGG\LDForm\Form;

class Command extends CommandSender{
  
 public function __construct(Form $form){
   $this->form = $form;
 }
  
 public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args) : bool{
   switch($cmd->getName() === "settings"){
     case "ui":
       if($sender->hasPermission("settings.cmd")){
         if(!$sender instanceof Player){
           $sender->sendMessage("This Command Only Works for players! Please perform this command IN GAME!");
         }else{
           $this->form->SettingsForm($sender);
         }
       }else{
         $sender->sendMessage("You don't have permission to use this command");
       }
     break;
       
     case "fly":
       if($sender->hasPermission("settings.cmd")){
         if(!$sender instanceof Player){
           $sender->sendMessage("This Command Only Works for players! Please perform this command IN GAME!");
         }else{
           $sender->setFlying(true);
           $sender->setAllowFlight(true);
           $sender->sendMessage("§aFly Is Active");
         }
       }else{
         $sender->sendMessage("You don't have permission to use this command");
       }
     break;
   
  }
  return true;
 }
}
