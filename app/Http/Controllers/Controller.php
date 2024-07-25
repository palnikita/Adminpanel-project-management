<?php


namespace App\Http\Controllers;

use App\Models\role;
use App\Models\Teams;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'gender' => 'required|string|in:male,female',
            'job_title' => 'required|string|max:255',
            'role' => 'required|string|max:255',

            'salary' => 'required|integer',
            'salterm' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:teams',
            'password' => 'required|string|min:8|confirmed',
        ]);
    
        $validatedData['password'] = Hash::make($validatedData['password']);
    
        Teams::create($validatedData);

    
        return redirect()->route('addmember')->with('success', 'Registration successful');
    }
    
    public function Teams(){
        $roles = role::pluck('rolename');

        return vieW('addmember' , compact('roles'));
    }


    public function showall()
    {
        $data = Teams::paginate(10); // Adjust the number 10 to however many items you want per page
        return view('datatable', compact('data'));
    }


    public function edit(Request $request , $id){
        $data = Teams::find($id);
        return view('edit' , compact('data'));
    }
    public function update(Request $request , $id){
        $data = Teams::find($id);
        $data->update($request->all());
        return redirect('showall')->with('success', 'Record update successfully');

    }



    public function destroy($id)
{
    $team = Teams::find($id);
    if ($team) {
        $team->delete();
        return response()->json(['success' => true, 'message' => 'Record deleted successfully']);
    }
    return response()->json(['success' => false, 'message' => 'Record not found']);
}

   




}
