<div class="flex flex-col max-w-full shadow-md m-6">
  <!-- Header -->
  <div class="flex justify-between items-center bg-gray-50 border-b px-6 py-4">
    <p class="text-xl text-gray-800 font-semibold uppercase">{{ $resourceName }}</p>

    <a href="{{ url('/admin/' . $resourceName . '/create') }}"
      class="bg-gray-800 hover:bg-gray-900 text-white text-xs px-6 py-2 rounded-lg border-0">Create
      New</a>
  </div>
  <!-- End Header -->

  <!-- Tools -->
  <div class="flex flex-wrap justify-between items-center bg-white border-b p-2 space-y-2 md:space-y-0">
    <div class="flex flex-wrap justify-start md:justify-end items-center space-x-0 space-y-2 sm:space-x-2 sm:space-y-0">
      <div class="relative">
        <input type="search" placeholder="Search by"
          class="appearance-none relative block w-full px-8 py-2 border border-gray-300 placeholder-gray-500 text-gray-800 shadow-sm rounded-md focus:outline-none focus:ring-gray-500 focus:border-gray-500 focus:z-10 text-xs" />

        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
          class="absolute left-3 bottom-2 h-4 w-4 text-gray-500">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>
      </div>

      <button
        class="flex items-center space-x-1 text-xs text-gray-500 font-semibold border border-gray-300 shadow-sm rounded-md p-2">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
          class="h-4 w-4 text-gray-500">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
        </svg>
        <span>Filter</span>
      </button>
    </div>
  </div>
  <!-- End Tools -->

  <!-- Table -->
  <table class="overflow-x-auto w-full bg-white divide-y divide-gray-200">
    {{ $slot }}
  </table>
  <!-- End Table -->
</div>
