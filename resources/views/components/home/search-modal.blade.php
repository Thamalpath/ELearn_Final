<div class="modal popup-search-style" id="searchActive">
    <button type="button" class="close-btn" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
    <div class="modal-overlay">
        <div class="modal-dialog p-0" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <h2>Search Your Product</h2>
                    <form action="{{ route('searchProduct') }}" method="POST" id="searchProduct"
                        class="navbar-form position-relative">
                        @csrf
                        <div class="form-group">
                            <input type="search" class="form-control" id="search_product" name="product_name" required
                                placeholder="Search here...">
                            <button type="submit" class="submit-btn"><i class="pe-7s-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
