<div class="tabs w-full mt-4">
    @foreach ($tabs as $index => $tab)
        <input
            type="radio"
            name="my_tabs_{{ $loop->parentLoop?->index ?? 'main' }}"
            class="tab"
            aria-label="{{ $tab['label'] }}"
            {{ $index === 0 ? 'checked' : '' }}
        />
        <div class="tab-content overflow-x-auto">
            <table class="table table-zebra w-full min-w-[700px] text-sm sm:text-base">
                {{-- Aquí se inyecta el contenido del slot correspondiente --}}
                {{ ${'tab_' . $index} ?? '' }}
            </table>
        </div>
    @endforeach
</div>
