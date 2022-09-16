
{{-- <div class="flex-1 px-2 flex justify-center lg:ml-6 lg:justify-end">
    <div class="max-w-lg w-full lg:max-w-xs"> --}}
        <div>

            <label for="search" class="sr-only">Search</label>
            <div class="relative text-gray-400 focus-within:text-gray-500">
                <div class="pointer-events-none absolute inset-y-0 left-0 pl-3 flex items-center">
                    <!-- Heroicon name: solid/search -->
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                    </svg>
                </div>
                <input type="hidden" name="invited_id" value="{{ $searchId }}">
                <input id="search" wire:model="search" class="block w-full bg-white py-2 pl-10 pr-3 border border-gray-300 rounded-md leading-5 text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-1 focus:ring-purple-500 focus:border-purple-500 focus:placeholder-gray-500 sm:text-sm" placeholder="Search" type="search" name="search">
            </div>
            @if (!empty($users) && $friendSelected != true)
            
            <ul class="flex flex-col gap-4 justify-center absolute z-10 mt-1 max-h-60 w-80 overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm" tabindex="-1" role="listbox" aria-labelledby="listbox-label" aria-activedescendant="listbox-option-3">
                
                @forelse ($users as $user)
                <div class="flex justify-between">

                    <button type="button" wire:click="setUser({{ $user }})">
                        <li class="text-gray-900 relative cursor-default select-none py-2 pl-3 pr-9" id="listbox-option-0" role="option">
                            <div class="flex items-center">
                                <!-- Online: "bg-green-400", Not Online: "bg-gray-200" -->
                                <span class="inline-block h-2 w-2 flex-shrink-0 rounded-full bg-green-400" aria-hidden="true"></span>
                                <!-- Selected: "font-semibold", Not Selected: "font-normal" -->
                                <span class="font-normal ml-3 block truncate">
                                    {{ $user->email }}
                                    {{-- <span class="sr-only"> is online</span> --}}
                                </span>
                            </div>
                            
                            {{-- <span class="text-indigo-600 absolute inset-y-0 right-0 flex items-center pr-4">
                                <!-- Heroicon name: mini/check -->
                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                                </svg>
                            </span> --}}
                        </li>
                    </button>
                    @if (!isset($eventBar))
                        
                    <div class="flex justify-end">
                        <button type="button" wire:click="friendRequest({{ $user->id }})" class="rounded-full border border-transparent bg-indigo-600 px-3 py-1.5 text-xs font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">ask</button>
                    </div>
                    @endif
                </div>
                @empty
                
                <button type="button" class="relative block w-60 rounded-lg border-2 border-dashed border-gray-300 p-6 text-center hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    <span class="mt-2 block text-sm font-medium text-gray-900">No users found</span>
                </button>
                
                @endforelse
                
                
            </ul>
            @endif
        </div>
    {{-- </div>
</div> --}}

