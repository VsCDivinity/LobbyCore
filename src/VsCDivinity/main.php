<?php

namespace VsCDivinity;

use pocketmine\plugin\PluginBase;
use VsCDivinity\EventListener;
use VsCDivinity\Scoreboard\ScoreboardTask;

class Main extends PluginBase {
  
  public function OnLoad(): void {
    $this->getLogger()->notice("LobbyCore Activado");
  }
  
  public function OnEnable(): void {
    @mkdir($this->getDataFolder());
    $this->saveDefaultConfig();
    $this->getResource("config.yml");

    $this->getServer()->getPluginManager()->registerEvents(new EventListener(), $this);
    $this->getServer()->getPluginManager()->registerEvents(new ScoreboardTask(), $this);
    $this->getServer()->getNetwork()->setname($this->GetConfig()->get("Motd"));
    $this->getScheduler()->scheduleRepeatingTask(new ScoreboardTask($this), 30);
  }
  
}