<?php

declare(strict_types=1);

namespace BlockHorizons\PerWorldPlayer\world\database;

use BlockHorizons\PerWorldPlayer\world\data\PlayerWorldData;
use BlockHorizons\PerWorldPlayer\world\WorldInstance;
use Closure;
use pocketmine\player\Player;

interface WorldDatabase{

	/**
	 * Loads player data from a given world.
	 *
	 * @param WorldInstance $world
	 * @param Player $player
	 * @param Closure $onLoad
	 * @phpstan-param Closure(PlayerWorldData $data) : void $onLoad
	 */
	public function load(WorldInstance $world, Player $player, Closure $onLoad) : void;

	/**
	 * Saves player data in a given world.
	 *
	 * @param WorldInstance $world
	 * @param Player $player
	 * @param PlayerWorldData $data
	 * @param int $cause what triggered the save.
	 * @param Closure $onSave
	 * @phpstan-param Closure(bool $success) : void $onSave
	 */
	public function save(WorldInstance $world, Player $player, PlayerWorldData $data, int $cause, Closure $onSave) : void;

	/**
	 * Called when plugin disables to close any open resources and other stuff.
	 */
	public function close() : void;
}