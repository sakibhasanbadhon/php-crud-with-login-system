<?php
    include('include/header.php');


    if (isset($_GET['editId'])) {

        $id = $_GET['editId'];

        
    
    }



    $text = '';
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		
		$blog_title = $db->validate($_POST['blog_title']);
		$sub_title = $db->validate($_POST['sub_title']);
		$textarea = $db->validate($_POST['textarea']);
		


		$img_name = $_FILES['img']['name'];
		$img_tname = $_FILES['img']['tmp_name'];
		$img_size = $_FILES['img']['size'];

        $name = rand(1213145,5681498);
        $ext = strtolower(substr(strrchr($img_name, '.'), 1)); //Get extension
        $img_name = $name . '.' . $ext;


	if (empty($blog_title)||empty($sub_title)||empty($textarea)||empty($img_name)){
	
        $text = "<p style='background-color: #008000d1;width:200px' class='p-2 px-3 text-white d-blog w-100'> empty not allow </p>";

	

}
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
            $text = "<p style='background-color: #008000d1;width:200px' class='p-2 px-3 text-white d-blog w-100'> Blog edit Successful </p>";

	        echo "<script> window.location='index.php'; </script>";	

	    }else{
	        echo "insert fail";
	    }



	}

}



 ?>


<form action="" method="POST" enctype="multipart/form-data">

<?php 

$qr = "select * from post where id='$id'";

$res = $db->read($qr);

if ($res) {
	
	$a = $res->fetch_assoc();


}


?>




<div class="card  py-2 my-3">
    <div class="card-header">
        <h4 class="card-title mb-0 d-flex justify-content-between"> <strong> Blog Update</strong> 
            <a href="index.php" class="btn btn-sm btn-outline-primary"> Blog List</a>
        </h4>
    </div>
    <div class="card-body">
    <div> <?php echo $text; ?></div>  <!--  show alert message -->
        <form method="POST" enctype="multipart/form-data">

            <div class="row">
                <div class="col-sm-8">
                    <div class="mb-3 py-2">
                        <strong><label for="blog-title" class="form-label">Blog Title</label></strong>
                        <input type="text" value="<?php echo $a['blog_title']?>" name="blog_title" class="form-control p-3" id="blog-title" >
                    </div>


                    <div class="mb-3 py-2">
                        <strong><label for="sub-title" class="form-label">Blog sub title</label></strong>
                        <input type="text" value="<?php echo $a['sub_title']?>" name="sub_title" class="form-control p-3" id="sub-title">
                    </div>

                    <div class="form-outline mb-3 py-2">
                        <strong><label class="form-label" for="textAreaExample">Description</label></strong>
                        <textarea class="form-control" value="" name="textarea" id="textAreaExample1" rows="6"> <?php echo $a['textarea']?> </textarea>                        
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="md-3 py-2">
                        <strong><label for="phone_no" class="form-label">Blog Image</label></strong>
                        <input type="file" name="img" oninput="pic.src=window.URL.createObjectURL(this.files[0])" class="form-control p-3" id="phone">
                    </div>

                    <img src="public/img/<?php echo $a['img']?>" id="pic">

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