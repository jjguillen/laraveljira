@props(['errors' => false])

<div {{ $attributes }} class="flex justify-items-center justify-center ">
    <ul class="mx-auto max-w-md">
        @foreach ($errors->all() as $error)
            <li class="bg-red-100 rounded-md text-red-600 px-2 p-1 m-1">{{ $error }}</li>
        @endforeach
    </ul>
</div>
