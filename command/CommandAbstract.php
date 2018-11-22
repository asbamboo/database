<?php
namespace asbamboo\database\command;

use asbamboo\console\command\CommandAbstract AS BaseCommandAbstract;
use asbamboo\database\FactoryInterface;
use Doctrine\ORM\Tools\Console\ConsoleRunner;
use asbamboo\console\ProcessorInterface;

/**
 * 扩展控制台模块中的CommandAbstract类
 *
 * @author 李春寅 <licy2013@aliyun.com>
 * @since 2018年11月22日
 */
abstract class CommandAbstract extends BaseCommandAbstract
{

    /**
     *
     * {@inheritDoc}
     * @see \asbamboo\console\command\CommandInterface::exec()
     */
    public function exec(ProcessorInterface $Processor)
    {
        $DbFactory  = $this->getDbFactory();
        $helperSet  = new \Symfony\Component\Console\Helper\HelperSet(array(
            'db'    => new \Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper($DbFactory->getManager()->getConnection()),
            'em'    => new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($DbFactory->getManager())
        ));
        $_SERVER['argv'][1] = $this->getDoctrineCommandName();

        ConsoleRunner::run($helperSet);
    }

    /**
     * 返回一个 Factory 实例
     * 通过在查找项目里面 ../config/db-config.php 文件得到一个 factory
     * 使用本命令工具前你需要首先添加在项目中添加配置文件 config/db-config.php 这个文件返回一个 Factory 实例
     *
     * @return FactoryInterface
     */
    protected function getDbFactory() : FactoryInterface
    {
        $guess_config_in_dir    = getcwd();
        for($i = 0; $i < 3; $i++ ){
            $custom_config_path = $guess_config_in_dir . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'db-config.php';
            if(file_exists($custom_config_path)){
                break;
            }
            $guess_config_in_dir    = dirname($guess_config_in_dir);
        }
        if(file_exists($custom_config_path)){
            return include $custom_config_path;
        }
    }

    /**
     * 凡是实现本抽象类的方法都应该实现这个方法
     * 返回对应doctrine里面的命令名称
     *
     * @return string
     */
    abstract public function  getDoctrineCommandName() : string;
}