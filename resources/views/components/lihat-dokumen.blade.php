@props([
    'isDone' => false,
    'nip',
    'folder',
])

@if ($isDone)
    <div class="mt-3">
        <a href="{{ asset("dokumen-dms/{$folder}/{$nip}_{$folder}.pdf") }}" target="_blank"
            class="inline-flex items-center gap-1 px-4 py-2
                  bg-green-600 text-white text-sm rounded-md
                  hover:bg-green-700 transition">
            <i class="fas fa-eye"></i>
            Lihat File
        </a>
    </div>
@endif
