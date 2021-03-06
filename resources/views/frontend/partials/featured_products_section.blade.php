<section class="mb-4">
    <div class="container">
        <div class="px-2 py-2 px-md-4 py-md-3 bg-white shadow-sm rounded">
            <div class="d-flex mb-3 align-items-baseline border-bottom">
                <h3 class="h5 fw-700 mb-0">
                    <span class="border-bottom border-primary border-width-2 pb-3 d-inline-block">{{ translate('New Arrivals') }}</span>
                </h3>
                <a href="{{route('search')}}" style="float:right; " class="ml-auto mr-0 text-primary">{{__('View All')}}</a>
            </div>
            <div class="aiz-carousel gutters-10 half-outside-arrow" data-items="7" data-xl-items="6" data-lg-items="5"  data-md-items="4" data-sm-items="3" data-xs-items="3" data-arrows='false' data-dots="true" data-infinite='false' >

                @foreach (filter_products(\App\Product::where('published', 1)->where('created_at', '>=', \Carbon\Carbon::today()->subDays(7)))->get() as $key => $product)
                <div class="carousel-box">
                    <div class="aiz-card-box border border-light rounded hov-shadow-md my-2 has-transition bg-change">
                        <div class="position-relative">
                            <a href="{{ route('product', $product->slug) }}" class="d-block">
                                <img
                                    class="img-fit lazyload mx-auto h-120px h-md-150px fit-products-img"

                                    src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                    data-src="{{ uploaded_asset($product->thumbnail_img) }}"
                                    alt="{{  $product->getTranslation('name')  }}"
                                    onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';"
                                >
                            </a>
                            <div class="absolute-top-right aiz-p-hov-icon">
                                <a href="javascript:void(0)" onclick="addToWishList({{ $product->id }})" data-toggle="tooltip" data-title="{{ translate('Add to wishlist') }}" data-placement="left">
                                    <i class="la la-heart-o"></i>
                                </a>
                                <a href="javascript:void(0)" onclick="addToCompare({{ $product->id }})" data-toggle="tooltip" data-title="{{ translate('Add to compare') }}" data-placement="left">
                                    <i class="las la-sync"></i>
                                </a>
                                <a href="javascript:void(0)" onclick="showAddToCartModal({{ $product->id }})" data-toggle="tooltip" data-title="{{ translate('Add to cart') }}" data-placement="left">
                                    <i class="las la-shopping-cart"></i>
                                </a>
                            </div>
                        </div>
                        <div class="p-md-3 p-2 text-left">
                            <div class="fs-15">
                                @if (Auth::check())
                                {{-- @if(home_base_price($product->id) != home_discounted_base_price($product->id))
                                    <del class="fw-600 opacity-50 mr-1">{{ home_base_price($product->id) }}</del>
                                @endif --}}
                                <span class="fw-700 text-primary">{{ home_discounted_base_price($product->id) }}</span>
                                @else
                                <span>Please <strong><a class="registrationLink" style="color: #000000" href="{{ route('user.login') }}" >login</a></strong> to see prices</span>
                                @endif
                            </div>
                            <!-- <div class="rating rating-sm mt-1">
                                {{ renderStarRating($product->rating) }}
                            </div> -->
                            <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px">
                                <a href="{{ route('product', $product->slug) }}" class="d-block text-reset">{{  $product->getTranslation('name')  }}</a>
                            </h3>

                            @if (\App\Addon::where('unique_identifier', 'club_point')->first() != null && \App\Addon::where('unique_identifier', 'club_point')->first()->activated)
                                <div class="rounded px-2 mt-2 bg-soft-primary border-soft-primary border">
                                    {{ translate('Club Point') }}:
                                    <span class="fw-700 float-right">{{ $product->earn_point }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class="mb-4">
    <div class="container">
        <div class="px-2 py-2 px-md-4 py-md-3 bg-white shadow-sm rounded">
            <div class="d-flex mb-3 align-items-baseline border-bottom">
                <h3 class="h5 fw-700 mb-0">
                    <span class="border-bottom border-primary border-width-2 pb-3 d-inline-block">{{ translate('Featured Products') }}</span>
                </h3>
                <a href="{{route('search')}}" style="float:right; " class="ml-auto mr-0 text-primary">{{__('View All')}}</a>

            </div>
            <div class="aiz-carousel gutters-10 half-outside-arrow" data-items="7" data-xl-items="6" data-lg-items="5"  data-md-items="4" data-sm-items="3" data-xs-items="3" data-arrows='false' data-dots="true" data-infinite='false'>
                @foreach (filter_products(\App\Product::where('published', 1)->where('featured', '1'))->limit(12)->get() as $key => $product)
                <div class="carousel-box ">
                    <div class="aiz-card-box border border-light rounded hov-shadow-md my-1  has-transition .bg-change carousel-box-1">
                        <div class="position-relative ">
                            <a href="{{ route('product', $product->slug) }}" class="d-block rounded-top">
                                <img
                                     class="img-fit lazyload mx-auto h-120px h-md-150px fit-products-img"

                                    src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                    data-src="{{ uploaded_asset($product->thumbnail_img) }}"
                                    alt="{{  $product->getTranslation('name')  }}"
                                    onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';"
                                >
                            </a>
                            <div class="absolute-top-right aiz-p-hov-icon">
                                <a href="javascript:void(0)" onclick="addToWishList({{ $product->id }})" data-toggle="tooltip" data-title="{{ translate('Add to wishlist') }}" data-placement="left">
                                    <i class="la la-heart-o"></i>
                                </a>
                                <a href="javascript:void(0)" onclick="addToCompare({{ $product->id }})" data-toggle="tooltip" data-title="{{ translate('Add to compare') }}" data-placement="left">
                                    <i class="las la-sync"></i>
                                </a>
                                <a href="javascript:void(0)" onclick="showAddToCartModal({{ $product->id }})" data-toggle="tooltip" data-title="{{ translate('Add to cart') }}" data-placement="left">
                                    <i class="las la-shopping-cart"></i>
                                </a>
                            </div>
                        </div>
                        <div class="p-md-3 p-2 text-left featured">
                            <div class="fs-15">
                                @if (Auth::check())
                                @if(home_base_price($product->id) != home_discounted_base_price($product->id))
                                    <!-- <del class="fw-600 opacity-50 mr-1">{{ home_base_price($product->id) }}</del> -->
                                @endif
                                <span class="fw-700 text-primary">{{ home_discounted_base_price($product->id) }}</span>
                                @else
                                <span>Please <strong><a class="registrationLink" style="color: #000000" href="{{ route('user.login') }}" >login</a></strong> to see prices</span>
                                @endif
                            </div>
                            <!-- <div class="rating rating-sm mt-1">
                                {{ renderStarRating($product->rating) }}
                            </div> -->
                            <h3 class="fw-600 fs-12 text-truncate-2 lh-1-4 mb-0 h-25px">
                                <a href="{{ route('product', $product->slug) }}" class="d-sm-inline text-reset text-truncate">{{  $product->getTranslation('name')  }}</a>
                            </h3>

                            @if (\App\Addon::where('unique_identifier', 'club_point')->first() != null && \App\Addon::where('unique_identifier', 'club_point')->first()->activated)
                                <div class="rounded px-2 mt-2 bg-soft-primary border-soft-primary border">
                                    {{ translate('Club Point') }}:
                                    <span class="fw-700 float-right">{{ $product->earn_point }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
