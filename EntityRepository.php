<?php
namespace asbamboo\database;

use Doctrine\ORM\EntityRepository AS BaseEntityRepository;

/**
 * 为方便以后自己扩展，此处继承doctrine中的EntityRepository，后边asbamboo中代码使用时都继承这个Repository
 *
 * @author 李春寅 <licy2013@aliyun.com>
 * @since 2018年8月30日
 */
class EntityRepository extends BaseEntityRepository
{

}