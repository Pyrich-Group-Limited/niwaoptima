<?php

namespace App\Http\Controllers;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Modules\Shared\Models\Branch;
use Maatwebsite\Excel\Facades\Excel;
use App\Repositories\BookingRepository;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use App\Imports\Paymentrecords;

class BookingController extends AppBaseController
{
    /** @var BookingRepository $bookingRepository*/
    private $bookingRepository;

    public function __construct(BookingRepository $bookingRepo)
    {
        $this->bookingRepository = $bookingRepo;
    }

    /**
     * Display a listing of the Booking.
     */
    public function index(Request $request)
    {
        $bookings = $this->bookingRepository->paginate(10);

        return view('bookings.index')
            ->with('bookings', $bookings);
    }

    /**
     * Show the form for creating a new Booking.
     */
    public function create()
    {
        $state = Branch::all();
        $trip = [
            'one_way' => 'ONE WAY',
            'return' => 'Return'
        ];
        return view('bookings.create', compact('state', 'trip'));
    }

    // public function paymentupload(Request $request)
    // {
    //     // dd($request->all());
    //     $validator = Validator::make($request->all(), [
    //         'file' => 'required|file|mimes:csv,xlsx'
    //     ]);

    //     if ($validator->fails()) {
    //         return back()->withErrors($validator)->withInput();
    //     }

    //     if ($request->hasFile('file')) {

    //         try {
    //             //code...
    //             Excel::import(new Paymentrecords, request()->file('file'));

    //             Flash::success('SUCCESSFULLY DONE');
    //             return back()->with('message', 'SUCCESSFULLY DONE');
    //         } catch (\Throwable $th) {
    //             Flash::error($th);
    //             return back()->with('message', $th);
    //         }
    //     }
    //     // Flash::error('Error in the upload , please check and retry it');
    // }

    public function paymentupload(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'file' => 'required|file|mimes:csv,xlsx'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('file')) {

            try {
                $file=$request->file('file');
                $import= new Paymentrecords();
                Excel::import($import,$file);

                // Flash::success('SUCCESSFULLY DONE');
                // return back()->with('message', 'SUCCESSFULLY DONE');
                // return redirect()->route('payhistory')->with('message', 'SUCCESSFULLY DONE');
                // return redirect()->route('payhistory')->with('message', 'SUCCESSFULLY DONE');
                return redirect()->route('payhistory')->with('message','SUCCESSFULLY Uploaded');
            } catch (\Throwable $th) {
                Flash::error($th->getMessage());
                return back()->with('message', $th->getMessage());
            }
        }
        // Flash::error('Error in the upload , please check and retry it');
    }



    public function paymenthistoryform()
    {
        return view('upload.payment');
    }
    /**
     * Store a newly created Booking in storage.
     */
    public function store(CreateBookingRequest $request)
    {
        $input = $request->all();
        // dd($input);

        $booking = $this->bookingRepository->create($input);

        Flash::success('Booking saved successfully.');

        return redirect(route('bookings.index'));
    }

    /**
     * Display the specified Booking.
     */
    public function show($id)
    {
        $booking = $this->bookingRepository->find($id);

        if (empty($booking)) {
            Flash::error('Booking not found');

            return redirect(route('bookings.index'));
        }

        return view('bookings.show')->with('booking', $booking);
    }

    /**
     * Show the form for editing the specified Booking.
     */
    public function edit($id)
    {
        $booking = $this->bookingRepository->find($id);

        if (empty($booking)) {
            Flash::error('Booking not found');

            return redirect(route('bookings.index'));
        }

        return view('bookings.edit')->with('booking', $booking);
    }

    /**
     * Update the specified Booking in storage.
     */
    public function update($id, UpdateBookingRequest $request)
    {
        $booking = $this->bookingRepository->find($id);

        if (empty($booking)) {
            Flash::error('Booking not found');

            return redirect(route('bookings.index'));
        }

        $booking = $this->bookingRepository->update($request->all(), $id);

        Flash::success('Booking updated successfully.');

        return redirect(route('bookings.index'));
    }

    /**
     * Remove the specified Booking from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $booking = $this->bookingRepository->find($id);

        if (empty($booking)) {
            Flash::error('Booking not found');

            return redirect(route('bookings.index'));
        }

        $this->bookingRepository->delete($id);

        Flash::success('Booking deleted successfully.');

        return redirect(route('bookings.index'));
    }
}
