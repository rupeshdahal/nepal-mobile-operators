<?php

namespace RupeshDai\NepalMobileOperators;

/**
 * Enum representing mobile operators in Nepal
 */
class MobileOperator
{
    const NTC_NAMASTE = 'Ntc';
    const NCELL = 'Ncell';
    const SMART_CELL = 'Smart Cell';
    const UTL = 'UTL';
    const HELLO_MOBILE = 'Hello Mobile';
    const UNKNOWN = 'Unknown';

    /**
     * Get all operator names
     *
     * @return array
     */
    public static function getAllOperators(): array
    {
        return [
            self::NTC_NAMASTE,
            self::NCELL,
            self::SMART_CELL,
            self::UTL,
            self::HELLO_MOBILE
        ];
    }

    /**
     * Get operator details with their prefixes
     *
     * @return array
     */
    public static function getOperatorDetails(): array
    {
        return [
            self::NTC_NAMASTE => [
                'prefixes' => ['984', '985', '986', '976','974', '975'],
                'technology' => 'GSM'
            ],
            self::NCELL => [
                'prefixes' => ['980', '981', '982', '970','900','880'],
                'technology' => 'GSM'
            ],
            self::SMART_CELL => [
                'prefixes' => ['961', '962', '988'],
                'technology' => 'GSM'
            ],
            self::UTL => [
                'prefixes' => ['972'],
                'technology' => 'CDMA'
            ],
            self::HELLO_MOBILE => [
                'prefixes' => ['963'],
                'technology' => 'GSM'
            ]
        ];
    }
}
