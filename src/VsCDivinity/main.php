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
  
}