<?php
namespace asbamboo\database;

/**
 * 数据工厂
 * 
 * @author 李春寅 <licy2013@aliyun.com>
 * @since 2018年7月7日
 */
interface FactoryInterface
{    
    /**
     * 获取操作数据信息的manager
     * 
     * @param string $id
     * @return ManagerInterface
     */
    public function getManager(string $id) : ManagerInterface;
    
    /**
     * 添加数据库连接信息
     * 
     * @param string $id
     * @param ConnectionInterface $connection
     * @return bool
     */
    public function addConnection(ConnectionInterface $Connection, string $id): FactoryInterface;
}