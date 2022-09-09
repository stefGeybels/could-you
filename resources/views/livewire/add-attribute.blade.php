<div class="sm:col-span-2">
        <label for="location" class="block text-sm font-medium text-gray-700">{{ __('Attributes') }}</label>
        <div>
            @forelse ($attributes as $item)
                
            <div class="relative flex items-center">
                <div class="flex h-5 items-center">
                  <input id="comments" aria-describedby="comments-description" name="comments" wire:key="box-{{ rand(0, 100000) }}" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                </div>

                <div class="ml-3 text-sm w-full">
                    <div class="mt-1 ">
                        <input type="attribute" name="attributes[]" wire:model.lazy="attributes.{{$item['id']}}.title" wire:key="item-{{ rand(0, 100000) }}" id="email" class="block w-full rounded-md border-gray-300 py-3 px-4 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" placeholder="Something funny">
                    </div>
                </div>
            </div>
            @empty

            <button type="button" class="relative block w-full rounded-lg border-2 border-dashed border-gray-300 p-12 text-center hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2" wire:click="addAttribute">
                <svg class="mx-auto h-12 w-12 text-gray-400" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v20c0 4.418 7.163 8 16 8 1.381 0 2.721-.087 4-.252M8 14c0 4.418 7.163 8 16 8s16-3.582 16-8M8 14c0-4.418 7.163-8 16-8s16 3.582 16 8m0 0v14m0-4c0 4.418-7.163 8-16 8S8 28.418 8 24m32 10v6m0 0v6m0-6h6m-6 0h-6" />
                </svg>
                <span class="mt-2 block text-sm font-medium text-gray-900">{{ __('Create new item') }}</span>
            </button>
  
            @endforelse

            <button type="button" class="mt-4 inline-flex items-center rounded-full border border-transparent bg-indigo-600 p-1.5 text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2" wire:click='addAttribute'>
                <!-- Heroicon name: mini/plus -->
                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                </svg>
            </button>
        </div>
</div>
