@include('includes.dashboardInclude.nav')

<div id="content" class="services_page" style="border:1px solid lightgrey;border-radius: 5%;margin: 20px;padding: 20px">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Edit Products List</h4>
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-body">
                <table class="table table-hover table-bordered">
                    <thead>
                    <tr>
                        <th>Product description</th>
                        <th>Product base price</th>
                        <th>Product discount price</th>
                        <th>Product flag</th>
                        <th>Product store_id</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->basePrice }}</td>
                            <td>{{ $product->discountPrice }}</td>
                            <td>{{ $product->flag }}</td>
                            <td>{{ $product->store_id }}</td>
                            <td>
                                <h4 class="wow fadeInDown animated"><a href="{{ URL('product/edit/'.$product->id) }}">Edit</h4>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                {{ $products->links() }}
            </div>
        </div>
@include('includes.dashboardInclude.footer')

