<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Services\SchoolService;
use App\Http\Requests\SchoolRequest;
use Illuminate\Support\Facades\Auth;

class SchoolController extends Controller
{
    protected $schoolService;

    public function __construct(SchoolService $schoolService)
    {
        $this->schoolService = $schoolService;
    }

    public function index()
    {
        //
    }
    
    public function create()
    {
        //
    }
    
    public function store(SchoolRequest $request)
    {
        $this->schoolService->store($request->validated());

        return redirect()
            ->route()
            ->with('success', 'School has been added.');
    }
    
    public function show(School $school)
    {
        //
    }
    
    public function edit(School $school)
    {
        //
    }
    
    public function update(SchoolRequest $request, School $school)
    {
        $this->schoolService->update($request->validated(), $school);

        return redirect()
            ->route()
            ->with('success', 'School has been updated.');
    }
    
    public function destroy(School $school)
    {
        $this->schoolService->destroy($school);

        return redirect()
            ->route()
            ->with('success', 'School has been deleted.');
    }
}
