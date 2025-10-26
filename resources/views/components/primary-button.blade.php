<button {{ $attributes->merge([
    'type' => 'submit', 
    'class' => 'inline-flex items-center justify-center w-full px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest bg-[#004d93] hover:bg-[#003b72] focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 text-center transition ease-in-out duration-150'
]) }}>
    {{ $slot }}
</button>
