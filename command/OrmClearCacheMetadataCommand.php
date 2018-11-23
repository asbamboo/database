<?php
namespace asbamboo\database\command;

/**
 * 同 doctrine orm:clear-cache:metadata
 *
 * @author 李春寅 <licy2013@aliyun.com>
 * @since 2018年11月22日
 */
class OrmClearCacheMetadataCommand extends CommandAbstract
{
    /**
     * Construct
     */
    public function __construct()
    {
        parent::__construct();
        $this->addOption('flush', null, 'If defined, cache entries will be flushed instead of deleted/invalidated.');
    }

    /**
     *
     * {@inheritDoc}
     * @see \asbamboo\console\command\CommandInterface::desc()
     */
    public function desc() : string
    {
        return 'Clear all metadata cache of the various cache drivers';
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
    该命令功能与doctrine/orm中的orm:clear-cache:metadata相同

    The asbamboo:database:clear-cache-metadata command is meant to clear the metadata cache of associated Entity Manager.
    It is possible to invalidate all cache entries at once - called delete -, or flushes the cache provider
    instance completely.

    The execution type differ on how you execute the command.
    If you want to invalidate the entries (and not delete from cache instance), this command would do the work:

    asbamboo:database:clear-cache-metadata

    Alternatively, if you want to flush the cache provider using this command:

    asbamboo:database:clear-cache-metadata --flush

    Finally, be aware that if --flush option is passed, not all cache providers are able to flush entries,
    because of a limitation of its execution nature.

    使用:
        php {$console} {$this->getName()} [options]
HELP;
    }

    /**
     * 定义命令行名称
     *
     * @return string
     */
    public function getName() : string
    {
        return 'asbamboo:database:clear-cache-metadata';
    }

    /**
     *
     * {@inheritDoc}
     * @see \asbamboo\database\command\CommandAbstract::getDoctrineCommandName()
     */
    public function getDoctrineCommandName() : string
    {
        return 'orm:clear-cache:metadata';
    }
}