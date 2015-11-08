# phpmodbus

## Implementation of the basic functionality of the Modbus TCP and UDP based protocol using PHP. 

Implemented features:
 * Modbus master
  * FC1 - Read coils 
  * FC2 - Read input discretes
  * FC3 - Read holding registers 
  * FC4 - Read holding input registers 
  * FC5 - Write single coil 
  * FC6 - Write single register
  * FC15 - Write multiple coils
  * FC16 - Write multiple registers
  * FC23 - Read/Write multiple registers

## Installation

* Run the command ```composer install```

## PHPUnit 

To run the PHPUnit tests , use the following command:



```shell
# Run single file
php bin/phpunit --configuration tests/phpunit.xml tests/PHPModbus/Test/PHPModbusTest.php
#Run whole suite
php bin/phpunit --configuration tests/phpunit.xml 
```
