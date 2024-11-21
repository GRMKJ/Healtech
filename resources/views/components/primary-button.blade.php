<button {{ $attributes->merge(['type' => 'submit', 'class' => 'shadow-xl py-3 px-4 text-sm tracking-wide rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none']) }}>
    {{ $slot }}
</button>
