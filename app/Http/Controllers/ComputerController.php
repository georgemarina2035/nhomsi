<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Computer;

class ComputerController extends Controller
{


    // Array of Static Data
    // private static function getData()
    // {
    //     return [
    //         ['id' => 1, 'name' => 'LG', 'origin' => 'Korea'],
    //         ['id' => 2, 'name' => 'HP', 'origin' => 'USA'],
    //         ['id' => 3, 'name' => 'Siemens', 'origin' => 'Germany'],
    //         ['id' => 4, 'name' => 'Lenovo', 'origin' => 'France'],
    //     ];
    // }


    //___________________________________________________
    public function index()
    {
        return view('computers.index', [
            'computers' => Computer::all()
        ]);
        // return view('computers.index', [
        //     'computers' => self::getData()
        // ]);
    }



    //____________________________________________________ 
    public function create()
    {
        return view('computers.create');
    }



    //____________________________________________________ 
    public function store(Request $request)
    {
        $request->validate([
            'computer-name' => 'required',
            'computer-origin' => 'required',
            'computer-price' => ['required', 'integer'],
        ]);
        
        $computer = new Computer();

        $computer->name = strip_tags($request->input('computer-name'));
        $computer->origin =strip_tags($request->input('computer-origin'));
        $computer->price = strip_tags($request->input('computer-price'));

        $computer->save();

        return redirect()->route('computers.index');
    }


    //____________________________________________________
    public function show(string $computer)
    {
        return view('computers.show', [
            'computer' => Computer::findorfail($computer)
        ]);

        // $computers = self::getData();
        // $index = array_search($computer, array_column($computers, 'id'));

        // if ($index === false) {
        //     abort(404);
        // }

        // return view('computers.show', [
        //     'computer' => $computers[$index]
        // ]);
    }


    //____________________________________________________
    public function edit(string $computer)
    {
        return view('computers.edit',[
            'computer' => Computer::findorfail($computer)
        ]);
    }

    //____________________________________________________
    public function update(Request $request, string $computer)
    {
        $request->validate([
            'computer-name' => 'required',
            'computer-origin' => 'required',
            'computer-price' => ['required', 'integer'],
        ]);

        $to_update = Computer::findorfail($computer);

        $to_update->name = strip_tags($request->input('computer-name'));
        $to_update->origin = strip_tags($request->input('computer-origin'));
        $to_update->price = strip_tags($request->input('computer-price'));

        $to_update->save();

        return redirect()->route('computers.show', $computer);

    }

    //____________________________________________________
    public function destroy(string $computer)
    {
        $to_delete = Computer::findorfail($computer);

        $to_delete->delete();
    
        return redirect()->route('computers.index');
    }
}
