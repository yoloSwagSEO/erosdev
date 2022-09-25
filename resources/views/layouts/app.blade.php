<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lead manager</title>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" >
    <link href="{{asset('css/overide.css')}}" rel="stylesheet" >
    <link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">ErosDev Production</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>
<div class="container">
    @yield('content')
</div>
<footer class="d-flex flex-wrap justify-content-between align-items-center py-3 mt-4 border-top bg-primary text-white">
    <p class="col-md-4 mb-0">© 2022 Erosdev Production</p>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
<script
    src="https://code.jquery.com/jquery-3.6.1.min.js"
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
    crossorigin="anonymous"></script>
<script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>
<script>
    jQuery(document).ready(function($){
        var myDropzone =   new Dropzone("#my-dropzone",{
            url: "/upload",
            chunking:true,
            retryChunks:true,
            maxFilesize:null
        });
        myDropzone.on('sending', function (file, xhr, formData) {
            formData.append("_token", '{{ csrf_token() }}');

            // This will track all request so we can get the correct request that returns final response:
            // We will change the load callback but we need to ensure that we will call original
            // load callback from dropzone
            var dropzoneOnLoad = xhr.onload;
            xhr.onload = function (e) {
                dropzoneOnLoad(e)

                // Check for final chunk and get the response
                var uploadResponse = JSON.parse(xhr.responseText)
                if (typeof uploadResponse.name === 'string') {
                    console.log(uploadResponse);
                    $('#uploadResult').append('<input type="hidden" name="files[]" value="'+uploadResponse.path+uploadResponse.name+'" />');
                    //$list.append('<li>Uploaded: ' + uploadResponse.path + uploadResponse.name + '</li>')
                }
            }
        })
        //const dropzone = new Dropzone("div.my-dropzone", { url: "/file/post" });
    })
    // Dropzone has been added as a global variable.

</script>
@yield('script')
</body>
</html>
