<?php
namespace asbamboo\database\command;

/**
 * 同 doctrine orm:generate-repositories
 *
 * @author 李春寅 <licy2013@aliyun.com>
 * @since 2018年11月22日
 */
class OrmGenerateRepositoriesCommand extends CommandAbstract
{
    /**
     * Construct.
     */
    public function __construct()
    {
        parent::__construct();
        $this->addArgument('dest-path', 'The path to generate your repository classes.', '', null, true);
        $this->addOption('filter', null, 'A string pattern used to match entities that should be processed.');
    }

    /**
     *
     * {@inheritDoc}
     * @see \asbamboo\console\command\CommandInterface::desc()
     */
    public function desc() : string
    {
        return 'Generate repository classes from your mapping information.';
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
    该命令功能与doctrine/orm中的orm:generate-repositories相同

    Generate repository classes from your mapping information.

    例:
        php {$console} {$this->getName()} [options] [--] <dest-path>
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
        return 'asbamboo:database:generate-repositories';
    }

    /**
     *
     * {@inheritDoc}
     * @see \asbamboo\database\command\CommandAbstract::getDoctrineCommandName()
     */
    public function getDoctrineCommandName() : string
    {
        return  'orm:generate-repositories';
    }
}