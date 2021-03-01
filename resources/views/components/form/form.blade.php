<div class="bg-gray-100 flex flex-col justify-center sm:py-6">
    <div class="relative sm:max-w-xl sm:mx-auto ">
        <div class="relative px-4 py-10 bg-white mx-8 md:mx-0 shadow rounded-3xl sm:p-10">
            <form class="max-w-md mx-auto" method="POST" action="{{ $action }}" enctype="multipart/form-data">
                @csrf

                {{ $slot }}

            </form>
        </div>
    </div>
</div>
