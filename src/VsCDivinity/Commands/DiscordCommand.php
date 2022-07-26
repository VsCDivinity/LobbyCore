<?php

namespace VsCDivinity\Commands;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;

class MenuCommand extends Command implements Listener {
  
  public function __construct() {
    
    parent::__construct('Menu', 'Menu Command');
    $this->setPermission('menu.use');
    
  }

    public function execute(CommandSender $sender, string $commandLabel, array $args): void {
      
      if(!$sender->hasPermission("menu.use")) {
          $sender->sendMessage("§l[§r§c§l!§r§l] §r§c§lyou do not have permissions to use this command");
          return;
      }
      
      if(!$sender instanceof Player) {
         return;
      }
      
      
    }
}