<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Permission;
use App\Role;
use App\School;
use App\Http\Requests\SchoolRequest;


use Auth;
use Session;
use Log;


class SchoolsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('role:admin');

        $this->user = Auth::user();
        $this->list_schools = School::lists('school_name', 'school_id');
        $this->heading = "Schools";

        $this->viewData = [ 'user' => $this->user, 'list_schools' => $this->list_schools, 'heading' => $this->heading ];
    }

    public function index()
    {
        Log::info('SchoolsController.index: ');
        $schools = School::all();
        $this->viewData['schools'] = $schools;

        return view('schools.index', $this->viewData);
    }

    public function show(School $schools)
    {
        $object = $schools;
        Log::info('SchoolsController.show: '.$object->id.'|'.$object->name);
        $this->viewData['school'] = $object;
        $this->viewData['heading'] = "View School: ".$object->school_name;

        return view('schools.show', $this->viewData);
    }

    public function create()
    {
        Log::info('SchoolsController.create: ');
        $this->viewData['heading'] = "New School";

        return view('schools.create', $this->viewData);
    }

    public function store(SchoolRequest $request)
    {
        Log::info('SchoolsController.store - Start: ');
        $input = $request->all();
        $this->populateCreateFields($input);

        $object = School::create($input);
      //  $this->syncPermissions($object, $request->input('permissionlist'));
        Session::flash('flash_message', 'School successfully added!');
        Log::info('SchoolsController.store - End: '.$object->id.'|'.$object->name);

        return redirect()->back();
    }

    public function edit(School $schools)
    {
        $object = $schools;
        Log::info('SchoolsController.edit: '.$object->id.'|'.$object->name);
        $this->viewData['school'] = $object;
        $this->viewData['heading'] = "Edit School: ".$object->display_name;

        return view('schools.edit', $this->viewData);
    }

    public function update(School $schools, SchoolRequest $request)
    {
        $object = $schools;
        Log::info('SchoolsController.update - Start: '.$object->id.'|'.$object->name);
        $this->populateUpdateFields($request);

        $object->update($request->all());
        //$this->syncPermissions($object, $request->input('permissionlist'));
        Session::flash('flash_message', 'School successfully updated!');
        Log::info('SchoolsController.update - End: '.$object->id.'|'.$object->name);
        return redirect('schools');
    }

    /**
     * Destroy the given skeletal element.
     *
     * @param  Request  $request
     * @param  Role  $role
     * @return Response
     */
    public function destroy(Request $request, School $schools)
    {
        $object = $schools;
        Log::info('SchoolsController.destroy: Start: '.$object->id.'|'.$object->name);
        if ($this->authorize('destroy', $object))
        {
            Log::info('Authorization successful');
            $object->delete();
        }
        Log::info('SchoolsController.destroy: End: ');
        return redirect('/schools');
    }

    /**
     * Sync up the list of permissions for the given role record.
     *
     * @param  User  $role
     * @param  array  $permissions (id)
     */
    /*private function syncPermissions(Role $role, array $permissions)
    {
        Log::info('RolesController.syncPermissions: Start: '.$role->name);
        // ToDo: At somepoint need to update the timestamps and created_by/updated_by fields on the pivot table
        $role->perms()->sync($permissions);
//        $user->roles()->sync([$roles => ['created_by' => Auth::user()->name, 'updated_by' => Auth::user()->name]]);
    }*/
}
