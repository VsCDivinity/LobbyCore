<?php

namespace VsCDivinity\scoreboard;

use pocketmine\scheduler\Task;
use pocketmine\Server;

class ScoreboardTask extends Task {
  
  public function onRun(): void {
    foreach($this->getServer()->getOnlinePlayers() as $sender) {
      ScoreboardManager::new($sender, "ObjectiveName", "Votre scoreboard");
      ScoreboardManager::setLine($sender, 1, "§2Coucou");
      ScoreboardManager::setLine($sender, 2, "§e");
      ScoreboardManager::setLine($sender, 3, "§6monserver.fr");
    }
  }
  
}