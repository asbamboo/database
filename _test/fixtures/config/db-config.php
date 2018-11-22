<?php
use asbamboo\database\Factory;
use asbamboo\database\Connection;

$DbFactory          = new Factory();
$sqpath             = dirname(dirname(dirname(__DIR__))) . DIRECTORY_SEPARATOR . 'var' . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'db.sqlite';
$sqmetadata         = dirname(dirname(dirname(__DIR__))) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'database';
$sqmetadata_type    = Connection::MATADATA_YAML;
$sqdir              = dirname($sqpath);

if(!is_file($sqpath)){
    @mkdir($sqdir, 0700, true);
    @file_put_contents($sqpath, '');
}

$DbFactory->addConnection(Connection::create([
    'driver'    => 'pdo_sqlite',
    'path'      => $sqpath
], $sqmetadata, $sqmetadata_type));

return $DbFactory;