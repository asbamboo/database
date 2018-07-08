<?php
namespace asbamboo\database;

use Doctrine\DBAL\Connection AS DoctrineConnection;
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\Tools\Setup;

/**
 * 数据库连接
 *  - 基于doctrine
 * 
 * @author 李春寅 <licy2013@aliyun.com>
 * @since 2018年7月8日
 */
class Connection extends DoctrineConnection implements ConnectionInterface
{
    /**
     * 
     * @param array $params
     * @param string $metadata_config
     * @param string $metadata_type
     * @param bool $is_dev
     * @return ConnectionInterface
     */
    public static function create(array $params, string $metadata_config, string $metadata_type, bool $is_dev = false) : ConnectionInterface
    {
        switch ($metadata_type){
            case ConnectionInterface::MATADATA_ANNOTATION:
                $config = Setup::createAnnotationMetadataConfiguration([$metadata_config], $is_dev);
                break;
            case ConnectionInterface::MATADATA_YAML:
                $config = Setup::createYAMLMetadataConfiguration([$metadata_config], $is_dev);
                break;
            case ConnectionInterface::MATADATA_XML:
                $config = Setup::createXMLMetadataConfiguration([$metadata_config], $is_dev);
                break;
        }
        $params['wrapperClass'] = __CLASS__;
        return DriverManager::getConnection($params, $config);
    }
}