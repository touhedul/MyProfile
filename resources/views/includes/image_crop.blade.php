@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.js"></script>

    <script>
        document.getElementById('image').addEventListener('change', function() {
            var reader = new FileReader();
            reader.onload = function(e) {
                // Destroy previous croppie instance if any
                if (window.croppie) {
                    window.croppie.destroy();
                }

                // Initialize Croppie
                var croppie = new Croppie(document.getElementById('imagePreview'), {
                    viewport: {
                        width: {{ $width }},
                        height: {{ $height }},
                        type: 'square' // Change as per your requirement
                    },
                    enableZoom: true,
                    boundary: {
                        width: '100%',
                        height: '300'
                    }
                });

                croppie.bind({
                    url: e.target.result
                });
                window.croppie = croppie;
            };
            reader.readAsDataURL(this.files[0]);
            $("#imageDiv").hide();
        });

        document.getElementById('submitBtn').addEventListener('click', function(e) {
            var cropResult = window.croppie.get();
            document.getElementById('cropCoordinates').value = JSON.stringify(cropResult);
            return true;
        });
    </script>
@endpush
