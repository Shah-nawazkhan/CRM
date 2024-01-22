<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function index()
    {
        $leads = Lead::all();
        return view('leads.index', compact('leads'));
    }

    public function create()
    {
        return view('leads.create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        // Create a new lead in the database
        Lead::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'status' => 'new', // Default status for a new lead
            // You may add more fields here as needed
        ]);

        // Redirect to the leads list with a success message
        return redirect('/leads')->with('success', 'Lead added successfully!');
    }

    public function show($id)
    {
        $lead = Lead::findOrFail($id);
        return view('leads.show', compact('lead'));
    }

    public function edit($id)
    {
        $lead = Lead::findOrFail($id);
        return view('leads.edit', compact('lead'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'status' => 'required',
        ]);

        // Update the lead in the database
        $lead = Lead::findOrFail($id);
        $lead->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'status' => $request->input('status'),
            // You may add more fields here as needed
        ]);

        // Redirect to the lead details with a success message
        return redirect('/leads/' . $lead->id)->with('success', 'Lead updated successfully!');
    }

    public function destroy($id)
    {
        // Find and delete the lead from the database
        $lead = Lead::findOrFail($id);
        $lead->delete();

        // Redirect to the leads list with a success message
        return redirect('/leads')->with('success', 'Lead deleted successfully!');
    }
}
