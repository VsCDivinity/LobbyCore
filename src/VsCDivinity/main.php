<?php

namespace VsCDivinity;

use pocketmine\plugin\PluginBase;
use VsCDivinity\EventListener;
use VsCDivinity\Scoreboard\Scoreboard;
use VsCDivinity\Commands\FlyCommand;
use VsCDivinity\Commands\PingCommand;
use VsCDivinity\Commands\MenuCommand;

class Main extends PluginBase {
  
  public function OnLoad(): void {
    $this->getLogger()->notice("LobbyCore Activado");
  }
  
  public function OnEnable(): void {
    @mkdir($this->getDataFolder());
    $this->saveDefaultConfig();
    $this->getResource("config.yml");
     
    $this->getServer()->getCommandMap()->register('fly', new FlyCommand());
    $this->getServer()->getCommandMap()->register('ping', new PingCommand());
    $this->getServer()->getCommandMap()->register('menu', new MenuCommand());
    $this->getServer()->getPluginManager()->registerEvents(new EventListener(), $this);
    $this->getServer()->getPluginManager()->registerEvents(new Scoreboard(), $this);
    $this->getServer()->getNetwork()->setname($this->GetConfig()->get("Motd"));
  }
  
}