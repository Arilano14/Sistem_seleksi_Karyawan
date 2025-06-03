<button {{ $attributes->merge([
    'type' => 'submit',
    'class' => 'inline-flex items-center px-4 py-2 bg-[#ffd900] border border-transparent rounded-md font-semibold text-xs text-[#00007f] uppercase tracking-widest hover:bg-[#e6c200] focus:bg-[#e6c200] active:bg-[#ccae00] focus:outline-none focus:ring-2 focus:ring-[#00007f] focus:ring-offset-2 transition ease-in-out duration-150'
]) }}>
    {{ $slot }}
</button>
