<?php

namespace App\Http\Livewire\Notes;

use Livewire\Component;
use App\Models\User;
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
    public $currentSection = 1;
    public $notes, $notes_id, $text, $user_id;

    public function mount()
    {
        if (!empty($this->notes)) {
            $notes = Note::where('id', $this->notes->id)->first();
            $this->notes_id = $notes->id;
            $this->text = $notes->text;
            $this->user_id = $notes->user_id;
        }
    }

    public function render()
    {
        return view('pages.notes.from');
    }

    public function step1()
    {
        $customMessages = [
            'text.required'             => 'text ist nötig',
        ];
        $validatedData = $this->validate([
            'text' => 'required',
        ], $customMessages);
        try {
            Note::updateOrCreate(['id' => $this->notes_id], [
                'text' => $this->text,
                'user_id' => Auth::user()->id
            ]);
            if (!empty($this->notes_id)) {
                $message = 'Notiz aktualisiert';
            } else {
                $message = 'Notiz erstellt';
            }
            Notify::success($message, $title = "Erfolgreich..!");
            return redirect()->route('notes.index');
        } catch (\Exception $e) {
            Bugsnag::notifyException(new RuntimeException($e));
            return back()->with(['alert-type' => 'danger', 'message' => $e->getMessage()]);
        }
    }
}
