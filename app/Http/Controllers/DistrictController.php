<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Services\DistrictService;
use App\Http\Requests\DistrictRequest;
use Illuminate\Support\Facades\Auth;
use App\DataTables\CmsDataTable;

class DistrictController extends Controller
{
    protected $districtService;

    public function __construct(DistrictService $districtService)
    {
        $this->districtService = $districtService;
    }

    public function index(CmsDataTable $dataTable)
    {
        $page_title = 'Districts';
        $resource = 'district';
        $columns = [
            'id',
            'name',
            'remarks',
            'Created',
            'Updated',
            'Action',
        ];
        $records = District::getAllDistrict(); 

        return $dataTable->render('cms.index', compact(
                'page_title', 
                'resource',
                'columns',
                'records',
                'dataTable'
            ));
    }

    public function store(DistrictRequest $request)
    {
        $data = $request->validated();
        $this->districtService->store($data);
    
        return redirect()
            ->route(auth()->user()->role . '.district.index')
            ->with('success', 'District created successfully');
    }
    
    public function update(DistrictRequest $request, District $district)
    {
        $this->districtService->update($request->validated(), $district);

        return redirect()
            ->route(Auth::user()->role . '.district.index')
            ->with('success', 'District updated successfully');
    }
    
    public function destroy(District $district)
    {
        $this->districtService->destroy($district);

        return redirect()
            ->route(Auth::user()->role . '.district.index')
            ->with('success', 'District deleted successfully');
    }
}