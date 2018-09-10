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
    CONST MATADATA_ANNOTATION   = 'annotation';
    CONST MATADATA_YAML         = 'yaml';
    CONST MATADATA_XML          = 'xml';
    
    /**
     * 新建一个实现connection接口的实例
     * 
     * @param array $params
     * @param string $metadata_config
     * @param int $metadata_type 取值范围是常量 ConnectionInterface::MATADATA_*
     * @param bool $is_dev
     * @return ConnectionInterface
     */
    public static function create(array $params, string $metadata_config, string $metadata_type, bool $is_dev): ConnectionInterface;
}