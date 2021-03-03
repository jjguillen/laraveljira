<div class="flex justify-items-center justify-center">
    <div class="flex flex-col w-6/12 shadow-md m-6">
        <!-- Header -->
        <div class="flex justify-between items-center bg-gray-50 border-b px-6 py-4">
            <p class="text-xl text-gray-800 font-semibold uppercase">{{ $resourceName }}</p>
        </div>
        <!-- End Header -->

        <!-- Table -->
        <table class="overflow-x-auto w-full bg-white divide-y divide-gray-200">
            {{ $slot }}
        </table>
        <!-- End Table -->
    </div>
</div>
