<?php
namespace asbamboo\database\command;

/**
 * 同 doctrine orm:schema-tool:update
 *
 * @author 李春寅 <licy2013@aliyun.com>
 * @since 2018年11月22日
 */
class OrmSchemaToolUpdateCommand extends CommandAbstract
{
    /**
     * Construct.
     */
    public function __construct()
    {
        parent::__construct();
        $this->addOption('complete', null, 'If defined, all assets of the database which are not relevant to the current metadata will be dropped.');
        $this->addOption('dump-sql', null, 'Dumps the generated SQL statements to the screen (does not execute them).');
        $this->addOption('force', null, 'Causes the generated SQL statements to be physically executed against your database.', 'f');
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
    该命令功能与doctrine/orm中的orm:schema-tool:update相同

    The php {$console} {$this->getName()} command generates the SQL needed to
    synchronize the database schema with the current mapping metadata of the
    default entity manager.

    For example, if you add metadata for a new column to an entity, this command
    would generate and output the SQL needed to add the new column to the database:

    php {$console} {$this->getName()} --dump-sql

    Alternatively, you can execute the generated queries:

    php {$console} {$this->getName()} --force

    If both options are specified, the queries are output and then executed:

    php {$console} {$this->getName()} --dump-sql --force

    Finally, be aware that if the --complete option is passed, this
    task will drop all database assets (e.g. tables, etc) that are *not* described
    by the current metadata. In other words, without this option, this task leaves
    untouched any "extra" tables that exist in the database, but which aren't
    described by any metadata.

    Hint: If you have a database with tables that should not be managed
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
        return 'asbamboo:database:schema-update';
    }

    /**
     *
     * {@inheritDoc}
     * @see \asbamboo\database\command\CommandAbstract::getDoctrineCommandName()
     */
    public function getDoctrineCommandName() : string
    {
        return  'orm:schema-tool:update';
    }
}