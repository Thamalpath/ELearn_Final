<x-app-layout>
    @section('content')
        <div class="card card-primary m-3">
            <div class="card-header">
                <h3 class="card-title">User Details</h3>
                <a href="{{ url('users') }}" class="btn btn-warning float-right">Back</a>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="role_as">Role</label>
                            <input type="text" class="form-control" id="role_as"
                                value="{{ $users->role_as == '0' ? 'User' : 'Admin' }}" name="role_as" disabled>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="fname">First Name</label>
                            <input type="text" class="form-control" id="fname" value="{{ $users->fname }}"
                                name="fname" disabled>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="lname">Last Name</label>
                            <input type="text" name="lname" id="lname" value="{{ $users->lname }}"
                                class="form-control" disabled>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" value="{{ $users->email }}"
                                class="form-control" disabled>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" id="phone" value="{{ $users->phone }}"
                                class="form-control" disabled>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="address1">Street Name</label>
                            <input type="text" class="form-control" id="address1" value="{{ $users->address1 }}"
                                name="address1" disabled>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="address2">Town</label>
                            <input type="text" name="address2" id="address2" value="{{ $users->address2 }}"
                                class="form-control" disabled>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" name="city" id="city" value="{{ $users->city }}"
                                class="form-control" disabled>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="state">State</label>
                            <input type="text" name="state" id="state" value="{{ $users->state }}"
                                class="form-control" disabled>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="country">Country</label>
                            <input type="text" name="country" id="country" value="{{ $users->country }}"
                                class="form-control" disabled>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="zipcode">Zipcode</label>
                            <input type="text" name="zipcode" id="zipcode" value="{{ $users->zipcode }}"
                                class="form-control" disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</x-app-layout>
