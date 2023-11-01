<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    protected $limited=5;

    public function index(){
        //$persons=Person::all();
        $persons=Person::latest()->simplePaginate($this->limited);
        return view('person.index',compact('persons'));
    }

    public function create(){
        return view('person.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'firstname'=>'required|unique:people|max:255',
            'lastname'=>'required|unique:people|max:255',
            'email'=>'required|unique:people|max:255',
            'city'=>'required|unique:people|max:255'
        ]);

        $person=new Person();
        $person->firstName=$request->firstname;
        $person->lastName=$request->lastname;
        $person->email=$request->email;
        $person->city=$request->city;
        $person->save();
        return redirect()->route('mainhome')->with('successMsg','person created successfully');

    }

    public function edit($id){
        $person=Person::findOrFail($id);
        return view('person.edit',compact('person'));
    }

    public function update(Request $request,$id){
        $person=Person::findOrFail($id);
        $person->firstName=$request->firstname;
        $person->lastName=$request->lastname;
        $person->email=$request->email;
        $person->city=$request->city;
        $person->save();
        return redirect()->route('mainhome')->with('successMsg','person edit success');
    }

    public function delete($id){
        $person=Person::findOrFail($id);
        $person->delete();
        return redirect()->route('mainhome')->with('alertMsg','person delete successMsg');
    }
}
