<?php

namespace App\Http\Livewire\Topic;

use Livewire\Component;
use App\Models\Topic;
use Notify;
use Yajra\DataTables\DataTables;
use Auth;
use Illuminate\Support\Facades\Validator;
use App\Helpers\Helper;
use Bugsnag\BugsnagLaravel\Facades\Bugsnag;
use RuntimeException;

class Edit extends Component
{
    protected $topic;
    public $bezeichnung, $topic_id;
    public $updateMode = false;
    public $editTopicIndex = null;

    public function render()
    {
        return view('pages.topic.edit', [
            'topic' => Topic::orderBy('updated_at', 'DESC')->paginate(10),
        ]);
    }

    private function resetInputFields()
    {
        $this->bezeichnung = '';
    }

    public function edit($id)
    {
        $topic = Topic::findOrFail($id);
        $this->topic_id = $id;
        $this->bezeichnung = $topic->bezeichnung;
        $this->editTopicIndex = $id;
        $this->updateMode = true;
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function update()
    {
        $customMessages = [
            'bezeichnung.required'             => 'bezeichnung ist nötig',
        ];
        $validatedDate = $this->validate([
            'bezeichnung' => 'required',
        ], $customMessages);
        try {
            $topic = Topic::find($this->topic_id);
            $topic->update([
                'bezeichnung' => $this->bezeichnung,
            ]);
            $this->updateMode = false;
            $this->editTopicIndex = null;
            Notify::success('Thema aktualisiert', $title = "Erfolgreich..!");
            return redirect()->route('topic.index');
            $this->resetInputFields();
        } catch (\Exception $e) {
            Bugsnag::notifyException(new RuntimeException($e));
            return back()->with(['alert-type' => 'danger', 'message' => $e->getMessage()]);
        }
    }
}
