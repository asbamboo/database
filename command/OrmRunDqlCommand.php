<?php
namespace asbamboo\database\command;

/**
 * 同 doctrine orm:run-dql
 *
 * @author 李春寅 <licy2013@aliyun.com>
 * @since 2018年11月22日
 */
class OrmRunDqlCommand extends CommandAbstract
{
    /**
     * Construct.
     */
    public function __construct()
    {
        parent::__construct();
        $this->addArgument('dql', 'The DQL to execute.', '', null, true);
        $this->addOption('hydrate', 'object', 'Hydration mode of result set. Should be either: object, array, scalar or single-scalar.');
        $this->addOption('first-result', null, 'The first result in the result set.');
        $this->addOption('max-result', null, 'The maximum number of results in the result set.[必须]');
        $this->addOption('depth', 7, 'Dumping depth of Entity graph.[必须]');
        $this->addOption('show-sql', null, 'Dump generated SQL instead of executing query');
    }

    /**
     *
     * {@inheritDoc}
     * @see \asbamboo\console\command\CommandInterface::desc()
     */
    public function desc() : string
    {
        return 'Executes arbitrary DQL directly from the command line.';
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
    该命令功能与doctrine/orm中的orm:run-dql相同

    Executes arbitrary DQL directly from the command line

    使用:

      php {$console} {$this->getName()} [options] [--] <dql>
HELP;
    }

    /**
     * 定义命令行名称
     *
     * @return string
     */
    public function getName() : string
    {
        return 'asbamboo:database:run-dql';
    }

    /**
     *
     * {@inheritDoc}
     * @see \asbamboo\database\command\CommandAbstract::getDoctrineCommandName()
     */
    public function getDoctrineCommandName() : string
    {
        return  'orm:run-dql';
    }
}