@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-sm text-red-600 space-y-1']) }}>
        @foreach ((array) $messages as $message)
            <li>
                {{-- Ganti pesan default Laravel dengan bahasa Indonesia --}}
                @switch($message)
                    @case('The email field is required.')
                        Email harus diisi.
                        @break
                    @case('The email must be a valid email address.')
                        Email tidak valid.
                        @break
                    @case('The password field is required.')
                        Password harus diisi.
                        @break
                    @default
                        {{ $message }}
                @endswitch
            </li>
        @endforeach
    </ul>
@endif
