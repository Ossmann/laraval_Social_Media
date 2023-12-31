<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;
use App\Models\Image;
use App\Models\Pdf;
use App\Models\Adminproject;
use App\Models\Studentproject;
use App\Models\Application;


class ProjectController extends Controller
{
    //get the form to apply for a project as student
    public function apply($project_id, $user_id)
    {
        $project = Project::find($project_id);
        $student = User::find($user_id);
        $application = new Application();
        $application->project_id = $project->id;
        $application->user_id = $student->id;
        $application->save();

        // dd($application->id);

        return view('pages.application_form')->with('application', $application);

    }
  
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::orderBy('year', 'desc')
            ->orderBy('trimester', 'desc')
            ->get()
            ->groupBy('year') // Group projects by year first
            ->map(function ($yearProjects) {
                return $yearProjects->groupBy('trimester'); // Nested grouping by trimester
            });
    
        return view('pages.projectslist')->with('projects', $projects);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('pages.create_project_form')->with('partner', User::find($id));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request) {

        //before creating project check the validation rules
        $this->validate($request, [
            'title' => 'required|min:5',
            'description' => 'required|min:3',
            'students_required' => 'required|numeric|min:3|max:6',
            'year' => 'required',
            'trimester' => 'required|numeric|min:1|max:3',

            //custom error message?
            ]);

        $project = new Project();
        $project->title = $request->title;
        $project->description = $request->description;
        $project->students_required = $request->students_required;
        $project->year = $request->year;
        $project->trimester = $request->trimester;
        $project->save();

            // Create the Images if they exist in the request
            if (request()->hasFile('images')) {
                $images = request()->file('images');
                foreach ($images as $imageFile) {
                    $image = new Image();
                    $image_store = $imageFile->store('projects_images', 'public');
                    $image->image = $image_store;
                    $image->project_id = $project->id;
                    $image->save();
                }
            }

            // Create the PDFs if they exist in the request
            if (request()->hasFile('pdfs')) {
                $pdfFiles = request()->file('pdfs');
                foreach ($pdfFiles as $pdfFile) {
                    $pdf = new Pdf();
                    $pdf_store = $pdfFile->store('projects_pdfs', 'public');
                    $pdf->file_name = $pdf_store;
                    $pdf->project_id = $project->id;
                    $pdf->save();
                }
            }

        //Create the AdminProject aswell which bridges User and Project for Partner Users
        $adminproject = new Adminproject();
        $adminproject->project_id = $project->id;
        $adminproject->user_id = $request->user_id;
        $adminproject->save();

        return redirect(route('home'));
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function show($id)
    {
        $project = Project::find($id);
        $partner = $project->adminproject->user;

        return view('pages.project')->with('project', $project)->with('partner', $partner);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::find($id);
        $adminproject = $project->adminproject;
        $adminproject->delete();
        $project->delete();

        return redirect(route('home'));
    }

}
