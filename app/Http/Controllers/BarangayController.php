<?php

namespace App\Http\Controllers;

use App\Models\barangay;
use App\Models\District;
use App\Services\BarangayService;
use App\Http\Requests\BarangayRequest;
use App\DataTables\CmsDataTable;
use Illuminate\Support\Facades\Auth;

class BarangayController extends Controller
{
    protected $barangayService;

    public function __construct(BarangayService $barangayService)
    {
        $this->barangayService = $barangayService;
    }

    public function index(CmsDataTable $dataTable)
    {
        $page_title = 'Barangay';
        $resource = 'barangay';
        $columns = [
            'id',
            'district',
            'name',
            'remarks',
            'Created',
            'Updated',
            'Action',
        ];
        $records = Barangay::getAllBarangays();
        $subRecords = District::getAllDistrict();

        return $dataTable->render('cms.index', compact(
            'page_title',
            'resource',
            'columns',
            'records',
            'dataTable',
            'subRecords'
        ));
    }
    
    public function create()
    {
        //
    }
    
    public function store(BarangayRequest $request)
    {
        $data = $request->validated();
        $this->barangayService->store($data);

        return redirect()
            ->route(Auth::user()->role . '.barangay.index')
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
            ->route(Auth::user()->role . '.barangay.index')
            ->with('success', 'Barangay successfully updated.');
    }
    
    public function destroy(barangay $barangay)
    {
        $this->barangayService->destroy($barangay);

        return redirect()
            ->route(Auth::user()->role . '.barangay.index')
            ->with('success', 'Barangay successfully deleted.');
    }
}
