<?php
namespace Sw\Http\Server\Web;
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/11
 * Time: 11:00
 */

class HttpServer
{

    protected $server;
    public function __construct($server)
    {
         $this->server= new \swoole_http_server($server['http']['host'],$server['http']['port']) ;
        var_dump("ip:{$server['http']['host']} port:{$server['http']['port']}");
    }

    public function setSetting($setting){
        if(!empty($setting))
            $this->server->set($setting);
    }

    public function on()
    {
        $this->server->on('request',[$this,'onRequest']);
    }

    /**
     * onRequest event callback
     * Each request will create an coroutine
     *
     * @param Request $request
     * @param Response $response
     * @throws \InvalidArgumentException
     */
    public function onRequest(Request $request, Response $response)
    {

        var_dump($request->get,$request->post);
        $response->header("Content-Type", "text/html; charset=utf-8");
        $response->end("<h1>Hello Swoole#".rand(1000,9999)."</h1>");
    }

    public function start(){
        $this->server->start();
    }
}