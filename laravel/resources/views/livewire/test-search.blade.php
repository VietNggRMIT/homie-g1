    <div class="d-flex search-filter" role="search">
        <input wire:model="searchName" wire:change="filter" class="form-control border-end-0 border rounded-pill me-2" type="text" placeholder="Search listing name..." aria-label="Search">
        <!-- <button disabled class="btn btn-outline-success" type="submit">Search</button> -->
        <input wire:model="searchAddress" wire:change="filter" class="form-control border-end-0 border rounded-pill me-2" type="text" placeholder="Search by address e.g. 'Ha Noi' or 'Ba Dinh'" aria-label="Search">

    </div>
    <div class="d-flex">
        <label for="filterRating">Filter listings by rating</label>
        <select wire:model="filterRating" id="filterRating">
            <option value="allRatings">Show listings of all ratings</option>
            <option value="5">5 star listings</option>
            <option value="4">4 star listings</option>
            <option value="3">3 star listings</option>
            <option value="2">2 star listings</option>
            <option value="1">1 star listings</option>
            <option value="unrated">Unrated listings</option>
        </select>
    </div>
    <div class="d-flex">
        <label for="order">Order listings by</label>
        <select wire:model="order" id="order">
            <option disabled selected value="byID">ID</option>
            <option value="priceAscending">Price, from low to high</option>
            <option value="priceDescending">Price, from high to low</option>
            <option value="created">Most recently created</option>
            <option value="updated">Most recently updated</option>
            <option value="mostApp">Most applications submitted</option>
        </select>
    </div>
    <div class="d-flex">
        Choose your desired rent per month:
        <div>
            <input type="checkbox" id="rentOver9" name="rentOver9" checked>
            <label for="rentOver9">Over 9m VND</label>
        </div>
        <div>
            <input type="checkbox" id="rent69" name="rent69">
            <label for="rent69">From 6m to 9m VND</label>
        </div>
        <div>
            <input type="checkbox" id="rent36" name="rent36">
            <label for="rent36">From 3m to 6m VND</label>
        </div>
        <div>
            <input type="checkbox" id="rent03" name="rent03">
            <label for="rent03">Under 3m VND</label>
        </div>
    </div>




    {{-- <span class="input-group-append">
        <button disabled class="btn btn-outline-secondary border-bottom-0 border rounded-pill ms-n5" type="button">
            <i class="fa fa-search"></i>
        </button>
    </span> --}}
