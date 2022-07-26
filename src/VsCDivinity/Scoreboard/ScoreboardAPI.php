<?php


namespace Test;

use pocketmine\network\mcpe\protocol\RemoveObjectivePacket;
use pocketmine\network\mcpe\protocol\SetDisplayObjectivePacket;
use pocketmine\network\mcpe\protocol\SetScorePacket;
use pocketmine\network\mcpe\protocol\types\ScorePacketEntry;
use pocketmine\player\Player;

//Scoreboard API for only PM4!
//idk if it will works for PM5
class ScoreboardAPI
{
    public function remove(Player $player): void
    {
        $packet = RemoveObjectivePacket::create($player->getName());
        $player->getNetworkSession()->sendDataPacket($packet);
    }

    public function create(Player $player, string $title): void
    {
        $packet = SetDisplayObjectivePacket::create("sidebar", $player->getName(), " {$title} ", "dummy", 0);
        $player->getNetworkSession()->sendDataPacket($packet);
    }

    public function setLine(Player $player, int $line, string $text): void
    {
        $entry = new ScorePacketEntry();
        $entry->scoreboardId = $line;
        $entry->objectiveName = $player->getName();
        $entry->score = $line;
        $entry->type = $entry::TYPE_FAKE_PLAYER;
        $entry->customName = " {$text} ";

        $packet = SetScorePacket::create(SetScorePacket::TYPE_CHANGE, [$entry]);
        $player->getNetworkSession()->sendDataPacket($packet);
    }

    public function removeLine(Player $player, int $line): void
    {
        $entry = new ScorePacketEntry();
        $entry->scoreboardId = $line;
        $entry->objectiveName = $player->getName();
        $entry->score = $line;
        $entry->type = $entry::TYPE_FAKE_PLAYER;

        $packet = SetScorePacket::create(SetScorePacket::TYPE_REMOVE, [$entry]);
        $player->getNetworkSession()->sendDataPacket($packet);
    }
}