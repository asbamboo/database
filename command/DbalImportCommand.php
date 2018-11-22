<?php
namespace asbamboo\database\command;

/**
 * 同 doctrine dbal:import
 *
 * @author 李春寅 <licy2013@aliyun.com>
 * @since 2018年11月22日
 */
class DbalImportCommand extends CommandAbstract
{
    public function __construct()
    {
        parent::__construct();
        $this->addArgument('file', 'File path(s) of SQL to be executed.', '', null, true);
    }

    /**
     *
     * {@inheritDoc}
     * @see \asbamboo\console\command\CommandInterface::desc()
     */
    public function desc() : string
    {
        return 'Import SQL file(s) directly to Database.';
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
    该命令功能与doctrine/orm中的dbal:import相同
    例: php {$console} {$this->getName()} <file-path>
HELP;
    }

    /**
     * 定义命令行名称
     *
     * @return string
     */
    public function getName() : string
    {
        return 'asbamboo:database:dbal-import';
    }

    /**
     *
     * {@inheritDoc}
     * @see \asbamboo\database\command\CommandAbstract::getDoctrineCommandName()
     */
    public function getDoctrineCommandName() : string
    {
        return 'dbal:import';
    }
}