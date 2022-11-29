<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Roles;
use App\Models\RoleUsers;
use Notify;
use Yajra\DataTables\DataTables;
use Auth;
use Illuminate\Support\Facades\Validator;
use App\Helpers\Helper;
use Bugsnag\BugsnagLaravel\Facades\Bugsnag;
use RuntimeException;
use Sentinel;

class RolesController extends Controller
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
        $this->pageLayout = 'pages.roles.';
        $this->middleware('auth');
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Index Roles
    ------------------------------------------------------------------------------------*/
    public function index(Request $request)
    {
        $userRole = '';
        $user_list = RoleUsers::where('user_id', Auth::user()->id)->first();
        $userRole = Roles::whereIn('slug', ['admin', 'feeiadmin'])->where('id', @$user_list->role_id)->first();
        if (!$userRole) {
            $message = "Sie sind nicht berechtigt, auf dieses Modul zuzugreifen.";
            return view('errors.permission', compact('message'));
        }
        if ($request->ajax()) {
            $roles = Roles::orderBy('updated_at', 'desc');
            return Datatables::of($roles)->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $action  = '';
                    $action .= '<a href=' . route('roles.edit', [$row->id]) . ' class="btn btn-warning btn-sm me-1 mb-3 btn-circle" data-toggle="tooltip" title="Bearbeiten!"><i class="fa fa-pencil"></i></a>';
                    $action .= '<a href="javascript:void(0)" class="btn btn-info btn-sm me-1 mb-3 btn-circle showroles" data-id="' . $row->id . '" data-toggle="tooltip" title="Aussicht!"><i class="fa fa-eye"></i></a>';
                    return $action;
                })->filter(function ($instance) use ($request) {
                    if (!empty($request->get('search'))) {
                        $instance->where(function ($w) use ($request) {
                            $search = $request->get('search');
                            $w->orWhere('name', 'LIKE', "%$search%");
                        });
                    }
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view($this->pageLayout . 'index');
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Edit Roles
    ---------------------------------------------------------------------------------- */
    public function edit($id)
    {
        $userRole = '';
        $user_list = RoleUsers::where('user_id', Auth::user()->id)->first();
        $userRole = Roles::whereIn('slug', ['admin', 'feeiadmin'])->where('id', @$user_list->role_id)->first();
        if (!$userRole) {
            $message = "Sie sind nicht berechtigt, auf dieses Modul zuzugreifen.";
            return view('errors.permission', compact('message'));
        }
        try {

            // $user = Sentinel::findById($id);
            $roles = Roles::where('id', $id)->first();
            if (!empty($roles)) {
                return view($this->pageLayout . 'edit', compact('roles'));
            } else {
                Notify::error('Nicht gefundene Rollen bearbeiten');
                return redirect()->route('roles.index');
            }
        } catch (\Exception $e) {
            Bugsnag::notifyException(new RuntimeException($e));
            return back()->with(['alert-type' => 'danger', 'message' => $e->getMessage()]);
        }
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Update Roles
    ------------------------------------------------------------------------------------*/
    public function update(Request $request, $id)
    {
        try {
            $role = [
                'user.show' => false,
                'user.create' => false,
                'user.edit' => false,
                'user.delete' => false,
                'user.export' => false,
                'persons.show' => false,
                'persons.create' => false,
                'persons.edit' => false,
                'persons.delete' => false,
                'persons.export' => false,
                'organisations.show' => false,
                'organisations.create' => false,
                'organisations.edit' => false,
                'organisations.delete' => false,
                'organisations.export' => false,
                'networkpartners.show' => false,
                'networkpartners.create' => false,
                'networkpartners.edit' => false,
                'networkpartners.delete' => false,
                'networkpartners.export' => false,
                'notes.show' => false,
                'notes.create' => false,
                'notes.edit' => false,
                'notes.delete' => false,
                'branchoffice.show' => false,
                'branchoffice.create' => false,
                'branchoffice.edit' => false,
                'branchoffice.delete' => false,
                'branchoffice.export' => false,
                'city.show' => false,
                'city.create' => false,
                'city.edit' => false,
                'city.delete' => false,
                'city.export' => false,
                'topic.show' => false,
                'topic.create' => false,
                'topic.edit' => false,
                'topic.delete' => false,
                'topic.export' => false,
                'salutation.show' => false,
                'salutation.create' => false,
                'salutation.edit' => false,
                'salutation.delete' => false,
                'salutation.export' => false,
                'titleprefix.show' => false,
                'titleprefix.create' => false,
                'titleprefix.edit' => false,
                'titleprefix.delete' => false,
                'titleprefix.export' => false,
                'titlesuffix.show' => false,
                'titlesuffix.create' => false,
                'titlesuffix.edit' => false,
                'titlesuffix.delete' => false,
                'titlesuffix.export' => false,
                'titleawarded.show' => false,
                'titleawarded.create' => false,
                'titleawarded.edit' => false,
                'titleawarded.delete' => false,
                'titleawarded.export' => false,
                'federalstate.show' => false,
                'federalstate.create' => false,
                'federalstate.edit' => false,
                'federalstate.delete' => false,
                'federalstate.export' => false,
                'functions.show' => false,
                'functions.create' => false,
                'functions.edit' => false,
                'functions.delete' => false,
                'functions.export' => false,
                'status.show' => false,
                'status.create' => false,
                'status.edit' => false,
                'status.delete' => false,
                'status.export' => false,
                'statusperson.show' => false,
                'statusperson.create' => false,
                'statusperson.edit' => false,
                'statusperson.delete' => false,
                'statusperson.export' => false,
                'category.show' => false,
                'category.create' => false,
                'category.edit' => false,
                'category.delete' => false,
                'category.export' => false,
                'country.show' => false,
                'country.create' => false,
                'country.edit' => false,
                'country.delete' => false,
                'country.export' => false,
            ];
            $offerArray = array();
            foreach ($request->check as $key => $value) {
                $offerArray[$value] = true;
            }
            $result = array_merge($role, $offerArray);
            Roles::where('id', $id)->update([
                'permissions' => $result,
            ]);
            Notify::success('Rollen-Update', $title = "Erfolgreich..!");
            return redirect()->route('roles.index');
        } catch (\Exception $e) {
            Bugsnag::notifyException(new RuntimeException($e));
            return back()->with(['alert-type' => 'danger', 'message' => $e->getMessage()]);
        }
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Show Roles
    ------------------------------------------------------------------------------------*/
    public function show(Request $request)
    {
        // $user = Sentinel::findById($request->id);
        $roles = Roles::where('id', $request->id)->first();
        return view($this->pageLayout . 'show', compact('roles'));
    }
}
