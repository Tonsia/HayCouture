<?php include './master.head.php';?>
    <div id="table-url" data-url="{{route('admin.coupon"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="breadcrumb__content">
                <div class="breadcrumb__content__left">
                    <div class="breadcrumb__title">
                        <h2>Coupons</h2>
                    </div>
                </div>
                <div class="breadcrumb__content__right">
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Coupons</li>
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
                        <a href="couponsAdd.php" class="btn btn-md btn-info">Add Coupon</a>
                    </div>
                </div>
                <div class="customers__table">
                    <table id="CouponTable" class="row-border data-table-filter table-style">
                        <thead>
                        <tr>
                        <th>No</th>
                            <th>Coupon Code</th>
                            <th>Amount</th>
                            <th>Min Expenses</th>
                            <th>Expire Date</th>
                            <th>Validity</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody id="tbody">
                            
                            <!-- <tr role="row" class="odd">
                                <td>1</td>
                                <td class="sorting_1">ABCD</td>
                                <td>1</td>
                                <td>1500</td>
                                <td>2022-09-16</td>
                                <td><span class="status active">Valid</span></td>
                                <td>
                                    <div class="action__buttons">
                                        <a href="https://zairito.zainikthemes.com/admin/coupon/edit/1" class="btn-action">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <a href="https://zairito.zainikthemes.com/admin/coupon/delete/1" class="btn-action delete">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr> -->
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--Row-->
    <script>

        $(document).ready(function() {
                $.ajax({
                type: "POST",
                url: 'ajax.php?action=couponlist',
                data: {},
                success: function(response)
                {
                    // document.write(response);
                    //console.log(response);
                    $('#tbody').html(response);
                    $("#CouponTable").dataTable();
                }
                });
        });
    </script>
    <?php include './master.foot.php';?>

