<?php

namespace VsCDivinity;

use pocketmine\plugin\PluginBase;

class Main extends PluginBase {
  
  public function OnLoad(): void {
    $this->getLogger()->notice("LobbyCore Activado");
  }
  
  public function OnEnable(): void {
    @mkdir($this->getDataFolder());
    $this->saveDefaultConfig();
    $this->getResource("config.yml");
    
    $this->getServer()->getNetwork()->setname($this->GetConfig()->get("Motd"));
    Listeners::init();
  }
  
  
}