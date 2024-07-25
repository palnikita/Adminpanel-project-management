<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tasks;
use Illuminate\Support\Facades\Hash;

class TasksController extends Controller
{
    public function addtask(Request $request)
    {
        $validatedData = $request->validate([
            'employee' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'relatedto' => 'required|string|max:255',
            'collaborator' => 'required|string|max:255',
            'labels' => 'required|string|max:255',
            'startdate' => 'required|date',
            'enddate' => 'required|date',
            'file' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Tasks::create($validatedData);

        return redirect()->route('gettask')->with('success', 'Task added successfully');
    }

    public function gettask()
    {
        return view('addtask');
    }

    public function showall()
    {
        $data = Tasks::paginate(10); // Adjust the number 10 to however many items you want per page
        return view('showtask', compact('data'));
    }

    public function edittask($id)
    {
        $data = Tasks::findOrFail($id);
        return view('edittask', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Tasks::findOrFail($id);
        $validatedData = $request->validate([
            'employee' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'relatedto' => 'required|string|max:255',
            'collaborator' => 'required|string|max:255',
            'labels' => 'required|string|max:255',
            'startdate' => 'required|date',
            'enddate' => 'required|date',
            'file' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $data->update($validatedData);

        return redirect()->route('showtask')->with('success', 'Task updated successfully');
    }

    public function destroy($id)
    {
        $task = Tasks::findOrFail($id);
        if ($task) {
            $task->delete();
            return response()->json(['success' => true, 'message' => 'Task deleted successfully']);
        }
        return response()->json(['success' => false, 'message' => 'Task not found']);
    }
}
