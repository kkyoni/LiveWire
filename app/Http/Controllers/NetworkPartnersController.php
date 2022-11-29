<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NetworkPartner;
use Notify;
use Yajra\DataTables\DataTables;
use Auth;
use Illuminate\Support\Facades\Validator;
use App\Helpers\Helper;
use Bugsnag\BugsnagLaravel\Facades\Bugsnag;
use RuntimeException;

class NetworkPartnersController extends Controller
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
        $this->pageLayout = 'pages.networkpartners.';
        $this->middleware('auth');
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Index Network Partner
    ------------------------------------------------------------------------------------*/
    public function index(Request $request)
    {
        $userRole = '';
        $userRole = Helper::checkPermission(['networkpartners.show']);
        if (!$userRole) {
            $message = "Sie sind nicht berechtigt, auf dieses Modul zuzugreifen.";
            return view('errors.permission', compact('message'));
        }
        $permission_data['hasUpdatePermission'] = Helper::checkPermission(['networkpartners.edit']);
        $permission_data['hasDeletePermission'] = Helper::checkPermission(['networkpartners.delete']);
        if ($request->ajax()) {
            $networkpartners = NetworkPartner::orderBy('updated_at', 'desc');
            return Datatables::of($networkpartners)->addIndexColumn()
                ->addColumn('bezeichnung', function ($row) {
                    if (!empty($row->bezeichnung)) {
                        $bezeichnung_list = $row->bezeichnung;
                    } else {
                        $bezeichnung_list = '-';
                    }
                    return $bezeichnung_list;
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
                ->addColumn('ort_id', function ($row) {
                    if (!empty($row->ort_list->plz)) {
                        $ort_id = $row->ort_list->plz;
                    } else {
                        $ort_id = '-';
                    }
                    return $ort_id;
                })
                ->addColumn('telefon', function ($row) {
                    if (!empty($row->telefon)) {
                        $telefon_list = $row->telefon;
                    } else {
                        $telefon_list = '-';
                    }
                    return $telefon_list;
                })
                ->addColumn('action', function ($row) use ($permission_data) {
                    $action  = '';
                    if ($permission_data['hasUpdatePermission']) {
                        $action .= '<a href=' . route('networkpartners.edit', [$row->id]) . ' class="btn btn-warning btn-sm me-1 mb-3 btn-circle" data-toggle="tooltip" title="Bearbeiten!"><i class="fa fa-pencil"></i></a>';
                    }
                    if ($permission_data['hasDeletePermission']) {
                        $action .= '<a href="javascript:void(0)" class="btn btn-danger btn-sm me-1 mb-3 btn-circle deletenetworkpartners" data-id ="' . $row->id . '" data-toggle="tooltip" title="Löschen!"><i class="fa fa-trash"></i></a>';
                    }
                    $action .= '<a href="javascript:void(0)" class="btn btn-info btn-sm me-1 mb-3 btn-circle shownetworkpartners" data-id="' . $row->id . '" data-toggle="tooltip" title="Aussicht!"><i class="fa fa-eye"></i></a>';
                    return $action;
                })->filter(function ($instance) use ($request) {
                    if (!empty($request->get('bezeichnung'))) {
                        $instance->where('bezeichnung', $request->get('bezeichnung'));
                    }
                    if (!empty($request->get('search'))) {
                        $instance->where(function ($w) use ($request) {
                            $search = $request->get('search');
                            $w->orWhere('bezeichnung', 'LIKE', "%$search%")
                                ->orWhere('synonyme', 'LIKE', "%$search%")
                                ->orWhere('adresse', 'LIKE', "%$search%")
                                ->orWhere('ort_id', 'LIKE', "%$search%")
                                ->orWhere('telefon', 'LIKE', "%$search%");
                        });
                    }
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view($this->pageLayout . 'index');
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Create Network Partner
    ------------------------------------------------------------------------------------*/
    public function create()
    {
        $userRole = Helper::checkPermission(['networkpartners.create']);
        if (!$userRole) {
            $message = "Sie sind nicht berechtigt, auf dieses Modul zuzugreifen.";
            return view('errors.permission', compact('message'));
        }
        return view($this->pageLayout . 'create');
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Edit Network Partner
    ---------------------------------------------------------------------------------- */
    public function edit($id)
    {
        $userRole = Helper::checkPermission(['networkpartners.edit']);
        if (!$userRole) {
            $message = "Sie sind nicht berechtigt, auf dieses Modul zuzugreifen.";
            return view('errors.permission', compact('message'));
        }
        try {
            $networkpartners = NetworkPartner::where('id', $id)->first();
            if (!empty($networkpartners)) {
                return view($this->pageLayout . 'edit', compact('networkpartners'));
            } else {
                Notify::error('Netzwerkpartner nicht gefunden bearbeiten');
                return redirect()->route('networkpartners.index');
            }
        } catch (\Exception $e) {
            Bugsnag::notifyException(new RuntimeException($e));
            return back()->with(['alert-type' => 'danger', 'message' => $e->getMessage()]);
        }
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Delete Network Partner
    ------------------------------------------------------------------------------------*/
    public function delete($id)
    {
        try {
            $networkpartner = NetworkPartner::where('id', $id)->first();
            $networkpartner->delete();
            Notify::success('Netzwerkpartner gelöscht', $title = "Erfolgreich..!");
            return response()->json(['status' => 'success', 'title' => 'Success!!', 'message' => 'Network Partner Deleted Successfully..!']);
        } catch (\Exception $e) {
            Bugsnag::notifyException(new RuntimeException($e));
            return back()->with(['alert-type' => 'danger', 'message' => $e->getMessage()]);
        }
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Show Network Partner
    ------------------------------------------------------------------------------------*/
    public function show(Request $request)
    {
        $networkpartner = NetworkPartner::where('id', $request->id)->first();
        return view($this->pageLayout . 'show', compact('networkpartner'));
    }
}
