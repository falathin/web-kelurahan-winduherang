<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Penduduk</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-6">Daftar Penduduk</h1>

        <div class="mb-4">
            <a href="{{ route('penduduk.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Tambah Penduduk</a>
        </div>

        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">NIK</th>
                    <th class="py-2 px-4 border-b">Nama Lengkap</th>
                    <th class="py-2 px-4 border-b">Tempat Lahir</th>
                    <th class="py-2 px-4 border-b">Tanggal Lahir</th>
                    <th class="py-2 px-4 border-b">Jenis Kelamin</th>
                    <th class="py-2 px-4 border-b">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($penduduk as $resident)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $resident->nik }}</td>
                    <td class="py-2 px-4 border-b">{{ $resident->nama_lengkap }}</td>
                    <td class="py-2 px-4 border-b">{{ $resident->tempat_lahir }}</td>
                    <td class="py-2 px-4 border-b">{{ $resident->tanggal_lahir }}</td>
                    <td class="py-2 px-4 border-b">{{ $resident->jenis_kelamin }}</td>
                    <td class="py-2 px-4 border-b">
                        <a href="{{ route('penduduk.edit', $resident->id) }}" class="text-blue-500 hover:underline">Edit</a>
                        <a href="{{ route('penduduk.show', $resident->id) }}" class="text-blue-500 hover:underline">Detail</a>
                        <form action="{{ route('penduduk.destroy', $resident->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{-- <div class="mt-4">
            {{ $penduduk->links() }}
        </div> --}}
    </div>
</body>
</html>