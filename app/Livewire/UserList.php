<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Validate;

class UserList extends Component
{
    use WithPagination;

    #[Validate]
    public string $query = '';

    public function search()
    {
        $this->resetPage();
    }

    public function rules()
    {
        return [
            'query' => 'alpha',
        ];
    }
    public function render()
    {
        $query = $this->query;

        if (!empty($this->getErrorBag()->get('query'))) {
            $query = '';
        }

        return view('livewire.user-list', [
            'users' => User::where('name', 'like', '%' . $query . '%')->paginate(10, pageName: 'users-list'),
        ]);
    }
}
