<!-- resources/views/cart/index.blade.php -->

<h1>Carrinho de Compras</h1>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<table class="table">
    <thead>
        <tr>
            <th>Produto</th>
            <th>Preço</th>
            <th>Quantidade</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach (Cart::getContent() as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->price }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ $item->getPriceSum() }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<a href="{{ route('home') }}">Continuar comprando</a>
