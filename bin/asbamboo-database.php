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

require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

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
;
$Processor->exec();