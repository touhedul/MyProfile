@section('script')
    {{-- <script src="{{ asset('admin/assets/scripts/ckeditor/ckeditor.js') }}"></script> --}}
    <script src="https://cdn.ckeditor.com/4.25.0-lts/standard/ckeditor.js"></script>

    <script>
        // CKEDITOR.replace( 'details' );
        CKEDITOR.replace('details', {
            filebrowserUploadUrl: "{{ route('ckeditor.image.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@endsection
