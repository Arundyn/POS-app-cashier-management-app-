<x-app-layout>
<div x-data="posApp()" class="flex gap-4 p-4 h-screen">

  {{-- LEFT: Product Grid --}}
  <div class="flex-1 overflow-y-auto">
    <h2 class="text-xl font-bold mb-4">Pilih Item</h2>
    <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
      @foreach ($items as $item)
      <button @click="addToCart({{ $item->id }}, '{{ $item->name }}', {{ $item->price }}, {{ $item->stock }})"
              class="bg-white border rounded-lg p-4 text-left hover:shadow-md hover:border-blue-400 transition">
        <p class="font-semibold">{{ $item->name }}</p>
        <p class="text-sm text-gray-500">{{ $item->category->name }}</p>
        <p class="text-blue-600 font-bold mt-1">Rp {{ number_format($item->price, 0, ',', '.') }}</p>
        <p class="text-xs text-gray-400">Stok: {{ $item->stock }}</p>
      </button>
      @endforeach
    </div>
  </div>

  {{-- RIGHT: Cart --}}
  <div class="w-80 bg-white border rounded-lg flex flex-col p-4 shadow">
    <h2 class="text-lg font-bold mb-3">Keranjang</h2>

    {{-- Alerts --}}
    <div x-show="alert" x-text="alert"
         class="bg-red-100 text-red-600 p-2 rounded text-sm mb-2"></div>
    <div x-show="successMsg" x-text="successMsg"
         class="bg-green-100 text-green-600 p-2 rounded text-sm mb-2"></div>
    <div x-show="errorMsg" x-text="errorMsg"
         class="bg-red-200 text-red-700 p-2 rounded text-sm mb-2 font-bold"></div>

    {{-- Cart items --}}
    <div class="flex-1 overflow-y-auto">
      <template x-if="cart.length === 0">
        <p class="text-gray-400 text-center py-8">Keranjang kosong</p>
      </template>

      <template x-for="item in cart" :key="item.id">
        <div class="flex items-center justify-between border-b py-2">
          <div class="flex-1">
            <p class="text-sm font-medium" x-text="item.name"></p>
            <p class="text-xs text-gray-500" x-text="'Rp ' + formatRp(item.price)"></p>
          </div>
          <div class="flex items-center gap-1">
            <button @click="decQty(item)" class="w-6 h-6 bg-gray-200 rounded text-sm font-bold">-</button>
            <span class="w-6 text-center text-sm" x-text="item.qty"></span>
            <button @click="incQty(item)" class="w-6 h-6 bg-gray-200 rounded text-sm font-bold">+</button>
            <button @click="removeItem(item.id)" class="ml-1 text-red-500 text-sm">✕</button>
          </div>
        </div>
      </template>
    </div>

    {{-- Total & Payment --}}
    <div class="border-t pt-3 mt-2">
      <div class="flex justify-between font-bold text-lg mb-3">
        <span>Total</span>
        <span x-text="'Rp ' + formatRp(total)"></span>
      </div>

      <div class="space-y-2">
        <label class="block text-sm font-semibold">Jumlah Pembayaran</label>
        <input type="number" x-model.number="paymentAmount" placeholder="Masukkan jumlah uang"
               class="w-full border rounded px-3 py-2 text-sm"
               @input="calculateChange()">
        
        <template x-if="paymentAmount > 0">
          <div class="text-sm text-gray-600 space-y-1">
            <div class="flex justify-between">
              <span>Kurang / Lebih:</span>
              <span class="font-bold" 
                    :class="difference < 0 ? 'text-red-600' : 'text-green-600'"
                    x-text="'Rp ' + formatRp(difference)"></span>
            </div>
            <template x-if="difference >= 0">
              <div class="flex justify-between bg-green-50 p-2 rounded">
                <span>Kembalian:</span>
                <span class="font-bold text-green-700" x-text="'Rp ' + formatRp(difference)"></span>
              </div>
            </template>
          </div>
        </template>
      </div>

      {{-- Checkout form --}}
      <form action="{{ route('transactions.store') }}" method="POST" @submit="processPayment($event)">
        @csrf
        <input type="hidden" name="cart" x-ref="cartInput">
        <input type="hidden" name="total" x-ref="totalInput">
        <input type="hidden" name="payment" x-ref="paymentInput">
        <input type="hidden" name="change" x-ref="changeInput">
        <button type="submit" :disabled="cart.length === 0 || !canPayment"
                class="w-full mt-3 bg-blue-600 text-white py-3 rounded-lg font-bold
                       disabled:opacity-50 disabled:cursor-not-allowed hover:bg-blue-700">
          Bayar / Selesaikan
        </button>
      </form>
    </div>
  </div>
</div>

@push('scripts')
<script>
function posApp() {
  return {
    cart: [],
    alert: '',
    successMsg: '',
    errorMsg: '',
    paymentAmount: 0,

    addToCart(id, name, price, stock) {
      const existing = this.cart.find(i => i.id === id);
      if (existing) {
        if (existing.qty >= stock) {
          this.alert = `Stok ${name} tidak cukup!`;
          setTimeout(() => this.alert = '', 2000);
          return;
        }
        existing.qty++;
      } else {
        this.cart.push({ id, name, price, stock, qty: 1 });
      }
      this.alert = '';
    },

    incQty(item) {
      if (item.qty >= item.stock) {
        this.alert = `Stok ${item.name} tidak cukup!`;
        setTimeout(() => this.alert = '', 2000);
        return;
      }
      item.qty++;
    },

    decQty(item) {
      if (item.qty <= 1) {
        this.removeItem(item.id);
      } else {
        item.qty--;
      }
    },

    removeItem(id) {
      this.cart = this.cart.filter(i => i.id !== id);
    },

    get total() {
      return this.cart.reduce((sum, i) => sum + (i.price * i.qty), 0);
    },

    get difference() {
      return this.paymentAmount - this.total;
    },

    get canPayment() {
      return this.paymentAmount >= this.total && this.paymentAmount > 0;
    },

    calculateChange() {
      if (this.paymentAmount < this.total) {
        this.errorMsg = `Uang tidak cukup! Kurang Rp ${this.formatRp(this.total - this.paymentAmount)}`;
      } else {
        this.errorMsg = '';
      }
    },

    formatRp(num) {
      return num.toLocaleString('id-ID');
    },

    processPayment(e) {
      if (this.cart.length === 0) {
        e.preventDefault();
        this.errorMsg = 'Keranjang masih kosong!';
        return;
      }
      if (this.paymentAmount < this.total) {
        e.preventDefault();
        this.errorMsg = `Uang tidak cukup! Kurang Rp ${this.formatRp(this.total - this.paymentAmount)}`;
        return;
      }
      this.$refs.cartInput.value = JSON.stringify(this.cart);
      this.$refs.totalInput.value = this.total;
      this.$refs.paymentInput.value = this.paymentAmount;
      this.$refs.changeInput.value = this.difference;
    }
  }
}
</script>
@endpush
</x-app-layout>