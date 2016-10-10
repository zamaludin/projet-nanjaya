<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\Createtype_serviceRequest;
use App\Http\Requests\Updatetype_serviceRequest;
use App\Repositories\type_serviceRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class type_serviceController extends InfyOmBaseController
{
    /** @var  type_serviceRepository */
    private $typeServiceRepository;

    public function __construct(type_serviceRepository $typeServiceRepo)
    {
        $this->typeServiceRepository = $typeServiceRepo;
    }

    /**
     * Display a listing of the type_service.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->typeServiceRepository->pushCriteria(new RequestCriteria($request));
        $typeServices = $this->typeServiceRepository->all();

        return view('typeServices.index')
            ->with('typeServices', $typeServices);
    }

    /**
     * Show the form for creating a new type_service.
     *
     * @return Response
     */
    public function create()
    {
        return view('typeServices.create');
    }

    /**
     * Store a newly created type_service in storage.
     *
     * @param Createtype_serviceRequest $request
     *
     * @return Response
     */
    public function store(Createtype_serviceRequest $request)
    {
        $input = $request->all();

        $typeService = $this->typeServiceRepository->create($input);

        Flash::success('type_service saved successfully.');

        return redirect(route('typeServices.index'));
    }

    /**
     * Display the specified type_service.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $typeService = $this->typeServiceRepository->findWithoutFail($id);

        if (empty($typeService)) {
            Flash::error('type_service not found');

            return redirect(route('typeServices.index'));
        }

        return view('typeServices.show')->with('typeService', $typeService);
    }

    /**
     * Show the form for editing the specified type_service.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $typeService = $this->typeServiceRepository->findWithoutFail($id);

        if (empty($typeService)) {
            Flash::error('type_service not found');

            return redirect(route('typeServices.index'));
        }

        return view('typeServices.edit')->with('typeService', $typeService);
    }

    /**
     * Update the specified type_service in storage.
     *
     * @param  int              $id
     * @param Updatetype_serviceRequest $request
     *
     * @return Response
     */
    public function update($id, Updatetype_serviceRequest $request)
    {
        $typeService = $this->typeServiceRepository->findWithoutFail($id);

        if (empty($typeService)) {
            Flash::error('type_service not found');

            return redirect(route('typeServices.index'));
        }

        $typeService = $this->typeServiceRepository->update($request->all(), $id);

        Flash::success('type_service updated successfully.');

        return redirect(route('typeServices.index'));
    }

    /**
     * Remove the specified type_service from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $typeService = $this->typeServiceRepository->findWithoutFail($id);

        if (empty($typeService)) {
            Flash::error('type_service not found');

            return redirect(route('typeServices.index'));
        }

        $this->typeServiceRepository->delete($id);

        Flash::success('type_service deleted successfully.');

        return redirect(route('typeServices.index'));
    }
}
