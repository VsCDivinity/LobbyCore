<?php

namespace VsCDivinity\scoreboard;

use pocketmine\scheduler\Task;
use pocketmine\Server;
use scoreboard\Scoreboard;

class ScoreboardTask extends Task {
  
    private function onScore() {
    $scoreboard = new Scoreboard($this->GetConfig()->get("TiTle"), "ScoreBoard", [$player]);
    $scoreboard->removeScoreboard();
    $scoreboard->createScoreboard();
    $scoreboard->addEntry($this->GetConfig()->get("Line-1"));
    $scoreboard->addEntry("§7|§l§dPlayers: §r§l" .count ($this->getOnlinePlayers()));
    $scoreboard->addEntry($this->GetConfig()->get("ServerName"));
    $scoreboard->addEntry($this->GetConfig()->get("Line-2"));
  }

}