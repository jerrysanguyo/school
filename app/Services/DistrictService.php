<?php

namespace App\Services;

use App\Models\District;

class DistrictService
{
    public function store(array $data): District
    {
        return District::create($data);
    }

    public function update(array $data, $district): void
    {
        $district->update($data); 
    }

    public function destroy($district): void
    {
        $district->delete();
    }
}