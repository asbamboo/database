<?php
namespace asbamboo\database\_test;

use PHPUnit\Framework\TestCase;
use asbamboo\database\Connection;

/**
 * 
 * @author 李春寅 <licy2013@aliyun.com>
 * @since 2018年7月8日
 */
class ConnectionTest extends TestCase
{
    public function testCreateAnnotation()
    {
        $Connection = Connection::create([
            'driver'    => 'pdo_sqlite',
            'path'      => __DIR__ . DIRECTORY_SEPARATOR . 'fixtures' . DIRECTORY_SEPARATOR . 'db.sqlite',
        ], __DIR__ . DIRECTORY_SEPARATOR . 'fixtures', Connection::MATADATA_ANNOTATION);
        
        $this->assertInstanceOf(Connection::class, $Connection);
    }

    public function testCreateYaml()
    {
        $Connection = Connection::create([
            'driver'    => 'pdo_sqlite',
            'path'      => __DIR__ . DIRECTORY_SEPARATOR . 'fixtures' . DIRECTORY_SEPARATOR . 'db.sqlite',
        ], __DIR__ . DIRECTORY_SEPARATOR . 'fixtures', Connection::MATADATA_YAML);
        
        $this->assertInstanceOf(Connection::class, $Connection);
    }

    public function testCreateXml()
    {
        $Connection = Connection::create([
            'driver'    => 'pdo_sqlite',
            'path'      => __DIR__ . DIRECTORY_SEPARATOR . 'fixtures' . DIRECTORY_SEPARATOR . 'db.sqlite',
        ], __DIR__ . DIRECTORY_SEPARATOR . 'fixtures', Connection::MATADATA_XML);
        
        $this->assertInstanceOf(Connection::class, $Connection);
    }
}