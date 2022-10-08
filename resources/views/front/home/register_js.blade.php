@section('script')
<script src="{{asset('/front/js/jquery.validate.min.js')}}"></script>
<script src="{{asset('/front/js/signup.js')}}"></script>
    <script>
      let map;
      function initMap() {
        const  naya = { lat: 23.7351749, lng: 90.4143842 };
    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 16,
        center: { lat: 23.7351749, lng: 90.4143842 },
        mapTypeControl: true,
        mapTypeControlOptions: {
        style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
        position: google.maps.ControlPosition.TOP_CENTER,
        },
        zoomControl: true,
        zoomControlOptions: {
        position: google.maps.ControlPosition.LEFT_CENTER,
        },
        scaleControl: true,
        streetViewControl: true,
        streetViewControlOptions: {
        position: google.maps.ControlPosition.LEFT_TOP,
        },
        fullscreenControl: true,
    });
    const marker = new google.maps.Marker({
    position: naya,
    map: map,
    });
    }
    //   function initMap() {
    //     map = new google.maps.Map(document.getElementById("map"), {
    //       center: { lat: 23.7351749, lng: 90.4143842 },
    //       zoom: 8,
    //     });
    //   }
    $(document).ready(function(){
        $("#map div").css("position","relative");
    })
    
    </script>
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDiOoqYhqTnxaW2JjAz0qdo8M3mc-lf_TY&callback=initMap&libraries=&v=weekly"
      async
    ></script>
    @include('vendor.sweetalert2.sweetalert2_js')
@endsection
