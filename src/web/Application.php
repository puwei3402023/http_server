<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/11
 * Time: 11:17
 */

namespace Sw\Http\Server\Web;


class Application
{
    protected $run_server;
    public function __construct($server)
    {
        $this->run_server= new HttpServer($server);

    }
    public function run()
    {
        $this->run_server->on();
        $this->run_server->start();

    }
}