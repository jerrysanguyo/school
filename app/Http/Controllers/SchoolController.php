<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Services\SchoolService;
use App\Http\Requests\SchoolRequest;
use App\DataTables\CmsDataTable;
use Illuminate\Support\Facades\Auth;

class SchoolController extends Controller
{
    protected $schoolService;

    public function __construct(SchoolService $schoolService)
    {
        $this->schoolService = $schoolService;
    }

    public function index(CmsDataTable $dataTable)
    {
        $page_title = 'School';
        $resource = 'school';
        $columns = [
            'id',
            'name',
            'remarks',
            'created_by',
            'updated_by',
            'Action'
        ];
        $records = School::getSchool();

        return $dataTable->render('cms.index', compact(
            'page_title',
            'resource',
            'columns',
            'records',
            'dataTable'
        ));
    }
    
    public function store(SchoolRequest $request)
    {
        $data = $request->validated();
        $this->schoolService->store($data);

        return redirect()
            ->route(Auth::user()->role . '.school.index')
            ->with('success', 'School has been added.');
    }

    public function update(SchoolRequest $request, School $school)
    {
        $this->schoolService->update($request->validated(), $school);

        return redirect()
            ->route(Auth::user()->role . '.school.index')
            ->with('success', 'School has been updated.');
    }
    
    public function destroy(School $school)
    {
        $this->schoolService->destroy($school);

        return redirect()
            ->route(Auth::user()->role . '.school.index')
            ->with('success', 'School has been deleted.');
    }
}
