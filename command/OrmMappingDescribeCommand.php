<?php
namespace asbamboo\database\command;

/**
 * 同 doctrine orm:mapping:describe
 *
 * @author 李春寅 <licy2013@aliyun.com>
 * @since 2018年11月22日
 */
class OrmMappingDescribeCommand extends CommandAbstract
{
    /**
     * Construct.
     */
    public function __construct()
    {
        parent::__construct();
        $this->addArgument('entityName', 'Full or partial name of entity', '', null, true);
    }

    /**
     *
     * {@inheritDoc}
     * @see \asbamboo\console\command\CommandInterface::desc()
     */
    public function desc() : string
    {
        return 'Display information about mapped objects.';
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
    该命令功能与doctrine/orm中的orm:mapping:describe相同

    The php {$console} {$this->getName()} command describes the metadata for the given full or partial entity class name.

      php {$console} {$this->getName()} My\Namespace\Entity\MyEntity

    Or:

      php {$console} {$this->getName()} MyEntity
HELP;
    }

    /**
     * 定义命令行名称
     *
     * @return string
     */
    public function getName() : string
    {
        return 'asbamboo:database:mapping-describe';
    }

    /**
     *
     * {@inheritDoc}
     * @see \asbamboo\database\command\CommandAbstract::getDoctrineCommandName()
     */
    public function getDoctrineCommandName() : string
    {
        return  'orm:mapping:describe';
    }
}