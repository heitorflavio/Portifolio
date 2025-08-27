<?php

use App\Models\Message;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Livewire\Volt\Component;
use Mary\Traits\Toast;
use Livewire\WithPagination;

new class extends Component {
    use Toast, WithPagination;

    public string $search = '';

    public bool $drawer = false;

    public array $sortBy = ['column' => 'id', 'direction' => 'desc'];

    public bool $modal = false;

    public ?Message $message = null;

    // Clear filters
    public function clear(): void
    {
        $this->reset();
        $this->success('Filters cleared.', position: 'toast-bottom');
    }

    // Delete action
    public function delete($id): void
    {
        $this->warning("Will delete #$id", 'It is fake.', position: 'toast-bottom');
    }

    // Table headers
    public function headers(): array
    {
        return [
            ['key' => 'id', 'label' => '#', 'class' => 'w-1'],
            ['key' => 'name', 'label' => 'Name', 'class' => 'w-64'],
            ['key' => 'email', 'label' => 'E-mail', 'sortable' => false],
            ['key' => 'created_at', 'label' => 'Created At', 'class' => 'hidden lg:table-cell'],
        ];
    }

    public function getMessage($id): void
    {
        $this->message = Message::find($id);
        $this->modal = true;
    }

    public function messages(): LengthAwarePaginator
    {
        return Message::query()
            ->when($this->search, fn($q) => $q->where('name', 'like', "%$this->search%")->orWhere('email', 'like', "%$this->search%"))
            ->orderBy(...array_values($this->sortBy))
            ->paginate(10);
    }

    public function with(): array
    {
        return [
            'messages' => $this->messages(),
            'headers' => $this->headers()
        ];
    }
}; ?>

<div>
    <!-- HEADER -->
    <x-header title="Messages" separator progress-indicator>
        <x-slot:middle class="!justify-end">
            <x-input placeholder="Search..." wire:model.live.debounce="search" clearable icon="o-magnifying-glass"/>
        </x-slot:middle>
    </x-header>

    <!-- TABLE  -->
    <x-card shadow>
        <x-table :headers="$headers" :rows="$messages" :sort-by="$sortBy" with-pagination>
            @scope('actions', $messages)
            <div class="flex gap-2 justify-end">
                <x-button class="btn-ghost btn-sm" icon="o-eye" @click="$wire.getMessage({{ $messages['id'] }})"/>
                <x-button icon="o-trash" wire:click="delete({{ $messages['id'] }})" wire:confirm="Are you sure?" spinner
                          class="btn-ghost btn-sm text-error"/>
            </div>
            @endscope
        </x-table>
    </x-card>


    <x-modal wire:model="modal" :title="'#' . $message?->id" class="backdrop-blur" separator>
        <div class="grid gap-4">
            <x-input label="Name" icon="o-user" placeholder="The full name" :value="$message?->name" readonly/>
            <x-input label="Email" icon="o-envelope" placeholder="The e-mail" :value="$message?->email" readonly/>

            <div class="textarea w-full border-dashed mt-4">
                {{ $message?->text }}
            </div>
        </div>

        <x-slot:actions>
            <x-button label="Fechar" @click="$wire.modal = false"/>
        </x-slot:actions>
    </x-modal>
</div>
