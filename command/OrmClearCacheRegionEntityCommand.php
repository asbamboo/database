<?php
namespace asbamboo\database\command;

/**
 * 同 doctrine orm:clear-cache:region:entity
 *
 * @author 李春寅 <licy2013@aliyun.com>
 * @since 2018年11月22日
 */
class OrmClearCacheRegionEntityCommand extends CommandAbstract
{
    /**
     * Construct
     */
    public function __construct()
    {
        parent::__construct();
        $this->addOption('all', null, 'If defined, all entity regions will be deleted/invalidated.');
        $this->addOption('flush', null, 'If defined, all cache entries will be flushed.');
        $this->addArgument('entity-class', 'The entity name.');
        $this->addArgument('entity-id', 'The entity identifier.');
    }

    /**
     *
     * {@inheritDoc}
     * @see \asbamboo\console\command\CommandInterface::desc()
     */
    public function desc() : string
    {
        return 'Clear a second-level cache entity region';
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
    该命令功能与doctrine/orm中的orm:clear-cache:region:entity相同

    The asbamboo:database:clear-cache-region-entity command is meant to clear a second-level cache entity region for an associated Entity Manager.
    It is possible to delete/invalidate all entity region, a specific entity region or flushes the cache provider.

    The execution type differ on how you execute the command.
    If you want to invalidate all entries for an entity region this command would do the work:

    asbamboo:database:clear-cache-region-entity 'Entities\MyEntity'

    To invalidate a specific entry you should use :

    asbamboo:database:clear-cache-region-entity 'Entities\MyEntity' 1

    If you want to invalidate all entries for the all entity regions:

    asbamboo:database:clear-cache-region-entity --all

    Alternatively, if you want to flush the configured cache provider for an entity region use this command:

    asbamboo:database:clear-cache-region-entity 'Entities\MyEntity' --flush

    Finally, be aware that if --flush option is passed,
    not all cache providers are able to flush entries, because of a limitation of its execution nature.

    使用:
        php {$console} {$this->getName()} [options] [--] [<entity-class> [<entity-id>]]
HELP;
    }

    /**
     * 定义命令行名称
     *
     * @return string
     */
    public function getName() : string
    {
        return 'asbamboo:database:clear-cache-region-entity';
    }

    /**
     *
     * {@inheritDoc}
     * @see \asbamboo\database\command\CommandAbstract::getDoctrineCommandName()
     */
    public function getDoctrineCommandName() : string
    {
        return 'orm:clear-cache:region:entity';
    }
}