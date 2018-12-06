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
     * {@inheritDoc}
     * @see \asbamboo\database\ConnectionInterface::create()
     */
    public static function create(array $params, /*string|array*/ $metadata_config, string $metadata_type, bool $is_dev = false) : ConnectionInterface
    {
        switch ($metadata_type){
            case ConnectionInterface::MATADATA_ANNOTATION:
                $config = Setup::createAnnotationMetadataConfiguration((array) $metadata_config, $is_dev);
                break;
            case ConnectionInterface::MATADATA_YAML:
                $config = Setup::createYAMLMetadataConfiguration((array) $metadata_config, $is_dev);
                break;
            case ConnectionInterface::MATADATA_XML:
                $config = Setup::createXMLMetadataConfiguration((array) $metadata_config, $is_dev);
                break;
        }
        $params['wrapperClass'] = __CLASS__;
        return DriverManager::getConnection($params, $config);
    }
}