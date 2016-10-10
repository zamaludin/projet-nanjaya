<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatevehicleRequest;
use App\Http\Requests\UpdatevehicleRequest;
use App\Repositories\vehicleRepository;
use App\Repositories\usersRepository;
use App\Repositories\type_transportationRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class vehicleController extends InfyOmBaseController
{
    /** @var  vehicleRepository */
    private $vehicleRepository;
    private $typeTransportationRepository;
    private $usersRepository;
    public function __construct(vehicleRepository $vehicleRepo,usersRepository $usersRepo, type_transportationRepository $typeTransportationRepo)
    {
        $this->vehicleRepository = $vehicleRepo;
        $this->usersRepository = $usersRepo;
        $this->typeTransportationRepository = $typeTransportationRepo;
    }

    /**
     * Display a listing of the vehicle.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->vehicleRepository->pushCriteria(new RequestCriteria($request));
        $vehicles = $this->vehicleRepository->all();

        return view('vehicles.index')
            ->with('vehicles', $vehicles);
    }

    /**
     * Show the form for creating a new vehicle.
     *
     * @return Response
     */
    public function create()
    {
        $typeTransportations = $this->typeTransportationRepository->all();
        $users = $this->usersRepository->all();
        $statusedit = 1;
        return view('vehicles.create')->with('types',$typeTransportations )
        ->with('users', $users)->with('vehicle', $statusedit);
    }

    /**
     * Store a newly created vehicle in storage.
     *
     * @param CreatevehicleRequest $request
     *
     * @return Response
     */
    public function store(CreatevehicleRequest $request)
    {
        $input = $request->all();

        $vehicle = $this->vehicleRepository->create($input);

        Flash::success('vehicle saved successfully.');

        return redirect(route('vehicles.index'));
    }

    /**
     * Display the specified vehicle.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $vehicle = $this->vehicleRepository->findWithoutFail($id);

        if (empty($vehicle)) {
            Flash::error('vehicle not found');

            return redirect(route('vehicles.index'));
        }

        return view('vehicles.show')->with('vehicle', $vehicle);
    }

    /**
     * Show the form for editing the specified vehicle.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $vehicle = $this->vehicleRepository->findWithoutFail($id);
        $typeTransportations = $this->typeTransportationRepository->all();
        $users = $this->usersRepository->all();
        if (empty($vehicle)) {
            Flash::error('vehicle not found');

            return redirect(route('vehicles.index'));
        }

        return view('vehicles.edit')->with('vehicle', $vehicle)->with('types',$typeTransportations )
        ->with('users', $users);
    }

    /**
     * Update the specified vehicle in storage.
     *
     * @param  int              $id
     * @param UpdatevehicleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatevehicleRequest $request)
    {
        $vehicle = $this->vehicleRepository->findWithoutFail($id);

        if (empty($vehicle)) {
            Flash::error('vehicle not found');

            return redirect(route('vehicles.index'));
        }

        $vehicle = $this->vehicleRepository->update($request->all(), $id);

        Flash::success('vehicle updated successfully.');

        return redirect(route('vehicles.index'));
    }

    /**
     * Remove the specified vehicle from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $vehicle = $this->vehicleRepository->findWithoutFail($id);

        if (empty($vehicle)) {
            Flash::error('vehicle not found');

            return redirect(route('vehicles.index'));
        }

        $this->vehicleRepository->delete($id);

        Flash::success('vehicle deleted successfully.');

        return redirect(route('vehicles.index'));
    }
}
