<?php
namespace asbamboo\database;

use Doctrine\ORM\EntityManager;
use asbamboo\event\EventScheduler;
use Doctrine\ORM\Events;
use Doctrine\ORM\Event\LifecycleEventArgs;

/**
 * 为以后扩展doctrine orm这里做一层继承
 *
 * @author 李春寅 <licy2013@aliyun.com>
 * @since 2018年12月18日
 */
class Manager extends EntityManager implements ManagerInterface
{
    /**
     *
     * @param \Doctrine\DBAL\Connection $conn
     * @param \Doctrine\DBAL\Configuration $config
     * @param \Doctrine\Common\EventManager $eventManager
     */
    public function __construct($conn, $config, $eventManager)
    {
        parent::__construct($conn, $config, $eventManager);
        $this->init();
    }

    /**
     * manager 初始化时需要处理的一些方法
     */
    protected function init() : void
    {
        $this->preBindDoctrineEvent();
    }

    /**
     * 绑定doctine orm 相关联的事件
     * postUpdate, postRemove, postPersist == Event::DATA_CHANGED
     */
    private function preBindDoctrineEvent() : void
    {
        if(EventScheduler::instance()->has(Event::DATA_CHANGED)){
            $this->getEventManager()->addEventListener([Events::postPersist, Events::postUpdate, Events::postRemove], new Class{
                public function postPersist(LifecycleEventArgs $args) : void
                {
                    EventScheduler::instance()->trigger(Event::DATA_CHANGED, ['created', $args->getEntityManager(), $args->getEntity()]);
                }

                public function postUpdate(LifecycleEventArgs $args) : void
                {
                    EventScheduler::instance()->trigger(Event::DATA_CHANGED, ['updated', $args->getEntityManager(), $args->getEntity()]);
                }

                public function postRemove(LifecycleEventArgs $args) : void
                {
                    EventScheduler::instance()->trigger(Event::DATA_CHANGED, ['deleted', $args->getEntityManager(), $args->getEntity()]);
                }
            });
        }
    }
}