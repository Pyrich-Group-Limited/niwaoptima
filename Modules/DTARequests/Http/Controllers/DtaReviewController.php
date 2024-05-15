<?php

namespace Modules\DTARequests\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\DTARequests\Repositories\DTAReviewRepository;
use Illuminate\Support\Facades\Auth;
use App\Repositories\StaffRepository;

class DtaReviewController extends Controller
{
    /** @var DTAReviewRepository $dtaReviewRepository*/
    private $dtaReviewRepository;

    /** @var StaffRepository $staffRepository*/
    private $staffRepository;

    public function __construct(DTAReviewRepository $dtaReviewRepo, StaffRepository $staffRepo)
    {
        $this->dtaReviewRepository = $dtaReviewRepo;
        $this->staffRepository = $staffRepo;
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $user_id = Auth::id();
        if (!empty($user_id) && $user_id != 1) {
            # code...
           // $dtareview = $this->dtaReviewRepository->getAllRequestsById($user_id);
           $dtareview = $this->dtaReviewRepository->getAllRequests();
        } else {
            # code...
            $dtareview = $this->dtaReviewRepository->getAllRequests();
        }



        return view('dtarequests::dtareview.index')->with('dtareviews', $dtareview);

    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('dtarequests::dtareview.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('dtarequests::dtareview.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('dtarequests::dtareview.edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
