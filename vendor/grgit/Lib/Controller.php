<?php

namespace grgit\Lib;

abstract class Controller
{

    public $template = 'default';
    private $page;

    protected function view(string $page, array $data = [], $layout = true)
    {
        $this->page = $page;
        if ($layout == true && file_exists("App/Views/Templates/".$this->template.".php")) {
            include_once "App/Views/Templates/".$this->template.".php";
        } else {
            $this->content($data);
        }
    }

    protected function content(array $data)
    {
        $current = get_class($this);
        include_once "App/Views/".$this->page.".php";
    }

}