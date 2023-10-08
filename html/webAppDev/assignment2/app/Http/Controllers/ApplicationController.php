<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Project;
use App\Models\User;
use App\Models\Image;
use App\Models\Role;
use App\Models\Pdf;
use App\Models\Adminproject;
use App\Models\Application;
use App\Models\Studentproject;

class ApplicationController extends Controller
{
    public function store(Request $request, $id) {

        // before creating project application check the validation rules
        $this->validate($request, [
            'justification' => 'required',
            'roles' => 'required',

            //custom error message?
            ]);

            $application = Application::find($id);
            $application->justification = $request->justification;
            $application->save();

            //delete the old roles of the user and replace them with the new ones
            $student = $application->user;
            $student->roles()->delete();

            //the roles that guy choose in the form
            $fetchedRoles = $request->roles;

            foreach ($fetchedRoles as $roleName) {
                $role = new Role(['role_name' => $roleName]);
                $student->roles()->save($role);
            }

        return redirect(route('home'))->with('success', 'application created');
        
    }
}
