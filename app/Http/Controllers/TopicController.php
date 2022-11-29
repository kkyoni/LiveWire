<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use Notify;
use Yajra\DataTables\DataTables;
use Auth;
use Illuminate\Support\Facades\Validator;
use App\Helpers\Helper;
use Bugsnag\BugsnagLaravel\Facades\Bugsnag;
use RuntimeException;

class TopicController extends Controller
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
        $this->pageLayout = 'pages.topic.';
        $this->middleware('auth');
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Index Topic
    ------------------------------------------------------------------------------------*/
    public function index(Request $request)
    {
        $userRole = '';
        $userRole = Helper::checkPermission(['topic.show']);
        if (!$userRole) {
            $message = "Sie sind nicht berechtigt, auf dieses Modul zuzugreifen.";
            return view('errors.permission', compact('message'));
        }
        return view($this->pageLayout . 'index');
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Create Topic
    ------------------------------------------------------------------------------------*/
    public function create()
    {
        $userRole = Helper::checkPermission(['topic.create']);
        if (!$userRole) {
            $message = "Sie sind nicht berechtigt, auf dieses Modul zuzugreifen.";
            return view('errors.permission', compact('message'));
        }
        return view($this->pageLayout . 'create');
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Delete Topic
    ------------------------------------------------------------------------------------*/
    public function delete($id)
    {
        try {
            $topic = Topic::where('id', $id)->first();
            $topic->delete();
            Notify::success('Thema gelöscht', $title = "Erfolgreich..!");
            return response()->json(['status' => 'success', 'title' => 'Success!!', 'message' => 'Topic Deleted Successfully..!']);
        } catch (\Exception $e) {
            Bugsnag::notifyException(new RuntimeException($e));
            return back()->with(['alert-type' => 'danger', 'message' => $e->getMessage()]);
        }
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Show Topic
    ------------------------------------------------------------------------------------*/
    public function show(Request $request)
    {
        $topic = Topic::where('id', $request->id)->first();
        return view($this->pageLayout . 'show', compact('topic'));
    }
}
