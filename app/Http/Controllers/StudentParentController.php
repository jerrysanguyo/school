<?php

namespace App\Http\Controllers;

use App\Models\StudentParent;
use App\Http\Requests\StudentParentRequest;
use App\Services\StudentParentService;
use Illuminate\Support\Facades\Auth;

class StudentParentController extends Controller
{
    protected $studentParentService;

    public function __construct(StudentParentRequest $studentParentService)
    {
        $this->studentParentService = $studentParentService;
    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(StudentParentRequest $request)
    {
        $this->studentParentService->store($request->validated());

        return redirect()
            ->route()
            ->with('success', 'Student parent created successfully');
    }

    public function show(StudentParent $studentParent)
    {
        //
    }

    public function edit(StudentParent $studentParent)
    {
        //
    }
    
    public function update(StudentParentRequest $request, StudentParent $studentParent)
    {
        $this->studentParentService->update($request->validated(), $studentParent);

        return redirect()
            ->route()
            ->with('success', 'Student parent created successfully');
    }
    
    public function destroy(StudentParent $studentParent)
    {
        $this->studentParentService->destroy($studentParent);
    }
}
