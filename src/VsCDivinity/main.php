<?php

namespace VsCDivinity;

use pocketmine\plugin\PluginBase;
use VsCDivinlty\listeners\Listeners;

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
  }
  
  
}