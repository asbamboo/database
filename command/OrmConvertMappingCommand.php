<?php
namespace asbamboo\database\command;

/**
 * 同 doctrine orm:convert-mapping
 *
 * @author 李春寅 <licy2013@aliyun.com>
 * @since 2018年11月22日
 */
class OrmConvertMappingCommand extends CommandAbstract
{
    /**
     * Construct.
     */
    public function __construct()
    {
        parent::__construct();

        $this->addArgument('to-type', 'The mapping type to be converted.', '', true);
        $this->addArgument('dest-path', 'The path to generate your entities classes.', '', true);

        $this->addOption('filter', null, 'A string pattern used to match entities that should be processed.');
        $this->addOption('force', null, 'Force to overwrite existing mapping files.', 'f');
        $this->addOption('from-database', null, 'Whether or not to convert mapping information from existing database.');
        $this->addOption('extend', null, 'Defines a base class to be extended by generated entity classes.');
        $this->addOption('num-spaces', 4, 'Defines the number of indentation spaces.');
        $this->addOption('namespace', null, 'Defines a namespace for the generated entity classes, if converted from database.');
    }

    /**
     *
     * {@inheritDoc}
     * @see \asbamboo\console\command\CommandInterface::desc()
     */
    public function desc() : string
    {
        return 'Convert mapping information between supported formats.';
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
    该命令功能与doctrine/orm中的orm:convert-mapping 相同

    Convert mapping information between supported formats.

    This is an execute one-time command. It should not be necessary for
    you to call this method multiple times, especially when using the --from-database
    flag.

    Converting an existing database schema into mapping files only solves about 70-80%
    of the necessary mapping information. Additionally the detection from an existing
    database cannot detect inverse associations, inheritance types,
    entities with foreign keys as primary keys and many of the
    semantical operations on associations such as cascade.

    Hint: There is no need to convert YAML or XML mapping files to annotations
    every time you make changes. All mapping drivers are first class citizens
    in Doctrine 2 and can be used as runtime mapping for the ORM.

    Hint: If you have a database with tables that should not be managed
    by the ORM, you can use a DBAL functionality to filter the tables and sequences down
    on a global level:

      \$config->setFilterSchemaAssetsExpression(\$regexp);

    例:
        php {$console} {$this->getName()} [options] [--] <to-type> <dest-path>
HELP;
    }

    /**
     * 定义命令行名称
     *
     * @return string
     */
    public function getName() : string
    {
        return 'asbamboo:database:convert-mapping';
    }

    /**
     *
     * {@inheritDoc}
     * @see \asbamboo\database\command\CommandAbstract::getDoctrineCommandName()
     */
    public function getDoctrineCommandName() : string
    {
        return  'orm:convert-mapping';
    }
}