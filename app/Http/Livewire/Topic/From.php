<?php

namespace App\Http\Livewire\Topic;

use App\Models\Topic;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Note;
use Notify;
use Yajra\DataTables\DataTables;
use Auth;
use App\Helpers\Helper;
use Bugsnag\BugsnagLaravel\Facades\Bugsnag;
use RuntimeException;

class From extends Component
{
    public $topic, $topic_id, $bezeichnung;

    public function mount()
    {
        if (!empty($this->topic)) {
            $topic = Topic::where('id', $this->topic->id)->first();
            $this->topic_id = $topic->id;
            $this->bezeichnung = $topic->bezeichnung;
        }
    }

    public function render()
    {
        return view('pages.topic.from');
    }

    public function final()
    {
        $customMessages = [
            'bezeichnung.required'             => 'bezeichnung ist nötig',
        ];
        $validatedData = $this->validate([
            'bezeichnung' => 'required',
        ], $customMessages);
        try {
            Topic::updateOrCreate(['id' => $this->topic_id], [
                'bezeichnung' => $this->bezeichnung,
            ]);
            Notify::success('Thema aktualisiert', $title = "Erfolgreich..!");
            return redirect()->route('topic.index');
        } catch (\Exception $e) {
            Bugsnag::notifyException(new RuntimeException($e));
            return back()->with(['alert-type' => 'danger', 'message' => $e->getMessage()]);
        }
    }
}
