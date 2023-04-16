<?php
    include('include/header.php');


    if (isset($_GET['editId'])) {

        $id = $_GET['editId'];

        
    
    }




	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		
		$blog_title = $db->validate($_POST['blog_title']);
		$sub_title = $db->validate($_POST['sub_title']);
		$textarea = $db->validate($_POST['textarea']);
		


		$img_name = $_FILES['img']['name'];
		$img_tname = $_FILES['img']['tmp_name'];
		$img_size = $_FILES['img']['size'];

		$permit = array("jpg","jpeg","png");
		$x = explode('.', $img_name);
		$x = strtolower(end($x));


	if (empty($blog_title)||empty($sub_title)||empty($textarea)){
	
		echo "<script> alert('empty Not alowed'); </script>";
	

}else{

if (empty($img_name)) {

 $edit = "UPDATE post
 			SET
                blog_title='$blog_title',
                sub_title='$sub_title',
                textarea='$textarea',
 				img='$img_name',
 				
 				WHERE id='$id'";

 				$result = $db->edit($edit);

	    if ($result) {
	        echo "<script> alert('Update without image'); </script>";
	        echo "<script> window.location='index.php'; </script>";	

	    }else{
	        echo "insert faild";
	    }
	
}else{
	$y = move_uploaded_file($img_tname,"public/img/$img_name");
	if ($y == true) {

		 $edit = "UPDATE post
 			SET
                blog_title='$blog_title',
                sub_title='$sub_title',
                textarea='$textarea',
 				img='$img_name'
 				WHERE id='$id'";

 				$result = $db->edit($edit);

	    if ($result) {
	        echo "<script> alert('Update with img'); </script>";
	        echo "<script> window.location='index.php'; </script>";	

	    }else{
	        echo "insert faild";
	    }



	}

}

	}


	}

 ?>


<form action="" method="POST" enctype="multipart/form-data">

<?php 

// $qr = "select * from post where id='$id'";

// $res = $db->read($qr);

// if ($res) {
	
// 	$a = $res->fetch_assoc();


// }


?>




<div class="card  py-2 my-3">
    <div class="card-header">
        <h4 class="card-title mb-0 d-flex justify-content-between"> <strong> Blog Update</strong> 
            <a href="index.php" class="btn btn-sm btn-outline-primary"> Blog List</a>
        </h4>
    </div>
    <div class="card-body">
        <form method="POST" enctype="multipart/form-data">

            <div class="row">
                <div class="col-sm-8">
                    <div class="mb-3 py-2">
                        <strong><label for="blog-title" class="form-label">Blog Title</label></strong>
                        <input type="text"value="" name="blog_title" class="form-control p-3" id="blog-title" >
                    </div>


                    <div class="mb-3 py-2">
                        <strong><label for="sub-title" class="form-label">Blog sub title</label></strong>
                        <input type="text" value="" name="sub_title" class="form-control p-3" id="sub-title">
                    </div>

                    <div class="form-outline mb-3 py-2">
                        <strong><label class="form-label" for="textAreaExample">Description</label></strong>
                        <textarea class="form-control" value="sakib" name="textarea" id="textAreaExample1" rows="6"> </textarea>                        
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="md-3 py-2">
                        <strong><label for="phone_no" class="form-label">Blog Image</label></strong>
                        <input type="file" name="img" oninput="pic.src=window.URL.createObjectURL(this.files[0])" class="form-control p-3" id="phone">
                    </div>

                    <img src="public/img/" id="pic">

                    <!-- <div class="md-3 py-2">
                        <strong><label for="status" class="form-label"> Status</label></strong>
                        <select class="form-control form-control" name="status" id="status" aria-label="Default select example">
                            <option value="1"> Active </option>
                            <option value="0"> Pending </option>
                        </select>
                    </div> -->

                    <div class="md-3 py-2">
                        <img class="border border-5" src="" alt="">
                    </div>


                </div>
            </div>


            <div class="d-flex justify-content-end mr-3">
                <button type="submit" name="submit" class="btn btn-sm btn-primary">Submit</button>
            </div>

        </form>
    </div>
</div>

<?php
    include('include/footer.php');
?>