<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>P3I-BKPSDM | Production</title>
    {{-- Memuat Tailwind CSS untuk styling responsif --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script>
        // Konfigurasi Tailwind untuk menggunakan font Inter dan warna kustom
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary': '#4f46e5', // Indigo-600
                        'secondary': '#6b7280', // Gray-500
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    }
                }
            }
        }

        // Fungsi Simulasi Pencarian
        function handleSearch(event) {
            event.preventDefault(); // Mencegah submit form default

            const keyword = document.getElementById('search-keyword').value.trim();
            const resultsDiv = document.getElementById('search-results');
            const searchStatus = document.getElementById('search-status');
            const initialMessage = document.getElementById('initial-message');

            searchStatus.textContent = "Mencari...";
            resultsDiv.innerHTML = '';
            resultsDiv.classList.add('hidden');
            initialMessage.classList.add('hidden'); // Sembunyikan pesan awal saat mencari

            // Simulasi proses loading
            setTimeout(() => {
                let simulatedResults = [];
                const lowerKeyword = keyword.toLowerCase();

                if (lowerKeyword.includes('laporan')) {
                    simulatedResults = [{
                            title: "Laporan Keuangan Kuartal Terakhir",
                            type: "Dokumen",
                            date: "2025-09-30"
                        },
                        {
                            title: "Ringkasan Laporan Penjualan Harian",
                            type: "Data",
                            date: "2025-11-28"
                        }
                    ];
                } else if (lowerKeyword.includes('pengguna') || lowerKeyword.includes('user')) {
                    simulatedResults = [{
                            title: "Daftar Pengguna Aktif",
                            type: "Data",
                            date: "2025-11-25"
                        },
                        {
                            title: "Analisis Aktivitas Pengguna Premium",
                            type: "Laporan",
                            date: "2025-10-01"
                        }
                    ];
                } else if (lowerKeyword.includes('proyek') || lowerKeyword.includes('project')) {
                    simulatedResults = [{
                            title: "Dokumentasi Proyek X",
                            type: "Dokumen",
                            date: "2025-07-01"
                        },
                        {
                            title: "Rencana Anggaran Proyek Baru",
                            type: "Keuangan",
                            date: "2025-12-05"
                        }
                    ];
                } else if (keyword === "") {
                    // Jika keyword kosong, berikan hasil umum atau pesan
                    searchStatus.textContent = `Masukkan kata kunci untuk memulai pencarian.`;
                    resultsDiv.innerHTML = `
                        <div class="text-center p-6 bg-blue-50 rounded-xl border border-blue-200">
                            <p class="text-lg font-medium text-blue-800">Kata kunci tidak boleh kosong.</p>
                            <p class="text-sm text-blue-600 mt-1">Silakan masukkan apa yang ingin Anda cari (cth: Laporan, Pengguna).</p>
                        </div>
                    `;
                    resultsDiv.classList.remove('hidden');
                    return; // Hentikan fungsi jika kosong
                } else {
                    // Default hasil (jika keyword tidak cocok dengan kriteria simulasi)
                    simulatedResults = [{
                            title: `Arsip Hasil Pencarian untuk: ${keyword}`,
                            type: "Dokumen",
                            date: "2025-01-01"
                        },
                        {
                            title: `Catatan Historis Mengenai ${keyword}`,
                            type: "Data",
                            date: "2024-12-15"
                        }
                    ];
                }

                if (simulatedResults.length > 0) {
                    searchStatus.textContent = `Ditemukan ${simulatedResults.length} hasil untuk "${keyword}".`;

                    const resultsHtml = simulatedResults.map(item => `
                        <div class="p-4 bg-white border border-gray-200 rounded-xl shadow-sm hover:shadow-md transition duration-300">
                            <p class="text-sm font-semibold text-primary">${item.type}</p>
                            <h3 class="text-lg font-bold text-gray-800 mt-1">${item.title}</h3>
                            <p class="text-sm text-gray-500 mt-2">Diperbarui: ${item.date}</p>
                            <button class="mt-3 text-sm font-medium text-primary hover:text-indigo-700">Lihat Detail &rarr;</button>
                        </div>
                    `).join('');

                    resultsDiv.innerHTML = resultsHtml;
                    resultsDiv.classList.remove('hidden');

                } else {
                    searchStatus.textContent = `Tidak ada hasil yang ditemukan untuk "${keyword}".`;
                    resultsDiv.innerHTML = `
                        <div class="text-center p-6 bg-yellow-50 rounded-xl border border-yellow-200">
                            <p class="text-lg font-medium text-yellow-800">Coba kata kunci lain.</p>
                            <p class="text-sm text-yellow-600 mt-1">Simulasi tidak menemukan data yang cocok dengan kriteria Anda.</p>
                        </div>
                    `;
                    resultsDiv.classList.remove('hidden');
                }

            }, 1000); // Tunda 1 detik untuk simulasi koneksi
        }
    </script>
</head>

<body class="bg-gray-50 min-h-screen p-4 sm:p-8 font-sans">

    <div class="max-w-4xl mx-auto">

        {{-- Header Form Pencarian --}}
        <header class="mb-8">
            <h1 class="text-3xl font-extrabold text-gray-900 border-b pb-2">Penginputan Data Dokumen DMS di Lingkungan
                Pemerintah Kabupaten Kapuas</h1>
        </header>

        {{-- Area Hasil Pencarian --}}
        <div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                {{-- CARD DATA PESERTA --}}
                <div class="p-4 bg-white border border-gray-200 rounded-xl shadow-sm flex flex-col">
                    <p class="text-sm font-semibold text-primary">Catatan</p>
                    <p class="text-gray-700">Pegawai Pemerintah Kabupaten Kapuas</p>
                    <p class="text-sm mt-2">File yang diupload dalam bentuk
                        <strong>pdf</strong> dan maksimal ukuran file <strong>1.2 MB</strong>
                    </p>

                    <p class="text-sm font-semibold text-primary mb-2 mt-3">Keterangan File diupload</p>
                    <ul class="text-gray-700 text-sm leading-relaxed">
                        <li>Dokumen <strong>SK CPNS</strong> (Calon Pegawai Negeri Sipil).</li>
                        <li>Dokumen <strong>SK PNS</strong> (Pegawai Negeri Sipil).</li>
                        <li>Dokumen <strong>Pertek NIP</strong> (Nomor Induk Pegawai).</li>
                        <li>Dokumen <strong>DRH</strong> (Daftar Riwayat Hidup).</li>
                        <li>Dokumen <strong>SPMT</strong> (Surat Perintah Melaksanakan Tugas).</li>
                    </ul>
                    <p class="text-sm font-semibold text-primary mb-2 mt-3">Contoh DRH</p>
                    <a href="{{ asset('data-pns/format-drh.doc') }}" class="text-blue-600 hover:underline"
                        target="_blank">Download
                        Contoh DRH</a>
                </div>

                {{-- CARD INFORMASI --}}
                <div class="p-4 bg-white border border-gray-200 rounded-xl shadow-sm">
                    <p class="text-sm font-semibold text-primary">Informasi Tambahan</p>
                    <p class="text-sm"><strong>SK CPNS</strong> dan <strong>SK PNS</strong> wajib diupload.</p>
                    <p class="text-sm mt-2"><strong>Pertek NIP</strong> Opsional Jika ada diupload.</p>
                    <p class="text-sm mt-2"><strong>DRH</strong> Jika saat pemberkasan CPNS tidak ditemukan maka DRH
                        dapat diperbarui dan diatandatangani ybs.</p>
                    <p class="text-sm mt-2"><strong>SPMT</strong> Opsional Jika ada diupload atau, jika SPMT tidak
                        ditemukan dapat diperbarui dengan
                        ketentuan yang berlaku : </p>
                    <ul>
                        <li>1. SPMT dapat dibuat ulang tetapi harus didasari dengan payung hukum dari PPK yang dibuat
                            dari
                            instansi dengan menyatakan
                            <strong>"SPMT sebelumnya tidak ditemukan oleh karena itu diterbitkan SPMT yang sesuai dengan
                                aslinya."</strong>
                        </li>
                        <li>2. Jika PNS sudah pindah maka yang menandatangai adalah PPK ditempat baru.</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="bg-white mt-4 p-6 sm:p-8 rounded-2xl shadow-xl border border-gray-100">
            <form id="search-form" method="GET" action="{{ route('search') }}">
                <div class="flex-grow">
                    <h3 class="mb-3">Kata Kunci Pegawai</h3>
                    {{-- NIP --}}
                    <div class="relative mt-2">
                        <input type="number" name="nip" value="{{ old('nip', request('nip')) }}"
                            placeholder="NIP Pegawai"
                            class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary transition duration-150 text-gray-800">
                        <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        @error('nip')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- NIK --}}
                    <div class="relative mt-2">
                        <input type="number" name="nik" value="{{ old('nik', request('nik')) }}"
                            placeholder="NIK Pegawai"
                            class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary transition duration-150 text-gray-800">
                        <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        @error('nik')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="w-full md:w-auto mt-3">
                    <button type="submit"
                        class="w-full md:w-auto px-6 py-2 bg-primary text-white font-semibold rounded-lg shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition duration-150">
                        <i class="fas fa-search mr-2"></i> Cari Data
                    </button>
                </div>
            </form>
        </div>

        @if (isset($has_search) && $has_search)
            @if ($result)
                <div class="bg-white mt-4 p-6 sm:p-8 rounded-2xl shadow-xl border border-gray-100">
                    <h2 class="mb-3" style="font-size: 25px"><strong>Form Upload Dokumen (A.n
                            {{ $result->nama }})</strong></h2>
                    <form id="search-form" method="POST"
                        action="{{ route('upload.dokumen', ['nip' => $result->nip]) }}" enctype="multipart/form-data">
                        @csrf
                        @if (session('success'))
                            <div
                                class="mb-4 flex items-center gap-3 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-green-800">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="text-sm font-medium">
                                    {{ session('success') }}
                                </span>
                            </div>
                        @endif

                        <input type="hidden" value="{{ $result->username ?? '' }}" name="nopeserta">
                        <div class="flex-grow">
                            <div class="relative mt-2">
                                <label class="block mb-2">Dokumen SK CPNS</label>
                                <input type="file" name="skcpns" value="{{ old('skcpns', request('skcpns')) }}"
                                    class="w-full pl-5 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary transition duration-150 text-gray-800">
                                @error('skcpns')
                                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                                <x-lihat-dokumen :is-done="$result->is_done" :nip="$result->nip" folder="SKCPNS" />
                            </div>
                            <div class="relative mt-2">
                                <label class="block mb-2">Dokumen SK PNS</label>
                                <input type="file" name="skpns" value="{{ old('skpns', request('skpns')) }}"
                                    class="w-full pl-5 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary transition duration-150 text-gray-800">
                                @error('skpns')
                                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                                <x-lihat-dokumen :is-done="$result->is_done" :nip="$result->nip" folder="SKPNS" />
                            </div>
                            <div class="relative mt-2">
                                <label class="block mb-2">Dokumen Pertek NIP (Opsional)</label>
                                <input type="file" name="d2" value="{{ old('d2', request('d2')) }}"
                                    class="w-full pl-5 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary transition duration-150 text-gray-800">
                                @error('d2')
                                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                                <x-lihat-dokumen :is-done="$result->is_done" :nip="$result->nip" folder="D2" />
                            </div>
                            <div class="relative mt-2">
                                <label class="block mb-2">Dokumen DRH</label>
                                <input type="file" name="drh" value="{{ old('drh', request('drh')) }}"
                                    class="w-full pl-5 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary transition duration-150 text-gray-800">
                                @error('drh')
                                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                                <x-lihat-dokumen :is-done="$result->is_done" :nip="$result->nip" folder="DRH" />
                            </div>
                            <div class="relative mt-2">
                                <label class="block mb-2">Dokumen SPMT (Opsional)</label>
                                <input type="file" name="spmt" value="{{ old('spmt', request('spmt')) }}"
                                    class="w-full pl-5 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary transition duration-150 text-gray-800">
                                @error('spmt')
                                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                                <x-lihat-dokumen :is-done="$result->is_done" :nip="$result->nip" folder="SPMT" />
                            </div>
                        </div>

                        <div class="w-full md:w-auto mt-3">
                            <button type="submit"
                                class="w-full md:w-auto px-6 py-2 bg-primary text-white font-semibold rounded-lg shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition duration-150">Simpan
                            </button>
                        </div>
                    </form>
                </div>
            @else
                <div class="text-center p-6 bg-yellow-50 rounded-xl border border-yellow-200 mt-7">
                    <p class="text-lg font-medium text-yellow-800">Data Pegawai Tidak ditemukan.</p>
                    <p class="text-sm text-yellow-600 mt-1">Silakan cek NIP Pegawai dan NIK Pegawai.</p>
                </div>
            @endif
        @endif
    </div>

</body>

</html>
