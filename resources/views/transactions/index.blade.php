<x-app-layout>
<div class="p-6">
  <h2 class="text-xl font-bold mb-4">History Transaksi</h2>
  <table class="w-full bg-white shadow rounded border-collapse">
    <thead class="bg-gray-100">
      <tr>
        <th class="p-3 text-left">No</th>
        <th class="p-3 text-left">Tanggal</th>
        <th class="p-3 text-left">Kasir</th>
        <th class="p-3 text-right">Total</th>
        <th class="p-3">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($transactions as $tx)
      <tr class="border-t">
        <td class="p-3">#{{ str_pad($tx->id, 5, '0', STR_PAD_LEFT) }}</td>
        <td class="p-3">{{ $tx->created_at->format('d M Y H:i') }}</td>
        <td class="p-3">{{ $tx->user->name }}</td>
        <td class="p-3 text-right">Rp {{ number_format($tx->total, 0, ',', '.') }}</td>
        <td class="p-3 text-center">
          <a href="{{ route('transactions.show', $tx->id) }}"
             class="bg-blue-500 text-white px-3 py-1 rounded text-sm">Lihat Struk</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {{ $transactions->links() }}
</div>
</x-app-layout>