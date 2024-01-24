<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use Illuminate\Support\Facades\DB;

class CreateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      
         // $todos=DB::table('todos')->where('title','First data')->get();

        // $todos=DB::table('todos')->get();
        // $todos=Todo::get();
        $todos=Todo::paginate(10);
        $open_todos=Todo::where('is_completed',0)->count();
        $completed_todos=Todo::where('is_completed',1)->count();

       
        return view('todos.viewfile', 
        [
            'todos' => $todos,
            'open_todos'=>$open_todos,
            'completed_todos'=>$completed_todos


        ]);
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'is_completed' => 'nullable|boolean',
        ]);

        // Todo::create([
        //     'title' => $request->input('title'),
        //     'is_completed' => $request->input('is_completed', false),
        // ]);

        // return redirect()->route('todos.index')->with('success', 'Todo created successfully');

        $data['title']=$request['title'];
        $data['is_completed']=($request['is_completed']==1)? 1:0;

        if(Todo::create($data))
        {
            return redirect()->route('index')->with('status','Todo eshte krijuar me sukses');

        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $todo = Todo::findOrFail($id);
        return view('todos.edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,int $id)
    {
        // dd($request->all(), $id);
      
    $todo = Todo::findOrFail($id);
    $todo->title = $request->input('title');
    $todo->is_completed = $request->has('is_completed');
    $todo->save();

    return redirect()->back()->with('success', 'Todo updated successfully');
    // return view('todos.viewfile');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();
    
        return redirect()->back()->with('success', 'Todo deleted successfully');
    }
}
