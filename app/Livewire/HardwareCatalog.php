<?php

namespace App\Livewire;

use App\Models\Hardware;
use App\Models\Category;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class HardwareCatalog extends Component
{
    use WithPagination;

    #[Url]
    public string $search = '';

    #[Url]
    public array $categories = [];

    #[Url]
    public string $sortBy = 'title_asc';

    #[Url]
    public int $perPage = 12;

    // Обработка изменения фильтров
    public function updated($property): void
    {
        if (in_array($property, ['search', 'categories', 'sortBy', 'perPage'])) {
            $this->resetPage();
        }
    }

    #[Computed]
    public function allCategories()
    {
        return Category::where('type', 'hardware')
            ->orderBy('name')
            ->get();
    }

    #[Computed]
    public function hardwareItems()
    {
        return Hardware::query()
            ->with('category')
            ->when($this->search, fn($q) => $q->where('title', 'like', "%{$this->search}%"))
            ->when($this->categories, fn($q) => $q->whereIn('category_id', $this->categories))
            ->orderBy(...$this->parseSort($this->sortBy))
            ->paginate($this->perPage);
    }

    private function parseSort(string $option): array
    {
        return match ($option) {
            'price_asc' => ['price', 'asc'],
            'price_desc' => ['price', 'desc'],
            'title_desc' => ['title', 'desc'],
            default => ['title', 'asc'],
        };
    }

    public function render()
    {
        return view('livewire.hardware-catalog');
    }
}