<?php include './master.head.php';?>
    <div id="table-url" data-url="{{ route('admin.country_dc_list') }}"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="breadcrumb__content">
                <div class="breadcrumb__content__left">
                    <div class="breadcrumb__title">
                        <h2>Delivery Charge</h2>
                    </div>
                </div>
                <div class="breadcrumb__content__right">
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Delivery Charge</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="customers__area bg-style mb-30">
                <div class="item-title">
                    <div class="col-xs-6">
                        <button data-bs-toggle="modal" data-bs-target="#createModal1" class="btn btn-md btn-info">Add Delivery Charge</button>
                    </div>
                </div>
                <div class="customers__table">
                    <table id="BlogTable" class="row-border data-table-filter table-style">
                        <thead>
                        <tr>
                            <th>Country</th>
                            <th>Charge (in USD)</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="createModal1" tabindex="-1" role="dialog" aria-labelledby="createModalTitle1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title text-white" id="editModalLongTitle">Add</h5>
                    <button type="button" class="close text-white" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form enctype="multipart/form-data" method="POST" action="{{route('admin.country_dc_store">
                    <div class="modal-body">
                        <div class="input__group mb-25">
                            <label for="country">Country</label>
                            <select name="country" id="country" required>
                                <option value="">---Country---</option>
                                @foreach (country() as $cn)
                                    <option value="{{$cn}}">{{$cn}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input__group mb-25">
                            <label for="exampleInputEmail1">Charge</label>
                            <input type="number" min="0" step="0.01" name="charge" placeholder="Delivery Charge" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger me-2" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
        <div class="modal fade" id="editModal{{$dc->id}}" tabindex="-1" role="dialog" aria-labelledby="editModalTitle{{$dc->id}}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-success">
                        <h5 class="modal-title text-white" id="editModalLongTitle">Edit</h5>
                        <button type="button" class="close text-white" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form enctype="multipart/form-data" method="POST" action="{{route('admin.country_dc_update', encrypt($dc->id))}}">
                        <div class="modal-body">
                            @csrf
                            <div class="input__group mb-25">
                                <label for="country">Country</label>
                                <input name="country" id="country" value="{{$dc->country}}" readonly>
                            </div>
                            <div class="input__group mb-25">
                                <label for="exampleInputEmail1">Tax Rate (In Percentage)</label>
                                <input type="number" min="0" step="0.01" name="charge" placeholder="Delivery Charge" value="{{$dc->charge}}" required>
                            </div>
                            <div class="input__group mb-25">
                                <label for="status">Status</label>
                                <select name="status" id="status" required>
                                    <option value="{{ACTIVE}}" {{$dc->status == ACTIVE ? 'selected' : ''}}>Active</option>
                                    <option value="{{INACTIVE}}" {{$dc->status == INACTIVE ? 'selected' : ''}}>Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger me-2" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="{{asset('backend/js/admin/datatables/delivery-charge/country.js"></script>
        <?php include './master.foot.php';?>
