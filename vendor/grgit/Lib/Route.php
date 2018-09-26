<?php

namespace grgit\Lib;

class Route
{
    private $collection;
    private $method;
    private $path;

    public function __construct(string $path, string $method)
    {
        $this->collection = [];
        $this->method = $method;
        $this->path = $path;
    }

    public function get($path, $fn, $middleware = '')
    {
        $this->request('GET', $path, $fn, $middleware);
    }

    public function post($path, $fn, $middleware = '')
    {
        $this->request('POST', $path, $fn, $middleware);
    }

    public function request($method, $path, $fn, $middleware = '')
    {
        $this->collection[] = [$method, $path, $fn, $middleware];
    }

    public function run()
    {

        $data = $this->collection;
        foreach ($data as $key => $value) {
            if($value[0] == $this->method) {
                $result = $this->checkUrl($value[1], $this->path);
                $callback = $value[2];

                if ($result['run'] == $value[1]) {
                    return [
                        'param' => ($this->method == 'POST') ? $_POST : $result['result'],
                        'callback' => $callback,
                        'run' => $result['run'],
                        'method' => $value[0],
                        'middleware' => $value[3]
                    ];
                } elseif ($this->path == $value[1]) {
                    return [
                        'param' => ($this->method == 'POST') ? $_POST : [],
                        'callback' => $callback,
                        'run' => $result['run'],
                        'method' => $value[0],
                        'middleware' => $value[3]
                    ];
                }
            }
        }
    }

    private function checkUrl(string $toFind, $subject)
    {
        preg_match_all('/\{([^\}]*)\}/', $toFind, $variables);
        $regex = str_replace('/', '\/', $toFind);
        $regex = preg_replace('/{([a-zA-Z]+)}/', '([a-zA-Z0-9]+)', $regex);
        preg_match('/^' . $regex . '$/', $subject, $params);
        if(!empty($variables[1][0]) && isset($params[1])) {
            $result = ['result' => [$variables[1][0] => $params[1]], 'run' => $toFind];
        } else {
            return ['result' => false, 'run' => ''];
        }
        return $result;
    }

}