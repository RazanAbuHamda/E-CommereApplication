@include('includes.dashboardInclude.nav')


<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Add New Store</h4>
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-body">
                <form method="POST" action="{{url('store/data')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-fullname">Store Name</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"
                            ><i class="bx bx-user"></i
                                ></span>
                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                id="basic-icon-default-fullname"
                                placeholder="Store Name"
                                aria-label="Store Name"
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
                                id="basic-icon-default-email"
                                class="form-control"
                                placeholder="Store Address"
                                aria-label="Store Address"
                                aria-describedby="basic-icon-default-email2"
                            />
                            <span id="basic-icon-default-email2" class="input-group-text">@example.com</span>
                        </div>
                        <div class="form-text">You can use letters, numbers & periods</div>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Store Logo</label>
                        <input class="form-control" type="file" id="formFile" name="logo"/>
                    </div>
                    <button type="submit" class="btn btn-primary">Send</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

@include('includes.dashboardInclude.footer')
