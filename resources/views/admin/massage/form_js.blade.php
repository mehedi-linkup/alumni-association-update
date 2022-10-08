@section('script-resource')
<script src="{{asset('/front/js/jquery.validate.min.js')}}"></script>
<script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
<script src="{{asset('admin/js/massage_form.js')}}"></script>
@include('vendor.sweetalert2.sweetalert2_js')
@endsection
