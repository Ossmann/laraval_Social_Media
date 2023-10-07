<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;
use App\Models\Adminproject;


class UserController extends Controller
{
    //middleware function to check if 
    public function __construct() { 
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // paginate to show only 5 partners on the homepage
        $partners = User::where('type', 'partner')->paginate(5);
        return view('pages.index')->with('partners', $partners);
    }

    public function liststudents()
    {
        $students = User::where('type', 'student')->get();
        return view('pages.studentlist')->with('students', $students);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create_form')->with('manufacturers', Manufacturer::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        // $this->validate($request, [

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $partner = User::find($id);
        $adminprojects = $partner->adminprojects;

        // // Initialize an empty array to store the projects
         $projects = [];

        // // Loop through each admin project to retrieve the associated project
        foreach ($adminprojects as $adminproject) {
            $projects[] = $adminproject->project;
        }

        return view('pages.details')->with('partner', $partner)->with('projects', $projects);
    }

    //retrieve data for the profile page of students
    public function profile($id)
    {
        $student = User::find($id);

        return view('pages.studentprofile')->with('student', $student);
    }

    //get the form to update a studentprofile with the data
    public function updateprofile($id)
    {
        $student = User::find($id);

        return view('pages.update_profile_form')->with('student', $student);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student = User::find($id);
        $student->name = $request->name;
        $student->gpa = $request->gpa;
        $student->email = $request->email;
        // $student->roles = $request->roles;
        $student->save();
        return view('pages.studentprofile')->with('student', $student);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        $products = Product::all();
        return redirect('/product');

    }
}
