<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        // Create a new customer in the database
        Customer::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            // You may add more fields here as needed
        ]);

        // Redirect to the customers list with a success message
        return redirect('/customers')->with('success', 'Customer added successfully!');
    }

    public function show($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.show', compact('customer'));
    }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        // Update the customer in the database
        $customer = Customer::findOrFail($id);
        $customer->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            // You may add more fields here as needed
        ]);

        // Redirect to the customer details with a success message
        return redirect('/customers/' . $customer->id)->with('success', 'Customer updated successfully!');
    }

    public function destroy($id)
    {
        // Find and delete the customer from the database
        $customer = Customer::findOrFail($id);
        $customer->delete();

        // Redirect to the customers list with a success message
        return redirect('/customers')->with('success', 'Customer deleted successfully!');
    }
}
