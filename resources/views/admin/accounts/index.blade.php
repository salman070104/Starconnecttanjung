@extends('admin.layouts.app')

@section('title', 'Kelola Akun Admin')
@section('page-title')
    <span data-lang="id">Kelola Akun Admin</span>
    <span data-lang="en" class="hidden">Manage Admin Accounts</span>
@endsection
@section('page-subtitle')
    <span data-lang="id">Kelola data akun administrator panel</span>
    <span data-lang="en" class="hidden">Manage panel administrator account data</span>
@endsection

@section('content')

    {{-- Alert Messages --}}
    @if (session('success'))
        <div id="alert-success"
            class="mb-6 flex items-center gap-3 bg-emerald-50 dark:bg-emerald-950/20 border border-emerald-200 dark:border-emerald-900/30 text-emerald-700 dark:text-emerald-400 px-5 py-4 rounded-2xl animate-fade-in">
            <svg class="w-5 h-5 text-emerald-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            <span class="text-sm font-medium">{{ session('success') }}</span>
            <button onclick="document.getElementById('alert-success').remove()" class="ml-auto text-emerald-400 hover:text-emerald-600 transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    @endif

    @if (session('error'))
        <div id="alert-error"
            class="mb-6 flex items-center gap-3 bg-red-50 dark:bg-red-950/20 border border-red-200 dark:border-red-900/30 text-red-700 dark:text-red-400 px-5 py-4 rounded-2xl animate-fade-in">
            <svg class="w-5 h-5 text-red-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>
            <span class="text-sm font-medium">{{ session('error') }}</span>
            <button onclick="document.getElementById('alert-error').remove()" class="ml-auto text-red-400 hover:text-red-600 transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    @endif

    @if ($errors->any())
        <div id="alert-validation"
            class="mb-6 bg-red-50 dark:bg-red-950/20 border border-red-200 dark:border-red-900/30 text-red-700 dark:text-red-400 px-5 py-4 rounded-2xl animate-fade-in">
            <div class="flex items-center gap-3 mb-2">
                <svg class="w-5 h-5 text-red-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
                <span class="text-sm font-semibold">
                    <span data-lang="id">Terjadi Kesalahan Validasi:</span>
                    <span data-lang="en" class="hidden">Validation Errors Occurred:</span>
                </span>
                <button onclick="document.getElementById('alert-validation').remove()" class="ml-auto text-red-400 hover:text-red-600 transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <ul class="list-disc list-inside text-xs space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Grid Layout --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        {{-- LEFT COLUMN: Tambah Admin Baru Form --}}
        <div class="lg:col-span-1">
            <div class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700/50 shadow-sm p-6">
                <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-1">
                    <span data-lang="id">Tambah Admin Baru</span>
                    <span data-lang="en" class="hidden">Add New Admin</span>
                </h3>
                <p class="text-xs text-gray-400 dark:text-gray-400 mb-6">
                    <span data-lang="id">Daftarkan akun administrator baru untuk StarConnect</span>
                    <span data-lang="en" class="hidden">Register a new administrator account for StarConnect</span>
                </p>

                <form action="{{ route('admin.accounts.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label for="create_name" class="block text-xs font-semibold text-gray-400 dark:text-gray-400 uppercase tracking-wider mb-2">
                            <span data-lang="id">Nama Lengkap</span>
                            <span data-lang="en" class="hidden">Full Name</span>
                        </label>
                        <input type="text" name="name" id="create_name" required placeholder="e.g. Salman Miftahur"
                            value="{{ old('name') }}"
                            class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 dark:text-white transition-all">
                    </div>

                    <div>
                        <label for="create_username" class="block text-xs font-semibold text-gray-400 dark:text-gray-400 uppercase tracking-wider mb-2">
                            <span data-lang="id">Username</span>
                            <span data-lang="en" class="hidden">Username</span>
                        </label>
                        <input type="text" name="username" id="create_username" required placeholder="e.g. salman"
                            value="{{ old('username') }}"
                            class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 dark:text-white transition-all">
                    </div>

                    <div>
                        <label for="create_password" class="block text-xs font-semibold text-gray-400 dark:text-gray-400 uppercase tracking-wider mb-2">
                            <span data-lang="id">Password</span>
                            <span data-lang="en" class="hidden">Password</span>
                        </label>
                        <div class="relative w-full">
                            <input type="password" name="password" id="create_password" required placeholder="••••••••"
                                class="w-full pl-4 pr-12 py-3 bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 dark:text-white transition-all">
                            <button type="button" onclick="togglePasswordVisibility('create_password', this)"
                                class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 dark:text-gray-500 dark:hover:text-gray-300 focus:outline-none transition">
                                <svg class="w-5 h-5 text-gray-400 dark:text-gray-500 hover:text-gray-600 dark:hover:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <button type="submit"
                        class="w-full inline-flex items-center justify-center gap-2 bg-gradient-to-r from-blue-600 to-indigo-600 text-white text-sm font-semibold px-5 py-3.5 rounded-xl shadow-lg shadow-blue-500/25 hover:shadow-blue-500/40 transition-all duration-300 hover:-translate-y-0.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                        </svg>
                        <span data-lang="id">Tambah Admin</span>
                        <span data-lang="en" class="hidden">Add Admin</span>
                    </button>
                </form>
            </div>
        </div>

        {{-- RIGHT COLUMN: Daftar Akun Admin Table --}}
        <div class="lg:col-span-2">
            <div class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700/50 shadow-sm overflow-hidden">
                <div class="px-6 py-5 border-b border-gray-100 dark:border-gray-700">
                    <h3 class="text-lg font-bold text-gray-800 dark:text-white">
                        <span data-lang="id">Daftar Akun Admin</span>
                        <span data-lang="en" class="hidden">Admin Account List</span>
                    </h3>
                    <p class="text-sm text-gray-400 dark:text-gray-400 mt-0.5">
                        <span data-lang="id">Kelola hak akses administrator panel</span>
                        <span data-lang="en" class="hidden">Manage panel administrator access rights</span>
                    </p>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="text-left text-xs font-semibold text-gray-400 dark:text-gray-400 uppercase tracking-wider border-b border-gray-100 dark:border-gray-700">
                                <th class="px-6 py-4 w-16">No</th>
                                <th class="px-6 py-4">
                                    <span data-lang="id">Nama</span>
                                    <span data-lang="en" class="hidden">Name</span>
                                </th>
                                <th class="px-6 py-4">Username</th>
                                <th class="px-6 py-4 text-center">
                                    <span data-lang="id">Aksi</span>
                                    <span data-lang="en" class="hidden">Action</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50 dark:divide-gray-700/40">
                            @forelse ($admins as $index => $admin)
                                <tr class="table-row hover:bg-gray-50/50 dark:hover:bg-gray-700/10">
                                    <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">{{ $index + 1 }}</td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-9 h-9 rounded-full bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center text-white text-xs font-bold uppercase shadow-sm">
                                                {{ strtoupper(substr($admin->name, 0, 1)) }}
                                            </div>
                                            <div>
                                                <span class="text-sm font-semibold text-gray-700 dark:text-gray-200">{{ $admin->name }}</span>
                                                @if (Session::get('admin_id') == $admin->id)
                                                    <span class="ml-2 inline-flex items-center px-1.5 py-0.5 rounded-md text-[10px] font-medium bg-blue-50 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 border border-blue-100 dark:border-blue-800">
                                                        <span data-lang="id">Anda (Aktif)</span>
                                                        <span data-lang="en" class="hidden">You (Active)</span>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400 font-mono">{{ $admin->username }}</td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center justify-center gap-2">
                                            {{-- Edit Button --}}
                                            <button type="button"
                                                onclick="openEditModal({{ $admin->id }}, '{{ addslashes($admin->name) }}', '{{ addslashes($admin->username) }}')"
                                                class="w-8 h-8 rounded-lg bg-amber-50 dark:bg-amber-900/10 border border-amber-200 dark:border-amber-900/30 flex items-center justify-center text-amber-600 dark:text-amber-400 hover:bg-amber-100 dark:hover:bg-amber-900/20 transition-all duration-200"
                                                title="Edit">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </button>

                                            {{-- Delete Button --}}
                                            @if (Session::get('admin_id') == $admin->id)
                                                <button type="button" disabled
                                                    class="w-8 h-8 rounded-lg bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 flex items-center justify-center text-gray-300 dark:text-gray-600 cursor-not-allowed"
                                                    title="{{ Session::get('lang') === 'en' ? 'Cannot delete yourself' : 'Tidak dapat menghapus diri sendiri' }}">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                                    </svg>
                                                </button>
                                            @else
                                                <form action="{{ route('admin.accounts.destroy', $admin->id) }}" method="POST"
                                                    onsubmit="return confirm('{{ Session::get('lang') === 'en' ? 'Are you sure you want to delete admin ' : 'Yakin ingin menghapus admin ' }}{{ $admin->name }}?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="w-8 h-8 rounded-lg bg-red-50 dark:bg-red-900/10 border border-red-200 dark:border-red-900/30 flex items-center justify-center text-red-600 dark:text-red-400 hover:bg-red-100 dark:hover:bg-red-900/20 transition-all duration-200"
                                                        title="Hapus">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-12 text-center text-gray-400 dark:text-gray-500">
                                        <span data-lang="id">Belum ada data admin</span>
                                        <span data-lang="en" class="hidden">No admin accounts found</span>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    {{-- EDIT MODAL --}}
    <div id="editModal" class="fixed inset-0 z-50 flex items-center justify-center hidden bg-black/60 backdrop-blur-sm transition-opacity duration-300 animate-fade-in">
        <div class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700/50 shadow-2xl p-6 w-full max-w-md mx-4 transform scale-95 transition-transform duration-300">
            <div class="flex items-center justify-between pb-4 border-b border-gray-100 dark:border-gray-700 mb-6">
                <h3 class="text-lg font-bold text-gray-800 dark:text-white">
                    <span data-lang="id">Edit Akun Admin</span>
                    <span data-lang="en" class="hidden">Edit Admin Account</span>
                </h3>
                <button type="button" onclick="closeEditModal()" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <form id="editForm" action="" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label for="edit_name" class="block text-xs font-semibold text-gray-400 dark:text-gray-400 uppercase tracking-wider mb-2">
                        <span data-lang="id">Nama Lengkap</span>
                        <span data-lang="en" class="hidden">Full Name</span>
                    </label>
                    <input type="text" name="name" id="edit_name" required
                        class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 dark:text-white transition-all">
                </div>

                <div>
                    <label for="edit_username" class="block text-xs font-semibold text-gray-400 dark:text-gray-400 uppercase tracking-wider mb-2">
                        <span data-lang="id">Username</span>
                        <span data-lang="en" class="hidden">Username</span>
                    </label>
                    <input type="text" name="username" id="edit_username" required
                        class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 dark:text-white transition-all">
                </div>

                <div>
                    <label for="edit_password" class="block text-xs font-semibold text-gray-400 dark:text-gray-400 uppercase tracking-wider mb-2">
                        <span data-lang="id">Password Baru</span>
                        <span data-lang="en" class="hidden">New Password</span>
                    </label>
                    <div class="relative w-full">
                        <input type="password" name="password" id="edit_password" placeholder="••••••••"
                            class="w-full pl-4 pr-12 py-3 bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 dark:text-white transition-all">
                        <button type="button" onclick="togglePasswordVisibility('edit_password', this)"
                            class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 dark:text-gray-500 dark:hover:text-gray-300 focus:outline-none transition">
                            <svg class="w-5 h-5 text-gray-400 dark:text-gray-500 hover:text-gray-600 dark:hover:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                    </div>
                    <p class="text-[11px] text-gray-400 mt-1.5 font-medium">
                        <span data-lang="id">*Kosongkan jika tidak ingin mengubah password.</span>
                        <span data-lang="en" class="hidden">*Leave blank if you do not want to change the password.</span>
                    </p>
                </div>

                <div class="flex items-center gap-3 pt-4 border-t border-gray-100 dark:border-gray-700 mt-6">
                    <button type="button" onclick="closeEditModal()"
                        class="flex-1 py-3 px-4 bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-200 text-sm font-semibold rounded-xl transition-all">
                        <span data-lang="id">Batal</span>
                        <span data-lang="en" class="hidden">Cancel</span>
                    </button>
                    <button type="submit"
                        class="flex-1 py-3 px-4 bg-gradient-to-r from-blue-600 to-indigo-600 text-white text-sm font-semibold rounded-xl shadow-lg shadow-blue-500/25 hover:shadow-blue-500/40 transition-all duration-300 hover:-translate-y-0.5">
                        <span data-lang="id">Simpan</span>
                        <span data-lang="en" class="hidden">Save Changes</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openEditModal(id, name, username) {
            const modal = document.getElementById('editModal');
            const form = document.getElementById('editForm');
            
            // Set URL
            form.action = `/admin/accounts/${id}`;
            
            // Populate Fields
            document.getElementById('edit_name').value = name;
            document.getElementById('edit_username').value = username;
            document.getElementById('edit_password').value = '';
            
            // Show modal
            modal.classList.remove('hidden');
        }

        function closeEditModal() {
            const modal = document.getElementById('editModal');
            modal.classList.add('hidden');
        }

        // Close on ESC key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeEditModal();
            }
        });
    </script>

@endsection
