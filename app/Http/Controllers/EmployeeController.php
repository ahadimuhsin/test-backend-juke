<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $employees = User::when($request->name, function($q) use($request){
            return $q->where("first_name", "LIKE", "%".$request->name."%")
            ->orWhere("last_name", "LIKE", "%".$request->name."%");
        })->get();

        return view('employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => ['required', 'email'],
            'date_of_birth' => ['required', 'date'],
            'position' => ['required'],
            'bank' => ['required'],
            'bank_account' => ['required', 'numeric'],
            'phone' => ['required', 'numeric'],
            'address' => ['required'],
            'province' => ['required'],
            'city' => ['required'],
            'zip_code' => ['required'],
            'ktp_number' => ['required'],
            'ktp' => ['required', 'mimes:pdf,png,jpg,jpeg']
        ]);

        $image = $request->file('ktp');
        $image->storeAs('public/ktp', $image->hashName());

        $data['ktp'] = $image->hashName();

        User::create($data);

        return redirect()->route('employee.index')->with('success', 'Data Berhasil Disimpan');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employee = User::findOrFail($id);

        return view('employee.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => ['required', 'email'],
            'date_of_birth' => ['date'],
            'position' => ['required'],
            'bank' => ['required'],
            'bank_account' => ['required', 'numeric'],
            'phone' => ['required', 'numeric'],
            'address' => ['required'],
            'province' => ['required'],
            'city' => ['required'],
            'zip_code' => ['required'],
            'ktp_number' => ['required'],
            'ktp' => ['mimes:pdf,png,jpg,jpeg']
        ]);

        $employee = User::findOrFail($id);

        $image = $request->file('ktp');

        if($image)
        {
            Storage::disk('local')->delete('public/ktp/'.$employee->ktp);
            $image->storeAs('public/ktp', $image->hashName());
        }

        $data['ktp'] = $image ? $image->hashName() : $employee->ktp;

        $employee->update($data);

        return redirect()->route('employee.index')->with('success', 'Data Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = User::findOrFail($id);
        Storage::disk('local')->delete('public/ktp/'.$employee->ktp);
        $employee->delete();

        return redirect()->route('employee.index')->with('success', 'Data Berhasil Dihapus');
    }
}
