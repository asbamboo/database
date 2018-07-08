<?php
namespace asbamboo\database;

use Doctrine\DBAL\Driver\Connection;

/**
 * 数据库连接接口
 * - 基于Doctrine
 * 
 * @author 李春寅 <licy2013@aliyun.com>
 * @since 2018年7月8日
 */
interface ConnectionInterface extends Connection
{
    /**
     * metadata 类型
     * @var integer
     */
    CONST MATADATA_ANNOTATION   = 1;
    CONST MATADATA_YAML         = 2;
    CONST MATADATA_XML          = 3;
    
    /**
     * 新建一个实现connection接口的实例
     * 
     * @param array $params
     * @param string $metadata_config
     * @param int $metadata_type
     * @param bool $is_dev
     * @return ConnectionInterface
     */
    public static function create(array $params, string $metadata_config = '', int $metadata_type = 0, bool $is_dev): ConnectionInterface;
}