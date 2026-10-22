<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Riwayat Penjualan - Rumahmade</title>
    <style>
        body { font-family: 'Helvetica', sans-serif; color: #333; }
        .header { text-align: center; margin-bottom: 30px; border-bottom: 2px solid #6366f1; padding-bottom: 10px; }
        .header h1 { margin: 0; color: #6366f1; }
        .header p { margin: 5px 0; font-size: 12px; color: #666; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th { background-color: #6366f1; color: white; padding: 10px; text-align: left; font-size: 12px; }
        td { padding: 10px; border-bottom: 1px solid #eee; font-size: 11px; }
        .status { font-weight: bold; padding: 4px 8px; border-radius: 4px; font-size: 10px; }
        .paid { color: #059669; }
        .pending { color: #d97706; }
        .footer { margin-top: 30px; text-align: center; font-size: 10px; color: #999; }
        .user-info { margin-bottom: 20px; }
        .user-info p { margin: 2px 0; font-size: 12px; }
    </style>
</head>
<body>
    <div class="header">
        <h1>Riwayat Penjualan</h1>
        <p>Rumahmade Digital Marketplace</p>
    </div>

    <div class="user-info">
        <p><strong>Nama:</strong> {{ $user->name ?? 'Guest' }}</p>
        <p><strong>Email:</strong> {{ $user->email ?? '-' }}</p>
        <p><strong>Tanggal Cetak:</strong> {{ now()->format('d M Y H:i') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Produk</th>
                <th>Pembeli</th>
                <th>Tanggal</th>
                <th>Total</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($product_orders as $order)
            <tr>
                <td>#{{ $order->id }}</td>
                <td>{{ $order->product?->name ?? 'Produk Terhapus' }}</td>
                <td>{{ $order->buyer?->name ?? 'Unknown' }}</td>
                <td>{{ $order->created_at?->format('d/m/Y') }}</td>
                <td>Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                <td class="status {{ $order->is_paid ? 'paid' : 'pending' }}">
                    {{ $order->is_paid ? 'SUKSES' : 'PENDING' }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <table style="margin-top:12px; width:100%;">
        <tr>
            <td style="text-align:left; padding:8px; font-weight:bold;">Total Pesanan: {{ $total_count ?? 0 }}</td>
            <td style="text-align:right; padding:8px; font-weight:bold;">Grand Total: Rp {{ number_format($total_amount ?? 0, 0, ',', '.') }}</td>
        </tr>
    </table>

    <div class="footer">
        <p>Dokumen ini dihasilkan secara otomatis oleh sistem Rumahmade.</p>
        <p>&copy; {{ date('Y') }} Rumahmade. All rights reserved.</p>
    </div>
</body>
</html>
