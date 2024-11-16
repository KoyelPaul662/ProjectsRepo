<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth()->user()->id;
        //dd($user);
        $todos= Todo::all()->where('user_id','=',$user);
        //dd($todos);
        return Inertia::render('Todo',['todos'=>$todos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {    
        $todo= $request->validate(
            [
                'content' => 'required',
            ]
        );
            $todo['user_id']=auth()->user()->id;
            $todo['is_done']=false;
            Todo::create($todo);
            return redirect('todos');   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        return Inertia::render('editform', ['todo' => $todo]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Todo $todo)
    {
        request()->validate([
            'content' => 'required|string|max:255',
        ]);
    
        $todo->update([
            'content' => request('content'),
        ]);
    
        return redirect()->route('todos'); // Redirect to the todo list page
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect('todos');
    }
}
