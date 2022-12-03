@include('includes.websiteIncludes.header')
<div id="testimonials" class="testimonial_section">
    <div class="container-fluid">
        <?php $count = 1?>
        @foreach ($products as $product)
            <!-- Our products -->
            <div id="services" class="services_section">
                <div class="row">
                    <div class="item">
                        <div class="col-sm-12">
                            <div class="testimonial_inner_matter">
                                <img src="{{asset('image/products/product-'.$count.'.jpg')}}">
                                <h5 class="wow fadeInDown animated">Product Name:   {{$product->name}}</h5>
                                    <h5 class="wow fadeInDown animated">Product Description:   {{$product->description}}</h5>
                                @if($product->flag)
                                    <h5 class="wow fadeInDown animated">Base Price:   {{$product->basePrice}}</h5>
                                @else
                                    <h5 class="wow fadeInDown animated">Discount Price:   {{$product->discountPrice}}</h5>
                                @endif
                                <h4 class="wow fadeInDown animated">Store:   {{ $product->store_id }}</h4>
                                <form action="{{ URL('website/addTransaction/'.$product->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn ">Buying</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $count+=1?>
        @endforeach
    </div>
</div>
<!-- testimonial end -->
@include('includes.websiteIncludes.footer')
