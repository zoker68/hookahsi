<?php

namespace Core;

abstract class Controller
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