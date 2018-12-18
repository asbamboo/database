<?php
namespace asbamboo\database;

/**
 * 本模块内部事件列表
 *
 * @author 李春寅 <licy2013@aliyun.com>
 * @since 2018年8月4日
 */
final class Event
{
    /**
     * 数据发生变更改
     * 在doctrine orm的[postUpdate, postRemove, postPersist]事件被触发时 DATA_CHANGED 将触发
     *
     * @var string
     */
    const DATA_CHANGED = 'asbamboo.database.data.changed';
}