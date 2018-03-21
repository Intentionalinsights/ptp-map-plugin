<h1>Pledgers Map</h1>
Positions are approximate.

<style>
    /**
     * Always set the map height explicitly to define the size of the div
     * element that contains the map.
     */
    #map {
        width: 100%;
    }
</style>

<div id="map"></div>
<script type="text/javascript">

    function init1() {
        let mapElement = document.getElementById('map')
        mapElement.style.height = mapElement.offsetWidth / 1.5 + "px";
        window.setTimeout(initMap,10);
    }

    function initMap() {

        let mapElement = document.getElementById('map')
        var map = new google.maps.Map(mapElement, {
          zoom: 1,
          center: {lat: 0, lng: 0},
          styles: [
              {
                "elementType": "geometry",
                "stylers": [
                  {
                    "color": "#f5f5f5"
                  }
                ]
              },
              {
                "elementType": "labels.icon",
                "stylers": [
                  {
                    "visibility": "off"
                  }
                ]
              },
              {
                "elementType": "labels.text.fill",
                "stylers": [
                  {
                    "color": "#616161"
                  }
                ]
              },
              {
                "elementType": "labels.text.stroke",
                "stylers": [
                  {
                    "color": "#f5f5f5"
                  }
                ]
              },
              {
                "featureType": "administrative",
                "elementType": "labels.text.fill",
                "stylers": [
                  {
                    "color": "#c0c0c0"
                  },
                  {
                    "visibility": "on"
                  }
                ]
              },
              {
                "featureType": "administrative.country",
                "elementType": "geometry.stroke",
                "stylers": [
                  {
                    "color": "#d9d9d9"
                  },
                  {
                    "visibility": "on"
                  }
                ]
              },
              {
                "featureType": "administrative.country",
                "elementType": "labels.text.fill",
                "stylers": [
                  {
                    "color": "#c0c0c0"
                  },
                  {
                    "visibility": "on"
                  }
                ]
              },
              {
                "featureType": "administrative.land_parcel",
                "elementType": "labels.text.fill",
                "stylers": [
                  {
                    "color": "#bdbdbd"
                  }
                ]
              },
              {
                "featureType": "administrative.province",
                "elementType": "geometry.stroke",
                "stylers": [
                  {
                    "color": "#d9d9d9"
                  },
                  {
                    "visibility": "on"
                  },
                  {
                    "weight": 1
                  }
                ]
              },
              {
                "featureType": "administrative.province",
                "elementType": "labels.text.fill",
                "stylers": [
                  {
                    "color": "#c0c0c0"
                  },
                  {
                    "visibility": "on"
                  }
                ]
              },
              {
                "featureType": "poi",
                "elementType": "geometry",
                "stylers": [
                  {
                    "color": "#eeeeee"
                  }
                ]
              },
              {
                "featureType": "poi",
                "elementType": "labels.text.fill",
                "stylers": [
                  {
                    "color": "#757575"
                  }
                ]
              },
              {
                "featureType": "poi.park",
                "elementType": "geometry",
                "stylers": [
                  {
                    "color": "#e5e5e5"
                  }
                ]
              },
              {
                "featureType": "poi.park",
                "elementType": "labels.text.fill",
                "stylers": [
                  {
                    "color": "#9e9e9e"
                  }
                ]
              },
              {
                "featureType": "road",
                "elementType": "geometry",
                "stylers": [
                  {
                    "color": "#ffffff"
                  }
                ]
              },
              {
                "featureType": "road.arterial",
                "elementType": "labels.text.fill",
                "stylers": [
                  {
                    "color": "#757575"
                  }
                ]
              },
              {
                "featureType": "road.highway",
                "elementType": "geometry",
                "stylers": [
                  {
                    "color": "#dadada"
                  }
                ]
              },
              {
                "featureType": "road.highway",
                "elementType": "labels.text.fill",
                "stylers": [
                  {
                    "color": "#616161"
                  }
                ]
              },
              {
                "featureType": "road.local",
                "elementType": "labels.text.fill",
                "stylers": [
                  {
                    "color": "#9e9e9e"
                  }
                ]
              },
              {
                "featureType": "transit.line",
                "elementType": "geometry",
                "stylers": [
                  {
                    "color": "#e5e5e5"
                  }
                ]
              },
              {
                "featureType": "transit.station",
                "elementType": "geometry",
                "stylers": [
                  {
                    "color": "#eeeeee"
                  }
                ]
              },
              {
                "featureType": "water",
                "elementType": "geometry",
                "stylers": [
                  {
                    "color": "#c9c9c9"
                  }
                ]
              },
              {
                "featureType": "water",
                "elementType": "geometry.fill",
                "stylers": [
                  {
                    "color": "#c0c0c0"
                  }
                ]
              },
              {
                "featureType": "water",
                "elementType": "labels.text.fill",
                "stylers": [
                  {
                    "color": "#9e9e9e"
                  }
                ]
              }
            ]
        });

        // Add some markers to the map.
        // Note: The code uses the JavaScript Array.prototype.map() method to
        // create an array of markers based on a given "locations" array.
        // The map() method here has nothing to do with the Google Maps API.
        var markers = locations.map(function(location, i) {
          return new google.maps.Marker({
            position: location,
            label: {text:'1', color:"#DE6C4A", fontSize: "20px"},
            icon: {
              path: google.maps.SymbolPath.CIRCLE,
              strokeOpacity: 0,
              scale: 1
            },
            visible: false
          });
        });

        //Add regional markers
        var regionMarkers = regions.map(function(region, i) {
          return new google.maps.Marker({
            position: region.position,
            label: {text:region.title, color:"grey", fontSize: "20px"},
            icon: {
              path: google.maps.SymbolPath.CIRCLE,
              strokeOpacity: 0,
              scale: 1
            },
            map: map,
            visible: false
          });
        });

        // Add a marker clusterer to manage the markers.
        var markerCluster = new MarkerClusterer(map, markers,{
            //gridSize: 60,
            styles:[
                {height: 53, width: 53, textColor:"#DE6C4A", textSize: 20}
                ]
            }
        );

        //Adjust markers based on zoom
/* 			var previousView
        google.maps.event.addListener(map, 'zoom_changed', function() {
          var i, currentView, zoom, regionMap, markerMap;
          //previousView = currentView;
          zoom = map.getZoom();
          if (zoom === 4)
              currentView = "regional";
          else
              currentView = undefined;

          if (currentView !== previousView) {
              if (currentView === "regional") {
                    regionVisibility = true;
                    clusterVisibility = false;
              } else {
                    regionVisibility = false;
                    clusterVisibility = true;
              }

              for (i = 0; i < regionMarkers.length; i++) {
                  regionMarkers[i].setVisible(regionVisibility);
              }
              for (i = 0; i < markers.length; i++) {
                  markers[i].setVisible(clusterVisibility);
              }
              previousView = currentView;
              markerCluster.redraw();
          }
        }); */
      }
    var locations = <?php echo $latLongJson; ?>;
    var regions   = [{position:{lat: -25.274398, lng: 133.775136},title: '4'},{position:{lat: 36.778261, lng: -119.4179324},title: '1'},{position:{lat: 46.818188, lng: 8.227512},title: '4'},{position:{lat: 39.5500507, lng: -105.7820674},title: '1'}];

</script>
<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
</script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=<?php echo $googleApiKey; ?>&callback=init1">
</script>
