function City_GoogleMaps_Map (options) {
    'use strict';

    /**
     * Map options
     */
    this.options = options;

    /**
     * Map instance
     */
    this.map = null;

    /**
     * Create map
     * @returns this
     */
    this.create = function () {

        const mapOptions = this.options.map;
        mapOptions.center = {
            lat: this.options.lat,
            lng: this.options.lng
        };

        mapOptions.zoom = this.options.zoom;

        if (mapOptions.styles && (typeof mapOptions.styles === 'string' || mapOptions.styles instanceof String)) {
            mapOptions.styles = JSON.parse(mapOptions.styles);
        }

        this.map = new google.maps.Map(
            document.getElementById(this.options.containerId),
            mapOptions
        );

        if (this.options.layers.traffic) {
            new google.maps.TrafficLayer().setMap(this.map);
        }

        if (this.options.layers.transit) {
            new google.maps.TransitLayer().setMap(this.map);
        }

        if (this.options.layers.bicycling) {
            new google.maps.BicyclingLayer().setMap(this.map);
        }

        return this;
    }

    /**
     * Show markers and other data on the map
     * @param data
     * @returns this
     */
    this.draw = function (data) {
        for (const feature of data) {
            switch (feature.type) {
                case 'marker':
                    this.marker(feature);
                    break;
                case 'circle':
                    this.circle(feature);
                    break;
                case 'geoJson':
                    this.geoJson(feature);
                    break;
            }
        }

        return this;
    }

    /**
     * Draw a marker
     * @param feature
     * @returns this
     */
    this.marker = function (feature) {
        const options = feature.marker;
        options.map = this.map;
        options.position = {
            lat: feature.points[0][0],
            lng: feature.points[0][1]
        };

        if (options.icon && options.icon.iconUrl) {
            options.icon = options.icon.iconUrl;
        }

        if (options.color && ! options.icon) {
            options.icon = this.svgMarker();
            options.icon.fillColor = options.color;
        }

        const marker = new google.maps.Marker(options);

        if (feature.popup && feature.popup.content) {
            const infoWindow = new google.maps.InfoWindow(feature.popup);
            const map = this.map;

            marker.addListener('click', () => {
                infoWindow.open({
                    anchor: marker,
                    map,
                    shouldFocus: false,
                });
            });
        }

        return this;
    }

    /**
     * Draw a circle
     * @param feature
     * @returns this
     */
    this.circle = function (feature) {
        const circle = feature.circle;
        circle.map = this.map;
        circle.center = {
            lat: feature.points[0][0],
            lng: feature.points[0][1]
        };

        if (circle.color) {
            circle.strokeColor = circle.color;
        }

        if (! circle.strokeColor) {
            circle.strokeColor = 'green';
        }

        if (! circle.fillOpacity) {
            circle.fillOpacity = 0;
        }

        new google.maps.Circle(circle);

        return this;
    }

    /**
     * Display GeoJson on the map
     * @param feature
     * @returns this
     */
    this.geoJson = function (feature) {
        if (! feature.path) {
            return this;
        }

        this.map.data.loadGeoJson(feature.path);
        this.map.data.setStyle((geoJsonFeature) => {
            return {
                strokeColor: '#38f',
                fillColor: '#38f',
                fillOpacity: 0
            };
        });

        return this;
    }

    /**
     * Retrieve default config of the SVG marker
     * @returns object
     */
    this.svgMarker = function () {
        return {
            path: 'M25 0c-8.284 0-15 6.656-15 14.866 0 8.211 15 35.135 15 35.135s15-26.924 15-35.135c0-8.21-6.716-14.866-15-14.866zm-.049 19.312c-2.557 0-4.629-2.055-4.629-4.588 0-2.535 2.072-4.589 4.629-4.589 2.559 0 4.631 2.054 4.631 4.589 0 2.533-2.072 4.588-4.631 4.588z',
            fillColor: 'red',
            fillOpacity: 1,
            strokeColor: 'black',
            strokeWeight: 0.2,
            anchor: new google.maps.Point(25, 50),
            labelOrigin: new google.maps.Point(25, 26)
        };
    }
}
