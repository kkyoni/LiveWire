<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use Notify;
use Auth;
use Illuminate\Support\Facades\Validator;
use App\Helpers\Helper;
use Bugsnag\BugsnagLaravel\Facades\Bugsnag;
use RuntimeException;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\DataTables;

class NotesController extends Controller
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
        $this->pageLayout = 'pages.notes.';
        $this->middleware('auth');
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Index Note
    ------------------------------------------------------------------------------------*/
    public function index(Request $request)
    {
        $userRole = '';
        $userRole = Helper::checkPermission(['notes.show']);
        if (!$userRole) {
            $message = "Sie sind nicht berechtigt, auf dieses Modul zuzugreifen.";
            return view('errors.permission', compact('message'));
        }
        $permission_data['hasUpdatePermission'] = Helper::checkPermission(['notes.edit']);
        $permission_data['hasDeletePermission'] = Helper::checkPermission(['notes.delete']);
        if ($request->ajax()) {
            $note = Note::with('user_list')->orderBy('updated_at', 'desc');
            return Datatables::of($note)->addIndexColumn()
                ->addColumn('text', function ($row) {
                    if (!empty($row->text)) {
                        $text_list = $row->text;
                    } else {
                        $text_list = '-';
                    }
                    return $text_list;
                })
                ->addColumn('user_id', function ($row) {
                    if (!empty($row->user_list)) {
                        $first_name = $row->user_list->first_name . ' ' . $row->user_list->last_name;
                    } else {
                        $first_name = '-';
                    }
                    return $first_name;
                })
                ->addColumn('action', function ($row) use ($permission_data) {
                    $action  = '';
                    if ($permission_data['hasUpdatePermission']) {
                        $action .= '<a href=' . route('notes.edit', [$row->id]) . ' class="btn btn-warning btn-sm me-1 mb-3 btn-circle" data-toggle="tooltip" title="Bearbeiten!"><i class="fa fa-pencil"></i></a>';
                    }
                    if ($permission_data['hasDeletePermission']) {
                        $action .= '<a href="javascript:void(0)" class="btn btn-danger btn-sm me-1 mb-3 btn-circle deletenotes" data-id ="' . $row->id . '" data-toggle="tooltip" title="Löschen!"><i class="fa fa-trash"></i></a>';
                    }
                    $action .= '<a href="javascript:void(0)" class="btn btn-info btn-sm me-1 mb-3 btn-circle shownotes" data-id="' . $row->id . '" data-toggle="tooltip" title="Aussicht!"><i class="fa fa-eye"></i></a>';
                    return $action;
                })->filter(function ($instance) use ($request) {
                    if (!empty($request->get('text'))) {
                        $instance->where('text', $request->get('text'));
                    }
                    if (!empty($request->get('user_id'))) {
                        $instance->where('user_id', $request->get('user_id'));
                    }
                    if (!empty($request->get('search'))) {
                        $instance->where(function ($w) use ($request) {
                            $search = $request->get('search');
                            $w->orWhere('text', 'LIKE', "%$search%")
                                ->orWhere('user_id', 'LIKE', "%$search%");
                        });
                    }
                })
                ->rawColumns(['action', 'user_id'])
                ->make(true);
        }
        return view($this->pageLayout . 'index');
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Create Note
    ------------------------------------------------------------------------------------*/
    public function create()
    {
        $userRole = Helper::checkPermission(['notes.create']);
        if (!$userRole) {
            $message = "Sie sind nicht berechtigt, auf dieses Modul zuzugreifen.";
            return view('errors.permission', compact('message'));
        }
        return view($this->pageLayout . 'create');
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Edit Note
    ---------------------------------------------------------------------------------- */
    public function edit($id)
    {
        $userRole = Helper::checkPermission(['notes.edit']);
        if (!$userRole) {
            $message = "Sie sind nicht berechtigt, auf dieses Modul zuzugreifen.";
            return view('errors.permission', compact('message'));
        }
        try {
            $notes = Note::where('id', $id)->first();
            if (!empty($notes)) {
                return view($this->pageLayout . 'edit', compact('notes'));
            } else {
                Notify::error('Notizen bearbeiten nicht gefunden');
                return redirect()->route('notes.index');
            }
        } catch (\Exception $e) {
            Bugsnag::notifyException(new RuntimeException($e));
            return back()->with(['alert-type' => 'danger', 'message' => $e->getMessage()]);
        }
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Delete Note
    ------------------------------------------------------------------------------------*/
    public function delete($id)
    {
        try {
            $note = Note::where('id', $id)->first();
            $note->delete();
            Notify::success('Hinweis gelöscht', $title = "Erfolgreich..!");
            return response()->json(['status' => 'success', 'title' => 'Success!!', 'message' => 'Note Deleted Successfully..!']);
        } catch (\Exception $e) {
            Bugsnag::notifyException(new RuntimeException($e));
            return back()->with(['alert-type' => 'danger', 'message' => $e->getMessage()]);
        }
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Show Note
    ------------------------------------------------------------------------------------*/
    public function show(Request $request)
    {
        $note = Note::with('user_list')->where('id', $request->id)->first();
        return view($this->pageLayout . 'show', compact('note'));
    }
}
