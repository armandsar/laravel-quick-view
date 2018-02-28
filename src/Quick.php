<?php

namespace Armandsar\QuickView;

trait Quick
{
    protected function quick($data = [], $mergeData = [])
    {
        return (new ViewResolver($data, $mergeData))->call();
    }
}