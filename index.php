<?php
    include('include/header.php');

?>




<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0 d-flex justify-content-between"> <strong> Blog List</strong> 
                    <a href="create.php" class="btn btn-sm btn-outline-primary"> Add New</a>
                </h4>
            </div>

            <div class="card-body">
                <table class="table table-sm table-hover text-center table-striped">
                    <thead class="list-th">
                        <tr>
                            <th> SL </th>
                            <th> Image </th>
                            <th> Blog Title </th>
                            <th> Sub title </th>
                            <th> Description </th>
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tbody id="table-body">

                    

    <?php

        $post = "SELECT * from post order by ID desc";
        $AllPost = $db->read($post);
        $code ='';
        if ($AllPost) {
            while($post = $AllPost->fetch_assoc()){

    ?>

        <tr class="pt-2">
            <td> <?php echo $post['id'] ?>  </td>
            <td> <img width="80" height="80" src="public/img/<?php echo $post['img'] ?>" alt="a">  </td>
            <td> <?php echo $post['blog_title'] ?>  </td>
            <td> <?php echo $post['sub_title'] ?>  </td>
            <td> <?php echo $post['textarea'] ?>  </td>
            <td>
                <a href="edit.php?editId=<?php echo $post['id']; ?>" class="btn btn-info btn-sm"> <i class="fa fa-edit"></i> </a>
                <a href="delete.php?deleteId=<?php echo $post['id']; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"> </i></a>
            </td>
        </tr>

        <?php
        
            }
        }
        
        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

 



<script>

   
</script>



<?php
    include('include/footer.php');
?>