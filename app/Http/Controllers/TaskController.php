<?php

namespace Vue\Http\Controllers;

use Vue\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Response $request)
    {
        $tasks = Task::orderBy('id','DESC')->paginate($request->page);
        return [
            'pagination'  =>  [
                'total'         =>  $tasks->total(),
                'current_page'  =>  $tasks->currentPage(),
                'per_page'      =>  $tasks->perPage(),
                'last_page'     =>  $tasks->lastPage(),
                'from'          =>  $tasks->firstItem(),
                'to'            =>  $tasks->lastPage()
            ],
            'tasks'     =>  $tasks
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'keep' => 'required'
        ]);
        Task::create($request->all());
        return;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Vue\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $task = Task::findOrFail($task);
        return $task;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Vue\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $task = Task::find($task->id);
        $task->fill($request->all())->save();
        return;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Vue\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        Task::find($task->id)->delete();
        return;
    }
}
