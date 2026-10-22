<!DOCTYPE html>
<html>
<head>
    <title>Invoice #RMH-{{ $order->id }}</title>
    <style>
        body { font-family: 'Helvetica', sans-serif; color: #333; line-height: 1.5; }
        .container { padding: 40px; }
        .header { display: flex; justify-content: space-between; border-bottom: 2px solid #eee; padding-bottom: 20px; }
        .logo { color: #6366f1; font-size: 24px; font-weight: bold; }
        .invoice-title { font-size: 20px; color: #666; text-transform: uppercase; }
        .details { margin-top: 30px; }
        .col { float: left; width: 50%; }
        .row:after { content: ""; display: table; clear: both; }
        .table { width: 100%; border-collapse: collapse; margin-top: 40px; }
        .table th { border-bottom: 2px solid #eee; padding: 10px; text-align: left; background: #fafafa; }
        .table td { padding: 15px 10px; border-bottom: 1px solid #eee; }
        .total-section { margin-top: 30px; border-top: 2px solid #eee; padding-top: 20px; text-align: right; }
        .total-label { font-size: 14px; font-weight: bold; }
        .total-amount { font-size: 24px; color: #6366f1; font-weight: bold; }
        .status-badge { display: inline-block; padding: 5px 15px; border-radius: 50px; font-size: 12px; font-weight: bold; text-transform: uppercase; }
        .paid { background: #d1fae5; color: #065f46; }
        .pending { background: #fef3c7; color: #92400e; }
        .footer { margin-top: 100px; text-align: center; color: #999; font-size: 12px; border-top: 1px solid #eee; padding-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="row">
                <div class="col">
                    <div class="logo">RUMAHMADE</div>
                    <p style="font-size: 10px; color: #999;">Digital Product Marketplace</p>
                </div>
                <div class="col" style="text-align: right;">
                    <div class="invoice-title">INVOICE</div>
                    <p style="margin: 0;">#RMH-{{ $order->id }}</p>
                </div>
            </div>
        </div>

        <div class="details">
            <div class="row">
                <div class="col">
                    <p><strong>Diterbitkan Untuk:</strong></p>
                    <p style="margin: 0;">{{ $order->buyer?->name }}</p>
                    <p style="margin: 0;">{{ $order->buyer?->email }}</p>
                </div>
                <div class="col" style="text-align: right;">
                    <p><strong>Tanggal Transaksi:</strong></p>
                    <p style="margin: 0;">{{ $order->created_at?->format('d F Y') }}</p>
                    <p style="margin: 5px 0;">
                        <span class="status-badge {{ $order->is_paid ? 'paid' : 'pending' }}">
                            {{ $order->is_paid ? 'TERVERIFIKASI' : 'MENUNGGU PEMBAYARAN' }}
                        </span>
                    </p>
                </div>
            </div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Penjual</th>
                    <th style="text-align: right;">Harga</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <strong>{{ $order->product?->name ?? 'Produk Terhapus' }}</strong><br>
                        <span style="font-size: 11px; color: #666;">{{ $order->product?->category?->name ?? 'Digital Assets' }}</span>
                    </td>
                    <td>{{ $order->product?->creator?->name ?? 'Unknown' }}</td>
                    <td style="text-align: right;">Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>

        <div class="total-section">
            <span class="total-label">TOTAL PEMBAYARAN</span><br>
            <span class="total-amount">Rp {{ number_format($order->total_price, 0, ',', '.') }}</span>
        </div>

        <div class="footer">
            <p>Terima kasih telah berbelanja di Rumahmade!</p>
            <p>Jika Anda memiliki pertanyaan, silakan hubungi tim dukungan kami.</p>
        </div>
    </div>
</body>
</html>
