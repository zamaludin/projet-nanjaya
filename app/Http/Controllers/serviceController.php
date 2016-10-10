<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateserviceRequest;
use App\Http\Requests\UpdateserviceRequest;
use App\Repositories\serviceRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class serviceController extends InfyOmBaseController
{
    /** @var  serviceRepository */
    private $serviceRepository;

    public function __construct(serviceRepository $serviceRepo)
    {
        $this->serviceRepository = $serviceRepo;
    }

    /**
     * Display a listing of the service.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->serviceRepository->pushCriteria(new RequestCriteria($request));
        $services = $this->serviceRepository->all();

        return view('services.index')
            ->with('services', $services);
    }

    /**
     * Show the form for creating a new service.
     *
     * @return Response
     */
    public function create()
    {
        return view('services.create');
    }

    /**
     * Store a newly created service in storage.
     *
     * @param CreateserviceRequest $request
     *
     * @return Response
     */
    public function store(CreateserviceRequest $request)
    {
        $input = $request->all();

        $service = $this->serviceRepository->create($input);

        Flash::success('service saved successfully.');

        return redirect(route('services.index'));
    }

    /**
     * Display the specified service.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $service = $this->serviceRepository->findWithoutFail($id);

        if (empty($service)) {
            Flash::error('service not found');

            return redirect(route('services.index'));
        }

        return view('services.show')->with('service', $service);
    }

    /**
     * Show the form for editing the specified service.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $service = $this->serviceRepository->findWithoutFail($id);

        if (empty($service)) {
            Flash::error('service not found');

            return redirect(route('services.index'));
        }

        return view('services.edit')->with('service', $service);
    }

    /**
     * Update the specified service in storage.
     *
     * @param  int              $id
     * @param UpdateserviceRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateserviceRequest $request)
    {
        $service = $this->serviceRepository->findWithoutFail($id);

        if (empty($service)) {
            Flash::error('service not found');

            return redirect(route('services.index'));
        }

        $service = $this->serviceRepository->update($request->all(), $id);

        Flash::success('service updated successfully.');

        return redirect(route('services.index'));
    }

    /**
     * Remove the specified service from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $service = $this->serviceRepository->findWithoutFail($id);

        if (empty($service)) {
            Flash::error('service not found');

            return redirect(route('services.index'));
        }

        $this->serviceRepository->delete($id);

        Flash::success('service deleted successfully.');

        return redirect(route('services.index'));
    }
}
