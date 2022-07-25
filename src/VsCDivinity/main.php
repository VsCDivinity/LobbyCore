<?php

namespace VsCDivinity;

use pocketmine\player\Player;
use pocketmine\Server;
use pocketmine\scheduler\ClosureTask;
use pocketmine\plugin\PluginBase;
use VsCDivinity\EventListener;
use scoreboard\Scoreboard;

class Main extends PluginBase {
  
  public function OnLoad(): void {
    $this->getLogger()->notice("LobbyCore Activado");
  }
  
  public function OnEnable(): void {
    @mkdir($this->getDataFolder());
    $this->saveDefaultConfig();
    $this->getResource("config.yml");

    $this->getServer()->getPluginManager()->registerEvents(new EventListener(), $this);
    $this->getServer()->getNetwork()->setname($this->GetConfig()->get("Motd"));
    $this->getScheduler()->scheduleRepeatingTask(new ClosureTask(function (): void { $this->onScore(); }), 20);
  }
  
  private function onScore() {
        foreach ($this->getServer()->getOnlinePlayers() as $player) {
        $scoreboard = new Scoreboard("TiTle", "ScoreBoard", [$player]);
         $scoreboard->removeScoreboard();
         $scoreboard->createScoreboard();
         $scoreboard->addEntry($this->GetConfig()->get("Line1"));
         $scoreboard->addEntry($this->GetConfig()->get("Line2"));
         $scoreboard->addEntry($this->GetConfig()->get("Line3"));
         $scoreboard->addEntry($this->GetConfig()->get("Line4"));
         }
    }
}