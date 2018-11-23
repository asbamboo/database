<?php
namespace asbamboo\database\command;

/**
 * 同 doctrine orm:schema-tool:create
 *
 * @author 李春寅 <licy2013@aliyun.com>
 * @since 2018年11月22日
 */
class OrmSchemaToolCreateCommand extends CommandAbstract
{
    /**
     * Construct.
     */
    public function __construct()
    {
        parent::__construct();
        $this->addOption('dump-sql', null, 'Instead of trying to apply generated SQLs into EntityManager Storage Connection, output them.');
    }

    /**
     *
     * {@inheritDoc}
     * @see \asbamboo\console\command\CommandInterface::desc()
     */
    public function desc() : string
    {
        return 'Processes the schema and either create it directly on EntityManager Storage Connection or generate the SQL output.';
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
    该命令功能与doctrine/orm中的orm:schema-tool:create相同

    Processes the schema and either create it directly on EntityManager Storage Connection or generate the SQL output.

    <comment>Hint:</comment> If you have a database with tables that should not be managed
    by the ORM, you can use a DBAL functionality to filter the tables and sequences down
    on a global level:

        \$config->setFilterSchemaAssetsExpression(\$regexp);

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
        return 'asbamboo:database:schema-create';
    }

    /**
     *
     * {@inheritDoc}
     * @see \asbamboo\database\command\CommandAbstract::getDoctrineCommandName()
     */
    public function getDoctrineCommandName() : string
    {
        return  'orm:schema-tool:create';
    }
}