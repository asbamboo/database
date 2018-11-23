<?php
namespace asbamboo\database\command;

/**
 * 同 doctrine orm:schema-tool:drop
 *
 * @author 李春寅 <licy2013@aliyun.com>
 * @since 2018年11月22日
 */
class OrmSchemaToolDropCommand extends CommandAbstract
{
    /**
     * Construct.
     */
    public function __construct()
    {
        parent::__construct();
        $this->addOption('dump-sql', null, 'Instead of trying to apply generated SQLs into EntityManager Storage Connection, output them.');
        $this->addOption('force', null, 'Don\'t ask for the deletion of the database, but force the operation to run.', 'f');
        $this->addOption('full-database', null, 'Instead of using the Class Metadata to detect the database table schema, drop ALL assets that the database contains.');
    }

    /**
     *
     * {@inheritDoc}
     * @see \asbamboo\console\command\CommandInterface::desc()
     */
    public function desc() : string
    {
        return 'Drop the complete database schema of EntityManager Storage Connection or generate the corresponding SQL output.';
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
    该命令功能与doctrine/orm中的orm:schema-tool:drop相同

    Processes the schema and either drop the database schema of EntityManager Storage Connection or generate the SQL output.
    Beware that the complete database is dropped by this command, even tables that are not relevant to your metadata model.

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
        return 'asbamboo:database:schema-drop';
    }

    /**
     *
     * {@inheritDoc}
     * @see \asbamboo\database\command\CommandAbstract::getDoctrineCommandName()
     */
    public function getDoctrineCommandName() : string
    {
        return  'orm:schema-tool:drop';
    }
}