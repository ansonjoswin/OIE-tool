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

        $node = [];
        $link = [];
        $currentSchoolIndex = 0;
        $currentNodeindex = 0;
        $currentExpenseIndex = 0;
        $currentRevenueIndex = 0;
        $currentlinkindex = 0;
        $currentInstructionindex = 0;
        $currentResearchIndex = 0;
        $currentPubServiceIndex = 0;
        $currentAcadSupportIndex = 0;
        $currentInstitutionalSupportIndex = 0;
        $currentStudentServicesIndex = 0;
        $currentOtherExpensesIndex = 0;
        $currentTutionFeesindex = 0;
        $currentStateAppropriationindex = 0;
        $currentLocalAppropriationindex = 0;
        $currentGovtGrantindex = 0;
        $currentPrivateGrantindex = 0;
        $currentInvestmentReturnindex = 0;
        $currentOtherRevenueindex = 0;
        $totalExpense = 0;
        $totalRevenue = 0;

        foreach ($schools as $school) {
            $currentSchool = School::find($school);
            $currentschoolindex = $currentNodeindex;
            $node[$currentNodeindex++] = ['node' => $currentschoolindex, 'name' => $currentSchool->school_name];
            $expenses = $currentSchool->expense()->where('year', $year)->get();
            $revenues = $currentSchool->revenue()->where('year', $year)->get();
            foreach($expenses as $expense) {
                if ($currentExpenseIndex == 0) {
                    $currentExpenseIndex = $currentNodeindex;
                    $node[$currentNodeindex++] = ['node' => $currentExpenseIndex, 'name' => 'Expenses'];
                    $currentInstructionindex = $currentNodeindex;
                    $node[$currentNodeindex++] = ['node' => $currentInstructionindex, 'name' => 'Instruction'];
                    $currentResearchIndex = $currentNodeindex;
                    $node[$currentNodeindex++] = ['node' => $currentResearchIndex, 'name' => 'Research'];
                    $currentPubServiceIndex = $currentNodeindex;
                    $node[$currentNodeindex++] = ['node' => $currentPubServiceIndex, 'name' => 'Public Service'];
                    $currentAcadSupportIndex = $currentNodeindex;
                    $node[$currentNodeindex++] = ['node' => $currentAcadSupportIndex, 'name' => 'Academic Support'];
                    $currentInstitutionalSupportIndex = $currentNodeindex;
                    $node[$currentNodeindex++] = ['node' => $currentInstitutionalSupportIndex, 'name' => 'Institutional Support'];
                    $currentStudentServicesIndex = $currentNodeindex;
                    $node[$currentNodeindex++] = ['node' => $currentStudentServicesIndex, 'name' => 'Student Services'];
                    $currentOtherExpensesIndex = $currentNodeindex;
                    $node[$currentNodeindex++] = ['node' => $currentOtherExpensesIndex, 'name' => 'Other Expenses'];
                }
                $totalExpense = $expense->instruction + $expense->research + $expense->public_service /*+$expense->academic_support +
                    $expense->institutional_support + $expense->student_services + $expense->other_expenses*/;

                $link[$currentlinkindex++] = ['source' => $currentschoolindex, 'target' => $currentExpenseIndex, 'value' => $totalExpense];
                $link[$currentlinkindex++] = ['source' => $currentExpenseIndex, 'target' => $currentInstructionindex, 'value' => $expense->instruction];
                $link[$currentlinkindex++] = ['source' => $currentExpenseIndex, 'target' => $currentResearchIndex, 'value' => $expense->research];
                $link[$currentlinkindex++] = ['source' => $currentExpenseIndex, 'target' => $currentPubServiceIndex, 'value' => $expense->public_service];
                $link[$currentlinkindex++] = ['source' => $currentExpenseIndex, 'target' => $currentAcadSupportIndex, 'value' => $expense->academic_support];
                $link[$currentlinkindex++] = ['source' => $currentExpenseIndex, 'target' => $currentInstitutionalSupportIndex, 'value' => $expense->institutional_support];
                $link[$currentlinkindex++] = ['source' => $currentExpenseIndex, 'target' => $currentStudentServicesIndex, 'value' => $expense->student_services];
                $link[$currentlinkindex++] = ['source' => $currentExpenseIndex, 'target' => $currentOtherExpensesIndex, 'value' => $expense->other_expenses];
            }
            foreach ($revenues as $revenue) {
                if ($currentRevenueIndex == 0) {
                    $currentRevenueIndex = $currentNodeindex;
                    $node[$currentNodeindex++] = ['node' => $currentRevenueIndex, 'name' => 'Revenues'];
                    $currentTutionFeesindex = $currentNodeindex;
                    $node[$currentNodeindex++] = ['node' => $currentTutionFeesindex, 'name' => 'Tution and Fees'];
                    $currentStateAppropriationindex = $currentNodeindex;
                    $node[$currentNodeindex++] = ['node' => $currentStateAppropriationindex, 'name' => 'State Appropriation'];
                    $currentLocalAppropriationindex = $currentNodeindex;
                    $node[$currentNodeindex++] = ['node' => $currentLocalAppropriationindex, 'name' => 'Local Appropriation'];
                    $currentGovtGrantindex = $currentNodeindex;
                    $node[$currentNodeindex++] = ['node' => $currentGovtGrantindex, 'name' => 'Government Grant and Contracts'];
                    $currentPrivateGrantindex = $currentNodeindex;
                    $node[$currentNodeindex++] = ['node' => $currentPrivateGrantindex, 'name' => 'Private Grant and Contracts'];
                    $currentInvestmentReturnindex = $currentNodeindex;
                    $node[$currentNodeindex++] = ['node' => $currentInvestmentReturnindex, 'name' => 'Investment Return'];
                    $currentOtherRevenueindex = $currentNodeindex;
                    $node[$currentNodeindex++] = ['node' => $currentOtherRevenueindex, 'name' => 'Other Revenues'];
                }
                $totalRevenue = $revenue->tution_and_fees + $revenue->state_appropriations + $revenue->local_appropriations + $revenue->government_grants_and_contracts +
                    $revenue->private_gifts_grants_and_contracts + $revenue->investment_return + $revenue->other_revenues;

                $link[$currentlinkindex++] = ['source' => $currentschoolindex, 'target' => $currentRevenueIndex, 'value' => $totalRevenue];
                $link[$currentlinkindex++] = ['source' => $currentRevenueIndex, 'target' => $currentTutionFeesindex, 'value' => $revenue->tution_and_fees];
                $link[$currentlinkindex++] = ['source' => $currentRevenueIndex, 'target' => $currentStateAppropriationindex, 'value' => $revenue->state_appropriations];
                $link[$currentlinkindex++] = ['source' => $currentRevenueIndex, 'target' => $currentLocalAppropriationindex, 'value' => $revenue->local_appropriations];
                $link[$currentlinkindex++] = ['source' => $currentRevenueIndex, 'target' => $currentGovtGrantindex, 'value' => $revenue->government_grants_and_contracts];
                $link[$currentlinkindex++] = ['source' => $currentRevenueIndex, 'target' => $currentPrivateGrantindex, 'value' => $revenue->private_gifts_grants_and_contracts];
                $link[$currentlinkindex++] = ['source' => $currentRevenueIndex, 'target' => $currentInvestmentReturnindex, 'value' => $revenue->investment_return];
                $link[$currentlinkindex++] = ['source' => $currentRevenueIndex, 'target' => $currentOtherRevenueindex, 'value' => $revenue->other_revenues];
            }
            }

        $nodeArray = [];
        $nodeArray = ["nodes" => $node, "links" => $link];
        return $nodeArray;
    }
}
