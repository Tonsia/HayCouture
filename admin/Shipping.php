<?php include './master.head.php';?>
    <div id="table-url" data-url="{{ route('admin.country_taxation_list') }}"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="breadcrumb__content">
                <div class="breadcrumb__content__left">
                    <div class="breadcrumb__title">
                        <h2>Tax Settings</h2>
                    </div>
                </div>
                <div class="breadcrumb__content__right">
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="./dashboard.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tax Settings</li>
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
                        <button data-bs-toggle="modal" data-bs-target="#createModal1" class="btn btn-md btn-info">Add</button>
                    </div>
                </div>
                <div class="customers__table">
                    <table id="BlogTable" class="row-border data-table-filter table-style">
                        <thead>
                        <tr>
                            <th>Country</th>
                            <th>Tax Rate (%)</th>
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
                <form id="taxform" enctype="multipart/form-data" method="POST" action=" ">
                    <div class="modal-body">
                        
                        <div class="input__group mb-25">
                            <label for="country">State</label>
                            <select name="country" id="country">
                       
                                
                            </select>
                        </div>
                        <div class="input__group mb-25">
                            <label for="exampleInputEmail1">Tax Rate (In Percentage)</label>
                            <input type="number" min="0" step="0.01" name="percentage" placeholder="Tax Rate">
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
   
        <div class="modal fade" id="editModal1" tabindex="-1" role="dialog" aria-labelledby="editModalTitle{{$tax->id}}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-success">
                        <h5 class="modal-title text-white" id="editModalLongTitle">{{__('Edit')}}</h5>
                        <button type="button" class="close text-white" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form enctype="multipart/form-data" method="POST" action="{{route('admin.country_tax_update', encrypt($tax->id))}}">
                        <div class="modal-body">
                            
                            <div class="input__group mb-25">
                                <label for="country">{{__('Country')}}</label>
                                <input name="country" id="country" value="{{$tax->country}}" readonly>
                            </div>
                            <div class="input__group mb-25">
                                <label for="exampleInputEmail1">{{ __('Tax Rate (In Percentage)')}}</label>
                                <input type="number" min="0" step="0.01" name="percentage" placeholder="{{__('Tax Rate')}}" value="{{$tax->percentage}}">
                            </div>
                            <div class="input__group mb-25">
                                <label for="status">{{__('Status')}}</label>
                                <select name="status" id="status">
                                    <option value="{{ACTIVE}}" {{$tax->status == ACTIVE ? 'selected' : ''}}>{{__('Active')}}</option>
                                    <option value="{{INACTIVE}}" {{$tax->status == INACTIVE ? 'selected' : ''}}>{{__('tInactive')}}</option>
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
        <?php include './js.php';?>
        <script type="text/javascript">
                $('#taxform').submit(function(e) {
                e.preventDefault();
                
                // bootstrapValidate("#categoryname","regex:^[a-zA-Z ]*$:Should only contain alphabetic characters",  function(a){status=a?"valid":"not"});
                // bootstrapValidate("#categorydescription","regex:^[a-zA-Z ]*$:Should only contain alphabetic characters",   function(a){status=a?"valid":"not"});
                 if(status==='avail'){
                    $.ajax({
                        type: "POST",
                        url: 'ajax.php?action=addcategory',
                        data: $(this).serialize(),
                        success: function(response)
                        {
                            // document.write(response);
                            // console.log(response);
                            if(response == 1){
                                // alert("success");
                                // Toastify({ 
                                //     text: "Added Category Successfully!",
                                //     style: { background: "linear-gradient(to right, #00b09b, #96c93d)", },
                                //     duration: 3000 }).showToast();
                                // location.href ='categoryIndex.php';


                                Swal.fire({
                                        position: 'center',
                                        icon: 'success',
                                        text: "Category Added Successfully!",
                                        // text: "Message!",
                                        // showConfirmButton: false,
                                        type: "success"
                                })
                            }
                            else{
                                Swal.fire({
                                        icon: 'warning',
                                        text: 'Invalid!',
                                        })
                                }
                        }
                    }); 
                }
        }); 




        </script>
        <?php include './master.foot.php';?>