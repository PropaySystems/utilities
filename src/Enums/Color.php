<?php

namespace PropaySystems\Utilities\Enums;

enum Color
{
    case PRIMARY;

    case GRAY;

    case BLUE;

    case GREEN;

    case YELLOW;

    case RED;

    case ORANGE;

    case TEAL;

    case CYAN;

    case INDIGO;

    case PINK;

    /*
     * Get the color id
     */
    public function id(): string
    {
        return match ($this) {
            self::PRIMARY => 1,
            self::GRAY => 2,
            self::BLUE => 3,
            self::GREEN => 4,
            self::YELLOW => 5,
            self::RED => 5,
            self::ORANGE => 7,
            self::TEAL => 8,
            self::CYAN => 9,
            self::INDIGO => 10,
            self::PINK => 11,
        };
    }

    /*
     * Get the color pallet name
     */
    public function hex(): string
    {
        return match ($this) {
            self::PRIMARY => '#004899',
            self::GRAY => '#6b7280',
            self::BLUE => '#3b82f6',
            self::GREEN => '#22c55e',
            self::YELLOW => '#eab308',
            self::RED => '#ef4444',
            self::ORANGE => '#f97316',
            self::TEAL => '#14b8a6',
            self::CYAN => '#06b6d4',
            self::INDIGO => '#6366f1',
            self::PINK => '#ec4899',
        };
    }
}
