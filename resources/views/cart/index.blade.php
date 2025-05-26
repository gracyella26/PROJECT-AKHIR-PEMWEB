@extends('layouts.app')

@section('title', 'Keranjang Belanja')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">My Orders</h2>

    @if (isset($orders) && count($orders) > 0)
        @foreach ($orders as $order)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Order #{{ $order->id }}</h5>
                    <p class="card-text">Status: {{ ucfirst($order->status) }}</p>
                    <p class="card-text">Total: Rp {{ number_format($order->total_price, 0, ',', '.') }}</p>
                    <p class="card-text"><small class="text-muted">Dipesan pada {{ \Carbon\Carbon::parse($order->created_at)->format('d M Y') }}</small></p>
                    <a href="#" class="btn btn-outline-primary btn-sm">Lihat Detail</a>
                </div>
            </div>
        @endforeach
    @else
        <div class="alert alert-info">
            Belum ada pesanan.
        </div>
    @endif
</div>
@endsection
