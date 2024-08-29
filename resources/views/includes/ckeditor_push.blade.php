@push('script')
    <script src="{{ asset('admin/assets/scripts/ckeditor/ckeditor.js') }}"></script>
    <script>
        // CKEDITOR.replace( 'details' );
        CKEDITOR.replace('{{ $name }}', {
            filebrowserUploadUrl: "{{ route('ckeditor.image.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@endpush
