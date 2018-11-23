<?php
namespace asbamboo\database\command;

/**
 * 同 doctrine orm:clear-cache:region:query
 *
 * @author 李春寅 <licy2013@aliyun.com>
 * @since 2018年11月22日
 */
class OrmClearCacheRegionQueryCommand extends CommandAbstract
{
    /**
     * Construct.
     */
    public function __construct()
    {
        parent::__construct();

        $this->addArgument('region-name', 'The query region to clear.');

        $this->addOption('all', null, 'If defined, all query regions will be deleted/invalidated.');
        $this->addOption('flush', null, 'If defined, If defined, all cache entries will be flushed.');
    }

    /**
     *
     * {@inheritDoc}
     * @see \asbamboo\console\command\CommandInterface::desc()
     */
    public function desc() : string
    {
        return 'Clear a second-level cache query region.';
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
    该命令功能与doctrine/orm中的orm:clear-cache:region:query相同

    The asbamboo:database:clear-cache-region-query command is meant to clear a second-level cache query region for an associated Entity Manager.
    It is possible to delete/invalidate all query region, a specific query region or flushes the cache provider.

    The execution type differ on how you execute the command.
    If you want to invalidate all entries for the default query region this command would do the work:

    asbamboo:database:clear-cache-region-query

    To invalidate entries for a specific query region you should use :

    asbamboo:database:clear-cache-region-query my_region_name

    If you want to invalidate all entries for the all query region:

    asbamboo:database:clear-cache-region-query --all

    Alternatively, if you want to flush the configured cache provider use this command:

    asbamboo:database:clear-cache-region-query my_region_name --flush

    Finally, be aware that if --flush option is passed,
    not all cache providers are able to flush entries, because of a limitation of its execution nature.


    例:
        php {$console} {$this->getName()} [options] [--] [<region-name>]
        php {$console} {$this->getName()}
HELP;
    }

    /**
     * 定义命令行名称
     *
     * @return string
     */
    public function getName() : string
    {
        return 'asbamboo:database:clear-cache-region-query';
    }

    /**
     *
     * {@inheritDoc}
     * @see \asbamboo\database\command\CommandAbstract::getDoctrineCommandName()
     */
    public function getDoctrineCommandName() : string
    {
        return  'orm:clear-cache:region:query';
    }
}