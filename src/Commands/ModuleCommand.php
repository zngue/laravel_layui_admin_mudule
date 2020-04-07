<?php


namespace Zngue\Module\Commands;


use Illuminate\Console\Command;
use Zngue\User\Service\toolesService;

class ModuleCommand extends Command
{
    protected $signature="zng:module";
    protected $description="发布用户数据以及配置文件";
    public function handle(){
        $this->call("vendor:publish",['--provider'=>'Zngue\User\UserService']);
        $this->call("vendor:publish",['--provider'=>'Zngue\Module\Provider\ModuleServiceProvider']);
        $this->call('zng:user');
        $data=array(
            'dbhost'=>config('database.connections.mysql.host'),
            'dbuser'=> config('database.connections.mysql.username'),
            'dbpw'=>config('database.connections.mysql.password'),
            'dbname'=>config('database.connections.mysql.database')
        );
        $file = __DIR__.'/../../sql/modules.sql';
        $tool=new toolesService($data);
        $data =$tool->import_data($file,config('database.connections.mysql.prefix'));
        echo $data['info'];
    }

}
