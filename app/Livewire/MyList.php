<?php

namespace App\Livewire;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class MyList extends Component
{
    use WithPagination;

    public Authenticatable $user;

    protected string $sortField ='original_title';
    protected string $sortDirection ='DESC';

    public string $search = '';



    /**
     * Mounts the component with given structure.
     *
     * @return void
     */
    public function mount()
    {
        $this->user = Auth::user();
    }


    /**
     * Renders the component
     *
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function render(): \Illuminate\Foundation\Application|View|Factory|Application
    {
        $movies = $this->user->movies()
            ->orderBy($this->sortField, $this->sortDirection)
            ->where('original_title', 'like', '%' . $this->search . '%')
            ->paginate(10);
        return view('livewire.my-list',compact('movies'));
    }


    /**
     * Changes the list sorting filter
     *
     * @param $field
     * @return void
     */
    public function sortBy($field) : void {
        $this->sortField = $field;
    }


    /**
     * Changes the list sorting direction
     *
     * @param $direction
     * @return void
     */
    public function sortDirection($direction) : void{
        $this->sortDirection = $direction;
    }
}
