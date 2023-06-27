<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Http\Request;

class Genre extends Component
{
    public $name = '';
    public $genres;

    protected $paginationTheme = 'bootstrap';

    use WithPagination;

    public function render(Request $request)
    {
        sleep(1);
        $sortBy = '';
        $direction = '';
        $search = '%' . $this->name . '%';
        $this->genres = \App\Models\Genre::where('name', 'like', $search)->get();
        if ($request->input('sortBy')){
            $sort = $request->input('sortBy');
            $direction = $request->input('direction');
            $this->genres = \App\Models\Genre::orderBy($sort, $direction)->get();
        }

        return view('livewire.genre', [ 'sortBy' => $sortBy, 'direction' => $direction]);
    }
}
