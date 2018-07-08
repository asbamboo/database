<?php
namespace asbamboo\database;

use asbamboo\database\exception\NotFoundConnectionException;

/**
 * 
 * @author 李春寅 <licy2013@aliyun.com>
 * @since 2018年7月8日
 */
class Factory implements FactoryInterface
{
    /**
     * 
     * @var array
     */
    private $connections    = [];
    
    /**
     * 
     * @var array
     */
    private $managers       = [];
    
    /**
     * 
     * {@inheritDoc}
     * @see \asbamboo\database\FactoryInterface::getManager()
     */
    public function getManager(string $id="default") : ManagerInterface
    {
        /**
         * @var Connection $conn
         */
        if(!isset($this->connections[$id])){
            throw new NotFoundConnectionException(sprintf('未找到对应的数据库连接信息:%s', $id));
        }
        if(!isset($this->managers[$id])){
            $conn                   = $this->connections[$id];
            $config                 = $conn->getConfiguration();
            $eventManager           = $conn->getEventManager();
            $this->managers[$id]    = new Manager($conn, $config, $eventManager);
        }
        
        return $this->managers[$id];
    }
    
    /**
     * 
     * {@inheritDoc}
     * @see \asbamboo\database\FactoryInterface::addConnection()
     */
    public function addConnection(ConnectionInterface $Connection, string $id = 'default') : FactoryInterface
    {
        $this->connections[$id]    = $Connection;
        
        return $this;
    }
}