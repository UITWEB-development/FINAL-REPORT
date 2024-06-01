@assets
    <style>
        #infowindow-content .title {
            font-weight: bold;
        }

        #map #infowindow-content {
            display: inline;
        }
    </style>
@endassets

<div wire:ignore>
    <div class="place-autocomplete-card" id="place-autocomplete-card">
    </div>
    <div id="map-edit" class="h-96 w-full"></div>

    @script
        <script>
            let map;
            let marker;
            let infoWindow;
            let geocoder;

            async function initMap() {

                const position = {
                    lat: 10.762622,
                    lng: 106.660172
                };

                const {
                    Map,
                    InfoWindow
                } = await google.maps.importLibrary("maps");
                const {
                    AdvancedMarkerElement
                } = await google.maps.importLibrary("marker");
                const {
                    Place
                } = await google.maps.importLibrary("places");


                map = new Map(document.getElementById("map-edit"), {
                    zoom: 10,
                    center: position,
                    mapId: "22f0c99fb3d4ff9d",
                    mapTypeControl: false,
                });

                geocoder = new google.maps.Geocoder();

                const placeAutocomplete = new google.maps.places.PlaceAutocompleteElement();
                placeAutocomplete.id = "place-autocomplete-input";

                const card = document.getElementById("place-autocomplete-card");
                card.appendChild(placeAutocomplete);

                infoWindow = new google.maps.InfoWindow({});

                marker = new AdvancedMarkerElement({
                    map: map,
                    position: position,
                    gmpDraggable: true,
                    gmpClickable: true,
                });

                placeAutocomplete.addEventListener("gmp-placeselect", async ({
                    place
                }) => {
                    await place.fetchFields({
                        fields: ["displayName", "formattedAddress", "location"],
                    });

                    if (place.viewport) {
                        map.fitBounds(place.viewport);
                    } else {
                        map.setCenter(place.location);
                        map.setZoom(17);
                    }

                    updateInfoWindow(
                        getDisplayContent(place.displayName, place.formattedAddress),
                        place.location
                    );
                    marker.position = place.location;

                    $wire.dispatch('location_updated', marker.position);
                });

                marker.addListener("dragend", (event) => {
                    console.log(marker);
                    const position = marker.position;

                    const latlng = new google.maps.LatLng(position.lat, position.lng);
                    geocoder
                        .geocode({
                            location: latlng,
                        })
                        .then((response) => {
                            const location = response.results[0].geometry.location;
                            const placesService = new google.maps.places.PlacesService(map);

                            placesService.getDetails({
                                    placeId: response.results[0].place_id
                                },
                                function(results, status) {
                                    console.log(results, results.name);
                                    updateInfoWindow(
                                        getDisplayContent(results.name, results.formatted_address),
                                        location
                                    );

                                    $wire.dispatch('location_updated', position);
                                }
                            );
                        })
                        .catch((error) => {
                            window.alert(`Error`);
                        });
                });

            }



            initMap();


            function updateInfoWindow(content, center) {
                infoWindow.setContent(content);
                infoWindow.setPosition(center);
                infoWindow.open({
                    map,
                    anchor: marker,
                    shouldFocus: false,
                });
            }

            function getDisplayContent(name, address) {
                let content =
                '<div id="infowindow-content">' +
                '<span id="place-displayname" class="title font-bold">' +
                name +
                "</span><br />" +
                '<span id="place-address">' +
                address +
                "</span>" +
                "</div>";
                return content;
            }
        </script>
    @endscript

</div>
