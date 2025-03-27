<?php

namespace App\Services;

use App\Models\School;

class SchoolService
{
    public function store(array $data): School
    {
        return School::create($data);
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