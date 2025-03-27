<?php

namespace App\Services;

use App\Models\StudentDetail;

Class StudentDetailService
{
    public function store(array $data): StudentDetail
    {
        return StudentDetail::create($data);
    }

    public function update(array $data, $studentDetail): void
    {
        $studentDetail->update($data);
    }

    public function destroy($studentDetail): void
    {
        $studentDetail->delete();
    }
}