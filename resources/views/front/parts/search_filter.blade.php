<div class="flex-w flex-c-m m-tb-10">
    <div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
        <i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
        <i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
         Filter
    </div>

    <div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
        <i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
        <i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
        Search
    </div>
</div>

<!-- Search product -->
<div class="dis-none panel-search w-full p-t-10 p-b-15">
    <div class="bor8 dis-flex p-l-15">
        <button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
            <i class="zmdi zmdi-search"></i>
        </button>

        <input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Search">
    </div>	
</div>

<!-- Filter -->
<div class="dis-none panel-filter w-full p-t-10">
    <div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">

        <div class="p-r-15 p-b-27">
            <div class="mtext-102 cl2 p-b-15">
                @lang('front.SortBy')
            </div>
            <ul>
                
                <li class="p-b-6">
                    <a href="{{filterByLinkQuery(url()->current(),'sort_by', 'newness')}}" class="{{ filterActiveClass('filter-link-active"', 'sort_by', 'newness') }} {{ filterActiveClass('filter-link-active', 'sort_by', 'newness') }} filter-link stext-106 trans-04">
                        @lang('front.Newness')
                    </a>
                </li>

                <li class="p-b-6">
                    <a href="{{filterByLinkQuery(url()->current(),'sort_by' , 'price_low')}}" class="{{ filterActiveClass('filter-link-active', 'sort_by', 'price_low') }} filter-link stext-106 trans-04">
                        @lang('front.Price_Low_to_High')
                    </a>
                </li>

                <li class="p-b-6">
                    <a href="{{filterByLinkQuery(url()->current(),'sort_by', 'price_high')}}" class="{{ filterActiveClass('filter-link-active', 'sort_by', 'price_high') }} filter-link stext-106 trans-04">
                        @lang('front.Price_High_to_Low')
                    </a>
                </li>
            </ul>
        </div>

        <div class="filter-col3 p-r-15 p-b-27" style="margin-left: 8rem;">
           
            <div class="mtext-102 cl2 p-b-15">
                @lang('front.Sizes')
            </div>

            <ul>
                <li class="p-b-6">
                    <a href="{{filterByLinkQuery(url()->current(),'size_id')}}" class="{{ filterActiveClass('filter-link-active', 'size_id') }} filter-link stext-106 trans-04">
                        @lang('front.All_Sizes')
                    </a>
                </li>

                @if (request()->has('category_id'))
                @php
                    $category = \App\Models\Category::find(request('category_id'));
                @endphp

                @if ($category)
                    @foreach ($category->sizes as $index => $size)
                        <li class="p-b-6">
                            <a href="{{ filterByLinkQuery(url()->current(),'size_id', $size->id) }}"
                            class="{{ filterActiveClass('filter-link-active', 'size_id', $size->id) }} filter-link stext-106 trans-04">
                            {{ $size->value }}
                            </a>
                        </li>
                    @endforeach
                @else
                    <p>@lang('front.enogh_sizes')</p>
                @endif
            @endif

            </ul>

        </div>
        
        <div class="filter-col2 p-r-15 p-b-27">
            <div class="mtext-102 cl2 p-b-15">
                @lang('front.Price')
            </div>

            <ul>
                <li class="p-b-6">
                    <a href="{{ url()->current(), 'price_between' }}" class="filter-link stext-106 trans-04 filter-link-active">
                        @lang('front.All_Prices')
                    </a>
                </li>

                <li class="p-b-6">
                    <a href="{{ filterByLinkQuery(url()->current(), 'price_between', '0') }}" class="filter-link stext-106 trans-04">
                        L.E 0.00 - L.E 100.00
                    </a>
                </li>

                <li class="p-b-6">
                    <a href="{{ filterByLinkQuery(url()->current(), 'price_between', '100') }}" class="filter-link stext-106 trans-04">
                        L.E 100.00 - L.E 200.00
                    </a>
                </li>

                <li class="p-b-6">
                    <a href="{{ filterByLinkQuery(url()->current(), 'price_between', '200') }}" class="filter-link stext-106 trans-04">
                        L.E 200.00 - L.E 300.00
                    </a>
                </li>

                <li class="p-b-6">
                    <a href="{{ filterByLinkQuery(url()->current(), 'price_between', '300') }}" class="filter-link stext-106 trans-04">
                        L.E 300.00 - L.E 400.00
                    </a>
                </li>

                <li class="p-b-6">
                    <a href="{{ filterByLinkQuery(url()->current(), 'price_between', '400') }}" class="filter-link stext-106 trans-04">
                        L.E 400.00+
                    </a>
                </li>
            </ul>
        </div>

        <div class="filter-col4 p-b-27">
            <div class="mtext-102 cl2 p-b-15">
                Tags
            </div>

            <div class="flex-w p-t-4 m-r--5">
                
                @foreach (\App\Models\Tag::all() as $tag)
                    <a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                        {{ $tag->title }}
                    </a>
                @endforeach
            </div>
        </div>
        
    </div>
</div>