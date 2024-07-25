<?php

namespace App\Http\Controllers;

use App\Models\Leads;
use App\Models\status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;


class LeadsController extends Controller
{


      
   public function addLead(){
    return view('Addlead');
   }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'Leadtype' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'website' => 'required|string|max:255',
            'label' => 'string|max:255',
            'Date' => 'required|date',
            'Owner' => 'required|string|max:255',
            'Status' => 'required|string|max:255',
            'source' => 'required|string|max:255',
            'Address' => 'required|string|max:255',
            'Description' => 'required|string', 
               ]);


        Leads::create($validatedData);

        return redirect()->route('addLead')->with('success', 'Registration successful');
    }
   

    public function showall()
    {
        $data = Leads::paginate(10);
        return view('Lead', compact('data'));
    }


    public function edit(Request $request , $id){
        $data = Leads::find($id);
        return view('Leadedit' , compact('data'));
    }
    public function update(Request $request , $id){
        $data = Leads::find($id);
        $data->update($request->all());
        return redirect('Lead')->with('success', ' Record update successfully');
    }



    public function destroy($id)
{
    $Leads = Leads::find($id);
    if ($Leads) {
        $Leads->delete();
        return response()->json(['success' => true, 'message' => 'Record deleted successfully']);
    }
    return response()->json(['success' => false, 'message' => 'Record not found']);
}

   

// status 


public function statusshow(){
    $data = status::paginate(10);
    return view('status', compact('data'));
}

public function status(Request $request){
    $validatedData = $request->validate([
        'status' => 'required|string|max:255',
    ]);

    status::create($validatedData);

        return redirect()->route('statusshow')->with('success', 'Add status successful');
   

}

public function deletestatus($id)
{
    $status = status::find($id);
    if ($status) {
        $status->delete();
        return response()->json(['success' => true, 'message' => 'Record deleted successfully']);
    }
    return response()->json(['success' => false, 'message' => 'Record not found']);
}




// Method to get the status data for editing
public function editstatus($id)
{
    $status = Status::findOrFail($id);
    return response()->json($status);
}

// Method to update the specified status in the database
public function updatestatus(Request $request, $id)
{
    $request->validate([
        'status' => 'required|string|max:255',
    ]);

    $status = Status::findOrFail($id);
    $status->update([
        'status' => $request->input('status'),
    ]);

    return response()->json([
        'success' => true,
        'message' => 'Status updated successfully!',
        'id' => $status->id,
        'status' => $status->status
    ]);
}






}
