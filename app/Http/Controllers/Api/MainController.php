<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Todos;

class MainController extends Controller
{
    public function get()
    {
        $data = Todos::orderBy('status', 'ASC')->orderBy('id', 'ASC')->get();
        return $data;
    }

    public function create(Request $r)
    {
        if(!$r->text) return response()->json(['success' => false, 'message' => 'Fill the input!']);

        Todos::create([
            'text' => $r->text,
            'status' => false
        ]);

        return response()->json(['success' => true, 'message' => 'Todo created!']);
    }

    public function update(Request $r, $id)
    {
        $todo = Todos::findOrFail($id);

        if($todo) {
            $todo->status = $r->status ? true : false;
            $todo->save();

            return response()->json(['success' => true, 'message' => 'Todo status updated!']);
        }

        return response()->json(['success' => false, 'message' => 'Todo not found!']);
    }

    public function delete($id)
    {
        $todo = Todos::findOrFail($id);

        if($todo) {
            $todo->delete();
            return response()->json(['success' => true, 'message' => 'Todo deleted!']);
        }

        return response()->json(['success' => false, 'message' => 'Todo not found!']);
    }
}
