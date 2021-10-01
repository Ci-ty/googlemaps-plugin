<?php namespace City\GoogleMaps\Components;

use Config;
use City\GoogleMaps\Models\Settings;
use City\Map\Components\MapDetailsBase;

class MapDetails extends MapDetailsBase
{
    /**
     * @inheritDoc
     */
    public function componentDetails(): array
    {
        return [
            'name' => trans('city.googlemaps::lang.component.name'),
            'description' => trans('city.googlemaps::lang.component.description')
        ];
    }

    /**
     * Add properties for the map
     */
    public function init()
    {
        parent::init();

        $this->setProperty(
            'mapOptions',
            json_encode($this->getMapOptions())
        );

        $this->setProperty(
            'layersOptions',
            json_encode($this->getLayersOptions())
        );
    }

    /**
     * Add assets for the component
     */
    public function onRun()
    {
        $urlParams = [
            'v' => 3,
            'key' => Settings::get('api_key'),
            'language' => Config::get('app.locale', 'en'),
        ];

        $this->addJs('https://maps.googleapis.com/maps/api/js?' . http_build_query($urlParams));
        $this->addJs('/plugins/city/googlemaps/assets/js/map.js');
    }

    /**
     * Collect map options
     * @return array
     */
    protected function getMapOptions(): array
    {
        $options = [];

        /**
         * General
         */
        $options['mapTypeId'] = Settings::get('type', 'roadmap');

        /**
         * Controls
         */
        $controls = array_keys(Settings::getControlsOptions());
        if (! $selectedControls = Settings::get('controls')) {
            $selectedControls = [];
        }

        foreach ($controls as $control) {
            $value = in_array($control, $selectedControls);
            $options[$control . 'Control'] = (int) $value;
        }

        /**
         * Style
         */
        $style = Settings::get('style');
        if ('custom_style' === $style) {
            $options['styles'] = Settings::get('custom_style');
        } elseif ($style) {
            $stylePath = plugins_path('city/googlemaps/assets/map-styles/'. $style . '.json');
            if (file_exists($stylePath)) {
                $styleContent = file_get_contents($stylePath);
                $options['styles'] = $styleContent;
            }
        }

        return $options;
    }

    /**
     * Collect map layers options
     * @return array
     */
    protected function getLayersOptions(): array
    {
        $options = [];

        /**
         * Layers
         */
        $layers = array_keys(Settings::getLayersOptions());
        if (! $selectedLayers = Settings::get('layers')) {
            $selectedLayers = [];
        }

        foreach ($layers as $layer) {
            $value = in_array($layer, $selectedLayers);
            $options[$layer] = (int) $value;
        }

        return $options;
    }
}
