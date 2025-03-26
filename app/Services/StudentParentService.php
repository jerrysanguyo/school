<?php

namespace App\Services;

use App\Models\StudentParent;

class StudentParentService
{
    public function create(array $data): StudentParent
    {
        return StudentParent::create($data);
    }

    public function update(array $data, $studentParent): void
    {
        $studentParent->update($data);
    }

    public function destroy($studentParent): void
    {
        $studentParent->delete();
    }
}