<?php

namespace App\Http\Controllers;

use App\Models\barangay;
use App\Services\BarangayService;
use App\Http\Requests\BarangayRequest;
use Illuminate\Support\Facades\Auth;

class BarangayController extends Controller
{
    protected $barangayService;

    public function __construct(BarangayService $barangayService)
    {
        $this->barangayService = $barangayService;
    }

    public function index()
    {
        //
    }
    
    public function create()
    {
        //
    }
    
    public function store(BarangayRequest $request)
    {
        $this->barangayService->store($request->validated());

        return redirect()
            ->route()
            ->with('success', 'Barangay successfully added.');
    }
    
    public function show(barangay $barangay)
    {
        //
    }
    
    public function edit(barangay $barangay)
    {
        //
    }
    
    public function update(BarangayRequest $request, barangay $barangay)
    {
        $this->barangayService->update($request->validated(), $barangay);

        return redirect()
            ->route()
            ->with('success', 'Barangay successfully updated.');
    }
    
    public function destroy(barangay $barangay)
    {
        $this->barangayService->destroy($barangay);

        return redirect()
            ->route()
            ->with('success', 'Barangay successfully deleted.');
    }
}
