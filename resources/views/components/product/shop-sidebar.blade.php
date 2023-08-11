<div class="col-lg-3 order-lg-first col-md-12 order-md-last mb-md-60px mb-lm-60px">
    <div class="shop-sidebar-wrap">
        <!-- Sidebar single item -->
        <div class="sidebar-widget-search">
            <form action="{{ url('searchProduct') }}" method="POST" id="widgets-searchbox">
                @csrf
                <input class="input-field" type="search" id="search_product" name="product_name" required
                    placeholder="Search">
                <button class="widgets-searchbox-btn" type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </form>
        </div>
        <!-- Sidebar single item -->
        <div class="sidebar-widget">
            <h4 class="sidebar-title">Color</h4>
            <div class="sidebar-widget-list color">
                <ul class="color-list">
                    @php $colorCounter = 0; @endphp
                    @foreach (\App\Models\Product::productColors as $colorKey => $colorValue)
                        @php
                            $colorCounter++;
                            $colorClass = strtolower($colorKey);
                        @endphp
                        <li>
                            <a class="color-selection my-2 {{ $colorClass }}" href="#"
                                data-color="{{ $colorKey }}" style="background-color: {{ $colorValue }};"></a>
                        </li>
                        @if ($colorCounter == 4)
                            @php $colorCounter = 0; @endphp
                </ul>
                <ul class="color-list">
                    @endif
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- Sidebar single item -->
        <div class="sidebar-widget">
            <h4 class="sidebar-title">Size</h4>
            <div class="sidebar-widget-list size">
                <ul class="size-list">
                    @php $sizeCounter = 0; @endphp
                    @foreach (\App\Models\Product::productSizes as $size)
                        @php
                            $sizeCounter++;
                        @endphp
                        <li><a class="gray my-2" href="#" data-size="{{ $size }}">{{ $size }}</a>
                        </li>
                        @if ($sizeCounter == 4)
                            @php $sizeCounter = 0; @endphp
                </ul>
                <ul class="size-list">
                    @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
