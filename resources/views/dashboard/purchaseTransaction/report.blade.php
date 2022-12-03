@include('includes.dashboardInclude.nav')

<div id="content" class="services_page" style="border:1px solid lightgrey;border-radius: 5%;margin: 20px;padding: 20px">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> List Purshases </h4>
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-body">
                <table class="table table-hover table-bordered">
                    <thead>
                    <tr>
                        <th>Store Name</th>
                        <th>Product name</th>
                        <th>Total numbers of Purchase the Product</th>
                        <th>Purchase Price</th>
                        <th>Total Purchase price</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($products as $product)
                        @if($product->numberOfTransaction!=0)
                        <tr>
                            <td>{{$product->store->name}}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{$product->numberOfTransaction	}}</td>
                            @php $flag = $product->flag ;
                            $purchasePrice=0;
                            @endphp
                            @if($flag == 1)
                                @php
                                        $purchasePrice = $product->numberOfTransaction * $product->basePrice;
                                        $flag = 'Base Price';
                                @endphp

                            @else

                                    @php
                                        $purchasePrice = $product->numberOfTransaction *  $product->discountPrice;
                                     $flag = 'Discount Price';
                                    @endphp
                            @endif
                            <td>{{"By ".$flag}}</td>
                            <td>{{$purchasePrice}}</td>
                        </tr>
                        @endif
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

