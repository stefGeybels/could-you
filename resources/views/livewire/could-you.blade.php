<div>
    <fieldset>
    @forelse ($attributes as $item)
        <div class="-space-y-px rounded-md bg-white mt-4">
        <!-- Checked: "bg-indigo-50 border-indigo-200 z-10", Not Checked: "border-gray-200" -->
            <label class="rounded-tl-md rounded-tr-md relative border p-4 flex cursor-pointer focus:outline-none">
                <input type="checkbox" wire:click="updateCheckbox({{$item->id}}) "name="item_id" value="{{ $item->done }}" {{ ($item->done) ? "checked" : "" }} class="mt-0.5 h-6 w-6 border-gray-300 shrink-0 cursor-pointer text-indigo-600  focus:ring-indigo-500" aria-labelledby="privacy-setting-0-label" aria-describedby="privacy-setting-0-description">
                <span class="ml-3 flex flex-col">
                <!-- Checked: "text-indigo-900", Not Checked: "text-gray-900" -->
                <span id="privacy-setting-0-label" class="block text-sm font-medium">{{ $item->item }}</span>
                <!-- Checked: "text-indigo-700", Not Checked: "text-gray-500" -->
                {{-- <span id="privacy-setting-0-description" class="block text-sm">This project would be available to anyone who has the link</span> --}}
                </span>
            </label>

        </div>
        @empty
        <h2>{{__('This Could you has no attributes. First add an attribute before you can check it.')}}</h2>
        @endforelse
    </fieldset>    
</div>
