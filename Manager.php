<?php
namespace asbamboo\database;

use Doctrine\ORM\EntityManager;

class Manager extends EntityManager implements ManagerInterface
{
    public function __construct($conn, $config, $eventManager)
    {
        parent::__construct($conn, $config, $eventManager);
    }
}