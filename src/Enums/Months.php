<?php

namespace PropaySystems\Utilities\Enums;

enum Months
{
    case JANUARY;

    case FEBRUARY;

    case MARCH;

    case APRIL;

    case MAY;

    case JUNE;

    case JULY;

    case AUGUST;

    case SEPTEMBER;

    case OCTOBER;

    case NOVEMBER;

    case DECEMBER;

    public function number(): string
    {
        return match($this)
        {
            self::JANUARY => '01',
            self::FEBRUARY => '02',
            self::MARCH => '03',
            self::APRIL => '04',
            self::MAY => '05',
            self::JUNE => '06',
            self::JULY => '07',
            self::AUGUST => '08',
            self::SEPTEMBER => '09',
            self::OCTOBER => '10',
            self::NOVEMBER => '11',
            self::DECEMBER => '12',
        };
    }

    public function abbreviation(): string
    {
        return match($this)
        {
            self::JANUARY => 'Jan',
            self::FEBRUARY => 'Feb',
            self::MARCH => 'Mar',
            self::APRIL => 'Apr',
            self::MAY => 'May',
            self::JUNE => 'Jun',
            self::JULY => 'Jul',
            self::AUGUST => 'Aug',
            self::SEPTEMBER => 'Sep',
            self::OCTOBER => 'Oct',
            self::NOVEMBER => 'Nov',
            self::DECEMBER => 'Dec',
        };
    }

}
