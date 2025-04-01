<?php

namespace App\Services;

use App\Models\Barangay;

class BarangayService
{
    public function store(array $data): Barangay
    {
        return Barangay::create([
            'name'  => $data['name'],
            'remarks' => $data['remarks'],
            'district_id' => $data['district_id'],
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
        ]);
    }

    public function update(array $data, $barangay): void
    {
        $barangay->update($data);
    }

    public function destroy($barangay): void
    {
        $barangay->delete();
    }
}