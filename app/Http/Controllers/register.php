<?php

namespace App\Http\Controllers;
use App\Models\permision;
use Illuminate\Http\Request;

class register extends Controller
{
    

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