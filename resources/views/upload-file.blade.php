
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
</head>
<body>
    <h1>Upload File</h1>
  
    <form action="{{ route('upload.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="file">Choose a file:</label>
            <input type="file" name="file[]" id="file" required  multiple>
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
</body>
</html>

