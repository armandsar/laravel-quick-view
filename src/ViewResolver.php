<?php


namespace Armandsar\QuickView;

use Illuminate\Contracts\View\Factory as ViewFactory;


class ViewResolver
{
    private $data;
    private $mergeData;

    public function __construct($data = [], $mergeData = [])
    {
        $this->data = $data;
        $this->mergeData = $mergeData;
    }

    public function call()
    {
        $trace = array_last(debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 3));

        $class = $trace['class'];
        $method = snake_case($trace['function']);

        $class = str_replace("App\\Http\\Controllers\\", '', $class);
        $class = preg_replace('/Controller$/', '', $class);
        $class = snake_case($class);
        $class = str_replace('\\_', '.', $class);

        $view = $class . '.' . $method;

        return $this->viewFactory()->make($view, $this->data, $this->mergeData);
    }

    /**
     * @return ViewFactory
     */
    private function viewFactory()
    {
        return app(ViewFactory::class);
    }
}