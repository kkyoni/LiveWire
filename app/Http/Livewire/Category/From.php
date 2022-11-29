<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
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
    public $category, $category_id, $bezeichnung;

    public function mount()
    {
        if (!empty($this->category)) {
            $category = Category::where('id', $this->category->id)->first();
            $this->category_id = $category->id;
            $this->bezeichnung = $category->bezeichnung;
        }
    }

    public function render()
    {
        return view('pages.category.from');
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
            Category::updateOrCreate(['id' => $this->category_id], [
                'bezeichnung' => $this->bezeichnung,
            ]);
            Notify::success('Kategorie erstellt', $title = "Erfolgreich..!");
            return redirect()->route('category.index');
        } catch (\Exception $e) {
            Bugsnag::notifyException(new RuntimeException($e));
            return back()->with(['alert-type' => 'danger', 'message' => $e->getMessage()]);
        }
    }
}
