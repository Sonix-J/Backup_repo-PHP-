@props(['type', 'active' => false])

<button
    {{ $attributes->merge(['class' => 'flex items-center gap-2 py-2 px-6 rounded-sm whitespace-nowrap text-lg cursor-pointer justify-start transition-colors duration-200']) }}
    x-data="{ isActive: {{ json_encode($active) }} }"
    x-bind:class="isActive ? 'bg-housify-darkest text-housify-light' : 'bg-transparent border border-housify-darkest text-housify-darkest'"
    @click="isActive = !isActive"
>
    <i class="filter-icon"
       data-lucide="{{ $type['icon_name'] }}"
       x-bind:class="isActive ? 'text-housify-light' : 'text-housify-darkest'">
    </i>
    <span class="text-center w-full"
          x-bind:class="isActive ? 'text-housify-light' : 'text-housify-darkest'">
        {{ $type['type_name'] }}
    </span>
</button>
