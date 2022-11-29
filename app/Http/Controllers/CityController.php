<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use Notify;
use Yajra\DataTables\DataTables;
use Auth;
use App\Helpers\Helper;
use Bugsnag\BugsnagLaravel\Facades\Bugsnag;
use RuntimeException;

class CityController extends Controller
{
    //
    protected $authLayout = '';
    protected $pageLayout = '';
    /**
     *  * * * * * * * * * * * * Create a new controller instance.
     *  * * * * * * * * * * * *
     *  * * * * * * * * * * * @return void
     *  * * * * * * * * * * */
    public function __construct()
    {
        $this->authLayout = 'auth.';
        $this->pageLayout = 'pages.cities.';
        $this->middleware('auth');
    }
    /*-----------------------------------------------------------------------------------
    @Description: Function for Index City
    ------------------------------------------------------------------------------------*/
    public function index(Request $request)
    {
        $userRole = '';
        $userRole = Helper::checkPermission(['city.show']);
        if (!$userRole) {
            $message = "Sie sind nicht berechtigt, auf dieses Modul zuzugreifen.";
            return view('errors.permission', compact('message'));
        }
        $permission_data['hasUpdatePermission'] = Helper::checkPermission(['city.edit']);
        $permission_data['hasDeletePermission'] = Helper::checkPermission(['city.delete']);
        if ($request->ajax()) {
            $city = City::orderBy('updated_at', 'desc');
            return Datatables::of($city)->addIndexColumn()
                ->addColumn('plz', function ($row) {
                    if (!empty($row->plz)) {
                        $plz_list = $row->plz;
                    } else {
                        $plz_list = '-';
                    }
                    return $plz_list;
                })
                ->addColumn('bezeichnung', function ($row) {
                    if (!empty($row->bezeichnung)) {
                        $bezeichnung_list = $row->bezeichnung;
                    } else {
                        $bezeichnung_list = '-';
                    }
                    return $bezeichnung_list;
                })
                ->addColumn('bundesland_id', function ($row) {
                    if (!empty($row->bundesland_list->bezeichnung)) {
                        $list = $row->bundesland_list->bezeichnung;
                    } else {
                        $list = '-';
                    }
                    return $list;
                })
                ->addColumn('land_id', function ($row) {
                    if (!empty($row->land_list->Bezeichnung)) {
                        $list = $row->land_list->Bezeichnung;
                    } else {
                        $list = '-';
                    }
                    return $list;
                })
                ->addColumn('action', function ($row) use ($permission_data) {
                    $action  = '';
                    if ($permission_data['hasUpdatePermission']) {
                        $action .= '<a href=' . route('cities.edit', [$row->id]) . ' class="btn btn-warning btn-sm me-1 mb-3 btn-circle" data-toggle="tooltip" title="Bearbeiten!"><i class="fa fa-pencil"></i></a>';
                    }
                    if ($permission_data['hasDeletePermission']) {
                        $action .= '<a href="javascript:void(0)" class="btn btn-danger btn-sm me-1 mb-3 btn-circle deletecities" data-id ="' . $row->id . '" data-toggle="tooltip" title="Löschen!"><i class="fa fa-trash"></i></a>';
                    }
                    $action .= '<a href="javascript:void(0)" class="btn btn-info btn-sm me-1 mb-3 btn-circle showcities" data-id="' . $row->id . '" data-toggle="tooltip" title="Aussicht!"><i class="fa fa-eye"></i></a>';
                    return $action;
                })
                ->filter(function ($instance) use ($request) {
                    // dd($request->all());
                    if (!empty($request->get('plz'))) {
                        $instance->where('plz', $request->get('plz'));
                    }
                    if (!empty($request->get('bezeichnung'))) {
                        $instance->where('bezeichnung', $request->get('bezeichnung'));
                    }
                    if (!empty($request->get('bundesland_id'))) {
                        $instance->where('bundesland_id', $request->get('bundesland_id'));
                    }
                    if (!empty($request->get('land_id'))) {
                        $instance->where('land_id', $request->get('land_id'));
                    }
                    if (!empty($request->get('search'))) {
                        $instance->where(function ($w) use ($request) {
                            $search = $request->get('search');
                            $w->orWhere('plz', 'LIKE', "%$search%")
                                ->orWhere('bezeichnung', 'LIKE', "%$search%")
                                ->orWhere('bundesland_id', 'LIKE', "%$search%")
                                ->orWhere('land_id', 'LIKE', "%$search%");
                        });
                    }
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view($this->pageLayout . 'index');
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Create City
    ------------------------------------------------------------------------------------*/
    public function create()
    {
        $userRole = Helper::checkPermission(['city.create']);
        if (!$userRole) {
            $message = "Sie sind nicht berechtigt, auf dieses Modul zuzugreifen.";
            return view('errors.permission', compact('message'));
        }
        return view($this->pageLayout . 'create');
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Edit City
    ---------------------------------------------------------------------------------- */
    public function edit($id)
    {
        $userRole = Helper::checkPermission(['city.edit']);
        if (!$userRole) {
            $message = "Sie sind nicht berechtigt, auf dieses Modul zuzugreifen.";
            return view('errors.permission', compact('message'));
        }
        try {
            $cities = City::where('id', $id)->first();
            if (!empty($cities)) {
                return view($this->pageLayout . 'edit', compact('cities'));
            } else {
                Notify::error('Städte bearbeiten nicht gefunden');
                return redirect()->route('cities.index');
            }
        } catch (\Exception $e) {
            Bugsnag::notifyException(new RuntimeException($e));
            return back()->with(['alert-type' => 'danger', 'message' => $e->getMessage()]);
        }
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Delete City
    ------------------------------------------------------------------------------------*/
    public function delete($id)
    {
        try {
            $cities = City::where('id', $id)->first();
            $note->delete();
            Notify::success('Städte gelöscht', $title = "Erfolgreich..!");
            return response()->json(['status' => 'success', 'title' => 'Success!!', 'message' => 'Note Deleted Successfully..!']);
        } catch (\Exception $e) {
            Bugsnag::notifyException(new RuntimeException($e));
            return back()->with(['alert-type' => 'danger', 'message' => $e->getMessage()]);
        }
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Show City
    ------------------------------------------------------------------------------------*/
    public function show(Request $request)
    {
        $cities = City::where('id', $request->id)->first();
        return view($this->pageLayout . 'show', compact('cities'));
    }
}
