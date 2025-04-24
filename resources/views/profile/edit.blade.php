<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Profil Akun – Kelurahan Winduherang</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans antialiased">

  <!-- Header Perisai -->
  <header class="bg-[#14532d] text-white py-6 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 flex items-center">
      <img src="images/Logo_Kabupaten_kuningan.png" alt="Logo Desa" class="w-16 h-16 mr-4" />
      <h1 class="text-3xl font-bold">Profil Akun</h1>
    </div>
    <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-24 h-1 bg-[#facc15] rounded-full"></div>
  </header>

  <main class="py-12">
    <div class="max-w-4xl mx-auto space-y-8 px-4">

      {{-- Profile Updated --}}
      @if(session('status')==='profile-updated')
        <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded-md">
          ✅ Profil Anda berhasil diperbarui.
        </div>
      @endif

      <!-- Update Profile Information -->
      <section class="bg-white shadow-md rounded-xl overflow-hidden">
        <div class="bg-[#22c55e] px-6 py-4">
          <h2 class="text-xl font-semibold text-white">Informasi Profil</h2>
        </div>
        <div class="p-6 space-y-4">
          <form method="POST" action="{{ route('profile.update') }}" class="space-y-4">
            @csrf @method('patch')
            <div>
              <label class="block font-medium text-gray-700">Nama Lengkap</label>
              <input name="name" type="text"
                     class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-green-200"
                     placeholder="Contoh: Ahmad Supriyatna"
                     value="{{ old('name', $user->name) }}" required />
            </div>
            <div>
              <label class="block font-medium text-gray-700">Email</label>
              <input name="email" type="email"
                     class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-green-200"
                     placeholder="contoh@winduherang.id"
                     value="{{ old('email', $user->email) }}" required />
            </div>
            <div class="text-right">
              <button type="submit"
                      class="bg-[#14532d] text-white px-5 py-2 rounded-lg hover:bg-[#0f3f26] transition">
                Simpan Perubahan
              </button>
            </div>
          </form>
        </div>
      </section>

      {{-- Password Updated --}}
      @if(session('status')==='password-updated')
        <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded-md">
          🔒 Kata sandi berhasil diubah.
        </div>
      @endif

      <!-- Update Password -->
      <section class="bg-white shadow-md rounded-xl overflow-hidden">
        <div class="bg-[#22c55e] px-6 py-4">
          <h2 class="text-xl font-semibold text-white">Ubah Kata Sandi</h2>
        </div>
        <div class="p-6 space-y-4">
          <form method="POST" action="{{ route('password.update') }}" class="space-y-4">
            @csrf @method('put')
            <div>
              <label class="block font-medium text-gray-700">Kata Sandi Lama</label>
              <input name="current_password" type="password"
                     class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-green-200"
                     placeholder="Masukkan kata sandi lama Anda" required />
            </div>
            <div>
              <label class="block font-medium text-gray-700">Kata Sandi Baru</label>
              <input name="password" type="password"
                     class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-green-200"
                     placeholder="Minimal 8 karakter" required />
            </div>
            <div>
              <label class="block font-medium text-gray-700">Konfirmasi Kata Sandi</label>
              <input name="password_confirmation" type="password"
                     class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-green-200"
                     placeholder="Ulangi kata sandi baru Anda" required />
            </div>
            <div class="text-right">
              <button type="submit"
                      class="bg-[#14532d] text-white px-5 py-2 rounded-lg hover:bg-[#0f3f26] transition">
                Ubah Kata Sandi
              </button>
            </div>
          </form>
        </div>
      </section>

      {{-- Account Deleted --}}
      @if(session('status')==='account-deleted')
        <div class="bg-red-100 border border-red-300 text-red-800 px-4 py-3 rounded-md">
          🗑️ Akun Anda telah dihapus.
        </div>
      @endif

      <!-- Delete Account -->
      <section class="bg-white shadow-md rounded-xl overflow-hidden">
        <div class="bg-red-600 px-6 py-4">
          <h2 class="text-xl font-semibold text-white">Hapus Akun</h2>
        </div>
        <div class="p-6 space-y-4">
          <form method="POST" action="{{ route('profile.destroy') }}" class="space-y-4">
            @csrf @method('delete')
            <p class="text-gray-700">
              Setelah akun Anda dihapus, semua data akan hilang permanen.  
              Jika Anda yakin, masukkan kata sandi Anda dan klik tombol di bawah.
            </p>
            <div>
              <label class="block font-medium text-gray-700">Konfirmasi Kata Sandi</label>
              <input name="password" type="password"
                     class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-red-200"
                     placeholder="Masukkan kata sandi untuk menghapus akun" required />
            </div>
            <div class="text-right">
              <button type="submit"
                      class="bg-red-700 text-white px-5 py-2 rounded-lg hover:bg-red-800 transition">
                Hapus Akun
              </button>
            </div>
          </form>
        </div>
      </section>

    </div>
  </main>

</body>
</html>