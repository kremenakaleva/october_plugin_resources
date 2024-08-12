<?php namespace Pensoft\Resources;

use Pensoft\Resources\Components\RecordsList;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
            RecordsList::class => 'ResourcesList'
        ];
    }

    public function registerSettings()
    {
    }
}
