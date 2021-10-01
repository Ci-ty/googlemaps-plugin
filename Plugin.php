<?php namespace City\GoogleMaps;

use City\GoogleMaps\Models\Settings;
use System\Classes\PluginBase;
use City\GoogleMaps\Components\MapDetails;

class Plugin extends PluginBase
{
    /**
     * @var array Plugin dependencies
     */
    public $require = ['City.Map'];

    /**
     * Add component
     * @return string[]
     */
    public function registerComponents()
    {
        return [
            MapDetails::class => 'googleMap',
        ];
    }

    /**
     * Add settings
     * @return array[]
     */
    public function registerSettings()
    {
        return [
            'settings' => [
                'label'       => 'city.googlemaps::lang.settings.label',
                'description' => 'city.googlemaps::lang.settings.description',
                'category'    => trans('city.map::lang.plugin.settings_category'),
                'icon'        => 'oc-icon-google',
                'class'       => Settings::class,
                'order'       => 520,
                'keywords'    => 'city dynamic google map credentials'
            ]
        ];
    }
}
