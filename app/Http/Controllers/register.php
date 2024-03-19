<?php

namespace App\Http\Controllers;
use App\Models\permision;
use Illuminate\Http\Request;

class register extends Controller
{
    /*
    public function addpermision(Request $request, $id){
       /*
        $data=new permision();
        $name = permision::findOrFail(1);
        $name -> permision=request('permision');
      
       // $name -> save();
        
        return view('change-user');




 
$record = permision::findOrFail($id);
$record->update($request->all()); // Mass assignment for convenience

return redirect()->route('records.index')->with('success', 'Record updated successfully!');

    }

*/

    public function edit(Request $request, $email)
    {
        $user = permision::where('email', $email)->firstOrFail();
        return view('change-user', compact('user'));
    }

    public function update(Request $request, $email)
    {
       // $request->validate([
         //   'permission' => 'required', // Add validation rules for permission
        //]);

        $user = permision::where('email', $email)->firstOrFail();
        $user->permision = $request->input('permision');
        $user->save();

        return redirect('/')->with('success', 'Permission updated successfully'); // Replace with appropriate redirect route


}
}