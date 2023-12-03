<?php

/*
 * By adding type hints and enabling strict type checking, code can become
 * easier to read, self-documenting and reduce the number of potential bugs.
 * By default, type declarations are non-strict, which means they will attempt
 * to change the original type to match the type specified by the
 * type-declaration.
 *
 * In other words, if you pass a string to a function requiring a float,
 * it will attempt to convert the string value to a float.
 *
 * To enable strict mode, a single declare directive must be placed at the top
 * of the file.
 * This means that the strictness of typing is configured on a per-file basis.
 * This directive not only affects the type declarations of parameters, but also
 * a function's return type.
 *
 * For more info review the Concept on strict type checking in the PHP track
 * <link>.
 *
 * To disable strict typing, comment out the directive below.
 */

declare(strict_types=1);

class DndCharacter
{
    public int $strength;
    public int $dexterity;
    public int $constitution;
    public int $intelligence;
    public int $wisdom;
    public int $charisma;
    public int $hitpoints;
    public function __construct()
    {
        $this->strength = self::ability();
        $this->dexterity = self::ability();
        $this->constitution = self::ability();
        $this->intelligence = self::ability();
        $this->wisdom = self::ability();
        $this->charisma = self::ability();
        $this->hitpoints = (int)(10 + self::modifier($this->constitution));
    }

    public static function modifier($stat_value): int
    {
        return (int)floor((($stat_value - 10) / 2));
    }

    public static function ability(): int
    {
        $dice_rolls = [rand(1,6), rand(1,6), rand(1,6), rand(1,6)];
        arsort($dice_rolls);
        return $dice_rolls[0] + $dice_rolls[1] + $dice_rolls[2];

    }

    public static function generate(): DndCharacter
    {
        return new DndCharacter;
    }
}
