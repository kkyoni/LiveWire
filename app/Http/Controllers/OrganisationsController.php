<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Notify;
use Yajra\DataTables\DataTables;
use App\Models\Organisations;
use Auth;
use Illuminate\Support\Facades\Validator;
use App\Helpers\Helper;
use Bugsnag\BugsnagLaravel\Facades\Bugsnag;
use RuntimeException;

class OrganisationsController extends Controller
{
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
        $this->pageLayout = 'pages.organisations.';
        $this->middleware('auth');
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Index Organisations
    ------------------------------------------------------------------------------------*/
    public function index(Request $request)
    {
        $userRole = '';
        $userRole = Helper::checkPermission(['organisations.show']);
        if (!$userRole) {
            $message = "Sie sind nicht berechtigt, auf dieses Modul zuzugreifen.";
            return view('errors.permission', compact('message'));
        }
        $permission_data['hasUpdatePermission'] = Helper::checkPermission(['organisations.edit']);
        $permission_data['hasDeletePermission'] = Helper::checkPermission(['organisations.delete']);
        if ($request->ajax()) {
            $organisations = Organisations::orderBy('updated_at', 'desc');
            return Datatables::of($organisations)->addIndexColumn()
                ->addColumn('titel', function ($row) {
                    if (!empty($row->titel)) {
                        $titel_list = $row->titel;
                    } else {
                        $titel_list = '-';
                    }
                    return $titel_list;
                })
                ->addColumn('synonyme', function ($row) {
                    if (!empty($row->synonyme)) {
                        $synonyme_list = $row->synonyme;
                    } else {
                        $synonyme_list = '-';
                    }
                    return $synonyme_list;
                })
                ->addColumn('adresse', function ($row) {
                    if (!empty($row->adresse)) {
                        $adresse_list = $row->adresse;
                    } else {
                        $adresse_list = '-';
                    }
                    return $adresse_list;
                })
                ->addColumn('status_id', function ($row) {
                    if (!empty($row->status_list->bezeichnung)) {
                        $list = $row->status_list->bezeichnung;
                    } else {
                        $list = '-';
                    }
                    return $list;
                })
                ->addColumn('ort_id', function ($row) {
                    if (!empty($row->ort_list->plz)) {
                        $ort_id = $row->ort_list->plz;
                    } else {
                        $ort_id = '-';
                    }
                    return $ort_id;
                })
                ->addColumn('action', function ($row) use ($permission_data) {
                    $action  = '';
                    if ($permission_data['hasUpdatePermission']) {
                        $action .= '<a href=' . route('organisations.edit', [$row->id]) . ' class="btn btn-warning btn-sm me-1 mb-3 btn-circle" data-toggle="tooltip" title="Bearbeiten!"><i class="fa fa-pencil"></i></a>';
                    }
                    if ($permission_data['hasDeletePermission']) {
                        $action .= '<a href="javascript:void(0)" class="btn btn-danger btn-sm me-1 mb-3 btn-circle deleteorganisations" data-id ="' . $row->id . '" data-toggle="tooltip" title="Löschen!"><i class="fa fa-trash"></i></a>';
                    }
                    $action .= '<a href="javascript:void(0)" class="btn btn-info btn-sm me-1 mb-3 btn-circle showorganisations" data-id="' . $row->id . '" data-toggle="tooltip" title="Aussicht!"><i class="fa fa-eye"></i></a>';
                    return $action;
                })->filter(function ($instance) use ($request) {
                    if (!empty($request->get('titel'))) {
                        $instance->where('titel', $request->get('titel'));
                    }
                    if (!empty($request->get('synonyme'))) {
                        $instance->where('synonyme', $request->get('synonyme'));
                    }
                    if (!empty($request->get('ort_id'))) {
                        $instance->where('ort_id', $request->get('ort_id'));
                    }
                    if (!empty($request->get('status_id'))) {
                        $instance->where('status_id', $request->get('status_id'));
                    }
                    if (!empty($request->get('search'))) {
                        $instance->where(function ($w) use ($request) {
                            $search = $request->get('search');
                            $w->orWhere('titel', 'LIKE', "%$search%")
                                ->orWhere('synonyme', 'LIKE', "%$search%")
                                ->orWhere('adresse', 'LIKE', "%$search%")
                                ->orWhere('ort_id', 'LIKE', "%$search%")
                                ->orWhere('email', 'LIKE', "%$search%")
                                ->orWhere('status_id', 'LIKE', "%$search%");
                        });
                    }
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view($this->pageLayout . 'index');
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Create Organisations
    ------------------------------------------------------------------------------------*/
    public function create()
    {
        $userRole = Helper::checkPermission(['organisations.create']);
        if (!$userRole) {
            $message = "Sie sind nicht berechtigt, auf dieses Modul zuzugreifen.";
            return view('errors.permission', compact('message'));
        }
        return view($this->pageLayout . 'create');
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Edit Organisations
    ---------------------------------------------------------------------------------- */
    public function edit($id)
    {
        $userRole = Helper::checkPermission(['organisations.edit']);
        if (!$userRole) {
            $message = "Sie sind nicht berechtigt, auf dieses Modul zuzugreifen.";
            return view('errors.permission', compact('message'));
        }
        try {
            $organisations = Organisations::where('id', $id)->first();
            if (!empty($organisations)) {
                return view($this->pageLayout . 'edit', compact('organisations'));
            } else {
                Notify::error('Nicht gefundene Organisationen bearbeiten');
                return redirect()->route('organisations.index');
            }
        } catch (\Exception $e) {
            Bugsnag::notifyException(new RuntimeException($e));
            return back()->with(['alert-type' => 'danger', 'message' => $e->getMessage()]);
        }
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Delete Organisations
    ------------------------------------------------------------------------------------*/
    public function delete($id)
    {
        try {
            $organisations = Organisations::where('id', $id)->first();
            $organisations->delete();
            Notify::success('Organisationen gelöscht', $title = "Erfolgreich..!");
            return response()->json(['status' => 'success', 'title' => 'Success!!', 'message' => 'Organisationen erfolgreich gelöscht..!']);
        } catch (\Exception $e) {
            Bugsnag::notifyException(new RuntimeException($e));
            return back()->with(['alert-type' => 'danger', 'message' => $e->getMessage()]);
        }
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Show Organisations
    ------------------------------------------------------------------------------------*/
    public function show(Request $request)
    {
        $organisations = Organisations::where('id', $request->id)->first();
        return view($this->pageLayout . 'show', compact('organisations'));
    }
}
