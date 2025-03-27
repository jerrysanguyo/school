<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Services\DistrictService;
use App\Http\Requests\DistrictRequest;
use Illuminate\Support\Facades\Auth;

class DistrictController extends Controller
{
    protected $districtService;

    public function __construct(DistrictService $districtService)
    {
        $this->districtService = $districtService;
    }

    public function index()
    {
        //
    }
    
    public function create()
    {
        //
    }
    
    public function store(Request $request)
    {
        $this->districtService->store($request->validated());

        return redirect()
            ->route()
            ->with('succes', 'District created successfully');
    }
    
    public function show(DistrictController $districtController)
    {
        //
    }
    
    public function edit(DistrictController $districtController)
    {
        //
    }
    
    public function update(Request $request, DistrictController $districtController)
    {
        $this->districtService->update($request->validated(), $districtController);

        return redirect()
            ->route()
            ->with('succes', 'District updated successfully');
    }
    
    public function destroy(DistrictController $districtController)
    {
        $this->districtService->destroy($districtController);

        return redirect()
            ->route()
            ->with('succes', 'District deleted successfully');
    }
}
