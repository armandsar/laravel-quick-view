<?php

namespace Armandsar\QuickView;

use Illuminate\Contracts\View\Factory as ViewFactory;


trait Quick
{
    protected function quick($data = [], $mergeData = [])
    {
        $trace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2)[1];

        $class = $trace['class'];
        $method = snake_case($trace['function']);

        $class = str_replace("App\\Http\\Controllers\\", '', $class);
        $class = preg_replace('/Controller$/', '', $class);
        $class = snake_case($class);
        $class = str_replace('\\_', '.', $class);

        $view = $class . '.' . $method;

        $factory = app(ViewFactory::class);

        return $factory->make($view, $data, $mergeData);
    }
}