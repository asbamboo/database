<?php
namespace asbamboo\database\_test;

use PHPUnit\Framework\TestCase;
use asbamboo\database\Connection;
use asbamboo\database\Factory;
use asbamboo\database\Manager;

/**
 * 
 * @author 李春寅 <licy2013@aliyun.com>
 * @since 2018年7月8日
 */
class FactoryTest extends TestCase
{    
    public function testAddConnectionSetId()
    {
        $Factory    = new Factory();
        $Connection = Connection::create([
            'driver'    => 'pdo_sqlite',
            'path'      => __DIR__ . DIRECTORY_SEPARATOR . 'fixtures' . DIRECTORY_SEPARATOR . 'db.sqlite',
        ], __DIR__ . DIRECTORY_SEPARATOR . 'fixtures', Connection::MATADATA_ANNOTATION);
        $Factory->addConnection($Connection, 'default_id');
        $Manager    = $Factory->getManager('default_id');
        $this->assertInstanceOf(Manager::class, $Manager);
    }
    
    public function testAddConnectionNotSetId()
    {
        $Factory    = new Factory();
        $Connection = Connection::create([
            'driver'    => 'pdo_sqlite',
            'path'      => __DIR__ . DIRECTORY_SEPARATOR . 'fixtures' . DIRECTORY_SEPARATOR . 'db.sqlite',
        ], __DIR__ . DIRECTORY_SEPARATOR . 'fixtures', Connection::MATADATA_ANNOTATION);
        $Factory->addConnection($Connection);
        $Manager    = $Factory->getManager();
        $this->assertInstanceOf(Manager::class, $Manager);
    }
}