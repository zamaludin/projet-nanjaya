<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatecomponentRequest;
use App\Http\Requests\UpdatecomponentRequest;
use App\Repositories\componentRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class componentController extends InfyOmBaseController
{
    /** @var  componentRepository */
    private $componentRepository;

    public function __construct(componentRepository $componentRepo)
    {
        $this->componentRepository = $componentRepo;
    }

    /**
     * Display a listing of the component.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->componentRepository->pushCriteria(new RequestCriteria($request));
        $keyword = '';
        $keyword .= '%';
        $keyword .= $request->input('q');
        $keyword .= '%';
        $statuscari = 0;
        $paginate = 10;
        if ($request->input('page')) {
            $curpage = $request->input('page');
        } else {
            $curpage =1;
        }

        $banyakData = count($this->componentRepository->all())/$paginate;
        //$query = "select * from `component` where `id_component` like '%te%' or name like '%te%' and `component`.`deleted_at` is null";

        if (strlen($request->input('q'))){
          $statuscari = 1;
         // echo '%'.$request->input('q').'%';
         $components = $this->componentRepository->findWhere([
           ['id_component', 'like', $keyword, 'or', 'name', 'like', $keyword ]


         ]);
       } else {
         $components = $this->componentRepository->paginate($paginate);
       }
        return view('components.index')
            ->with(['components' => $components,
            'statuscari' => $statuscari,
            'banyakData' => $banyakData,
            'curpage' => $curpage
          ]);
    }

    /**
     * Show the form for creating a new component.
     *
     * @return Response
     */
    public function create()
    {
        return view('components.create');
    }

    /**
     * Store a newly created component in storage.
     *
     * @param CreatecomponentRequest $request
     *
     * @return Response
     */
    public function store(CreatecomponentRequest $request)
    {
        $input = $request->all();

        $component = $this->componentRepository->create($input);

        Flash::success('component saved successfully.');

        return redirect(route('components.index'));
    }

    /**
     * Display the specified component.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $component = $this->componentRepository->findWithoutFail($id);

        if (empty($component)) {
            Flash::error('component not found');

            return redirect(route('components.index'));
        }

        return view('components.show')->with('component', $component);
    }

    /**
     * Show the form for editing the specified component.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $component = $this->componentRepository->findWithoutFail($id);

        if (empty($component)) {
            Flash::error('component not found');

            return redirect(route('components.index'));
        }

        return view('components.edit')->with('component', $component);
    }

    /**
     * Update the specified component in storage.
     *
     * @param  int              $id
     * @param UpdatecomponentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatecomponentRequest $request)
    {
        $component = $this->componentRepository->findWithoutFail($id);

        if (empty($component)) {
            Flash::error('component not found');

            return redirect(route('components.index'));
        }

        $component = $this->componentRepository->update($request->all(), $id);

        Flash::success('component updated successfully.');

        return redirect(route('components.index'));
    }

    /**
     * Remove the specified component from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $component = $this->componentRepository->findWithoutFail($id);

        if (empty($component)) {
            Flash::error('component not found');

            return redirect(route('components.index'));
        }

        $this->componentRepository->delete($id);

        Flash::success('component deleted successfully.');

        return redirect(route('components.index'));
    }
}
