<?php
namespace asbamboo\database\command;

/**
 * 同 doctrine orm:generate-proxies
 *
 * @author 李春寅 <licy2013@aliyun.com>
 * @since 2018年11月22日
 */
class OrmGenerateProxiesCommand extends CommandAbstract
{
    /**
     * Construct.
     */
    public function __construct()
    {
        parent::__construct();
        $this->addArgument('dest-path', 'The path to generate your proxy classes. If none is provided, it will attempt to grab from configuration.');
        $this->addOption('filter', null, 'A string pattern used to match entities that should be processed.');
    }

    /**
     *
     * {@inheritDoc}
     * @see \asbamboo\console\command\CommandInterface::desc()
     */
    public function desc() : string
    {
        return 'Generates proxy classes for entity classes.';
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
    该命令功能与doctrine/orm中的orm:generate-proxies相同

    Generates proxy classes for entity classes.

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
        return 'asbamboo:database:generate-proxies';
    }

    /**
     *
     * {@inheritDoc}
     * @see \asbamboo\database\command\CommandAbstract::getDoctrineCommandName()
     */
    public function getDoctrineCommandName() : string
    {
        return  'orm:generate-proxies';
    }
}