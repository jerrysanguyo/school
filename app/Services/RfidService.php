<?php

namespace App\Services;

use App\Models\Rfid;

class RfidService
{
    public function store(array $data): RfidService
    {
        $rfid = Rfid::create($data);
    }

    public function update(array $data, $rfid): void
    {
        $rfid->update($data);
    }

    public function destro($rfid): void
    {
        $rfid->delete();
    }
}