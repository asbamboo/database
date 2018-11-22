<?php
use asbamboo\console\Processor;
use asbamboo\database\command\DbalImportCommand;
use asbamboo\database\command\OrmGenerateEntitiesCommand;

require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

$Processor  = new Processor();
$Processor->commandCollection()
    ->add('asbamboo:database:dbal-import', DbalImportCommand::class)
    ->add('asbamboo:database:generate-entities', OrmGenerateEntitiesCommand::class)
;
$Processor->exec();