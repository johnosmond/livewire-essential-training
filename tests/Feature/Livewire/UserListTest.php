<?php

namespace Tests\Feature\Livewire;

use Tests\TestCase;
use App\Models\User;
use Livewire\Livewire;
use App\Livewire\UserList;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserListTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function renders_successfully()
    {
        Livewire::test(UserList::class)
            ->assertStatus(200);
    }

    public function test_pagination() {
        User::factory(8)->create();
        User::factory()->create(['name' => 'John Doe']);
        User::factory()->create(['name' => 'Frank Furter']);
        User::factory()->create(['name' => 'Sally Beans']);

        Livewire::test(UserList::class)
            ->assertSee('John Doe')
            ->assertSee('Frank Furter')
            ->assertDontSee('Sally Beans');

        Livewire::withQueryParams(['users-list' => 2])
            ->test(UserList::class)
            ->assertDontSee('John Doe')
            ->assertDontSee('Frank Furter')
            ->assertSee('Sally Beans');
    }

    public function test_search() {
        User::factory(8)->create();
        User::factory()->create(['name' => 'John Doe']);
        User::factory()->create(['name' => 'Frank Furter']);
        User::factory()->create(['name' => 'Sally Beans']);

        Livewire::test(UserList::class)
            ->set('query', 'John')
            ->assertSee('John Doe')
            ->assertDontSee('Frank Furter')
            ->assertDontSee('Sally Beans');

        Livewire::test(UserList::class)
            ->set('query', '3')
            ->assertSee('The query field must only contain letters.');
    }
}
