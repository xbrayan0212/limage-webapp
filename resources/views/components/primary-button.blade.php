<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-limage-btn border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-limage-btnhover hover:text-white focus:bg-limage-btnfocus focus:text-white focus:font-semibold active:bg-limage-btnfocus focus:outline-none focus:ring-2 focus:ring-violet-800 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
	{{ $slot }}
</button>
