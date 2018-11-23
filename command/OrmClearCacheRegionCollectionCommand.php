<?php
namespace asbamboo\database\command;

/**
 * 同 doctrine orm:clear-cache:region:collection
 *
 * @author 李春寅 <licy2013@aliyun.com>
 * @since 2018年11月22日
 */
class OrmClearCacheRegionCollectionCommand extends CommandAbstract
{
    /**
     * Construct
     */
    public function __construct()
    {
        parent::__construct();
        $this->addOption('all', null, 'If defined, all cache entries will be flushed.');
        $this->addOption('flush', null, 'If defined, cache entries will be flushed instead of deleted/invalidated.');
        $this->addArgument('owner-class', 'The owner entity name.');
        $this->addArgument('association', 'The association collection name.');
        $this->addArgument('owner-id', 'The owner identifier.');
    }

    /**
     *
     * {@inheritDoc}
     * @see \asbamboo\console\command\CommandInterface::desc()
     */
    public function desc() : string
    {
        return 'Clear a second-level cache collection region';
    }

    /**
     *
     * {@inheritDoc}
     * @see \asbamboo\console\command\CommandInterface::help()
     */
    public function help() : string
    {
        $console    = $_SERVER['SCRIPT_FILENAME'];
        return <<<HELP
    该命令功能与doctrine/orm中的orm:clear-cache:region:collection相同

    The asbamboo:database:clear-cache-region-collection command is meant to clear a second-level cache collection regions for an associated Entity Manager.
    It is possible to delete/invalidate all collection region, a specific collection region or flushes the cache provider.

    The execution type differ on how you execute the command.
    If you want to invalidate all entries for an collection region this command would do the work:

    asbamboo:database:clear-cache-region-collection 'Entities\MyEntity' 'collectionName'

    To invalidate a specific entry you should use :

    asbamboo:database:clear-cache-region-collection 'Entities\MyEntity' 'collectionName' 1

    If you want to invalidate all entries for the all collection regions:

    asbamboo:database:clear-cache-region-collection --all

    Alternatively, if you want to flush the configured cache provider for an collection region use this command:

    asbamboo:database:clear-cache-region-collection 'Entities\MyEntity' 'collectionName' --flush

    Finally, be aware that if --flush option is passed,
    not all cache providers are able to flush entries, because of a limitation of its execution nature.

    使用:
        php {$console} {$this->getName()} [options] [--] [<owner-class> [<association> [<owner-id>]]]
HELP;
    }

    /**
     * 定义命令行名称
     *
     * @return string
     */
    public function getName() : string
    {
        return 'asbamboo:database:clear-cache-region-collection';
    }

    /**
     *
     * {@inheritDoc}
     * @see \asbamboo\database\command\CommandAbstract::getDoctrineCommandName()
     */
    public function getDoctrineCommandName() : string
    {
        return 'orm:clear-cache:region:collection';
    }
}