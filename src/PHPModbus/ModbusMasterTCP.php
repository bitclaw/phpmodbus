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
 * ModbusMasterTcp
 *
 * This class deals with the MODBUS master using TCP. Extends ModbusMaster class.
 *
 * Implemented MODBUS functions:
 *   - FC  1: read coils
 *   - FC  3: read multiple registers
 *   - FC 15: write multiple coils
 *   - FC 16: write multiple registers
 *   - FC 23: read write registers
 *
 * @author Daniel Chavez <bitclaw@gmail.com>
 * @package PHPModbus
 *
 */
class ModbusMasterTCP extends ModbusMaster {
    /**
     * ModbusMasterTcp
     *
     * This is the constructor that defines {@link $host} IP address of the object.
     *
     * @param String $host An IP address of a Modbus TCP device. E.g. "192.168.1.1".
     */
    function ModbusMasterTcp($host){
        $this->host = $host;
        $this->socket_protocol = "TCP";
    }
}