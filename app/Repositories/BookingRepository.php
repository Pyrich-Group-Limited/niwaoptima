<?php

namespace App\Repositories;

use App\Models\Booking;
use App\Repositories\BaseRepository;

class BookingRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'departure_time',
        'departure_day',
        'departure_state',
        'no_of_passengers',
        'trip_duration',
        'trip_type',
        'price',
        'arrival_time',
        'arrival_day',
        'arrival_state'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Booking::class;
    }
}
