<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\Createtype_transportationRequest;
use App\Http\Requests\Updatetype_transportationRequest;
use App\Repositories\type_transportationRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class type_transportationController extends InfyOmBaseController
{
    /** @var  type_transportationRepository */
    private $typeTransportationRepository;

    public function __construct(type_transportationRepository $typeTransportationRepo)
    {
        $this->typeTransportationRepository = $typeTransportationRepo;
    }

    /**
     * Display a listing of the type_transportation.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->typeTransportationRepository->pushCriteria(new RequestCriteria($request));
        $typeTransportations = $this->typeTransportationRepository->all();

        return view('typeTransportations.index')
            ->with('typeTransportations', $typeTransportations);
    }

    /**
     * Show the form for creating a new type_transportation.
     *
     * @return Response
     */
    public function create()
    {
        return view('typeTransportations.create');
    }

    /**
     * Store a newly created type_transportation in storage.
     *
     * @param Createtype_transportationRequest $request
     *
     * @return Response
     */
    public function store(Createtype_transportationRequest $request)
    {
        $input = $request->all();

        $typeTransportation = $this->typeTransportationRepository->create($input);

        Flash::success('type_transportation saved successfully.');

        return redirect(route('typeTransportations.index'));
    }

    /**
     * Display the specified type_transportation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $typeTransportation = $this->typeTransportationRepository->findWithoutFail($id);

        if (empty($typeTransportation)) {
            Flash::error('type_transportation not found');

            return redirect(route('typeTransportations.index'));
        }

        return view('typeTransportations.show')->with('typeTransportation', $typeTransportation);
    }

    /**
     * Show the form for editing the specified type_transportation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $typeTransportation = $this->typeTransportationRepository->findWithoutFail($id);

        if (empty($typeTransportation)) {
            Flash::error('type_transportation not found');

            return redirect(route('typeTransportations.index'));
        }

        return view('typeTransportations.edit')->with('typeTransportation', $typeTransportation);
    }

    /**
     * Update the specified type_transportation in storage.
     *
     * @param  int              $id
     * @param Updatetype_transportationRequest $request
     *
     * @return Response
     */
    public function update($id, Updatetype_transportationRequest $request)
    {
        $typeTransportation = $this->typeTransportationRepository->findWithoutFail($id);

        if (empty($typeTransportation)) {
            Flash::error('type_transportation not found');

            return redirect(route('typeTransportations.index'));
        }

        $typeTransportation = $this->typeTransportationRepository->update($request->all(), $id);

        Flash::success('type_transportation updated successfully.');

        return redirect(route('typeTransportations.index'));
    }

    /**
     * Remove the specified type_transportation from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $typeTransportation = $this->typeTransportationRepository->findWithoutFail($id);

        if (empty($typeTransportation)) {
            Flash::error('type_transportation not found');

            return redirect(route('typeTransportations.index'));
        }

        $this->typeTransportationRepository->delete($id);

        Flash::success('type_transportation deleted successfully.');

        return redirect(route('typeTransportations.index'));
    }
}
