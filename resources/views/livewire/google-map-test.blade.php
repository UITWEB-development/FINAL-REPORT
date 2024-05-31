@assets
<script>(g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})
  ({key: "{{ env('GOOGLE_MAPS_API_KEY') }}", v: "weekly"});</script>
@endassets

<div wire:ignore x-data="{ lat: 25.344, lng: -31.031 }" x-init="">
    <h3>My Google Maps Demo</h3>
    <!--The div element for the map -->
    <div id="map" class="h-96 w-full"></div>

    <!-- prettier-ignore -->


    @script
    <script>
      let map;

      async function initMap() {

        const position = { lat: $wire.lat, lng: $wire.lng };

        const { Map, InfoWindow } = await google.maps.importLibrary("maps");
        const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");

        
        map = new Map(document.getElementById("map"), {
          zoom: 5,
          center: position,
          mapId: "22f0c99fb3d4ff9d",
        });

        const infoWindow = new InfoWindow();
        const marker = new AdvancedMarkerElement({
          map: map,
          position: position,
          title: "Uluru",
          gmpDraggable: true,
        });

        marker.addListener("dragend", (event) => {
          const position = marker.position;
          console.log(position.lat, position.lng)
          infoWindow.close();
          infoWindow.setContent(`Pin dropped at: ${position.lat}, ${position.lng}`);
          infoWindow.open(marker.map, marker);

          $wire.dispatchSelf('pin-updated', { lat: position.lat, lng: position.lng })
          
        });
      }

      initMap();



    </script>
    @endscript

</div>