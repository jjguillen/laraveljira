<div class="flex flex-col flex-1">
    <label class="leading-loose">{{ $slot }}</label>
    <input type="text" name="{{ $name }}" id="{{ $name }}" value="{{ old($name, $value) }}"
        class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
</div>
