@extends('layouts.app')

@section('title', 'Keranjang Belanja')

@section('content')
<div class="container">
    <h1>Keranjang Belanja</h1>

    @if(session('cart') && count(session('cart')) > 0)
        <table>
            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                </tr>
            </thead>
            <tbody>
                @foreach(session('cart') as $item)
                    <tr>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>Rp{{ number_format($item['price'], 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
