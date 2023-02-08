<?php include './master.head.php';?>
<div id="table-url" data-url="{{ route('admin.product.color') }}"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="breadcrumb__content">
                <div class="breadcrumb__content__left">
                    <div class="breadcrumb__title">
                        <h2> Product Color </h2>
                    </div>
                </div>
                <div class="breadcrumb__content__right">
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="http://localhost/designer/dashboard.php "> Home </a></li>
                            <li class="breadcrumb-item active" aria-current="page"> Product Color </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="customers__area bg-style mb-30">
                <div class="customers__table">
                <div id="ProductSizeTable_wrapper" class="dataTables_wrapper no-footer">    
                            <div class="dataTables_length" id="ProductSizeTable_length">
							<div class="col-xs-6">
                                <a href="productColorCreate.php" class="btn btn-md btn-info">Add Product Color </a>
                            </div>
                            </div>
                            <div id="ProductSizeTable_filter" class="dataTables_filter">
                                
                            </div> 
                    <table id="ProductColorTable" class="row-border data-table-filter table-style">
                        <thead>
                        <tr>
                            <th>Sl No.</th>
                            <th>Color Name </th>
                            <th>Color Code </th>
                            <th>Status</th>
                            <th>Action </th>
                        </tr>
                        </thead>
                        <tbody id="pdtcolor">                        
                            
                        
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
    <?php include './js.php';?>
		<script type="text/javascript">
		// to list all pdtcolor
		$(document).ready(function() {
			$.ajax({
				type: "POST",
				url: 'ajax.php?action=productcolor',
				data: $(this).serialize(),
				success: function(response) {
					// document.write(response);
					// console.log(response);
					$('#pdtcolor').html(response);
                    $("#ProductColorTable").dataTable();

				}
			});
		});

        $("#colsearch").on("keyup",function(){
            var form_data = new FormData();
            form_data.append('searchstr',$("#colsearch").val());  
            $.ajax({
            type: "POST",
            url: 'ajax.php?action=tablecolorsearch',
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            success: function(response)
            {
                // document.write(response);
                //console.log(response);
                $('#pdtcolor').html(response);
            }
            });
        });

		// for click on edit button
		function fn1(e) {
			location.href = "productColorEdit.php?id=" + e;
		}
		// for click on toggle button
		function fn2(e) {
			$.ajax({
				type: "POST",
				url: 'ajax.php?action=colorstatus',
				data: {
					colorid: e
				},
				success: function(response) {
					// document.write(response);
					// console.log(response);
					$.ajax({
                        type: "POST",
                        url: 'ajax.php?action=productcolor',
                        data: $(this).serialize(),
                        success: function(response) {
                            // document.write(response);
                            // console.log(response);
                            $('#pdtcolor').html(response);
                            location.reload();
                        }
                    });
				}
			});
		}
		</script>
            <?php include './master.foot.php';?>
