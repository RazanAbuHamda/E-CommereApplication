@include('includes.dashboardInclude.nav')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Edit Product</h4>
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-body">
                <form action="{{url('product/update/' . $id)}}"method="POST">
                        @csrf
                    @method('PUT')
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-fullname">Product description</label>
                            <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"
                            ><i class="bx bx-user"></i
                                ></span>
                                <input
                                    type="text"
                                    name="description"
                                    class="form-control"
                                    id="basic-icon-default-fullname"
                                    placeholder="Product description"
                                    aria-label="Product description"
                                    aria-describedby="basic-icon-default-fullname2"
                                />
                            </div></div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-fullname">Product base price</label>
                            <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"
                            ><i class="bx bx-user"></i
                                ></span>
                                <input
                                    type="text"
                                    name="basePrice"
                                    class="form-control"
                                    id="basic-icon-default-fullname"
                                    placeholder="Product base price"
                                    aria-label="Product base price"
                                    aria-describedby="basic-icon-default-fullname2"
                                />
                            </div></div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-fullname">Product discount price </label>
                            <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"
                            ><i class="bx bx-user"></i
                                ></span>
                                <input
                                    type="text"
                                    name="discountPrice"
                                    class="form-control"
                                    id="basic-icon-default-fullname"
                                    placeholder="Product discount price"
                                    aria-label="Product discount price"
                                    aria-describedby="basic-icon-default-fullname2"
                                />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-email">Product flag</label>
                            <div class="input-group input-group-merge">
                                <select name="flag" class="form-control">
                                    <option value="1">By base price</option>
                                    <option value="0">By discount price</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-email">Store_id</label>
                            <div class="input-group input-group-merge">
                                <select name="store_id" class="form-control">
                                    @foreach ($stores as $store)
                                        <option value="{{ $store->id }}">{{ $store->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Send</button>
        </form>
    </div>
</div>


@include('includes.dashboardInclude.footer')
