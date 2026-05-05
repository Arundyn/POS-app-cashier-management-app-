<x-app-layout>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600&display=swap');

        .page-wrap {
            font-family: 'DM Sans', sans-serif;
            padding: 2.5rem 2rem;
            max-width: 1100px;
            margin: 0 auto;
        }

        /* Header */
        .page-header {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            margin-bottom: 1.75rem;
        }
        .page-eyebrow {
            font-size: 0.72rem;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            color: #9ca3af;
            font-weight: 500;
            margin-bottom: 0.3rem;
        }
        .page-title {
            font-size: 1.6rem;
            font-weight: 600;
            color: #111827;
            letter-spacing: -0.02em;
        }

        /* Add button */
        .btn-add {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            padding: 0.5rem 1.1rem;
            background: #111827;
            color: #fff;
            font-size: 0.83rem;
            font-weight: 500;
            border-radius: 9px;
            border: none;
            cursor: pointer;
            transition: background 0.15s, transform 0.15s;
            font-family: 'DM Sans', sans-serif;
            text-decoration: none;
        }
        .btn-add:hover {
            background: #1f2937;
            transform: translateY(-1px);
        }

        /* Table card */
        .table-card {
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            overflow: hidden;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        thead tr {
            border-bottom: 1px solid #e5e7eb;
        }
        thead th {
            padding: 0.85rem 1.25rem;
            font-size: 0.72rem;
            font-weight: 600;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: #6b7280;
            text-align: left;
        }
        thead th.center { text-align: center; }
        tbody tr {
            border-bottom: 1px solid #f3f4f6;
            transition: background 0.15s;
        }
        tbody tr:last-child { border-bottom: none; }
        tbody tr:hover { background: #f9fafb; }
        tbody td {
            padding: 0.9rem 1.25rem;
            font-size: 0.875rem;
            color: #374151;
        }
        tbody td.center { text-align: center; }
        .row-num {
            color: #9ca3af;
            font-size: 0.8rem;
        }
        .cat-name {
            font-weight: 500;
            color: #111827;
        }

        /* Action buttons */
        .actions {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.4rem;
        }
        .btn-edit, .btn-delete, .btn-disabled {
            padding: 0.3rem 0.75rem;
            font-size: 0.78rem;
            font-weight: 500;
            border-radius: 7px;
            border: none;
            cursor: pointer;
            font-family: 'DM Sans', sans-serif;
            transition: opacity 0.15s, transform 0.15s;
        }
        .btn-edit {
            background: #fef9c3;
            color: #92400e;
            border: 1px solid #fde68a;
        }
        .btn-edit:hover { opacity: 0.85; transform: translateY(-1px); }
        .btn-delete {
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #fecaca;
        }
        .btn-delete:hover { opacity: 0.85; transform: translateY(-1px); }
        .btn-disabled {
            background: #f3f4f6;
            color: #9ca3af;
            border: 1px solid #e5e7eb;
            cursor: not-allowed;
        }

        /* Pagination */
        .pagination-wrap {
            margin-top: 1.25rem;
        }

        /* Modal backdrop */
        .modal-backdrop {
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,0.35);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 50;
            backdrop-filter: blur(2px);
        }

        /* Modal box */
        .modal-box {
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 16px;
            padding: 1.75rem;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 20px 50px rgba(0,0,0,0.12);
        }
        .modal-eyebrow {
            font-size: 0.68rem;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: #9ca3af;
            font-weight: 500;
            margin-bottom: 0.25rem;
        }
        .modal-title {
            font-size: 1.15rem;
            font-weight: 600;
            color: #111827;
            letter-spacing: -0.01em;
            margin-bottom: 1.25rem;
        }
        .modal-input {
            width: 100%;
            padding: 0.6rem 0.85rem;
            font-size: 0.875rem;
            font-family: 'DM Sans', sans-serif;
            border: 1px solid #d1d5db;
            border-radius: 9px;
            outline: none;
            color: #111827;
            transition: border-color 0.15s, box-shadow 0.15s;
            box-sizing: border-box;
            margin-bottom: 0.5rem;
        }
        .modal-input:focus {
            border-color: #6b7280;
            box-shadow: 0 0 0 3px rgba(107,114,128,0.1);
        }
        .modal-error {
            font-size: 0.78rem;
            color: #dc2626;
            margin-bottom: 0.75rem;
        }
        .modal-actions {
            display: flex;
            gap: 0.5rem;
            margin-top: 1rem;
        }
        .btn-save {
            flex: 1;
            padding: 0.55rem 1rem;
            background: #111827;
            color: #fff;
            font-size: 0.83rem;
            font-weight: 500;
            border-radius: 9px;
            border: none;
            cursor: pointer;
            font-family: 'DM Sans', sans-serif;
            transition: background 0.15s;
        }
        .btn-save:hover { background: #1f2937; }
        .btn-save.yellow {
            background: #f59e0b;
        }
        .btn-save.yellow:hover { background: #d97706; }
        .btn-cancel {
            padding: 0.55rem 1rem;
            background: #f3f4f6;
            color: #374151;
            font-size: 0.83rem;
            font-weight: 500;
            border-radius: 9px;
            border: 1px solid #e5e7eb;
            cursor: pointer;
            font-family: 'DM Sans', sans-serif;
            transition: background 0.15s;
        }
        .btn-cancel:hover { background: #e5e7eb; }
    </style>

    <div class="page-wrap"
         x-data="{ showAdd: false, showEdit: false, editId: null, editName: '' }">

        {{-- Header --}}
        <div class="page-header">
            <div>
                <p class="page-eyebrow">Master Data</p>
                <h2 class="page-title">Kategori</h2>
            </div>
            <button @click="showAdd = true" class="btn-add">
                <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
                </svg>
                Tambah
            </button>
        </div>

        {{-- Table --}}
        <div class="table-card">
            <table>
                <thead>
                    <tr>
                        <th style="width:56px;">No</th>
                        <th>Nama Kategori</th>
                        <th class="center" style="width:160px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $i => $cat)
                    <tr>
                        <td><span class="row-num">{{ $categories->firstItem() + $i }}</span></td>
                        <td><span class="cat-name">{{ $cat->name }}</span></td>
                        <td class="center">
                            <div class="actions">
                                <button @click="editId = {{ $cat->id }}; editName = '{{ $cat->name }}'; showEdit = true"
                                        class="btn-edit">Edit</button>

                                @if ($cat->items()->count() > 0)
                                    <button disabled
                                            title="Kategori memiliki {{ $cat->items()->count() }} item"
                                            class="btn-disabled">Hapus</button>
                                @else
                                    <form action="{{ route('categories.destroy', $cat) }}" method="POST"
                                          onsubmit="return confirm('Yakin hapus kategori ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn-delete">Hapus</button>
                                    </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="pagination-wrap">
            {{ $categories->links() }}
        </div>

        {{-- ADD MODAL --}}
        <div x-show="showAdd"
             x-transition:enter="transition ease-out duration-150"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-100"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="modal-backdrop">
            <div x-transition:enter="transition ease-out duration-150"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 class="modal-box"
                 @click.outside="showAdd = false">
                <p class="modal-eyebrow">Master Data</p>
                <h3 class="modal-title">Tambah Kategori</h3>
                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf
                    <input name="name" placeholder="Nama kategori..." class="modal-input" required>
                    @error('name')
                        <p class="modal-error">{{ $message }}</p>
                    @enderror
                    <div class="modal-actions">
                        <button type="submit" class="btn-save">Simpan</button>
                        <button type="button" @click="showAdd = false" class="btn-cancel">Batal</button>
                    </div>
                </form>
            </div>
        </div>

        {{-- EDIT MODAL --}}
        <div x-show="showEdit"
             x-transition:enter="transition ease-out duration-150"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-100"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="modal-backdrop">
            <div x-transition:enter="transition ease-out duration-150"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 class="modal-box"
                 @click.outside="showEdit = false">
                <p class="modal-eyebrow">Master Data</p>
                <h3 class="modal-title">Edit Kategori</h3>
                <form :action="'/categories/' + editId" method="POST">
                    @csrf @method('PUT')
                    <input name="name" x-model="editName" class="modal-input" required>
                    <div class="modal-actions">
                        <button type="submit" class="btn-save yellow">Update</button>
                        <button type="button" @click="showEdit = false" class="btn-cancel">Batal</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</x-app-layout>