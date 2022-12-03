@include('includes.dashboardInclude.nav')
<h4 class="fw-bold py-3 mb-4"style="margin: 20px;padding: 10px ;width: 400px">List Stores </h4>
@foreach ($stores as $store)
        <div id="content" class="services_page" style="border:1px solid lightgrey;border-radius: 5%;margin: 20px;padding: 10px ;width: 400px">
            <!-- Our Services -->
            <div id="services" class="services_section">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="services_matter">
                                <a href=""><img src="{{asset($store->logo_url)}}" style="border-radius: 50%" class="wow fadeInDown animated"></a>
                                <h4 class="wow fadeInDown animated">{{ $store->name }} Store</h4>
                            </div>
                            <p class="wow fadeInDown animated">
                            @if ($store->deleted_at)
                                <form action="{{ URL('store/restore/'.$store->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Restore</button>
                                </form>
                            @else
                                <form action="{{ URL('store/delete/'.$store->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Remove</button>
                                </form>
                                @endif
                                </p>
                                <h3 class="wow fadeInDown animated"><a href="{{ URL('store/edit/'.$store->id) }}">Edit</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
<div id="content" class="services_page" style="border:1px solid lightgrey;border-radius: 5%;margin: 20px;padding: 20px">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> List Stores </h4>
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-body">
                <table class="table table-hover table-bordered">
            <thead>
            <tr>
                <th>Logo</th>
                <th>Store Name</th>
                <th>Address</th>
                <th>Delete</th>
                <th>Edit</th>

            </tr>
            </thead>
            <tbody>
            @foreach ($stores as $store)
                <tr>
                    <td><img src="{{asset($store->logo_url)}}" width="150px" style="height: 100px; width: 100px; border-radius: 50%"></td>
                    <td>{{ $store->name }}</td>
                    <td>{{ $store->address }}</td>
                    <td>
                        @if ($store->deleted_at)
                            <form action="{{ URL('store/restore/'.$store->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success">Restore</button>
                            </form>
                        @else
                            <form action="{{ URL('store/delete/'.$store->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">Remove</button>
                            </form>
                        @endif
                    </td>
                    <td>
                        <h3 class="wow fadeInDown animated"><a href="{{ URL('store/edit/'.$store->id) }}">Edit</h3>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="row">
    <div class="col-12">
        {{ $stores->links() }}
    </div>
</div>
@include('includes.dashboardInclude.footer')

