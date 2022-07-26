<?php

namespace VsCDivinity\Commands;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;

class DiscordCommand extends Command implements Listener {
  
  public function __construct() {
    
    parent::__construct('discord', 'Discord Command');
    $this->setPermission('discord.use');
    
  }

    public function execute(CommandSender $sender, string $commandLabel, array $args): void {
      
      if(!$sender->hasPermission("discord.use")) {
          $sender->sendMessage("§l[§r§c§l!§r§l] §r§c§lyou do not have permissions to use this command");
          return;
      }
      
      if(!$sender instanceof Player) {
         return;
      }
      
      if(!$sender->sendMessage($this->GetConfig()->get("Discord")));
      
    }
}