<x-default-layout>
    <!-- Toolbar and Content container structure remains the same -->


    <h2>Edit Promo Code</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @elseif(session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form method="POST" id="contentForm" action="{{ route('admin.promocode.update', $promocode->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="col-12 float-start px-3 py-5">
            <!-- Store Select -->
            <div class="mb-7">
                <label for="store" class="form-label">Store</label>
                <select class="form-select" id="store" name="store" required>
                    <option value="">Select Store</option>
                    <option value="Dubai" @selected($promocode->store == 'Dubai')>Dubai</option>
                    <option value="Abu Dhabi" @selected($promocode->store == 'Abu Dhabi')>Abu Dhabi</option>
                    <option value="All" @selected($promocode->store == 'All')>All</option>
                </select>
            </div>

            <!-- Promo Code Input -->
            <div class="mb-7">
                <label for="promocode" class="form-label">Promo Code</label>
                <input type="text" class="form-control" id="promocode" name="promocode" placeholder="Enter promo code" value="{{ $promocode->promocode }}" required>
            </div>

            <!-- Discount Input -->
            <div class="mb-7">
                <label for="discount" class="form-label">Discount (%)</label>
                <input type="number" class="form-control" id="discount" name="discount" placeholder="Enter discount percentage" value="{{ $promocode->discount }}" required>
            </div>

            <!-- Start Date Input -->
            <div class="mb-7">
                <label for="start_date" class="form-label">Start Date</label>
                <input type="date" class="form-control" id="start_date" name="start_date" value="{{ \Carbon\Carbon::parse($promocode->start_date)->format('Y-m-d') }}" required>

            </div>

            <!-- Validity Period Input -->
            <div class="mb-7">
                <label for="validity_period" class="form-label">Validity Period (days)</label>
                <input type="number" class="form-control" id="validity_period" name="validity_period" placeholder="Enter validity period in days" value="{{ $promocode->validity_period }}" required>
            </div>

            <!-- Status Toggle -->
            <div class="form-check form-switch mb-7">
                <input class="form-check-input" type="checkbox" id="status" name="status" @checked($promocode->status) value="1">
                <label class="form-check-label" for="status">Active</label>
            </div>

            <!-- Submit Button -->
            <div class="text-center pt-15">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>
</x-default-layout>
