<?php

namespace App\Http\Controllers;

use App\Models\Rfid;
use App\Services\RfidService;
use App\Http\Requests\RfidRequest;
use Illuminate\Support\Facades\Auth;

class RfidController extends Controller
{
    protected $rfidService;

    public function __construct(RfidService $rfidService)
    {
        $this->rfidService = $rfidService;
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
        $this->rfidService->store($request->validated());

        return redirect()
            ->route("")
            ->with("success","Rfid added successfully!");
    }
    
    public function show(Rfid $rfid)
    {
        //
    }
    
    public function edit(Rfid $rfid)
    {
        //
    }
    
    public function update(Request $request, Rfid $rfid)
    {
        $this->rfIdService->update($request->validated(), $rfid);

        return redirect()
            ->route("")
            ->with("success","Rfid updated successfully!");
    }
    
    public function destroy(Rfid $rfid)
    {
        $this->rfidService->destroy($rfid);

        return redirect()
            ->route("")
            ->with("success","Rfid deleted successfully!");
    }
}
