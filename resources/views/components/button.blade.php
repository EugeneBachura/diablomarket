<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2 bg-button2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-hover-button2 focus:bg-hover-button2 active:bg-hover-button2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>