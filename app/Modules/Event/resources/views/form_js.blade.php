@section('script-resource')
<script src="{{asset('/front/js/jquery.validate.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/image-uploader.min.js')}}"></script>
<script src="{{asset('admin/js/event_form.js')}}"></script>
<script>
$('.input-images-1').imageUploader();
</script>
@include('vendor.sweetalert2.sweetalert2_js')
@endsection
