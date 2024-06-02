<div wire:ignore x-data="{ position: $wire.entangle('position') }"
    x-on:location_updated="position.lat = $event.detail.lat; position.lng = $event.detail.lng; position.address=$event.detail.address">
    <div class="place-autocomplete-card" id="place-autocomplete-card">
    </div>
    <div id="map-edit" class="h-96 w-full"></div>
</div>


@script
    <script>
        let map;
        let marker;
        let infoWindow;
        let geocoder;

        async function initMap() {

            const position = {
                lat: $wire.position.lat,
                lng: $wire.position.lng,
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
                zoom: 13,
                center: position,
                mapId: "22f0c99fb3d4ff9d",
                mapTypeControl: false,
            });

            geocoder = new google.maps.Geocoder();

            if (position.lat != 0) 
                loadLocationInfo(position.lat, position.lng);

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

                $wire.dispatch('location_updated', {
                    'lat': marker.position.lat,
                    'lng': marker.position.lng,
                    'address': place.formattedAddress
                });
            });

            marker.addListener("dragend", (event) => {
                const position = marker.position;

                loadLocationInfo(position.lat, position.lng)
                
               
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

        function loadLocationInfo(lat, lng) {
            const latlng = new google.maps.LatLng(lat, lng);
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
                            updateInfoWindow(
                                getDisplayContent(results.name, results.formatted_address),
                                location
                            );

                            $wire.dispatch('location_updated', {
                                'lat': lat,
                                'lng': lng,
                                'address': results.formatted_address
                            });
                        }
                    );
                })
                .catch((error) => {
                    console.log(error);
                });
        }
    </script>
@endscript


@assets
    <script>
        (g => {
            var h, a, k, p = "The Google Maps JavaScript API",
                c = "google",
                l = "importLibrary",
                q = "__ib__",
                m = document,
                b = window;
            b = b[c] || (b[c] = {});
            var d = b.maps || (b.maps = {}),
                r = new Set,
                e = new URLSearchParams,
                u = () => h || (h = new Promise(async (f, n) => {
                    await (a = m.createElement("script"));
                    e.set("libraries", [...r] + "");
                    for (k in g) e.set(k.replace(/[A-Z]/g, t => "_" + t[0].toLowerCase()), g[k]);
                    e.set("callback", c + ".maps." + q);
                    a.src = `https://maps.${c}apis.com/maps/api/js?` + e;
                    d[q] = f;
                    a.onerror = () => h = n(Error(p + " could not load."));
                    a.nonce = m.querySelector("script[nonce]")?.nonce || "";
                    m.head.append(a)
                }));
            d[l] ? console.warn(p + " only loads once. Ignoring:", g) : d[l] = (f, ...n) => r.add(f) && u().then(() =>
                d[l](f, ...n))
        })
        ({
            key: "{{ env('GOOGLE_MAPS_API_KEY') }}",
            v: "beta"
        });
    </script>
@endassets
