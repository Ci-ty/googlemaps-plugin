<?php return [
    'plugin' => [
        'name' => 'Google Maps',
        'description' => 'City Google Maps Plugin'
    ],
    'component' => [
        'name' => 'Google Map',
        'description' => 'Show Google Map (part of Dynamic Maps)'
    ],
    'settings' => [
        'label' => 'Google Maps',
        'description' => 'Google maps settings',
        'general' => 'General Settings',
        'api_key' => 'API Key',
        'api_key_comment' => 'The API key is a unique identifier that authenticates requests associated with your project.<br />Read more: <a href="https://developers.google.com/maps/documentation/javascript/get-api-key" target="_blank">Using API Keys - Google Documentation</a>.',
        'type' => 'Type',
        'type_options' => [
            'roadmap' => 'Roadmap',
            'satellite' => 'Satellite',
            'hybrid' => 'Hybrid',
            'terrain' => 'Terrain',
        ],
        'layers' => 'Data Layers',
        'layers_comment' => 'This data is supported only for specific cities and locations',
        'layers_options' => [
            'traffic' => 'Traffic',
            'traffic_comment' => 'Traffic conditions, real-time traffic information',
            'transit' => 'Transit',
            'transit_comment' => 'The public transport network of your city',
            'bicycling' => 'Bicycling',
            'bicycling_comment' => 'Bicycle information, bike paths',
        ],
        'controls' => 'Controls',
        'controls_options' => [
            'zoom' => 'Zoom',
            'mapType' => 'Map Type',
            'scale' => 'Scale',
            'streetView' => 'Street View',
            'rotate' => 'Rotate',
            'fullscreen' => 'Fullscreen',
        ],
        'style_settings' => 'Style Settings',
        'style_hint' => 'Select one of the predefined styles or use own. A lot of styles exist here: <a href="https://snazzymaps.com/explore" target="_blank">Snazzy Maps</a>. Also, create style can here: <a href="https://mapstyle.withgoogle.com" target="_blank">Map Style with Google</a>',
        'style' => 'Style',
        'style_options' => [
            'standard' => 'Standard',
            'custom_style' => 'Custom Style',
        ],
        'custom_style' => 'Custom Style',
    ]
];
