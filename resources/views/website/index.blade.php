@include('includes.websiteIncludes.header')


<div id="testimonials" class="testimonial_section">
    <div class="container-fluid">
        <div class="heading_wrapper wow fadeInDown animated">
            <h2 class="wow fadeInDown animated">Our Stores</h2>
        </div>
        @foreach ($stores as $store)
{{--            <form action="{{url('storeProducts/'.$store->id)}}"--}}
                <!-- Our Stores -->
                <div id="services" class="services_section">
                    <div class="row">
                        <div class="item">
                            <div class="col-sm-12">
                                <div class="testimonial_inner_matter">
                                    <a href="{{url('website/storeProducts/'.$store->id)}}"><img src="{{asset($store->logo_url)}}"
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
