<!-- resources/views/livewire/hardware-catalog.blade.php -->
<div class="hardware-catalog">
    <!-- Фильтры и поиск -->
    <div class="catalog-filters mb-6 p-4 bg-white rounded-lg shadow">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <!-- Поиск -->
            <div class="md:col-span-2">
                <input 
                    type="search"
                    wire:model.live.debounce.500ms="search"
                    placeholder="Поиск метизов..." 
                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                >
            </div>
            
            <!-- Сортировка -->
            <div>
                <select wire:model.live="sortBy" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="title_asc">Название (А-Я)</option>
                    <option value="title_desc">Название (Я-А)</option>
                    <option value="price_asc">Цена (по возрастанию)</option>
                    <option value="price_desc">Цена (по убыванию)</option>
                </select>
            </div>
            
            <!-- Количество на странице -->
            <div>
                <select wire:model.live="perPage" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="12">12 на странице</option>
                    <option value="24">24 на странице</option>
                    <option value="48">48 на странице</option>
                </select>
            </div>
        </div>

        <!-- Категории -->
        <div class="mt-4">
            <h3 class="font-medium mb-2">Категории:</h3>
            <div class="flex flex-wrap gap-2">
                @foreach($this->allCategories as $category)
                    <label class="inline-flex items-center px-3 py-1 bg-gray-100 rounded-full cursor-pointer">
                        <input 
                            type="checkbox" 
                            value="{{ $category->id }}" 
                            wire:model.live="categories"
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                        >
                        <span class="ml-2">{{ $category->name }}</span>
                    </label>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Результаты -->
    <div class="catalog-results">
        @if($this->hardwareItems->count())
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach($this->hardwareItems as $item)
                    <div class="bg-white rounded-lg shadow overflow-hidden">
                        <div class="p-4">
                            <div class="aspect-w-1 aspect-h-1 mb-4">
                                @if($item->image)
                                    <img 
                                        src="{{ asset('storage/' . $item->image) }}" 
                                        alt="{{ $item->title }}"
                                        class="w-full h-48 object-contain"
                                    >
                                @else
                                    <div class="bg-gray-200 border-2 border-dashed rounded-xl w-full h-48"></div>
                                @endif
                            </div>
                            
                            <h3 class="font-semibold text-lg truncate">{{ $item->title }}</h3>
                            <p class="text-sm text-gray-500 mb-2">{{ $item->sku }}</p>
                            
                            <div class="mt-2 flex justify-between items-center">
                                <span class="text-indigo-600 font-bold">{{ number_format($item->price, 2) }} ₽</span>
                                <span class="text-sm bg-gray-100 px-2 py-1 rounded">
                                    {{ $item->unit }}
                                </span>
                            </div>
                            
                            <div class="mt-3">
                                <button 
                                    class="w-full bg-indigo-600 text-white py-2 px-4 rounded hover:bg-indigo-700 transition"
                                >
                                    В корзину
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <!-- Пагинация -->
            <div class="mt-8">
                {{ $this->hardwareItems->links() }}
            </div>
        @else
            <div class="text-center py-12">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                </svg>
                <h3 class="mt-2 text-lg font-medium text-gray-900">Метизы не найдены</h3>
                <p class="mt-1 text-gray-500">
                    Попробуйте изменить параметры фильтрации
                </p>
            </div>
        @endif
    </div>
</div>