@include('includes.dashboardInclude.nav')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Edit Store</h4>
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-body">
                <form action="{{url('store/update/' . $id)}}"method="POST" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-fullname">Store Name</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"
                            ><i class="bx bx-user"></i
                                ></span>
                            <input
                                type="text"
                                name="name"
                                value="{{$store->name}}"
                                class="form-control"
                                id="basic-icon-default-fullname"
                                placeholder="girls store"
                                aria-label="girls store"
                                aria-describedby="basic-icon-default-fullname2"
                            />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-email">Store Address</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                            <input
                                type="text"
                                name="address"
                                value="{{$store->address}}"
                                id="basic-icon-default-email"
                                class="form-control"
                                placeholder="Gaza"
                                aria-label="Gaza"
                                aria-describedby="basic-icon-default-email2"
                            />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Store Logo</label>
                        <input class="form-control" type="file" id="formFile" name="logo" value="value="{{$store->logo}}""/>
                        <a href=""><img src="{{asset($store->logo_url)}}" style="border-radius: 50%" class="wow fadeInDown animated"></a>
                    </div>
                    <button type="submit" class="btn btn-primary">Send</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@include('includes.dashboardInclude.footer')
