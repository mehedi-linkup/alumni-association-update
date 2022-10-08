@section('script-resource')
<script src="{{asset('/front/js/jquery.validate.min.js')}}"></script>
<script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
<script src="{{asset('admin/js/updatenews_form.js')}}"></script>
<script>
    CKEDITOR.replace('description',{
        width: '100%',
        height: 80
    })
    </script>
@include('vendor.sweetalert2.sweetalert2_js')
@endsection
