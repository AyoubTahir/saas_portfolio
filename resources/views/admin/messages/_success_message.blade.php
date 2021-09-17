@if (session('success'))
    <script>
            Swal({
                title:"success",
                text:"{{ session('success') }}",
                type: 'success',
                padding: '2em'
            })
    </script>
@endif
