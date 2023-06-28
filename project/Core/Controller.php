<?php

namespace Core;

class Controller extends DB
{
    protected string $headTitle;

    protected function view($template, $attributes = [], $layout = "index")
    {
        if ($this->headTitle ?? false) {
            $attributes = array_merge($attributes, ['headTitle' => $this->headTitle]);
        }

        return view($template, $attributes, $layout);
    }
}