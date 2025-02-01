<!-- Product -->
<section class="bg0 p-t-23 p-b-140">
    <div class="container">
        <div class="p-b-10" style="margin-top: 7rem">
            <h3 class="ltext-103 cl5">
                @lang('front.Product Overview')
            </h3>
        </div>

        <div class="flex-w flex-sb-m p-b-52">
           
            <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                <a href="{{ url()->current() }}" class="{{ filterActiveClass('how-active1', 'category_id') }} stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5">
                    @lang('front.All Products')
                </a>
            </div>
            
                @foreach (\App\Models\Category::all() as $index => $category)
                    <a href="{{ filterByLinkQuery(url()->current(),'category_id', $category->id) }}" class=" {{ filterActiveClass('how-active1', 'category_id', $category->id) }} stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5">
                        {{ $category->title }}
                    </a>
                @endforeach
            
                @include('front.parts.search_filter')

        </div>

        <div class="row isotope-grid">
            @forelse ($products as $index => $product)
                <x-product-card :product="$product"/>
            @empty
            <h4>لأيوجد منتجات</h4>
            @endforelse
        </div>

        <!-- Load more -->
        <div class="flex-c-m flex-w w-full p-t-45">
            <a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
                Load More
            </a>
        </div>
    </div>
</section>