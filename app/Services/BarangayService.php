<?php

namespace App\Services;

use App\Models\Barangay;

class BarangayService
{
    public function store(array $data): Barangay
    {
        return Barangay::create($data);
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