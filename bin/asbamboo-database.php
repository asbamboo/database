<?php
use asbamboo\console\Processor;
use asbamboo\database\command\DbalImportCommand;
use asbamboo\database\command\OrmGenerateEntitiesCommand;
use asbamboo\database\command\DbalReservedWordsCommand;
use asbamboo\database\command\DbalRunSqlCommand;
use asbamboo\database\command\OrmClearCacheMetadataCommand;
use asbamboo\database\command\OrmClearCacheQueryCommand;
use asbamboo\database\command\OrmClearCacheRegionCollectionCommand;
use asbamboo\database\command\OrmClearCacheRegionEntityCommand;
use asbamboo\database\command\OrmClearCacheRegionQueryCommand;
use asbamboo\database\command\OrmClearCacheResultCommand;
use asbamboo\database\command\OrmConvertMappingCommand;
use asbamboo\database\command\OrmEnsureProductionSettingsCommand;
use asbamboo\database\command\OrmGenerateProxiesCommand;
use asbamboo\database\command\OrmGenerateRepositoriesCommand;
use asbamboo\database\command\OrmInfoCommand;
use asbamboo\database\command\OrmMappingDescribeCommand;
use asbamboo\database\command\OrmRunDqlCommand;
use asbamboo\database\command\OrmSchemaToolCreateCommand;
use asbamboo\database\command\OrmSchemaToolDropCommand;
use asbamboo\database\command\OrmSchemaToolUpdateCommand;
use asbamboo\database\command\OrmValidateSchemaCommand;

require getcwd() . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

$Processor  = new Processor();
$Processor->commandCollection()
    ->add('asbamboo:database:dbal-import', DbalImportCommand::class)
    ->add('asbamboo:database:generate-entities', OrmGenerateEntitiesCommand::class)
    ->add('asbamboo:database:dbal-reserved-words', DbalReservedWordsCommand::class)
    ->add('asbamboo:database:dbal-run-sql', DbalRunSqlCommand::class)
    ->add('asbamboo:database:clear-cache-metadata', OrmClearCacheMetadataCommand::class)
    ->add('asbamboo:database:clear-cache-query', OrmClearCacheQueryCommand::class)
    ->add('asbamboo:database:clear-cache-region-collection', OrmClearCacheRegionCollectionCommand::class)
    ->add('asbamboo:database:clear-cache-region-entity', OrmClearCacheRegionEntityCommand::class)
    ->add('asbamboo:database:clear-cache-region-query', OrmClearCacheRegionQueryCommand::class)
    ->add('asbamboo:database:clear-cache-result', OrmClearCacheResultCommand::class)
    ->add('asbamboo:database:convert-mapping', OrmConvertMappingCommand::class)
    ->add('asbamboo:database:ensure-production-settings', OrmEnsureProductionSettingsCommand::class)
    ->add('asbamboo:database:generate-proxies', OrmGenerateProxiesCommand::class)
    ->add('asbamboo:database:generate-repositories', OrmGenerateRepositoriesCommand::class)
    ->add('asbamboo:database:info', OrmInfoCommand::class)
    ->add('asbamboo:database:mapping-describe', OrmMappingDescribeCommand::class)
    ->add('asbamboo:database:run-dql', OrmRunDqlCommand::class)
    ->add('asbamboo:database:schema-create', OrmSchemaToolCreateCommand::class)
    ->add('asbamboo:database:schema-drop', OrmSchemaToolDropCommand::class)
    ->add('asbamboo:database:schema-update', OrmSchemaToolUpdateCommand::class)
    ->add('asbamboo:database:validate', OrmValidateSchemaCommand::class)
;
$Processor->exec();