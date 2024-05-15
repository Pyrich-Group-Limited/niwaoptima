<?php

namespace App\Models;

use Modules\Shared\Models\Branch;
use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\SoftDeletes; use Illuminate\Database\Eloquent\Factories\HasFactory;
/**
 * @OA\Schema(
 *      schema="Booking",
 *      required={"departure_time","departure_day","departure_state","trip_duration","trip_type","price","arrival_time","arrival_day","arrival_state"},
 *      @OA\Property(
 *          property="departure_time",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="departure_day",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="departure_state",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="integer",
 *          format="int32"
 *      ),
 *      @OA\Property(
 *          property="no_of_passengers",
 *          description="",
 *          readOnly=false,
 *          nullable=true,
 *          type="integer",
 *          format="int32"
 *      ),
 *      @OA\Property(
 *          property="trip_duration",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="trip_type",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="price",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="arrival_time",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="arrival_day",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="arrival_state",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="integer",
 *          format="int32"
 *      ),
 *      @OA\Property(
 *          property="created_at",
 *          description="",
 *          readOnly=true,
 *          nullable=true,
 *          type="string",
 *          format="date-time"
 *      ),
 *      @OA\Property(
 *          property="updated_at",
 *          description="",
 *          readOnly=true,
 *          nullable=true,
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */class Booking extends Model
{
     use SoftDeletes;    use HasFactory;    public $table = 'bookings';

    public $fillable = [
        'departure_time',
        'departure_day',
        'departure_state',
        'no_of_passengers',
        'trip_duration',
        'trip_type',
        'price',
        'arrival_time',
        'arrival_day',
        'arrival_state',
        'sub_total',
        'discount',
        'tax',
        'levy',
        'vat',
        'total'
    ];

    protected $casts = [
        'departure_time' => 'string',
        'departure_day' => 'string',
        'departure_state' => 'integer',
        'no_of_passengers' => 'integer',
        'trip_duration' => 'string',
        'trip_type' => 'string',
        'price' => 'string',
        'arrival_time' => 'string',
        'arrival_day' => 'string',
        'arrival_state' => 'integer'
    ];

    public static array $rules = [
        // 'departure_time' => 'required',
        // 'departure_day' => 'required',
        // 'departure_state' => 'required',
        // 'no_of_passengers' => 'number',
        // 'trip_duration' => 'required',
        // 'trip_type' => 'required',
        // 'price' => 'required',
        // 'arrival_time' => 'required',
        // 'arrival_day' => 'required',
        // 'arrival_state' => 'required'
    ];
    public function arrival(){
        return $this->belongsTo(Branch::class,'arrival_state','id');
    }
    public function departure(){
        return $this->belongsTo(Branch::class,'departure_state','id');
    }

}
