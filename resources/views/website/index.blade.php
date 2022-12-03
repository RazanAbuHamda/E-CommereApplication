@include('includes.websiteIncludes.header')
<!-- Search -->
<div class="navbar-nav align-items-center">
    <div class="nav-item d-flex align-items-center">
        <i class="bx bx-search fs-4 lh-0"></i>
        <form method="get" action="{{url('website/search')}}" style="">
            @csrf
            <input
                type="text"
                name="search"
                class="form-control border-0 shadow-none"
                placeholder="Search for products"
                aria-label="Search..."
            />
            <button type="submit" class="btn btn-primary">Send</button>
        </form>
    </div>
</div>
<!-- /Search -->

<div id="testimonials" class="testimonial_section">
    <div class="container-fluid">
        <div class="heading_wrapper wow fadeInDown animated">
            <h2 class="wow fadeInDown animated">Our Stores</h2>
        </div>
        @foreach ($stores as $store)
            <!-- Our Stores -->
            <div id="services" class="services_section">
                <div class="row">
                    <div class="item">
                        <div class="col-sm-12">
                            <div class="testimonial_inner_matter">
                                <a href="{{url('website/storeProducts/'.$store->id)}}"><img
                                        src="{{asset($store->logo_url)}}"
                                        class="wow fadeInDown animated"></a>
                                <h4 class="wow fadeInDown animated">{{ $store->name }} Store</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<!-- testimonial end -->
@include('includes.websiteIncludes.footer')
