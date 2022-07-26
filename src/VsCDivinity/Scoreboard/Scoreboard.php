<?php

namespace VsCDivinity\Scoreboard;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\player\Player;

class Scoreboard implements Listener {
  
  public function onJoin(PlayerJoinEvent $event): void {
    $player = $event->GetPlayer();
    self::sendBasicScoreboard($player);
  }
  
  public function sendBasicScoreboard(Player $player): void
    {
    $scoreboard = new ScoreboardAPI();
    $scoreboard->create($player, " §l§bLobby Core ");
    $scoreboard->setLine($player, 1, "§l");
    $scoreboard->setLine($player, 2, "§r----------------------");
    $scoreboard->setLine($player, 3, "§lLobbyCore.tebex.ui");
    $scoreboard->setLine($player, 4, "§l§bName: §r§l" .$player->getDisplayName());
    $scoreboard->setLine($player, 5, "----------------------");
  }

}