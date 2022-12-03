@include('includes.dashboardInclude.nav')

<div id="content" class="services_page" style="border:1px solid lightgrey;border-radius: 5%;margin: 20px;padding: 20px">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> List Purshases </h4>
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-body">
                <table class="table table-hover table-bordered">
                    <thead>
                    <tr>
                        <th>Store name</th>
                        <th>Product id</th>
                        <th>Purchase price</th>
                        <th>Product flag</th>
                        <th>Product store_id</th>
                        <th>Product quantity</th>
                        <th>TimeStamp of Purchase</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($productsPurchase as $productPurchase)
                        <tr>

                            @php $product = $productPurchase->product@endphp
                            @php $store = $productPurchase->product->store@endphp
                            <td>{{$store->name}}</td>
                            <td>{{ $product->id }}</td>
                            @php $flag = $product->flag @endphp
                            @if($flag == 1)
                                <td>
                                    @php
                                        $purchasePrice = $product->basePrice;
                                        $flag = 'Base Price';
                                    @endphp
                                    {{$purchasePrice}}</td>
                            @else
                                <td>
                                    @php
                                        $purchasePrice = $product->discountPrice;
                                     $flag = 'Discount Price';
                                    @endphp
                                    {{$purchasePrice}}</td>
                            @endif
                            <td>{{"By ".$flag}}</td>

                            <td>{{$store->id}}</td>
                            <td>{{$productPurchase->quantity}}</td>
                            <td>{{$productPurchase->created_at}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

{{--        <div class="row">--}}
{{--            <div class="col-12">--}}
{{--                {{ $products->links() }}--}}
{{--            </div>--}}
{{--        </div>--}}
@include('includes.dashboardInclude.footer')

