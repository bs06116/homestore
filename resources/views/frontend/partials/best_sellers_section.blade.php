
<section class="mb-4">
    <div class="container">
        <div class="px-2 py-2 px-md-4 py-md-3 bg-white shadow-sm rounded">
            <div class="d-flex mb-3 align-items-baseline border-bottom">
                <h3 class="h5 fw-700 mb-0">
                    <span class="border-bottom border-primary border-width-2 pb-3 d-inline-block">{{ translate('Categories') }}</span>
                </h3>
                <a href="{{route('categories.all')}}" style="float:right; " class="ml-auto mr-0 text-primary">{{__('View All')}}</a>

            </div>
            <div class="aiz-carousel gutters-10 half-outside-arrow" data-items="7" data-xl-items="6" data-lg-items="5"  data-md-items="4" data-sm-items="3" data-xs-items="3" data-arrows='false' data-dots="true" data-infinite='false'>
                @foreach (\App\Category::get() as $key => $category)
                <div class="carousel-box ">
                    <div class="aiz-card-box border border-light rounded hov-shadow-md my-1  has-transition .bg-change carousel-box-1">
                        <div class="position-relative ">
                            <a href="{{ route('products.category', $category->slug) }}" class="d-block rounded-top">
                                <img
                                     class="img-fit lazyload mx-auto h-120px h-md-150px fit-products-img"

                                    src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                    data-src="{{ uploaded_asset($category->thumbnail_img) }}"
                                    alt="{{  $category->getTranslation('name')  }}"
                                    onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';"
                                >
                            </a>

                        </div>

                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>