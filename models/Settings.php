<?php namespace City\GoogleMaps\Models;

use Model;

class Settings extends Model
{
    public $implement = ['System.Behaviors.SettingsModel'];

    /**
     * @var string A unique code
     */
    public $settingsCode = 'city_googleMaps_settings';

    /**
     * @var string Reference to field configuration
     */
    public $settingsFields = 'fields.yaml';

    public static function getTypeOptions(): array
    {
        return [
            'roadmap' => 'city.googlemaps::lang.settings.type_options.roadmap',
            'satellite' => 'city.googlemaps::lang.settings.type_options.satellite',
            'hybrid' => 'city.googlemaps::lang.settings.type_options.hybrid',
            'terrain' => 'city.googlemaps::lang.settings.type_options.terrain',
        ];
    }

    public static function getLayersOptions(): array
    {
        return [
            'traffic' => [
                'city.googlemaps::lang.settings.layers_options.traffic',
                'city.googlemaps::lang.settings.layers_options.traffic_comment'
            ],
            'transit' => [
                'city.googlemaps::lang.settings.layers_options.transit',
                'city.googlemaps::lang.settings.layers_options.transit_comment'
            ],
            'bicycling' => [
                'city.googlemaps::lang.settings.layers_options.bicycling',
                'city.googlemaps::lang.settings.layers_options.bicycling_comment'
            ],
        ];
    }

    public static function getControlsOptions(): array
    {
        return [
            'zoom' => 'city.googlemaps::lang.settings.controls_options.zoom',
            'mapType' => 'city.googlemaps::lang.settings.controls_options.mapType',
            'scale' => 'city.googlemaps::lang.settings.controls_options.scale',
            'streetView' => 'city.googlemaps::lang.settings.controls_options.streetView',
            'rotate' => 'city.googlemaps::lang.settings.controls_options.rotate',
            'fullscreen' => 'city.googlemaps::lang.settings.controls_options.fullscreen',
        ];
    }

    public static function getStyleOptions(): array
    {
        $styles = [
            'custom_style' => 'city.googlemaps::lang.settings.style_options.custom_style',

            /**
             * https://mapstyle.withgoogle.com
             */
            'silver' => 'Silver',
            'retro' => 'Retro',
            'dark' => 'Dark',
            'night' => 'Night',
            'aubergine' => 'Aubergine',

            /**
             * https://snazzymaps.com/explore
             */
            // https://snazzymaps.com/style/151/ultra-light-with-labels
            'ultra-light-with-labels' => 'Ultra Light with Labels',
            // https://snazzymaps.com/style/8097/wy
            'wy' => 'WY',
            // https://snazzymaps.com/style/15/subtle-grayscale
            'subtle-grayscale' => 'Subtle Grayscale',
            // https://snazzymaps.com/style/38/shades-of-grey
            'shades-of-grey' => 'Shades of Grey',
            // https://snazzymaps.com/style/72543/assassins-creed-iv
            'assassins-creed-iv' => 'Assassin\'s Creed IV',
            // https://snazzymaps.com/style/79/black-and-white
            'black-and-white' => 'Black and White',
            // https://snazzymaps.com/style/35/avocado-world
            'avocado-world' => 'Avocado World',
            // https://snazzymaps.com/style/61/blue-essence
            'blue-essence' => 'Blue Essence',
            // https://snazzymaps.com/style/39/paper
            'paper' => 'Paper',
            // https://snazzymaps.com/style/12/snazzy-maps
            'snazzy-maps' => 'Snazzy Maps',
            // https://snazzymaps.com/style/1371/purple
            'purple' => 'Purple',
            // https://snazzymaps.com/style/21/hopper
            'hopper' => 'Hopper',
            // https://snazzymaps.com/style/127404/simple-night-vision-stranger-thing
            'simple-night-vision' => 'Simple night vision - Stranger Thing',
        ];

        return $styles;
    }
}
