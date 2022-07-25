<?php

namespace VsCDivinity;

use pocketmine\plugin\PluginBase;
use VsCDivinity\Scoreboard\ScoreboardTask;

class Main extends PluginBase {
  
  public function OnLoad(): void {
    $this->getLogger()->notice("LobbyCore Activado");
  }
  
  public function OnEnable(): void {
    @mkdir($this->getDataFolder());
    $this->saveDefaultConfig();
    $this->getResource("config.yml");
    
    $this->getServer()->getNetwork()->setname($this->GetConfig()->get("Motd"));
    $this->getServer()->getPluginManager()->registerEvents(new EventListener(), $this);
    $this->getScheduler()->scheduleRepeatingTask(new ClosureTask(function (): void { $this->onScore(); }), 20);
  }
  
}