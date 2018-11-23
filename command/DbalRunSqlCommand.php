<?php
namespace asbamboo\database\command;

/**
 * 同 doctrine dbal:run-sql
 *
 * @author 李春寅 <licy2013@aliyun.com>
 * @since 2018年11月22日
 */
class DbalRunSqlCommand extends CommandAbstract
{
    public function __construct()
    {
        parent::__construct();
        $this->addArgument('sql', 'The SQL statement to execute.', '', null, true);
        $this->addOption('depth', 7, 'Dumping depth of result set.');
        $this->addOption('force-fetch', null, 'Forces fetching the result.');
    }

    /**
     *
     * {@inheritDoc}
     * @see \asbamboo\console\command\CommandInterface::desc()
     */
    public function desc() : string
    {
        return 'Executes arbitrary SQL directly from the command line.';
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
    该命令功能与doctrine/orm中的dbal:run-sql相同
    使用:
        php {$console} {$this->getName()} [options] [--] <sql>
HELP;
    }

    /**
     * 定义命令行名称
     *
     * @return string
     */
    public function getName() : string
    {
        return 'asbamboo:database:dbal-run-sql';
    }

    /**
     *
     * {@inheritDoc}
     * @see \asbamboo\database\command\CommandAbstract::getDoctrineCommandName()
     */
    public function getDoctrineCommandName() : string
    {
        return 'dbal:run-sql';
    }
}