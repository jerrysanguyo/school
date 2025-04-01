<?php

namespace App\Services;

use App\Models\School;

class SchoolService
{
    public function store(array $data): School
    {
        return School::create([
            "name"  => $data["name"],
            'remarks'   => $data["remarks"],
            'created_by'    => auth()->user()->id,
            'updated_by'    => auth()->user()->id,
        ]);
    }

    public function update(array $data, $school): void
    {
        $school->update($data);
    }
    
    public function destroy($school): void
    {
        $school->delete();
    }
}