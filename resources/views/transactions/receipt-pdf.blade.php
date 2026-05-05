<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Struk {{ str_pad($transaction->id, 5, '0', STR_PAD_LEFT) }}</title>
    <style>
        body {
            font-family: 'Courier New', monospace;
            margin: 0;
            padding: 10px;
            width: 100%;
            height: 100%;
        }
        .receipt {
            width: 100%;
            text-align: center;
        }
        .header {
            margin-bottom: 10px;
            border-bottom: 1px solid #000;
            padding-bottom: 8px;
        }
        .header h2 {
            margin: 0;
            font-size: 13px;
            font-weight: bold;
        }
        .header p {
            margin: 3px 0;
            font-size: 10px;
        }
        .items {
            margin: 10px 0;
            text-align: left;
        }
        .items-header {
            font-weight: bold;
            border-bottom: 1px solid #000;
            padding-bottom: 3px;
            margin-bottom: 8px;
            font-size: 10px;
            display: grid;
            grid-template-columns: 1fr 40px 50px;
            gap: 5px;
        }
        .item-row {
            font-size: 10px;
            margin-bottom: 6px;
            display: grid;
            grid-template-columns: 1fr 40px 50px;
            gap: 5px;
        }
        .item-name {
            word-wrap: break-word;
            overflow-wrap: break-word;
        }
        .item-name-price {
            font-size: 9px;
            color: #666;
        }
        .item-qty {
            text-align: center;
        }
        .item-price {
            text-align: right;
        }
        .summary {
            border-top: 1px solid #000;
            margin-top: 10px;
            padding-top: 8px;
        }
        .summary-row {
            margin-bottom: 6px;
            font-size: 10px;
            display: flex;
            justify-content: space-between;
        }
        .total-row {
            font-weight: bold;
            font-size: 11px;
            margin-bottom: 6px;
            display: flex;
            justify-content: space-between;
        }
        .change-row {
            font-weight: bold;
            background-color: #f0f0f0;
            padding: 4px;
            font-size: 11px;
            display: flex;
            justify-content: space-between;
        }
        .footer {
            margin-top: 10px;
            font-size: 9px;
            border-top: 1px solid #000;
            padding-top: 8px;
        }
    </style>
</head>
<body>
    <div class="receipt">
        <div class="header">
            <h2>TOKO SERBAGUNA ARASHIYA</h2>
            <p>No. #{{ str_pad($transaction->id, 5, '0', STR_PAD_LEFT) }}</p>
            <p>{{ $transaction->created_at->format('d M Y H:i') }}</p>
            <p>Kasir: {{ $transaction->user->name }}</p>
        </div>

        <div class="items">
            <div class="items-header">
                <div>Item</div>
                <div>Qty</div>
                <div style="text-align: right;">Total</div>
            </div>
            @foreach ($transaction->items as $txItem)
            <div class="item-row">
                <div class="item-name">
                    {{ $txItem->item->name }}<br>
                    <span class="item-name-price">@ Rp {{ number_format($txItem->price, 0, ',', '.') }}</span>
                </div>
                <div class="item-qty">{{ $txItem->qty }}</div>
                <div class="item-price">Rp {{ number_format($txItem->price * $txItem->qty, 0, ',', '.') }}</div>
            </div>
            @endforeach
        </div>

        <div class="summary">
            <div class="total-row">
                <span>TOTAL</span>
                <span>Rp {{ number_format($transaction->total, 0, ',', '.') }}</span>
            </div>
            <div class="summary-row">
                <span>Bayar</span>
                <span>Rp {{ number_format($transaction->payment, 0, ',', '.') }}</span>
            </div>
            @if (isset($transaction->change) && $transaction->change >= 0)
            <div class="change-row">
                <span>KEMBALIAN</span>
                <span>Rp {{ number_format($transaction->change, 0, ',', '.') }}</span>
            </div>
            @endif
        </div>

        <div class="footer">
            <p>Terima kasih telah berbelanja</p>
            <p>{{ date('d M Y H:i:s') }}</p>
        </div>
    </div>
</body>
</html>
