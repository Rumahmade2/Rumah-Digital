@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 dark:border-Rumahmade-darker-grey dark:bg-Rumahmade-black dark:text-white focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm transition-all duration-300']) }}>
