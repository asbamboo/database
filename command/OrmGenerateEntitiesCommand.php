<?php
namespace asbamboo\database\command;

/**
 * 同 doctrine orm:generate-entities
 *
 * @author 李春寅 <licy2013@aliyun.com>
 * @since 2018年11月22日
 */
class OrmGenerateEntitiesCommand extends CommandAbstract
{
    /**
     * Construct.
     */
    public function __construct()
    {
        parent::__construct();
        $this->addArgument('dest-path', 'The path to generate your entity classes.', '', null, true);
        $this->AddOption('filter', null, 'A string pattern used to match entities that should be processed.');
        $this->AddOption('generate-annotations', false, 'Flag to define if generator should generate annotation metadata on entities.');
        $this->AddOption('generate-methods', true, 'Flag to define if generator should generate stub methods on entities.');
        $this->AddOption('regenerate-entities', false, 'Flag to define if generator should regenerate entity if it exists.');
        $this->AddOption('update-entities', true, 'Flag to define if generator should only update entity if it exists.');
        $this->AddOption('extend', null, 'Defines a base class to be extended by generated entity classes.');
        $this->AddOption('num-spaces', 4, 'Defines the number of indentation spaces');
        $this->AddOption('no-backup', null, 'Flag to define if generator should avoid backuping existing entity file if it exists.');
    }

    /**
     *
     * {@inheritDoc}
     * @see \asbamboo\console\command\CommandInterface::desc()
     */
    public function desc() : string
    {
        return 'Generate entity classes and method stubs from your mapping information.';
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

    Generate entity classes and method stubs from your mapping information.

    If you use the --update-entities or --regenerate-entities flags your existing
    code gets overwritten. The EntityGenerator will only append new code to your
    file and will not delete the old code. However this approach may still be prone
    to error and we suggest you use code repositories such as GIT or SVN to make
    backups of your code.

    It makes sense to generate the entity code if you are using entities as Data
    Access Objects only and don't put much additional logic on them. If you are
    however putting much more logic on the entities you should refrain from using
    the entity-generator and code your entities manually.

    Important: Even if you specified Inheritance options in your
    XML or YAML Mapping files the generator cannot generate the base and
    child classes for you correctly, because it doesn't know which
    class is supposed to extend which. You have to adjust the entity
    code manually for inheritance to work!

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
        return 'asbamboo:database:generate-entities';
    }

    /**
     *
     * {@inheritDoc}
     * @see \asbamboo\database\command\CommandAbstract::getDoctrineCommandName()
     */
    public function getDoctrineCommandName() : string
    {
        return  'orm:generate-entities';
    }
}