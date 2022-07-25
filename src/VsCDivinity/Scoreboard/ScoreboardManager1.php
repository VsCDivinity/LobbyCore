<?php

namespace VsCDivinity\scoreboard;

use pocketmine\network\mcpe\protocol\RemoveObjectivePacket;
use pocketmine\network\mcpe\protocol\SetDisplayObjectivePacket;
use pocketmine\network\mcpe\protocol\SetScorePacket;
use pocketmine\network\mcpe\protocol\types\ScorePacketEntry;
use pocketmine\player\Player;

class ScoreboardManager {

  public static array $scoreboard = [];

  public static function getObjectiveName(Player $sender): ?string {
    return isset(self::$scoreboard[$sender->getName()]) ? self::$scoreboard[$sender->getName()] : null;
  }

  public static function remove(Player $sender): void {
    $objectiveName = self::getObjectiveName($sender);
    $sender->getNetworkSession()->sendDataPacket(RemoveObjectivePacket::create(
      $objectiveName
    ));
    unset(self::$scoreboard[$sender->getName()]);
  }

  public static function new(Player $sender, string $objectiveName, string $displayName): void {
    if(isset(self::$scoreboard[$sender->getName()])) {
      self::remove($sender);
    }
    $sender->getNetworkSession()->sendDataPacket(SetDisplayObjectivePacket::create(
      "sidebar",
      $objectiveName,
      $displayName,
      "dummy",
      0
    ));
    self::$scoreboard[$sender->getName()] = $objectiveName;
  }

  public static function setLine(Player $sender, int $score, string $message): void {
    if(!isset(self::$scoreboard[$sender->getName()])) {
      return;
    }
    if($score > 15 || $score < 1) {
      return;
    }

    $objectiveName = self::getObjectiveName($sender);
    $entry = new ScorePacketEntry();
    $entry->objectiveName = $objectiveName;
    $entry->type = $entry::TYPE_FAKE_PLAYER;
    $entry->customName = $message;
    $entry->score = $score;
    $entry->scoreboardId = $score;

    $pk = new SetScorePacket();
    $pk->type = $pk::TYPE_CHANGE;
    $pk->entries[] = $entry;

    $sender->getNetworkSession()->sendDataPacket($pk);
  }



}