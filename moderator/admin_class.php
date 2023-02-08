<?php
Class Action {
	private $db;

	public function __construct() {
		ob_start();
        include 'db_connect.php';
        $this->db = $conn;
	}
    
	function __destruct() {
	    $this->db->close();
	    ob_end_flush();
	}
	function addcategory()
	{
        $categoryname=$_POST['categoryname'];
        $categorydescription=$_POST['categorydescription'];
		$qry = $this->db->query("INSERT INTO category(cat_name,cat_desc) VALUES ('$categoryname', '$categorydescription')");
		return $qry;
	}
	function tablecategory()
	{

		$result=$this->db->query("SELECT * FROM category");
		$str = '';
		$i=1;
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$sts="";
				$id=$row["cat_id"];
				if($row["cat_status"]==1)
					$sts='<span class="status active">Active</span>';
				else
					$sts='<span class="status blocked">Disabled</span>';
				$str = $str .
				'<tr id='.$row["cat_id"].' role="row" class="odd">'.
				'<td>' .$i. '</td>'.
					'<td class="sorting_1">' .$row["cat_name"]. '</td>'.
					'<td>' .$row["cat_desc"]. '</td>'.
					'<td>'.$sts.'</td>'.
					'<td>
						<div class="action__buttons">
							
							<button onclick="fn1('.$id.')" type="button" class="fas fa-pen-to-square btnhere" title="Edit"></button>
							
							<a class="btn-action toggle" title="Toggle">
								<button onclick="fn2('.$id.')" type="button"  class="fas fa-toggle-on" title="Toggle"></button>
							</a>

							<!-- <a class="btn-action delete" title="Delete">
								<i class="fas fa-trash-alt"></i>
							</a> -->
						</div>
					</td>
				</tr>';
				$i++;
			}
		}

		return $str;
	}
	function catedit()
	{
        $catid=$_POST['id'];
		$qry = $this->db->query("SELECT * FROM category where cat_id='$catid'");
		$str = '';
		if ($qry->num_rows > 0) 
		{
			while($row = $qry->fetch_assoc()) 
			{
				$name=$row["cat_name"];
				$desc=$row["cat_desc"];
				$str=$name."#".$desc;
			}
		}
		return $str;
	}
	function catupdate()
	{
        $catname=$_POST['catname'];
		$catdesc=$_POST['catdesc'];
		$catid=$_POST['catid'];
		$qry = $this->db->query("UPDATE category SET cat_name='$catname', cat_desc='$catdesc' WHERE cat_id='$catid'");
		return $qry;
	}

	function catstatus()
	{
		
		$catid=$_POST['catid'];
		$qry = $this->db->query("SELECT * FROM category where cat_id='$catid'");
		$res = $qry->fetch_array()[3];
		if($res==1){
			$qry2 = $this->db->query("UPDATE category SET cat_status=2 WHERE cat_id='$catid'");
		}
		else if($res==2){
			$qry2 = $this->db->query("UPDATE category SET cat_status=1 WHERE cat_id='$catid'");
		}
		return $qry2;
	}
	 
	function productsize()
	{
	$result=$this->db->query("SELECT * FROM product_size");
	$str = '';
	$i=1;
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$sts="";
			$id=$row["size_id"];
			if($row["size_status"]==1)
				$sts='<span class="status active">Active</span>';
			else
				$sts='<span class="status blocked">Disabled</span>';

			$str = $str .
			'<tr id='.$row["size_id"].' role="row" class="odd">'.
			'<td class="sorting_1">' .$i. '</td>'.
				'<td class="sorting_1">' .$row["size"]. '</td>'.
				'<td>'.$sts.'</td>'.
				'<td>
					<div class="action__buttons">
						
						<button onclick="fn1('.$id.')" type="button" class="fas fa-pen-to-square btnhere" title="Edit"></button>
						<a class="btn-action toggle" title="Toggle">
							<button onclick="fn2('.$id.')" type="button"  class="fas fa-toggle-on" title="Toggle"></button>
						</a>

					</div>
				</td>
			</tr>';
			$i++;
		}
	}
	return "$str";
	}

	function pdtsizeupdate()
	{
        $pdtsizeid=$_POST['pdtsizeid'];
		$pdtsize=$_POST['pdtsize'];
		$qry = $this->db->query("UPDATE product_size SET size='$pdtsize' WHERE size_id='$pdtsizeid'");
		return $qry;
	}

	function getsize()
	{
        $pdtsizeid=$_POST['id'];
		$qry = $this->db->query("SELECT * FROM product_size where size_id='$pdtsizeid'");
		$str = '';
		if ($qry->num_rows > 0) 
		{
			while($row = $qry->fetch_assoc()) 
			{
				$str=$row["size"];
			}
		}
		return $str;
	}
	
	function sizestatus()
	{
        $sizeid=$_POST['sizeid'];
		$qry = $this->db->query("SELECT * FROM product_size where size_id='$sizeid'");
		$res = $qry->fetch_array()[2];
		$res = trim($res);
		if($res==1){
			$qry2 = $this->db->query("UPDATE product_size SET size_status=2 WHERE size_id='$sizeid'");
		}
		else if($res==2){
			 $qry2 = $this->db->query("UPDATE product_size SET size_status=1 WHERE size_id='$sizeid'");
		}
		return $qry2;
	}
	
	function addpdtsize()
	{
        $size=$_POST['size'];
		$qry = $this->db->query("INSERT INTO product_size(size) VALUES ('$size')");
		return $qry;
	}
	function productcolor()
	{
		$i=1;
		$result=$this->db->query("SELECT * FROM product_color");
		$str = '';
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$sts="";
				$id=$row["color_id"];
				if($row["color_status"]==1)
					$sts='<span class="status active">Active</span>';
				else
					$sts='<span class="status blocked">Disabled</span>';
	
				$str = $str .
					'<tr id='.$row["color_id"].' role="row" class="odd">'.
						'<td class="sorting_1">' .$i. '</td>'.
						'<td class="sorting_1">' .$row["color"]. '</td>'.
						'<td class="sorting_1" style="-webkit-text-stroke:0.2px black; font-weight: bold;color:'.$row["color_code"].';" >' .$row["color_code"]. '</td>'.
						'<td>'.$sts.'</td>'.
						'<td>
							<div class="action__buttons">
								
								<button onclick="fn1('.$id.')" type="button" class="fas fa-pen-to-square btnhere" title="Edit"></button>
								<a class="btn-action toggle" title="Toggle">
									<button onclick="fn2('.$id.')" type="button"  class="fas fa-toggle-on" title="Toggle"></button>
								</a>
		
							</div>
						</td>
					</tr>';	
				$i++;
			}
		}
		return "$str";
	}
	
	function pdtcolorupdate()
	{
        $pdtcolorid=$_POST['pdtcolorid'];
		$colorname=$_POST['colorname'];
		$colorcode=$_POST['colorcode'];
		$qry = $this->db->query("UPDATE product_color SET color='$colorname',color_code='$colorcode' WHERE color_id='$pdtcolorid'");
		return $qry;
	}
	function getcolor()
	{
        $colorid=$_POST['id'];
		$qry = $this->db->query("SELECT * FROM product_color where color_id='$colorid'");
		$str = '';
		if ($qry->num_rows > 0) 
		{
			while($row = $qry->fetch_assoc()) 
			{
				$color=$row["color"];
				$code=$row["color_code"];
				$str=$color.",".$code;
			}
		}
		return $str;
	}
	
	function colorstatus()
	{
        $colorid=$_POST['colorid'];
		$qry = $this->db->query("SELECT * FROM product_color where color_id='$colorid'");
		$res = $qry->fetch_array()[3];
		$res = trim($res);
		if($res==1){
			$qry2 = $this->db->query("UPDATE product_color SET color_status=2 WHERE color_id='$colorid'");
		}
		else if($res==2){
			 $qry2 = $this->db->query("UPDATE product_color SET color_status=1 WHERE color_id='$colorid'");
		}
		return $qry2;
	}
	function addcolor()
	{
        $colorname=$_POST['colorname'];
        $colorcode=$_POST['colorcode'];
		$qry = $this->db->query("INSERT INTO product_color(color,color_code) VALUES ('$colorname', '$colorcode')");
		return $qry;
	}

	function listcategory()
	{
		
		$qry = $this->db->query("SELECT * FROM category where cat_status='1'");
		$str = '';
		$ids = '';
		while($row = mysqli_fetch_array($qry)) {
			// $str .= '<option value="'.$row["state_name"].'">';
			$str .= $row["cat_name"].'|';
			$ids .= $row["cat_id"].'|'; 
			}
		return $str.",".$ids;
	}

	function listcolor()
	{
		
		$qry = $this->db->query("SELECT * FROM product_color where color_status='1'");
		$str = '';
		$ids = '';
		while($row = mysqli_fetch_array($qry)) {
			
			$str .= $row["color"].'|';
			$ids .= $row["color_id"].'|';  
			}
		return $str.",".$ids;
	}

	
	function listsize()
	{
		
		$qry = $this->db->query("SELECT * FROM product_size where size_status='1'");
		$str = '';
		$ids = '';
		while($row = mysqli_fetch_array($qry)) {
			
			$str .= $row["size"].'|';
			$ids .= $row["size_id"].'|'; 
			}
		return $str.",".$ids;
	}

	
	
	function createproduct()
	{
		extract($_POST);

		$qry1 = $this->db->query("SELECT p_id from products Order By p_id Desc");
		$row1 = $qry1->fetch_array();
		$val = $row1['p_id']+1;
		$productid = "HCP".$val;
		$disc1 = 0;
		if(!isset($discount)){$disc1=0;}else{$disc1=$discount;}
		$qry = $this->db->query("INSERT INTO products(p_name, product_id, cat_id, product_price, product_discount, product_total, product_desc,product_feat, product_selling, product_sale, product_arrival) VALUES ('$productname', '$productid', '$categoryname', '$price', '$disc1', '$discount_price', '$description', '$featured', '$best_sale', '$on_sale', '$new_arrival')");
		$target_dir = "assets/uploaded_files/product_images/";
		$str='';

		for ($x = 0; $x < $colorlen; $x++) {	
			$target_file1='';
			$target_file2='';
			$color =  $_POST["c".$x];
			
			if(isset($_FILES["a".$x]["name"])){
				$ext1 = pathinfo($_FILES["a".$x]["name"], PATHINFO_EXTENSION); //get extension
				$target_file1 = $target_dir . $productid .$color. '_1'. '.' .$ext1; //target file name
				move_uploaded_file($_FILES["a".$x]["tmp_name"], $target_file1);
			}

			if(isset($_FILES["b".$x]["name"])){
				$ext2 = pathinfo($_FILES["b".$x]["name"], PATHINFO_EXTENSION); //get extension
				$target_file2 = $target_dir . $productid .$color. '_2'. '.' .$ext2; //target file name
				move_uploaded_file($_FILES["b".$x]["tmp_name"], $target_file2);
			}

			$qry2 = $this->db->query("INSERT INTO color_details( product_id, color_id, img1, img2) VALUES ('$productid','$color','$target_file1','$target_file2')");
		}

		for ($x = 0; $x < $sizelen; $x++) {
			$str1 = $_POST["size".$x];
			$str2 = $_POST["qty".$x];
			$qry = $this->db->query("INSERT INTO size_details(product_id, size_id,quantity) VALUES ('$productid','$str1','$str2')");
		}

		return 1;
	}


	function updatecolor()
	{
		extract($_POST);

		$qry1 = $this->db->query("SELECT p_id from products Order By p_id Desc");
		$row1 = $qry1->fetch_array();
		$val = $row1['p_id']+1;
		$productid = "HCP".$val;
		
		for ($x = 0; $x < $colorlen; $x++) {
			//$s = ;
			$str = $_POST["color".$x];
			$qry = $this->db->query("INSERT INTO color_details(product_id, color_id) VALUES ('$productid','$str')");

		}
		for ($x = 0; $x < $sizelen; $x++) {
			//$s = ;
			$str1 = $_POST["size".$x];
			$str2 = $_POST["qty".$x];
			$qry = $this->db->query("INSERT INTO size_details(product_id, size_id,quantity) VALUES ('$productid','$str1','$str2')");

		}
		return 1;
	}

	function tableproducts()
	{
		$result=$this->db->query("SELECT * FROM products");
		
		$i=1;
		$str = '';
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$pid=$row["product_id"];
				$result1=$this->db->query("SELECT img1 FROM color_details where product_id='$pid'");
				$row1=$result1->fetch_array();

				$sts="";
				$eachcategory="";
				$id=$row["p_id"];
				$cid=$row["cat_id"];
				if($row["product_status"]==1)
					$sts='<span class="status active">Active</span>';
				else
					$sts='<span class="status blocked">Disabled</span>';
				$cat=$this->db->query("SELECT cat_name FROM category where cat_id='$cid'");
				$r=$cat->fetch_array();
				$str = $str .
				'<tr id='.$row["p_id"].' role="row" class="odd">'.
				'<td>' .$i.'</td>'.
				'<td><img src="'.$row1["img1"].'"class="img-rounded img-responsive" align="center">'.'</td>'.
					// '<td>' .$row["product_img1"]. '</td>'.
					'<td class="sorting_1">' .$row["p_name"]. '</td>'.
					// '<td>' .$row["cat_id"]. '</td>'.
					'<td>' .$r["cat_name"].'</td>'.
					'<td>' .$row["product_total"]. '</td>'.
					'<td>'.$sts.'</td>'.
					'<td>
						<div class="action__buttons">
							
							<button onclick="fn1('.$id.')" type="button" class="fas fa-pen-to-square btnhere" title="Edit"></button>
							
							<a class="btn-action toggle" title="Toggle">
								<button onclick="fn2('.$id.')" type="button"  class="fas fa-toggle-on" title="Toggle"></button>
							</a>

							<!-- <a class="btn-action delete" title="Delete">
								<i class="fas fa-trash-alt"></i>
							</a> -->
						</div>
					</td>
				</tr>';
				$i++;
			}
		}

		return $str;

	}

	
	function pdtstatus()
	{
	$pid=$_POST['pdtid'];
	$qry = $this->db->query("SELECT * FROM products where p_id='$pid'");
	$res = $qry->fetch_array()[12];
	if($res==1){
		$qry2 = $this->db->query("UPDATE products SET product_status=2 WHERE p_id='$pid'");
	}
	else if($res==2){
		$qry2 = $this->db->query("UPDATE products SET product_status=1 WHERE p_id='$pid'");
	}
	return $qry2;
	}

	function pdtedit()
	{
		$pdtid=$_POST['id'];
		$productid="";
		$qry = $this->db->query("SELECT * FROM products where p_id='$pdtid'");
		$str = '';
		if ($qry->num_rows > 0) 
		{
			while($row = $qry->fetch_assoc()) 
			{
				$productname=$row["p_name"];
				$productid=$row["product_id"];
				$categoryname=$row["cat_id"];
				$price=$row["product_price"];
				$discount=$row["product_discount"];
				$discount_price=$row["product_total"];
				$description=$row["product_desc"];
				$featured=$row["product_feat"];
				$best_sale=$row["product_selling"];
				$on_sale=$row["product_sale"];
				$product_arrival=$row["product_arrival"];

				$str=$productname."*".$productid."*".$categoryname."*".$price."*".$discount."*".$discount_price."*".$description."*".$featured."*".$best_sale."*".$on_sale."*".$product_arrival;
			}
		}
		return $str;

	}

	
	function pdtupdate()
	{


		extract($_POST);
			
			  $target_dir = "assets/uploaded_files/product_images/";
			  $qry = $this->db->query("UPDATE products SET p_name='$productname',cat_id='$categoryname',product_price='$price',product_discount='$discount',product_total='$discount_price',product_desc='$description',product_feat='$featured',product_selling='$best_sale',product_sale='$on_sale',product_arrival='$new_arrival',product_status=1 WHERE p_id = '$id' ");
			
			  
			  $str='';

			  for ($x = 0; $x < $colorlen; $x++) {	
				  $target_file1='';
				  $target_file2='';
				  $color =  $_POST["c".$x];
						$result=$this->db->query("SELECT * FROM color_details WHERE product_id = '$productid' and color_id = '$color' ");
						if ($result->num_rows > 0) {
								if(isset($_FILES["a".$x]["name"])){
									$ext1 = pathinfo($_FILES["a".$x]["name"], PATHINFO_EXTENSION); //get extension
									$target_file1 = $target_dir . $productid .$color. '_1'. '.' .$ext1; //target file name
									if (file_exists($target_file1)) {
										unlink($target_file1);
									}
									move_uploaded_file($_FILES["a".$x]["tmp_name"], $target_file1);
									$qry1 = $this->db->query("UPDATE color_details SET img1='$target_file1' WHERE product_id = '$productid' and color_id = '$color' ");
									
								}
				
								if(isset($_FILES["b".$x]["name"])){
									$ext2 = pathinfo($_FILES["b".$x]["name"], PATHINFO_EXTENSION); //get extension
									$target_file2 = $target_dir . $productid .$color. '_2'. '.' .$ext2; //target file name
									if (file_exists($target_file2)) {
										unlink($target_file2);
									}
									move_uploaded_file($_FILES["b".$x]["tmp_name"], $target_file2);
									$qry2 = $this->db->query("UPDATE color_details SET img2='$target_file2' WHERE product_id = '$productid' and color_id = '$color' "); 
								}

						}
						else{

							if(isset($_FILES["a".$x]["name"])){
								$ext1 = pathinfo($_FILES["a".$x]["name"], PATHINFO_EXTENSION); //get extension
								$target_file1 = $target_dir . $productid .$color. '_1'. '.' .$ext1; //target file name
								move_uploaded_file($_FILES["a".$x]["tmp_name"], $target_file1);
							}
							if(isset($_FILES["b".$x]["name"])){
								$ext2 = pathinfo($_FILES["b".$x]["name"], PATHINFO_EXTENSION); //get extension
								$target_file2 = $target_dir . $productid .$color. '_2'. '.' .$ext2; //target file name
								move_uploaded_file($_FILES["b".$x]["tmp_name"], $target_file2);
							}
							$qry1 = $this->db->query("INSERT INTO color_details(product_id, color_id, img1, img2) VALUES ('$productid','$color','$target_file1','$target_file2')"); 
						}	  
			  }

			$color='';
			for ($x = 0; $x < $colorlen; $x++) {
					
				$color .=  " color_id != '".$_POST["c".$x]."' ";
				if($x!=$colorlen-1){
					$color .= "and";
				}	
				
			}

			$result=$this->db->query("SELECT * FROM color_details WHERE product_id = '$productid' and $color ");
			if ($result->num_rows > 0) 
			{
				while($row = $result->fetch_assoc()) {
					$var = $row["colordetail_id"];
					$result1=$this->db->query("DELETE FROM color_details WHERE colordetail_id = '$var'");
				}
			}

			//size
			$result2=$this->db->query("DELETE FROM size_details WHERE product_id = '$productid'");
			  for ($x = 0; $x < $sizelen; $x++) {
				  $str1 = $_POST["size".$x];
				  $str2 = $_POST["qty".$x];
				  $qry = $this->db->query("INSERT INTO size_details(product_id, size_id,quantity) VALUES ('$productid','$str1','$str2')");
			  }
			 return 1;

	}

	function listsize1()
	{
		extract($_POST);
		$pdtid=$_POST['id'];
		$result1=$this->db->query("SELECT product_id FROM products where p_id='$pdtid'");$row1 = $result1->fetch_array();
		$productid = $row1['product_id'];
		
		$qry3 = $this->db->query("SELECT * FROM product_size where size_status='1'");
		
		$strlol = '';
		while($row = mysqli_fetch_array($qry3)) {
			$strlol .= '<option value="'.$row["size_id"].'">'.$row["size"].'</option>';
		}
		
		$qry2 = $this->db->query("SELECT * FROM size_details where product_id='$productid'");
		$main='';

		if ($qry2->num_rows > 0) 
		{
			$i = 0; 
			while($row2 = $qry2->fetch_assoc()) 
			{	
				$str1='';
				$str2='';
				$str3 = '';
						
				$str1 .= '<div class="input-group"> 
				<div class="input__group mb-25 ms-3 w-25"> 
					<label for="select2Multiple">Product Size</label> 
					<select class="form-control psize pdts" data-sizeid='.$row2['size_id'].' id="productSize'.$i.'" name="size'.$i.'"> ';

				$str3 = '</select> 
					</div> 
					<div class="input__group mb-25 ms-3 w-25"> 
						<label for="exampleInputEmail1">Quantity</label> 
						<input type="number" value="'.$row2['quantity'].'" class="form-control qty pdtqty" id="qty'.$i.'" name="qty'.$i.'" min="0"> 
					</div>
					<div id="btn_close" class="input__button"> 
						<button type="button" id="clsbtn" onclick="remSize(this)" class="btn-close btn-danger" aria-label="Close"></button>
					</div> 
				</div>';
				
			$main .= $str1.$strlol.$str3;
			$i++;
			}
		}
		return $main;
	}


	function listcolor1()
	{
		extract($_POST);
		$pdtid=$_POST['id'];
		$result1=$this->db->query("SELECT product_id FROM products where p_id='$pdtid'");$row1 = $result1->fetch_array();
		$productid = $row1['product_id'];

		$qry3 = $this->db->query("SELECT * FROM product_color where color_status='1'");
		$strlol = '';
		while($row = mysqli_fetch_array($qry3)) {
			$strlol .= '<option value="'.$row["color_id"].'">'.$row["color"].'</option>';
		}
		
		$qry2 = $this->db->query("SELECT * FROM color_details where product_id='$productid'");
		$main='';
		$str1='';
		// $str2 = '';
		// $str3 = '';
		
		if ($qry2->num_rows > 0) 
		{
			
			$j = 0; 
			while($row2 = $qry2->fetch_assoc()) 
			{	
						
				 $str1 .= '<div class="input-group"> 
                                <div class="input__group mb-25 ms-3" > 
                                    <label for="select2Multiple">Product Color</label> 
                                    <select class="form-control pc1" data-sizeid='.$row2['color_id'].' id="productColor'.$j.'" name="color'.$j.'"> 
                                        '.$strlol.'
                                    </select> 
                                </div> 
                                <div class="input__group mb-25 ms-1"> 
                                    <label for="exampleInputEmail1">Image 1</label> 
                                    <input type="file" class="form-control form-control-sm putImage1 im1"  name="a'.$j.'" id="a'.$j.'" > 
                                    <div class="col-md-4 grey">
									<img class="img-thumbnail"  src="'.$row2["img1"].'" id="target1"/> 
									</div>
                                </div> 
                                <div class="input__group w-20 mb-25 ms-1"> 
                                    <label for="exampleInputEmail1">Image 2</label> 
                                    <input type="file" class="form-control putImage1 im2"  name="b'.$j.'" id="b'.$j.'"accept="image/*" > 
                                    <div class="col-md-4 grey">
									<img class="img-thumbnail"  src="'.$row2["img2"].'" id="target2"/> 
									</div>
                                </div> 
                                <div id="btn_close" class="input__button m-0"> 
                                    <button type="button" id="clsbtn" onclick="remColor(this)" class="btn-close btn-danger" aria-label="Close"></button>
                                </div> 
                            </div>';
				
			
			$j++;
			}
		}
		return $str1;

	}

	function tableproductssearch()
	{
		extract($_POST);
		
		$str = '%'.$searchstr.'%';
		$result=$this->db->query("SELECT * FROM products where p_name LIKE '$str'");
		$i=1;
		$str = '';
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$sts="";
				$eachcategory="";
				$id=$row["p_id"];
				$cid=$row["cat_id"];
				if($row["product_status"]==1)
					$sts='<span class="status active">Active</span>';
				else
					$sts='<span class="status blocked">Disabled</span>';
				$cat=$this->db->query("SELECT cat_name FROM category where cat_id='$cid'");
				$r=$cat->fetch_array();
				$str = $str .
				'<tr id='.$row["p_id"].' role="row" class="odd">'.
				'<td>' .$i. '</td>'.
				'<td><img src='.$row["product_img1"].' class="img-rounded img-responsive" align="center">'.'</td>'.
					// '<td>' .$row["product_img1"]. '</td>'.
					'<td class="sorting_1">' .$row["p_name"]. '</td>'.
					// '<td>' .$row["cat_id"]. '</td>'.
					'<td>' .$r["cat_name"].'</td>'.
					'<td>' .$row["product_total"]. '</td>'.
					'<td>'.$sts.'</td>'.
					'<td>
						<div class="action__buttons">
							
							<button onclick="fn1('.$id.')" type="button" class="fas fa-pen-to-square btnhere" title="Edit"></button>
							
							<a class="btn-action toggle" title="Toggle">
								<button onclick="fn2('.$id.')" type="button"  class="fas fa-toggle-on" title="Toggle"></button>
							</a>

							<!-- <a class="btn-action delete" title="Delete">
								<i class="fas fa-trash-alt"></i>
							</a> -->
						</div>
					</td>
				</tr>';
				$i++;
			}
		}

		return $str;

	}
	


	function tablecategorysearch()
	{
		extract($_POST);
		$str = '%'.$searchstr.'%';
		$result=$this->db->query("SELECT * FROM category where cat_name LIKE '$str'");
		$str = '';
		$i=1;
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$sts="";
				$id=$row["cat_id"];
				if($row["cat_status"]==1)
					$sts='<span class="status active">Active</span>';
				else
					$sts='<span class="status blocked">Disabled</span>';
				$str = $str .
				'<tr id='.$row["cat_id"].' role="row" class="odd">'.
					'<td>' .$i. '</td>'.
					'<td class="sorting_1">' .$row["cat_name"]. '</td>'.
					'<td>' .$row["cat_desc"]. '</td>'.
					'<td>'.$sts.'</td>'.
					'<td>
						<div class="action__buttons">
							
							<button onclick="fn1('.$id.')" type="button" class="fas fa-pen-to-square btnhere" title="Edit"></button>
							
							<a class="btn-action toggle" title="Toggle">
								<button onclick="fn2('.$id.')" type="button"  class="fas fa-toggle-on" title="Toggle"></button>
							</a>

							<!-- <a class="btn-action delete" title="Delete">
								<i class="fas fa-trash-alt"></i>
							</a> -->
						</div>
					</td>
				</tr>';
				$i++;
			}
		}

		return $str;

	}

	function tablecolorsearch()
	{
	
		extract($_POST);
		$str = '%'.$searchstr.'%';
		$result=$this->db->query("SELECT * FROM product_color where color LIKE '$str'");
		$str = '';
		$i=1;
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$sts="";
				$id=$row["color_id"];
				if($row["color_status"]==1)
					$sts='<span class="status active">Active</span>';
				else
					$sts='<span class="status blocked">Disabled</span>';
	
				$str = $str .
					'<tr id='.$row["color_id"].' role="row" class="odd">'.
						'<td class="sorting_1">' .$i. '</td>'.
						'<td class="sorting_1">' .$row["color"]. '</td>'.
						'<td class="sorting_1" style="-webkit-text-stroke:0.2px black; font-weight: bold;color:'.$row["color_code"].';" >' .$row["color_code"]. '</td>'.
						'<td>'.$sts.'</td>'.
						'<td>
							<div class="action__buttons">
								
								<button onclick="fn1('.$id.')" type="button" class="fas fa-pen-to-square btnhere" title="Edit"></button>
								<a class="btn-action toggle" title="Toggle">
									<button onclick="fn2('.$id.')" type="button"  class="fas fa-toggle-on" title="Toggle"></button>
								</a>
		
							</div>
						</td>
					</tr>';	
					$i++;
			}
		}

		return $str;
	
	}

	function tablesizesearch()
	{
	
		extract($_POST);
		$str = '%'.$searchstr.'%';
		$result=$this->db->query("SELECT * FROM product_size where size LIKE '$str'");
		$str = '';
		$i=1;
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$sts="";
				$id=$row["size_id"];
				if($row["size_status"]==1)
					$sts='<span class="status active">Active</span>';
				else
					$sts='<span class="status blocked">Disabled</span>';
	
				$str = $str .
				'<tr id='.$row["size_id"].' role="row" class="odd">'.
					'<td class="sorting_1">' .$i. '</td>'.
					'<td class="sorting_1">' .$row["size"]. '</td>'.
					'<td>'.$sts.'</td>'.
					'<td>
						<div class="action__buttons">
							
							<button onclick="fn1('.$id.')" type="button" class="fas fa-pen-to-square btnhere" title="Edit"></button>
							<a class="btn-action toggle" title="Toggle">
								<button onclick="fn2('.$id.')" type="button"  class="fas fa-toggle-on" title="Toggle"></button>
							</a>
	
						</div>
					</td>
				</tr>';
				$i++;
			}
		}
		return "$str";
		
	}

	function updatecolorpdt()
	{
		extract($_POST);
		$qry5 = $this->db->query("DELETE FROM color_details WHERE product_id='$productid';");
		$str1='';
		for ($x = 0; $x < $colorlen; $x++) {
			//$s = ;
			$str = $_POST["color".$x];
			$qry1 = $this->db->query("INSERT INTO color_details(product_id, color_id) VALUES ('$productid','$str')");

		}
		$qry5 = $this->db->query("DELETE FROM size_details WHERE product_id='$productid';");
		for ($x = 0; $x < $sizelen; $x++) {
			//$s = ;
			$str1 = $_POST["size".$x];
			$str2 = $_POST["qty".$x];
			$qry = $this->db->query("INSERT INTO size_details(product_id, size_id,quantity) VALUES ('$productid','$str1','$str2')");
			
		}  
		return $str1;
		
	}

	function tablecustomers()
	{
		$result=$this->db->query("SELECT * FROM registration where reg_role=1");
		$str = '';
		$i=1;
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$sts="";
				$id=$row["reg_id"];
				if($row["reg_status"]==1)
					$sts='<span class="status active">Active</span>';
				else
					$sts='<span class="status blocked">Disabled</span>';
				$str = $str .
				'<tr id='.$row["reg_id"].' role="row" class="odd">'.
					'<td>' .$i. '</td>'.
					//'<td>' .$row["reg_email"]. '</td>'.
					'<td class="sorting_1">' .$row["reg_name"]. '</td>'.
					'<td>' .$row["reg_email"]. '</td>'.
					'<td>'.$sts.'</td>'.
					'<td>
						<div class="action__buttons">
							
							<button onclick="fn1('.$id.')" type="button" class="fas fa-pen-to-square btnhere" title="View"></button>
							
							<a class="btn-action toggle" title="Toggle">
								<button onclick="fn2('.$id.')" type="button"  class="fas fa-toggle-on" title="Toggle"></button>
							</a>

							<!-- <a class="btn-action delete" title="Delete">
								<i class="fas fa-trash-alt"></i>
							</a> -->
						</div>
					</td>
				</tr>';
				$i++;
			}
		}

		return $str;

	}


function custview()
{

	$custid=$_POST['id'];
	$qry = $this->db->query("SELECT * FROM registration where reg_id='$custid'");
	$str = '';
	if ($qry->num_rows > 0) 
	{
		while($row = $qry->fetch_assoc()) 
		{
			$str=$row["reg_name"]."#".$row["reg_email"]."#".$row["reg_mob"]."#".$row["reg_addr"]."#".$row["reg_state"]."#".$row["reg_district"]."#".$row["reg_city"]."#".$row["reg_pin"];

		}
	}
	return $str;

}


function custstatus()
{
		$custid=$_POST['custid'];
		$qry = $this->db->query("SELECT * FROM registration where reg_id='$custid'");
		$res = $qry->fetch_array()[11];
		$res = trim($res);
		if($res==1){
			$qry2 = $this->db->query("UPDATE registration SET reg_status=2 WHERE reg_id='$custid'");
		}
		else if($res==2){
			 $qry2 = $this->db->query("UPDATE registration SET reg_status=1 WHERE reg_id='$custid'");
		}
		return $qry2;


}


function tablecustomersearch()
{
	extract($_POST);
	$i=1;
	$str = '%'.$searchstr.'%';
	$result=$this->db->query("SELECT * FROM registration where reg_name LIKE '$str'");
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$sts="";
			$id=$row["reg_id"];
			if($row["reg_status"]==1)
				$sts='<span class="status active">Active</span>';
			else
				$sts='<span class="status blocked">Disabled</span>';
			$str = $str .
			'<tr id='.$row["reg_id"].' role="row" class="odd">'.
				'<td>' .$i. '</td>'.
				'<td class="sorting_1">' .$row["reg_name"]. '</td>'.
				'<td>' .$row["reg_email"]. '</td>'.
				'<td>'.$sts.'</td>'.
				'<td>
					<div class="action__buttons">
						
						<button onclick="fn1('.$id.')" type="button" class="fas fa-pen-to-square btnhere" title="View"></button>
						
						<a class="btn-action toggle" title="Toggle">
							<button onclick="fn2('.$id.')" type="button"  class="fas fa-toggle-on" title="Toggle"></button>
						</a>

						<!-- <a class="btn-action delete" title="Delete">
							<i class="fas fa-trash-alt"></i>
						</a> -->
					</div>
				</td>
			</tr>';
			$i++;
		}
	}

	return $str;

}




function checkCatName()
{
	
	extract($_POST);
	$searchstr=$_POST["categoryname"];
	$str = $searchstr.'%';
	$result=$this->db->query("SELECT * FROM category where cat_name LIKE '$str'");
	if ($result->num_rows > 0) 
	{
		$rs=1;
	}
	return $rs;

}

function availcheck(){
	extract($_POST);
	if(isset($value)) {

		$result=$this->db->query("SELECT * FROM $tname WHERE $cname = '".$value."'");

		if ($result->num_rows > 0) {
			return "1";
		}
		else{
			return "2";
		}
	}
}

function addcoupon(){
	extract($_POST);
	if(empty($coupon_code) || empty($amount) || empty($min_expenses) || empty($expire_date)){
		return 2;
		
	}
	else if($amount > $min_expenses)
	{
	return 3;
	
}
else{
		$result=$this->db->query("INSERT INTO coupon( couponcode,amount, minexpense, expiredate,status) VALUES ('$coupon_code','$amount','$min_expenses','$expire_date','1')");

		return $result;
	}
	
}

function editcoupon(){
	extract($_POST);
	if(empty($coupon_code) || empty($amount) || empty($min_expenses) || empty($expire_date)){
		return 2;
		
	}
	else if($amount > $min_expenses)
	{
	return 3;
	
}else{
		$result=$this->db->query("UPDATE coupon SET couponcode = '$coupon_code',amount = '$amount', minexpense = '$min_expenses', expiredate = '$expire_date',status = '1' WHERE id = '$id'");
		return $result;
	}
	
}

function couponlist(){
	$result=$this->db->query("SELECT * FROM coupon");
	$str = '';
	$i=1;
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$sts="";
			$id=$row["id"];

			$date_now = date("Y-m-d"); // this format is string comparable

			if ($date_now < $row["expiredate"] && $row["status"]==1) {
				$sts='<span class="status active">Valid</span>';
			}else{
				$sts='<span class="status blocked">Expired</span>';
			}


			// if($row["status"]==1)
			// 	$sts='<span class="status active">Valid</span>';
			// else
			// 	$sts='<span class="status blocked">Expired</span>';
			$str = $str .
				'<tr role="row" class="odd">
					<td>'.$i.'</td>
					<td class="sorting_1">'.$row["couponcode"].'</td>
					<td>'.$row["amount"].'</td>
					<td>'.$row["minexpense"].'</td>
					<td>'.$row["expiredate"].'</td>
					<td>'.$sts.'</td>
					<td>
						<div class="action__buttons">
							<a href="couponsEdit.php?id='.$id.'" class="btn-action">
								<i class="fa-solid fa-pen-to-square"></i>
							</a>
							
						</div>
					</td>
				</tr>';
			$i++;
		}
	}

	return $str;
}

function orderchangestatus(){ 
	extract($_POST);
	$result=$this->db->query("UPDATE cart SET status = '$value'  WHERE id = '$id'");
	return $result;	
}
function tablereviews()
{ 
	$result=$this->db->query("SELECT * FROM review");
	
		$str = '';
		$i=1;
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$sts="";
				$id=$row["id"];
				if($row["review_status"]==1)
					$sts='<span class="status active">Active</span>';
				else
					$sts='<span class="status blocked">Disabled</span>';
				include 'db_connect.php';
				$uid = $row["userid"];
				
				$qry1 = $conn->query("SELECT * FROM registration WHERE reg_id = '$uid'");
				$row1 = $qry1->fetch_assoc();
				$name = $row1["reg_name"];
				$email = $row1["reg_email"];
				$revtitle=$row["title"];
				$revdesc=$row["ratingdesc"];
				$revscore=$row["ratingscore"];

				$str .= 
				'<tr id='.$row["id"].' role="row" class="odd">'.
					 '<td>' .$i. '</td>'.
					 '<td class="sorting_1">' .$name. '</td>'.
					'<td>' .$email. '</td>'.
					
					'<td>' .$revtitle. '</td>'.
					'<td>' .$revdesc. '</td>'.
					'<td>' .$revscore. '</td>'.
					'<td>' .$sts. '</td>'.
					
					'<td>
						<div class="action__buttons">
							<a class="btn-action toggle" title="Toggle">
								<button onclick="fn2('.$id.')" type="button"  class="fas fa-toggle-on" title="Toggle"></button>
							</a>
						</div>
					</td>
				</tr>';
				$i++;
			}
		}

		return $str;

}


function reviewstatus()
	{   
		$reviewid=$_POST['reviewid'];
		
		$qry = $this->db->query("SELECT * FROM review where id='$reviewid'");

		$res = $qry->fetch_array()[7];
		
		if($res==1){
			$qry2 = $this->db->query("UPDATE review SET review_status=2 WHERE id='$reviewid'");
		}
		else if($res==2){
			$qry2 = $this->db->query("UPDATE review SET review_status=1 WHERE id='$reviewid'");
		}
		return $qry2;

		
	}


	function availcouponcheck()
	{   
		extract($_POST);
		if(isset($value)) 
		{

			$result=$this->db->query("SELECT * FROM $tname WHERE $cname = '".$value."'");

			if ($result->num_rows > 0) {
				return "1";
			}
			else{
				return "2";
			}
	}


	}



	
}
?>
	
