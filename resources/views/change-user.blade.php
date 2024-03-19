!DOCTYPE HTML
<html>
<head>


</head>

<body>

    <form action="{{ route('update-permission.update', $user->email) }}" method="POST">
    @csrf
    @method('PATCH')

    <div class="form-group">
        <label for="permision">Permission:</label>
        <input type="text" name="permision" id="permision" value="{{ $user->permision }}" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Update Permission</button>
</form>
</body>

</html>