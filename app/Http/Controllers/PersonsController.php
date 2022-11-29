<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;
use App\Models\Organisations;
use App\Models\Person_organisation;
use Notify;
use Yajra\DataTables\DataTables;
use Auth;
use Illuminate\Support\Facades\Validator;
use App\Helpers\Helper;
use App\Models\User;
use Bugsnag\BugsnagLaravel\Facades\Bugsnag;
use RuntimeException;

class PersonsController extends Controller
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
        $this->pageLayout = 'pages.persons.';
        $this->middleware('auth');
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Index Person
    ------------------------------------------------------------------------------------*/
    public function index(Request $request)
    {
        $userRole = '';
        $userRole = Helper::checkPermission(['persons.show']);
        if (!$userRole) {
            $message = "Sie sind nicht berechtigt, auf dieses Modul zuzugreifen.";
            return view('errors.permission', compact('message'));
        }
        $permission_data['hasUpdatePermission'] = Helper::checkPermission(['persons.edit']);
        $permission_data['hasDeletePermission'] = Helper::checkPermission(['persons.delete']);
        if ($request->ajax()) {
            $person = Person::orderBy('updated_at', 'desc');
            return Datatables::of($person)->addIndexColumn()
                ->addColumn('nachname', function ($row) {
                    if (!empty($row->nachname)) {
                        $nachname_list = $row->nachname;
                    } else {
                        $nachname_list = '-';
                    }
                    return $nachname_list;
                })
                ->addColumn('vorname', function ($row) {
                    if (!empty($row->vorname)) {
                        $vorname_list = $row->vorname;
                    } else {
                        $vorname_list = '-';
                    }
                    return $vorname_list;
                })
                ->addColumn('status_person_id', function ($row) {
                    if (!empty($row->status_list->bezeichnung)) {
                        $list = "<span class='fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-danger-light text-danger'>" . $row->status_list->bezeichnung . "</span>";
                    } else {
                        $list = '-';
                    }
                    return $list;
                })
                ->addColumn('person_organisation_id', function ($row) {
                    $organisation_html = '';
                    $j = 1;
                    if (sizeof($row->organisation_detalis) > 0) {
                        foreach ($row->organisation_detalis as $value) {
                            if ($j <= 2) {
                                $organisation_html .= "<span class='fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-info-light text-info' style='margin-right:3px; margin-top:3px'>" . $value->titel . "</span>";
                                $j++;
                            } else {
                                $organisation_html .= "...";
                            }
                        }
                    }
                    return $organisation_html;
                })
                ->addColumn('person_stakeholder_id', function ($row) {
                    $networkpartner_html = '';
                    $i = 1;
                    if (sizeof($row->netzwerkpartner_detalis) > 0) {
                        foreach ($row->netzwerkpartner_detalis as $value) {
                            if ($i <= 2) {
                                $networkpartner_html .= "<span class='fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-warning-light text-warning' style='margin-right:3px; margin-top:3px'>" . $value->bezeichnung . "</span>";
                                $i++;
                            } else {
                                $networkpartner_html .= "...";
                                break;
                            }
                        }
                    }
                    return $networkpartner_html;
                })
                ->addColumn('action', function ($row) use ($permission_data) {
                    $action  = '';
                    if ($permission_data['hasUpdatePermission']) {
                        $action .= '<a href=' . route('persons.edit', [$row->id]) . ' class="btn btn-warning btn-sm me-1 mb-3 btn-circle" data-toggle="tooltip" title="Bearbeiten!"><i class="fa fa-pencil"></i></a>';
                    }
                    if ($permission_data['hasDeletePermission']) {
                        $action .= '<a href="javascript:void(0)" class="btn btn-danger btn-sm me-1 mb-3 btn-circle deletepersons" data-id ="' . $row->id . '" data-toggle="tooltip" title="Löschen!"><i class="fa fa-trash"></i></a>';
                    }
                    $action .= '<a href="javascript:void(0)" class="btn btn-info btn-sm me-1 mb-3 btn-circle showpersons" data-id="' . $row->id . '" data-toggle="tooltip" title="Aussicht!"><i class="fa fa-eye"></i></a>';
                    return $action;
                })->filter(function ($instance) use ($request) {
                    if (!empty($request->get('nachname'))) {
                        $instance->where('nachname', $request->get('nachname'));
                    }
                    if (!empty($request->get('vorname'))) {
                        $instance->where('vorname', $request->get('vorname'));
                    }
                    if (!empty($request->get('email'))) {
                        $instance->where('email', $request->get('email'));
                    }
                    if (!empty($request->get('telefon'))) {
                        $instance->where('telefon', $request->get('telefon'));
                    }
                    if (!empty($request->get('mobil'))) {
                        $instance->where('mobil', $request->get('mobil'));
                    }
                    if (!empty($request->get('status_person_id'))) {
                        $instance->where('status_person_id', $request->get('status_person_id'));
                    }
                    if (!empty($request->get('search'))) {
                        $instance->where(function ($w) use ($request) {
                            $search = $request->get('search');
                            $w->orWhere('nachname', 'LIKE', "%$search%")
                                ->orWhere('vorname', 'LIKE', "%$search%")
                                ->orWhere('status_person_id', 'LIKE', "%$search%");
                        });
                    }
                })
                ->rawColumns(['action', 'person_organisation_id', 'status_person_id', 'person_stakeholder_id'])
                ->make(true);
        }
        return view($this->pageLayout . 'index');
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Create Person
    ------------------------------------------------------------------------------------*/
    public function create()
    {
        $userRole = Helper::checkPermission(['persons.create']);
        if (!$userRole) {
            $message = "Sie sind nicht berechtigt, auf dieses Modul zuzugreifen.";
            return view('errors.permission', compact('message'));
        }
        return view($this->pageLayout . 'create');
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Edit Person
    ---------------------------------------------------------------------------------- */
    public function edit($id)
    {
        $userRole = Helper::checkPermission(['persons.edit']);
        if (!$userRole) {
            $message = "Sie sind nicht berechtigt, auf dieses Modul zuzugreifen.";
            return view('errors.permission', compact('message'));
        }
        try {
            $person = Person::where('id', $id)->first();
            if (!empty($person)) {
                return view($this->pageLayout . 'edit', compact('person'));
            } else {
                Notify::error('Person nicht gefunden bearbeiten');
                return redirect()->route('persons.index');
            }
        } catch (\Exception $e) {
            Bugsnag::notifyException(new RuntimeException($e));
            return back()->with(['alert-type' => 'danger', 'message' => $e->getMessage()]);
        }
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Delete Person
    ------------------------------------------------------------------------------------*/
    public function delete($id)
    {
        try {
            $person = Person::where('id', $id)->first();
            $person->delete();
            Notify::success('Person gelöscht', $title = "Erfolgreich..!");
            return response()->json(['status' => 'success', 'title' => 'Success!!', 'message' => 'Person erfolgreich gelöscht..!']);
        } catch (\Exception $e) {
            Bugsnag::notifyException(new RuntimeException($e));
            return back()->with(['alert-type' => 'danger', 'message' => $e->getMessage()]);
        }
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Show Person
    ------------------------------------------------------------------------------------*/
    public function show(Request $request)
    {
        $person = Person::where('id', $request->id)->first();
        return view($this->pageLayout . 'show', compact('person'));
    }
}
