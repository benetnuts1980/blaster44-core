@props(['disabled' => false])

@props(['disabled' => false])

<input
    @disabled($disabled)
    {{ $attributes->merge([
        'class' => 'w-full bg-black border border-gray-700 rounded-xl px-4 py-3 text-white focus:border-lime-400 focus:ring-lime-400'
    ]) }}
>