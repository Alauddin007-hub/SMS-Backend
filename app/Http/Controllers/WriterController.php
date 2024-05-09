<?php

namespace App\Http\Controllers;

use App\Models\Writer;
use Illuminate\Http\Request;

class WriterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $writers = Writer::all();
        return view('writer.index',compact('writers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('writer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'writer_name' => 'required',
            'short_description' => 'required|max:150',
            'image' => 'image|mimes:jpg,jpeg,png,gif',
        ]);
        // $imageName = Null;
        $imageName = time() . '.' . $request->image->extension();


        // echo $imageName;

        // $uuid = IdGenerator::generate(['table' => 'employees', 'field' => 'uuid', 'length' => 7, 'prefix' => 'EMP-']);

        if ($validated) {
            $request->avatar->move(('storage/writer'), $imageName);

            $data = [
                // 'uuid' => $uuid,
                'writer_name' => $request->writer_name,
                // 'joining_date' => $request->joining_date,
                'short_description' => $request->short_description,
                'image' => $imageName,
            ];

            dd($data);
            // Writer::create($data);
            // return redirect('writers')->with('success', "Writer has been added");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Writer $writer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Writer $writer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Writer $writer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Writer $writer)
    {
        //
    }
}
