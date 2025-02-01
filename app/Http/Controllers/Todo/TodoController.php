<?php

namespace App\Http\Controllers\Todo;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request('search')){
       $data = Todo::where('task' , 'like', '%' . request('search') . '%')->paginate(2);

        }else{

            $data = Todo::orderBy('task' , 'asc')->paginate(2);
        }
        return view('app.app', compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'task' => 'required|min:2|max:15'
        ],[
            'task.min' => 'Minimal 2 karakter ya',
            'task.max' => 'Maximal 15 karakter ya',
        ]);

        $data = [
            'task'=>$request->input('task')
        ];
        

        Todo::create($data);
        return redirect()->route('todo.app')->with('success', 'Berhasil Disimpan !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Todo::findOrFail($id);
        return view('app.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'task' => 'required|min:2|max:15'
        ],[
            'task.min' => 'Minimal 2 karakter ya',
            'task.max' => 'Maximal 15 karakter ya',
        ]);

        $data = [
            'task'=>$request->input('task')
        ];

        Todo::where('id', $id)->update($data);
        return redirect()->route('todo.app')->with('success', 'Berhasil Diupdate !');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Todo::where('id', $id)->delete();
        return redirect()->route('todo.app')->with('success', 'Berhasil Dihapus!');
    }
}
