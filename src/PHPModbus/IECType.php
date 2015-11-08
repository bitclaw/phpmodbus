<?php
/*
 * This file is part of PHPModbus.
 *
 * (c) Daniel Chavez <bitclaw@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PHPModbus;

/**
 * IecType
 *
 * The class includes set of IEC-1131 data type functions that converts a PHP
 * data types to a IEC data type.
 *
 * @author Daniel Chavez <bitclaw@gmail.com>
 * @package PHPModbus
 */
class IECType {

    /**
     *
     * Converts a value to IEC-1131 BYTE data type
     *
     * @param $value : value from 0 to 255
     * @return string : IEC BYTE data type
     */
    public static function iecBYTE($value) {
        return chr($value & 0xFF);
    }

    /**
     * @param $value : value to be converted
     * @return string : IEC-1131 INT data type
     */
    public static function iecINT($value) {
        return self::iecBYTE(($value >> 8) & 0x00FF) .
        self::iecBYTE(($value & 0x00FF));
    }

    /**
     *
     * Converts a value to IEC-1131 DINT data type
     *
     * @param $value : Converts a value to IEC-1131 DINT data type
     * @param int $endianness : endianness defines endian codding (little endian == 0, big endian == 1)
     * @return int : value IEC-1131 INT data type
     */
    public static function iecDINT($value, $endianness = 0) {
        // result with right endianness
        return self::endianness($value, $endianness);
    }

    /**
     *
     * Converts a value to IEC-1131 REAL data type. The function uses function  @use float2iecReal.
     *
     * @param $value : value to be converted
     * @param int $endianness : endianness defines endian codding (little endian == 0, big endian == 1)
     * @return int : IEC-1131 REAL data type
     */
    public static function iecREAL($value, $endianness = 0) {
        // iecREAL representation
        $real = self::float2iecReal($value);
        // result with right endianness
        return self::endianness($real, $endianness);
    }

    /**
     *
     * This function converts float value to IEC-1131 REAL single precision form.
     *
     * For more see [{@link http://en.wikipedia.org/wiki/Single_precision Single precision on Wiki}] or
     * [{@link http://de.php.net/manual/en/function.base-convert.php PHP base_convert function commentary}, Todd Stokes @ Georgia Tech 21-Nov-2007] or
     * [{@link http://www.php.net/manual/en/function.pack.php PHP pack/unpack functionality}]
     *
     * @param $value : float value to be converted
     * @return mixed : value IEC REAL data type
     */
    private function float2iecReal($value) {
        // get float binary string
        $float = pack("f", $value);
        // set 32-bit unsigned integer of the float
        $w = unpack("L", $float);
        return $w[1];
    }

    /**
     *
     * Make endianess as required.
     * For more see http://en.wikipedia.org/wiki/Endianness
     *
     * @param $value
     * @param int $endianness
     * @return string
     */
    private function endianness($value, $endianness = 0) {
        if ($endianness == 0)
            return
                self::iecBYTE(($value >> 8) & 0x000000FF) .
                self::iecBYTE(($value & 0x000000FF)) .
                self::iecBYTE(($value >> 24) & 0x000000FF) .
                self::iecBYTE(($value >> 16) & 0x000000FF);
        else
            return
                self::iecBYTE(($value >> 24) & 0x000000FF) .
                self::iecBYTE(($value >> 16) & 0x000000FF) .
                self::iecBYTE(($value >> 8) & 0x000000FF) .
                self::iecBYTE(($value & 0x000000FF));
    }

}