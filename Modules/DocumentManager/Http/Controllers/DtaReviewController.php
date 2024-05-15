<?php

namespace Modules\DTARequests\Http\Controllers;

use Modules\DTARequests\Http\Requests\CreateDtaReviewRequest;
use Modules\DTARequests\Http\Requests\UpdateDtaReviewRequest;
use App\Http\Controllers\AppBaseController;
use Modules\DTARequests\Repositories\DtaReviewRepository;
use Illuminate\Http\Request;
use Flash;

class DtaReviewController extends AppBaseController
{
    /** @var DtaReviewRepository $dtaReviewRepository*/
    private $dtaReviewRepository;

    public function __construct(DtaReviewRepository $dtaReviewRepo)
    {
        $this->dtaReviewRepository = $dtaReviewRepo;
    }

    /**
     * Display a listing of the DtaReview.
     */
    public function index(Request $request)
    {
        $dtaReviews = $this->dtaReviewRepository->paginate(10);

        return view('dta_reviews.index')
            ->with('dtaReviews', $dtaReviews);
    }

    /**
     * Show the form for creating a new DtaReview.
     */
    public function create()
    {
        return view('dta_reviews.create');
    }

    /**
     * Store a newly created DtaReview in storage.
     */
    public function store(CreateDtaReviewRequest $request)
    {
        $input = $request->all();

        $dtaReview = $this->dtaReviewRepository->create($input);

        Flash::success('Dta Review saved successfully.');

        return redirect(route('dtaReviews.index'));
    }

    /**
     * Display the specified DtaReview.
     */
    public function show($id)
    {
        $dtaReview = $this->dtaReviewRepository->find($id);

        if (empty($dtaReview)) {
            Flash::error('Dta Review not found');

            return redirect(route('dtaReviews.index'));
        }

        return view('dta_reviews.show')->with('dtaReview', $dtaReview);
    }

    /**
     * Show the form for editing the specified DtaReview.
     */
    public function edit($id)
    {
        $dtaReview = $this->dtaReviewRepository->find($id);

        if (empty($dtaReview)) {
            Flash::error('Dta Review not found');

            return redirect(route('dtaReviews.index'));
        }

        return view('dta_reviews.edit')->with('dtaReview', $dtaReview);
    }

    /**
     * Update the specified DtaReview in storage.
     */
    public function update($id, UpdateDtaReviewRequest $request)
    {
        $dtaReview = $this->dtaReviewRepository->find($id);

        if (empty($dtaReview)) {
            Flash::error('Dta Review not found');

            return redirect(route('dtaReviews.index'));
        }

        $dtaReview = $this->dtaReviewRepository->update($request->all(), $id);

        Flash::success('Dta Review updated successfully.');

        return redirect(route('dtaReviews.index'));
    }

    /**
     * Remove the specified DtaReview from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $dtaReview = $this->dtaReviewRepository->find($id);

        if (empty($dtaReview)) {
            Flash::error('Dta Review not found');

            return redirect(route('dtaReviews.index'));
        }

        $this->dtaReviewRepository->delete($id);

        Flash::success('Dta Review deleted successfully.');

        return redirect(route('dtaReviews.index'));
    }
}
