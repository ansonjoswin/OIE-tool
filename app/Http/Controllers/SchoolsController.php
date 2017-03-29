<?php

namespace App\Http\Controllers;

use App\AllStudent;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Permission;
use App\Role;
use App\School;
use App\PartTimeStudent;
use App\FullTimeStudent;
use App\Http\Requests\SchoolRequest;


use Auth;
use Session;
use Log;
use DB;


class SchoolsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('role:admin');

        $this->user = Auth::user();
        $this->schools = School::all();
        $this->list_schools = School::lists('school_name', 'school_id');
        $this->heading = "Schools";
        $this->vizType = ['students' => 'Student Report', 'finance' => 'Finance Report' ];

        $this->viewData = [ 'school' => '', 'schools' => $this->schools, 'list_schools' => $this->list_schools, 'heading' => $this->heading, 'vizType' => $this->vizType];
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

        dd("Sachin");
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

    public function generate()
    {
        $this->viewData['heading'] = 'Generate Report';
        $row = [];
        $link = [];
        $nodeArray = ["nodes" => $row, "links" => $link];
        $this->viewData['nodeArray'] = $nodeArray;

        return view('schools/generate', $this->viewData);
    }

    public function generateReport(Request $request)
    {
        $nodeArray = [];
        $report_type = $request['report_type'];
        if($report_type == 'students') {
            $nodeArray = $this->generateSankey($request);
        } elseif ($report_type == 'finance') {
            $nodeArray = $this->generateFinanceSankey($request);
        }
        $this->viewData['nodeArray'] = $nodeArray;
        return view('schools/generate', $this->viewData);
    }

    public function generateSankey(Request $request)
    {
        $schools = $request->input('schoollist');
        $year = $request['term_year'];

        $node = [];
        $link = [];
        $currentschoolindex = 0;
        $currentptsindex = 0;
        $currentftsindex = 0;
        $currentallstudentindex = 0;
        $currentmenindex = 0;
        $currentwomenindex = 0;
        $currentnodeindex = 0;
        $currentlinkindex = 0;
        foreach($schools as $school) {
            $currentSchool = School::find($school);
            $currentschoolindex = $currentnodeindex;
            $node[$currentnodeindex++] = ['node' => $currentschoolindex, 'name' => $currentSchool->school_name];
            $students = $currentSchool->Student()->where('year', $year)->get();
            foreach($students as $student) {
                if($currentptsindex == 0) {
                    $currentptsindex = $currentnodeindex;
                    $node[$currentnodeindex++] = ['node' => $currentptsindex, 'name' => 'Part Time Students'];
                    $currentftsindex = $currentnodeindex;
                    $node[$currentnodeindex++] = ['node' => $currentftsindex, 'name' => 'Full Time Students'];
                    $currentallstudentindex = $currentnodeindex;
                    $node[$currentnodeindex++] = ['node' => $currentallstudentindex, 'name' => 'All Students'];
                    $currentmenindex = $currentnodeindex;
                    $node[$currentnodeindex++] = ['node' => $currentmenindex, 'name' => 'Men'];
                    $currentwomenindex = $currentnodeindex;
                    $node[$currentnodeindex++] = ['node' => $currentwomenindex, 'name' => 'Women'];
                }
                $link[$currentlinkindex++] = ['source' => $currentschoolindex, 'target' => $currentptsindex, 'value' => $student->part_time_total];
                $link[$currentlinkindex++] = ['source' => $currentptsindex, 'target' => $currentmenindex, 'value' => $student->part_time_men];
                $link[$currentlinkindex++] = ['source' => $currentptsindex, 'target' => $currentwomenindex, 'value' => $student->part_time_women];
                $link[$currentlinkindex++] = ['source' => $currentschoolindex, 'target' => $currentallstudentindex, 'value' => $student->total];
                $link[$currentlinkindex++] = ['source' => $currentallstudentindex, 'target' => $currentmenindex, 'value' => $student->men];
                $link[$currentlinkindex++] = ['source' => $currentallstudentindex, 'target' => $currentwomenindex, 'value' => $student->women];
                $link[$currentlinkindex++] = ['source' => $currentschoolindex, 'target' => $currentftsindex, 'value' => $student->full_time_total];
                $link[$currentlinkindex++] = ['source' => $currentftsindex, 'target' => $currentmenindex, 'value' => $student->full_time_men];
                $link[$currentlinkindex++] = ['source' => $currentftsindex, 'target' => $currentwomenindex, 'value' => $student->full_time_women];

            }
        }

        $nodeArray = [];
        $nodeArray = ["nodes" => $node, "links" => $link];
        return $nodeArray;
    }

    public function generateFinanceSankey(Request $request)
    {
        $schools = $request->input('schoollist');
        $year = $request['term_year'];

        $row = [];
        $link = [];
        $currentschoolindex = 0;
        $currentrevenueindex = 0;
        $currentexpenseindex = 0;
        $currentnodeindex = 0;
        $currentlinkindex = 0;
        $total_expense = 0;
        $total_revenue = 0;

        foreach($schools as $school) {
            $currentSchool = School::find($school);
            $currentschoolindex = $currentnodeindex;
            $row[$currentnodeindex++] = ['node' => $currentschoolindex, 'name' => $currentSchool->school_name];
            $expenses = $currentSchool->expense()->where('year', $year)->get();
            $revenues = $currentSchool->revenue()->where('year', $year)->get();
            foreach($expenses as $exp) {
                if($currentexpenseindex == 0) {
                    $currentexpenseindex = $currentnodeindex;
                    $row[$currentnodeindex++] = ['node' => $currentexpenseindex, 'name' => 'Expenses'];
                }
                $total_expense += $exp->core_expenses;
            }
            $link[$currentlinkindex++] = ['source' => $currentschoolindex, 'target' => $currentexpenseindex, 'value' => $total_expense];

            foreach($revenues as $rev) {
                if($currentrevenueindex == 0) {
                    $currentrevenueindex = $currentnodeindex;
                    $row[$currentnodeindex++] = ['node' => $currentrevenueindex, 'name' => 'Revenues'];
                }
                $total_revenue += $rev->core_revenue;
            }
            $link[$currentlinkindex++] = ['source' => $currentschoolindex, 'target' => $currentrevenueindex, 'value' => $total_revenue];
        }

        $nodeArray = [];
        $nodeArray = ["nodes" => $row, "links" => $link];
        return $nodeArray;
    }
}
