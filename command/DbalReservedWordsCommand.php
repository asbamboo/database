<?php
namespace asbamboo\database\command;

/**
 * 同 doctrine dbal:reserved-words
 *
 * @author 李春寅 <licy2013@aliyun.com>
 * @since 2018年11月22日
 */
class DbalReservedWordsCommand extends CommandAbstract
{
    public function __construct()
    {
        parent::__construct();
        $this->addOption('list', null, 'Keyword-List name.', 'l');
    }

    /**
     *
     * {@inheritDoc}
     * @see \asbamboo\console\command\CommandInterface::desc()
     */
    public function desc() : string
    {
        return 'Checks if the current database contains identifiers that are reserved.';
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
    该命令功能与doctrine/orm中的dbal:reserved-words相同

    Checks if the current database contains tables and columns
    with names that are identifiers in this dialect or in other SQL dialects.

    By default SQLite, MySQL, PostgreSQL, Microsoft SQL Server, Oracle
    and SQL Anywhere keywords are checked:

      php {$console} {$this->getName()}

    If you want to check against specific dialects you can
    pass them to the command:

      php {$console} {$this->getName()} --list=mysql --list=pgsql

    The following keyword lists are currently shipped with Doctrine:

      * mysql
      * mysql57
      * mysql80
      * pgsql
      * pgsql92
      * sqlite
      * oracle
      * sqlserver
      * sqlserver2005
      * sqlserver2008
      * sqlserver2012
      * sqlanywhere
      * sqlanywhere11
      * sqlanywhere12
      * sqlanywhere16
      * db2 (Not checked by default)
HELP;
    }

    /**
     * 定义命令行名称
     *
     * @return string
     */
    public function getName() : string
    {
        return 'asbamboo:database:dbal-reserved-words';
    }

    /**
     *
     * {@inheritDoc}
     * @see \asbamboo\database\command\CommandAbstract::getDoctrineCommandName()
     */
    public function getDoctrineCommandName() : string
    {
        return 'dbal:reserved-words';
    }
}