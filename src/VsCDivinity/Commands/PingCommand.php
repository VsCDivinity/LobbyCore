<?php

namespace VsCDivinity\Commands;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;

class PingCommand extends Command {
  
  public function __construct() {
      
      parent::__construct('ping', 'Ping Command');
      $this->setPermission('ping.use');
      
  }

  public function execute(CommandSender $sender, string $commandLabel, array $args): void
    {
      if(!$sender->hasPermission("ping.use")) {
          $sender->sendMessage("§l[§r§c§l!§r§l] §r§c§lyou do not have permissions to use this command");
          return;
      }
    
      if (!$sender instanceof Player) {
          return;
      }
      
      $ping = $sender->getNetworkSession()->getPing();
      if (!$sender->sendMessage("§l[§r§l§c!§r§l] §r§lYour ping is §l§a" .$ping));
    }
    
      
}
