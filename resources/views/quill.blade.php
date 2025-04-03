<!DOCTYPE html>
<html>
<head>
    <title>Quill Rich Text Editor</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />
</head>
<body>
<div class="container">
    <div class="card mt-5">
        <h3 class="card-header p-3">Quill Rich Text Editor</h3>
        <div class="card-body">
            <form method="POST" action="{{ route('quill.store') }}">
                @csrf
            
                <div class="mb-3">
                    <label class="form-label" for="inputName">Title:</label>
                    <input 
                        type="text" 
                        name="title" 
                        id="inputName"
                        class="form-control @error('title') is-invalid @enderror" 
                        placeholder="Name">

                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
             
                <div class="mb-3">
                    <label class="form-label" for="inputEmail">Body:</label>
                    <div id="quill-editor" class="mb-3" style="height: 300px;">
                    </div>
                    <textarea 
                        rows="3" 
                        class="mb-3 d-none" 
                        name="body" 
                        id="quill-editor-area"></textarea>


                    @error('body')
                        <span class="text-danger">{{ $message }}</span>
                    @endif
                </div>
           
                <div class="mb-3">
                    <button class="btn btn-success btn-submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>

<script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        if (document.getElementById('quill-editor-area')) {
            var editor = new Quill('#quill-editor', {
                theme: 'snow'
            });
            var quillEditor = document.getElementById('quill-editor-area');
            editor.on('text-change', function() {
                quillEditor.value = editor.root.innerHTML;
            });

            quillEditor.addEventListener('input', function() {
                editor.root.innerHTML = quillEditor.value;
            });
        }
    });
</script>
</html>
