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
        }
        .btn-add:hover { background: #1f2937; transform: translateY(-1px); }

        /* Low stock alert */
        .alert-low {
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
            background: #fff7ed;
            border: 1px solid #fed7aa;
            border-left: 3px solid #f97316;
            border-radius: 10px;
            padding: 0.9rem 1.1rem;
            margin-bottom: 1.5rem;
        }
        .alert-icon {
            font-size: 1rem;
            line-height: 1.4;
            flex-shrink: 0;
        }
        .alert-title {
            font-size: 0.83rem;
            font-weight: 600;
            color: #9a3412;
            margin-bottom: 0.15rem;
        }
        .alert-body {
            font-size: 0.78rem;
            color: #c2410c;
        }

        /* Table card */
        .table-card {
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            overflow: hidden;
        }
        table { width: 100%; border-collapse: collapse; }
        thead tr { border-bottom: 1px solid #e5e7eb; }
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
        .row-num { color: #9ca3af; font-size: 0.8rem; }
        .item-name { font-weight: 500; color: #111827; }
        .cat-pill {
            display: inline-block;
            padding: 0.2rem 0.6rem;
            background: #f3f4f6;
            border-radius: 6px;
            font-size: 0.75rem;
            color: #6b7280;
            font-weight: 500;
        }
        .price { font-weight: 500; color: #111827; }

        /* Stock badges */
        .stock-badge {
            display: inline-block;
            padding: 0.2rem 0.65rem;
            border-radius: 6px;
            font-size: 0.78rem;
            font-weight: 600;
        }
        .stock-ok  { background: #dcfce7; color: #166534; }
        .stock-low { background: #fee2e2; color: #991b1b; }

        .low-tag {
            display: inline-block;
            padding: 0.15rem 0.5rem;
            background: #fee2e2;
            color: #b91c1c;
            border-radius: 5px;
            font-size: 0.68rem;
            font-weight: 600;
            margin-left: 0.4rem;
            vertical-align: middle;
        }

        /* Action buttons */
        .actions { display: flex; align-items: center; justify-content: center; gap: 0.4rem; }
        .btn-edit, .btn-delete {
            padding: 0.3rem 0.75rem;
            font-size: 0.78rem;
            font-weight: 500;
            border-radius: 7px;
            border: none;
            cursor: pointer;
            font-family: 'DM Sans', sans-serif;
            transition: opacity 0.15s, transform 0.15s;
        }
        .btn-edit   { background: #fef9c3; color: #92400e; border: 1px solid #fde68a; }
        .btn-edit:hover { opacity: 0.85; transform: translateY(-1px); }
        .btn-delete { background: #fee2e2; color: #991b1b; border: 1px solid #fecaca; }
        .btn-delete:hover { opacity: 0.85; transform: translateY(-1px); }

        /* Pagination */
        .pagination-wrap { margin-top: 1.25rem; }

        /* Modal */
        .modal-backdrop {
            position: fixed; inset: 0;
            background: rgba(0,0,0,0.35);
            display: flex; align-items: center; justify-content: center;
            z-index: 50;
            backdrop-filter: blur(2px);
        }
        .modal-box {
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 16px;
            padding: 1.75rem;
            width: 100%; max-width: 420px;
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
        .modal-field { margin-bottom: 0.6rem; }
        .modal-input, .modal-select {
            width: 100%;
            padding: 0.6rem 0.85rem;
            font-size: 0.875rem;
            font-family: 'DM Sans', sans-serif;
            border: 1px solid #d1d5db;
            border-radius: 9px;
            outline: none;
            color: #111827;
            background: #fff;
            transition: border-color 0.15s, box-shadow 0.15s;
            box-sizing: border-box;
        }
        .modal-input:focus, .modal-select:focus {
            border-color: #6b7280;
            box-shadow: 0 0 0 3px rgba(107,114,128,0.1);
        }
        .modal-error { font-size: 0.75rem; color: #dc2626; margin-top: 0.25rem; }
        .modal-actions { display: flex; gap: 0.5rem; margin-top: 1.25rem; }
        .btn-save {
            flex: 1; padding: 0.55rem 1rem;
            background: #111827; color: #fff;
            font-size: 0.83rem; font-weight: 500;
            border-radius: 9px; border: none; cursor: pointer;
            font-family: 'DM Sans', sans-serif;
            transition: background 0.15s;
        }
        .btn-save:hover { background: #1f2937; }
        .btn-save.yellow { background: #f59e0b; }
        .btn-save.yellow:hover { background: #d97706; }
        .btn-cancel {
            padding: 0.55rem 1rem;
            background: #f3f4f6; color: #374151;
            font-size: 0.83rem; font-weight: 500;
            border-radius: 9px; border: 1px solid #e5e7eb; cursor: pointer;
            font-family: 'DM Sans', sans-serif;
            transition: background 0.15s;
        }
        .btn-cancel:hover { background: #e5e7eb; }
    </style>

    <div class="page-wrap"
         x-data="{ showAdd: false, showEdit: false, editId: null, editName: '', editPrice: '', editStock: '', editCategoryId: '' }">

        {{-- Header --}}
        <div class="page-header">
            <div>
                <p class="page-eyebrow">Master Data</p>
                <h2 class="page-title">Item</h2>
            </div>
            <button @click="showAdd = true" class="btn-add">
                <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
                </svg>
                Tambah
            </button>
        </div>

        {{-- Low Stock Alert --}}
        @php $lowStockItems = $items->filter(fn($item) => $item->stock < 5); @endphp
        @if ($lowStockItems->count() > 0)
        <div class="alert-low">
            <span class="alert-icon">⚠️</span>
            <div>
                <p class="alert-title">{{ $lowStockItems->count() }} item dengan stok rendah</p>
                <p class="alert-body">{{ $lowStockItems->pluck('name')->join(', ') }}</p>
            </div>
        </div>
        @endif

        {{-- Table --}}
        <div class="table-card">
            <table>
                <thead>
                    <tr>
                        <th style="width:50px;">No</th>
                        <th>Nama Item</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th class="center" style="width:150px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $i => $item)
                    <tr>
                        <td><span class="row-num">{{ $items->firstItem() + $i }}</span></td>
                        <td>
                            <span class="item-name">{{ $item->name }}</span>
                            @if ($item->stock < 5)
                                <span class="low-tag">Low Stock</span>
                            @endif
                        </td>
                        <td><span class="cat-pill">{{ $item->category->name }}</span></td>
                        <td><span class="price">Rp {{ number_format($item->price, 0, ',', '.') }}</span></td>
                        <td>
                            <span class="stock-badge {{ $item->stock < 5 ? 'stock-low' : 'stock-ok' }}">
                                {{ $item->stock }}
                            </span>
                        </td>
                        <td class="center">
                            <div class="actions">
                                <button class="btn-edit"
                                        @click="editId = {{ $item->id }}; editName = '{{ $item->name }}'; editPrice = '{{ $item->price }}'; editStock = '{{ $item->stock }}'; editCategoryId = '{{ $item->category_id }}'; showEdit = true">
                                    Edit
                                </button>
                                <form action="{{ route('items.destroy', $item) }}" method="POST"
                                      onsubmit="return confirm('Yakin hapus item ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn-delete">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="pagination-wrap">{{ $items->links() }}</div>

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
                 class="modal-box" @click.outside="showAdd = false">
                <p class="modal-eyebrow">Master Data</p>
                <h3 class="modal-title">Tambah Item</h3>
                <form action="{{ route('items.store') }}" method="POST">
                    @csrf
                    <div class="modal-field">
                        <select name="category_id" class="modal-select" required>
                            <option value="">— Pilih Kategori —</option>
                            @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id') <p class="modal-error">{{ $message }}</p> @enderror
                    </div>
                    <div class="modal-field">
                        <input name="name" placeholder="Nama item" class="modal-input" required>
                        @error('name') <p class="modal-error">{{ $message }}</p> @enderror
                    </div>
                    <div class="modal-field">
                        <input name="price" type="number" placeholder="Harga" class="modal-input" required>
                        @error('price') <p class="modal-error">{{ $message }}</p> @enderror
                    </div>
                    <div class="modal-field">
                        <input name="stock" type="number" placeholder="Stok" class="modal-input" required>
                        @error('stock') <p class="modal-error">{{ $message }}</p> @enderror
                    </div>
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
                 class="modal-box" @click.outside="showEdit = false">
                <p class="modal-eyebrow">Master Data</p>
                <h3 class="modal-title">Edit Item</h3>
                <form :action="'/items/' + editId" method="POST">
                    @csrf @method('PUT')
                    <div class="modal-field">
                        <select name="category_id" x-model="editCategoryId" class="modal-select" required>
                            <option value="">— Pilih Kategori —</option>
                            @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-field">
                        <input name="name" x-model="editName" placeholder="Nama item" class="modal-input" required>
                    </div>
                    <div class="modal-field">
                        <input name="price" type="number" x-model="editPrice" placeholder="Harga" class="modal-input" required>
                    </div>
                    <div class="modal-field">
                        <input name="stock" type="number" x-model="editStock" placeholder="Stok" class="modal-input" required>
                    </div>
                    <div class="modal-actions">
                        <button type="submit" class="btn-save yellow">Update</button>
                        <button type="button" @click="showEdit = false" class="btn-cancel">Batal</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</x-app-layout>