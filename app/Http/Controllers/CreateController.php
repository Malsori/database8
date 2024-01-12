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
        else
        {
            return redirect()->back()->with('status','Todo nuk  eshte krijuar');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
