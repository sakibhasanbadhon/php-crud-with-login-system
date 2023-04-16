<?php
    include('include/header.php');




if (isset($_POST["submit"])) 
{ 
    $blog_title  = $db->validate($_POST['blog_title']);
    $sub_title   = $db->validate($_POST['sub_title']);
    $textarea = $db->validate($_POST['textarea']);
    


    $img_name = $_FILES['img']['name'];
    $img_tname = $_FILES['img']['tmp_name'];
    $img_size = $_FILES['img']['size'];



	if (empty($blog_title)||empty($sub_title)||empty($textarea)||empty($img_name))
    {
		echo "<script> alert('empty Not alowed'); </script>";
	}
    else{

        if (file_exists($img_name)) {
            $exist = "Sorry, file already exists.";
            $uploadOk = 0;
          }else {
            $y = move_uploaded_file($img_tname,"public/img/$img_name");

            if ($y == true) 
            {
                $x= "INSERT INTO `post`(`blog_title`, `sub_title`, `textarea`, `img`) VALUES ('$blog_title','$sub_title','$textarea','$img_name')";
                $x = $db->insert($x);

                if ($x){
                    echo "<script> alert('Data Save Successfull'); </script>";
                    // echo "<script> log(); </script>";
                }else{
                    echo "insert faild";
                }
            
            }

          }
          
		

	}


}

?>




<div class="card  py-2 my-3">
    <div class="card-header">
        <h4 class="card-title mb-0 d-flex justify-content-between"> <strong> Blog List</strong> 
            <a href="index.php" class="btn btn-sm btn-outline-primary"> Blog List</a>
        </h4>
    </div>
    <div class="card-body">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-sm-8">
                    <div class="mb-3 py-2">
                        <strong><label for="blog-title" class="form-label">Blog Title</label></strong>
                        <input type="text" name="blog_title" class="form-control p-3" id="blog-title" placeholder="White blog title... . .">
                    </div>


                    <div class="mb-3 py-2">
                        <strong><label for="sub-title" class="form-label">Blog sub title</label></strong>
                        <input type="text" name="sub_title" class="form-control p-3" id="sub-title">
                    </div>

                    <div class="form-outline mb-3 py-2">
                        <strong><label class="form-label" for="textAreaExample">Description</label></strong>
                        <textarea class="form-control" name="textarea" id="textAreaExample1" rows="6"></textarea>                        
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="md-3 py-2">
                        <strong><label for="phone_no" class="form-label">Blog Image</label></strong>
                        <input type="file" name="img" oninput="pic.src=window.URL.createObjectURL(this.files[0])" class="form-control p-3" id="phone">
                    </div>

                    <img id="pic">

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