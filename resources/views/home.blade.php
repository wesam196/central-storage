<!DOCTYPE html>

<html>
<head>

<title>Home File</title>

</head>

<body>
    <h1>welcome {{Auth::user()->name}}</h1>
    <h1>The App work well!!</h1>
    <h1>no errors</h1>

    <h1>{{session('access')}}</h1>
   <form action="/" method="POST">
    @csrf
    <table>
        <tr>
            <th>file name</th>
            <th>share</th>
            <th>download</th>
            
        </tr>
        @foreach($data as $file)
        <tr>
            <th>{{$file->filename}}</th>
            <th><input type="checkbox" name='assigned[]' value={{$file->id}} ></th>
            <th><input type="checkbox" name='download[]' value={{$file->id}} ></th>
           
        </tr>
        @endforeach
    </table>

    <select name="user_id[]" id="">
            @foreach($users as $user)
            <option value= {{$user->name}} > {{$user->name}} </option>
            @endforeach
        </select>
    <input type="submit" onclick="submit" >
    <button></button>
</form>





<script>
    function limitCheckboxSelection(groups) {
        groups.forEach(function(groupName) {
            var checkboxes = document.querySelectorAll('input[name="' + groupName + '"]');
            checkboxes.forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                    if (this.checked) {
                        // Uncheck all checkboxes in the other groups
                        groups.forEach(function(otherGroupName) {
                            if (otherGroupName !== groupName) {
                                var otherCheckboxes = document.querySelectorAll('input[name="' + otherGroupName + '"]');
                                otherCheckboxes.forEach(function(otherCheckbox) {
                                    otherCheckbox.checked = false;
                                });
                            }
                        });
                    }
                });
            });
        });
    }

    // Specify group names in an array
    var groups = ['assigned[]', 'download[]'];

    // Call the function with the array of group names
    limitCheckboxSelection(groups);
</script>

</body>

</html>