@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
        <div class="bg-red-100 border-l-4 border-red-400 text-red-700 p-4" role="alert">
            <p class="font-bold">{{ __('Whoops! Something went wrong.') }}</p>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    </div>
@endif
