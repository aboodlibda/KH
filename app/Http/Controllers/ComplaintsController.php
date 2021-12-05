<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ComplaintsController extends Controller
{
    public function index()
    {
        $complaints = Complaint::all();
        return view('CMS.complaints.index',compact('complaints'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'phone'=>'required|numeric|digits_between:9,20',
            'description'=>'required',
        ]);
        $complaint = new Complaint();
        $complaint ->name=$request->get('name');
        $complaint ->phone=$request->get('phone');
        $complaint ->description=$request->get('description');
        $complaint->save();
        session()->flash('complaint_added');
        return redirect()->back();
    }

    public function destroy(Complaint $complaint)
    {
        //
    }
}
