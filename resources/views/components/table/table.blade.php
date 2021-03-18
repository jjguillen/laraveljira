<div class="flex flex-col shadow-md m-6 {{ $maxWidth }}">
  <!-- Header -->
  <div class="flex justify-between items-center bg-gray-50 border-b px-6 py-4">
    <p class="text-xl text-gray-800 font-semibold uppercase">{{ $resourceName }} {{$resourceDetail }}</p>

    <div class="space-x-2">
      <a href="{{ url('/admin/' . $resourceName . '/create') }}"
        class="bg-gray-800 hover:bg-gray-900 text-white text-xs px-6 py-2 rounded-lg border-0">Crear nuevo
      </a>
      <a href="{{ url('/admin/' . $resourceName . '/pdf') }}"
        class="bg-gray-800 hover:bg-gray-900 text-white text-xs px-6 py-2 rounded-lg border-0">Generar PDF
      </a>
    </div>
  </div>
  <!-- End Header -->

  <!-- Tools -->
  <div class="flex flex-wrap justify-between items-center bg-white border-b p-2 space-y-2 md:space-y-0">
    <div class="flex flex-wrap justify-start md:justify-end items-center space-x-0 space-y-2 sm:space-x-2 sm:space-y-0">
      <form
        class="flex flex-wrap justify-start md:justify-end items-center space-x-0 space-y-2 sm:space-x-2 sm:space-y-0"
        action="{{ url('/admin/' . $resourceName) }}">
        <div class="relative">
          @if (Request::get('buscar'))
            <input name="buscar" value="{{ Request::get('buscar') }}" type="search" placeholder="Search by"
              class="appearance-none relative block w-full px-8 py-2 border border-gray-300 placeholder-gray-500 text-gray-800 shadow-sm rounded-md focus:outline-none focus:ring-gray-500 focus:border-gray-500 focus:z-10 text-xs" />
          @else
            <input name="buscar" type="search" placeholder="Search by"
              class="appearance-none relative block w-full px-8 py-2 border border-gray-300 placeholder-gray-500 text-gray-800 shadow-sm rounded-md focus:outline-none focus:ring-gray-500 focus:border-gray-500 focus:z-10 text-xs" />
          @endif

          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
            class="absolute left-3 bottom-2 h-4 w-4 text-gray-500">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
          </svg>
        </div>

        <button type="submit"
          class="flex items-center space-x-1 text-xs text-gray-500 font-semibold border border-gray-300 shadow-sm rounded-md p-2">
          <span>Search</span>
        </button>
      </form>
      @if (Request::get('buscar'))
        <a class="text-sm text-gray-700 underline" href="{{ url('/admin/' . $resourceName) }}">Clear</a>
      @endif
    </div>
  </div>
  <!-- End Tools -->

  <!-- Table -->
  <table class="overflow-x-auto w-full bg-white divide-y divide-gray-200">
    {{ $slot }}
  </table>
  <!-- End Table -->
  <div class="p-2 bg-white">
    {{ $footer }}
  </div>
</div>
