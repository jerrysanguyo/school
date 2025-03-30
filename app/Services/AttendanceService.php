<?php

namespace App\Services;

use App\Models\Attendance;

class AttendanceService
{
    public function store(array $data): Attendance
    {
        $attendance = Attendance::create($data);
    }

    public function update(array $data, $attendance): void
    {
        $attendance->update($data);
    }

    public function destroy($attendance): void
    {
        $attendance->delete();
    }
}