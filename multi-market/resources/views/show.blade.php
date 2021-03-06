@include('head')
<div class="container">

    @include('menu')

    @if(!empty($product_details))
    <div class="product_details">
        <img src="{{ $product_details['mediumImage'] }}">
    </div>
    <h3>{{$product_details['name']}}</h3>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Stores</th>
            <th scope="col">Price</th>
            <th scope="col">Last Updated</th>
        </tr>
        </thead>

        <tbody>

        @foreach ($product_details['compare'] as $oneCompany)
            <tr>
                <td> <img class='stores_images' src="/imgs/{{ $oneCompany['merchant']}}.png"> </td>
                <td>{{ $oneCompany['price'] }}</td>
                <td>{{ $oneCompany['date_updated'] }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @else
        <h4>Sorry, there is no data. Please try another barcode</h4>
    @endif

    @include('footer')