<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Notify;
use Yajra\DataTables\DataTables;
use Auth;
use App\Helpers\Helper;
use App\Models\BranchOffice;
use Bugsnag\BugsnagLaravel\Facades\Bugsnag;
use RuntimeException;


class BranchofficeController extends Controller
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
        $this->pageLayout = 'pages.branchoffice.';
        $this->middleware('auth');
    }
    /*-----------------------------------------------------------------------------------
    @Description: Function for Index Branch Office
    ------------------------------------------------------------------------------------*/
    public function index(Request $request)
    {
        $userRole = '';
        $userRole = Helper::checkPermission(['branchoffice.show']);
        if (!$userRole) {
            $message = "Sie sind nicht berechtigt, auf dieses Modul zuzugreifen.";
            return view('errors.permission', compact('message'));
        }
        $permission_data['hasUpdatePermission'] = Helper::checkPermission(['branchoffice.edit']);
        $permission_data['hasDeletePermission'] = Helper::checkPermission(['branchoffice.delete']);
        if ($request->ajax()) {
            $branchoffice = BranchOffice::orderBy('updated_at', 'desc');
            return Datatables::of($branchoffice)->addIndexColumn()
                ->addColumn('organisation_id', function ($row) {
                    if (!empty($row->organisations_list->titel)) {
                        $organisation_id = $row->organisations_list->titel;
                    } else {
                        $organisation_id = '-';
                    }
                    return $organisation_id;
                })
                ->addColumn('bezeichnung', function ($row) {
                    if (!empty($row->bezeichnung)) {
                        $bezeichnung_list = $row->bezeichnung;
                    } else {
                        $bezeichnung_list = '-';
                    }
                    return $bezeichnung_list;
                })
                ->addColumn('einteilung', function ($row) {
                    if ($row->einteilung == "1") {
                        $einteilung = "A";
                    } elseif ($row->einteilung == "2") {
                        $einteilung = "B";
                    } elseif ($row->einteilung == "3") {
                        $einteilung = "C";
                    } else {
                        $einteilung = "-";
                    }
                    return $einteilung;
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
                ->addColumn('status_id', function ($row) {
                    if (!empty($row->status_list->bezeichnung)) {
                        $list = $row->status_list->bezeichnung;
                    } else {
                        $list = '-';
                    }
                    return $list;
                })
                ->addColumn('action', function ($row) use ($permission_data) {
                    $action  = '';
                    if ($permission_data['hasUpdatePermission']) {
                        $action .= '<a href=' . route('branchoffice.edit', [$row->id]) . ' class="btn btn-warning btn-sm me-1 mb-3 btn-circle" data-toggle="tooltip" title="Bearbeiten!"><i class="fa fa-pencil"></i></a>';
                    }
                    if ($permission_data['hasDeletePermission']) {
                        $action .= '<a href="javascript:void(0)" class="btn btn-danger btn-sm me-1 mb-3 btn-circle deletebranchoffice" data-id ="' . $row->id . '" data-toggle="tooltip" title="Löschen!"><i class="fa fa-trash"></i></a>';
                    }
                    $action .= '<a href="javascript:void(0)" class="btn btn-info btn-sm me-1 mb-3 btn-circle showbranchoffice" data-id="' . $row->id . '" data-toggle="tooltip" title="Aussicht!"><i class="fa fa-eye"></i></a>';
                    return $action;
                })->filter(function ($instance) use ($request) {
                    if (!empty($request->get('organisation_id'))) {
                        $instance->where('organisation_id', $request->get('organisation_id'));
                    }
                    if (!empty($request->get('bezeichnung'))) {
                        $instance->where('bezeichnung', $request->get('bezeichnung'));
                    }
                    if (!empty($request->get('einteilung'))) {
                        $instance->where('einteilung', $request->get('einteilung'));
                    }
                    if (!empty($request->get('mitglied_themen_id'))) {
                        $instance->where('mitglied_themen_id', $request->get('mitglied_themen_id'));
                    }
                    if (!empty($request->get('mitglied_netzwerkpartner_id'))) {
                        $instance->where('mitglied_netzwerkpartner_id', $request->get('mitglied_netzwerkpartner_id'));
                    }
                    if (!empty($request->get('ort_id'))) {
                        $instance->where('ort_id', $request->get('ort_id'));
                    }
                    if (!empty($request->get('user_id'))) {
                        $instance->where('user_id', $request->get('user_id'));
                    }
                    if (!empty($request->get('status_id'))) {
                        $instance->where('status_id', $request->get('status_id'));
                    }

                    if (!empty($request->get('search'))) {
                        $instance->where(function ($w) use ($request) {
                            $search = $request->get('search');
                            $w->orWhere('organisation_id', 'LIKE', "%$search%")
                                ->orWhere('bezeichnung', 'LIKE', "%$search%")
                                ->orWhere('einteilung', 'LIKE', "%$search%")
                                ->orWhere('mitglied_themen_id', 'LIKE', "%$search%")
                                ->orWhere('mitglied_netzwerkpartner_id', 'LIKE', "%$search%")
                                ->orWhere('ort_id', 'LIKE', "%$search%")
                                ->orWhere('user_id', 'LIKE', "%$search%")
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
    @Description: Function for Create Branch Office
    ------------------------------------------------------------------------------------*/
    public function create()
    {
        $userRole = Helper::checkPermission(['branchoffice.create']);
        if (!$userRole) {
            $message = "Sie sind nicht berechtigt, auf dieses Modul zuzugreifen.";
            return view('errors.permission', compact('message'));
        }
        return view($this->pageLayout . 'create');
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Edit Branch Office
    ---------------------------------------------------------------------------------- */
    public function edit($id)
    {
        $userRole = Helper::checkPermission(['branchoffice.edit']);
        if (!$userRole) {
            $message = "Sie sind nicht berechtigt, auf dieses Modul zuzugreifen.";
            return view('errors.permission', compact('message'));
        }
        try {
            $branchoffice = BranchOffice::where('id', $id)->first();
            if (!empty($branchoffice)) {
                return view($this->pageLayout . 'edit', compact('branchoffice'));
            } else {
                Notify::error('Netzwerkpartner nicht gefunden bearbeiten');
                return redirect()->route('branchoffice.index');
            }
        } catch (\Exception $e) {
            Bugsnag::notifyException(new RuntimeException($e));
            return back()->with(['alert-type' => 'danger', 'message' => $e->getMessage()]);
        }
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Delete Branch Office
    ------------------------------------------------------------------------------------*/
    public function delete($id)
    {
        try {
            $branchoffice = BranchOffice::where('id', $id)->first();
            $branchoffice->delete();
            Notify::success('Werbenetzwerkpartner gelöscht', $title = "Erfolgreich..!");
            return response()->json(['status' => 'success', 'title' => 'Success!!', 'message' => 'Branch Office Deleted Successfully..!']);
        } catch (\Exception $e) {
            Bugsnag::notifyException(new RuntimeException($e));
            return back()->with(['alert-type' => 'danger', 'message' => $e->getMessage()]);
        }
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Show Branch Office
    ------------------------------------------------------------------------------------*/
    public function show(Request $request)
    {
        $branchoffice = BranchOffice::where('id', $request->id)->first();
        return view($this->pageLayout . 'show', compact('branchoffice'));
    }
}
