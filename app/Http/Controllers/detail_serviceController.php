<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\Createdetail_serviceRequest;
use App\Http\Requests\Updatedetail_serviceRequest;
use App\Repositories\detail_serviceRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class detail_serviceController extends InfyOmBaseController
{
    /** @var  detail_serviceRepository */
    private $detailServiceRepository;

    public function __construct(detail_serviceRepository $detailServiceRepo)
    {
        $this->detailServiceRepository = $detailServiceRepo;
    }

    /**
     * Display a listing of the detail_service.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->detailServiceRepository->pushCriteria(new RequestCriteria($request));
        $detailServices = $this->detailServiceRepository->all();

        return view('detailServices.index')
            ->with('detailServices', $detailServices);
    }

    /**
     * Show the form for creating a new detail_service.
     *
     * @return Response
     */
    public function create()
    {
        return view('detailServices.create');
    }

    /**
     * Store a newly created detail_service in storage.
     *
     * @param Createdetail_serviceRequest $request
     *
     * @return Response
     */
    public function store(Createdetail_serviceRequest $request)
    {
        $input = $request->all();

        $detailService = $this->detailServiceRepository->create($input);

        Flash::success('detail_service saved successfully.');

        return redirect(route('detailServices.index'));
    }

    /**
     * Display the specified detail_service.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $detailService = $this->detailServiceRepository->findWithoutFail($id);

        if (empty($detailService)) {
            Flash::error('detail_service not found');

            return redirect(route('detailServices.index'));
        }

        return view('detailServices.show')->with('detailService', $detailService);
    }

    /**
     * Show the form for editing the specified detail_service.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $detailService = $this->detailServiceRepository->findWithoutFail($id);

        if (empty($detailService)) {
            Flash::error('detail_service not found');

            return redirect(route('detailServices.index'));
        }

        return view('detailServices.edit')->with('detailService', $detailService);
    }

    /**
     * Update the specified detail_service in storage.
     *
     * @param  int              $id
     * @param Updatedetail_serviceRequest $request
     *
     * @return Response
     */
    public function update($id, Updatedetail_serviceRequest $request)
    {
        $detailService = $this->detailServiceRepository->findWithoutFail($id);

        if (empty($detailService)) {
            Flash::error('detail_service not found');

            return redirect(route('detailServices.index'));
        }

        $detailService = $this->detailServiceRepository->update($request->all(), $id);

        Flash::success('detail_service updated successfully.');

        return redirect(route('detailServices.index'));
    }

    /**
     * Remove the specified detail_service from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $detailService = $this->detailServiceRepository->findWithoutFail($id);

        if (empty($detailService)) {
            Flash::error('detail_service not found');

            return redirect(route('detailServices.index'));
        }

        $this->detailServiceRepository->delete($id);

        Flash::success('detail_service deleted successfully.');

        return redirect(route('detailServices.index'));
    }
}
