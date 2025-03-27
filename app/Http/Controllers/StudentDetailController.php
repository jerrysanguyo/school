<?php

namespace App\Http\Controllers;

use App\Models\StudentDetail;
use App\Services\StudentDetailService;
use App\Http\Requests\StudentDetailRequest;
use Illuminate\Support\Facades\Auth;

class StudentDetailController extends Controller
{
    protected $studentDetailService;

    public function __construct(StudentDetailService $studentDetailService)
    {
        $this->studentDetailService = $studentDetailService;
    }

    public function index()
    {
        //
    }
    
    public function create()
    {
        //
    }
    
    public function store(StudentDetailRequest $request)
    {
        $this->studentDetailService->store($request->validated());

        return redirect()
            ->route()
            ->with('success', 'Student detail has been added successfully.');
    }
    
    public function show(StudentDetail $studentDetail)
    {
        //
    }
    
    public function edit(StudentDetail $studentDetail)
    {
        //
    }
    
    public function update(StudentDetailRequest $request, StudentDetail $studentDetail)
    {
        $this->studentDetailService->update($request->validated(), $studentDetail);

        return redirect()
            ->route()
            ->with('success', 'Student detail has been updated successfully.');
    }
    
    public function destroy(StudentDetail $studentDetail)
    {
        $this->studentDetailService->destroy($studentDetail);

        return redirect()
            ->route()
            ->with('success', 'Student detail has been deleted successfully.');
    }
}
