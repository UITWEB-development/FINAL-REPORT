@assets
<script>(g => { var h, a, k, p = "The Google Maps JavaScript API", c = "google", l = "importLibrary", q = "__ib__", m = document, b = window; b = b[c] || (b[c] = {}); var d = b.maps || (b.maps = {}), r = new Set, e = new URLSearchParams, u = () => h || (h = new Promise(async (f, n) => { await (a = m.createElement("script")); e.set("libraries", [...r] + ""); for (k in g) e.set(k.replace(/[A-Z]/g, t => "_" + t[0].toLowerCase()), g[k]); e.set("callback", c + ".maps." + q); a.src = `https://maps.${c}apis.com/maps/api/js?` + e; d[q] = f; a.onerror = () => h = n(Error(p + " could not load.")); a.nonce = m.querySelector("script[nonce]")?.nonce || ""; m.head.append(a) })); d[l] ? console.warn(p + " only loads once. Ignoring:", g) : d[l] = (f, ...n) => r.add(f) && u().then(() => d[l](f, ...n)) })
    ({ key: "{{ env('GOOGLE_MAPS_API_KEY') }}", v: "beta" });</script>
@endassets



<div wire:ignore>
    <div id="map" class="h-96 w-full"></div>

    @script
    <script>
        let map;
        let marker;
        let infoWindow;
        let geocoder;

      async function initMap() {

        const position = { lat: $wire.lat, lng: $wire.lng };

        const { Map, InfoWindow } = await google.maps.importLibrary("maps");
        const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");
        const {Place} = await google.maps.importLibrary("places");

        
        map = new Map(document.getElementById("map"), {
          zoom: 5,
          center: position,
          mapId: "22f0c99fb3d4ff9d",
        });

        geocoder = new google.maps.Geocoder();

        infoWindow = new google.maps.InfoWindow({});
        marker = new AdvancedMarkerElement({
          map: map,
          position: position,
        });

        $wire.on('location-updated', (event) => {
          const latlng = new google.maps.LatLng(event.lat, event.lng);
          marker.position = latlng;

          geocoder
            .geocode({
              location: latlng,
            })
            .then((response) => {
              
              const location = response.results[0].geometry.location;
              const placesService = new google.maps.places.PlacesService(map);

              placesService.getDetails(
                { placeId: response.results[0].place_id },
                function (results, status) {
                  const place = results.geometry
                  if (place.viewport) {
                    map.fitBounds(place.viewport);
                  } else {
                    map.setCenter(place.location);
                    map.setZoom(17);
                  }
                  updateInfoWindow(
                    getDisplayContent(results.name, results.formatted_address),
                    location
                  );
                }
              );
            })
            .catch((error) => {
              window.alert(`Error`);
            });
          
        })

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