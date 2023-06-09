<?
        $db = mysqli_connect('localhost', 'root', '', 'securaworld');
        $query = "SELECT * FROM category";
        $result = mysqli_query($db, $query);
        if(!$result){
             die(mysqli_error());
             exit();
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Categories</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
   <style>
        .text-font{
            font-size: 35px;
            font-weight: bolder;
        }
        .height{
            height: 100vh   ;
        }
        .error{
                color: red;
                font-size: large;
            
            }
            .success{
                color: green;
                font-size: large;
          
            }
            .error1{
                color: red;
                font-size: large;
            
            }
            .success1{
                color: green;
                font-size: large;
          
            }
            .error2{
                color: red;
                font-size: large;
            
            }
            .success2{
                color: green;
                font-size: large;
          
            }
    </style>
       
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2 bg-dark height">
                <p class="pt-5 pb-5 text-center">
                    <a href="admin-panel.php" class="text-decoration-none"><span class="text-light text-font">Admin</span></a>
                </p>
                <hr class="bg-light ">
                 <p class="pt-2 pb-2 text-center">
                    <a href="admin-profile.php" class="text-decoration-none"><span class="text-light">Profile</span></a>
                </p>
                <hr class="bg-light ">
                 <p class="pt-2 pb-2 text-center">
                    <a href="add-categories.php" class="text-decoration-none"><span class="text-light">Add Categories</span></a>
                </p>
                <hr class="bg-light ">
                 <p class="pt-2 pb-2 text-center">
                    <a href="display-categories.php" class="text-decoration-none"><span class="text-light">Display Categories</span></a>
                </p>
                <hr class="bg-light ">
                <p class="pt-2 pb-2 text-center">
                    <a href="products-add.php" class="text-decoration-none"><span class="text-light">Add Products</span></a>
                </p>
                <hr class="bg-light ">
                <p class="pt-2 pb-2 text-center">
                    <a href="products-display.php" class="text-decoration-none"><span class="text-light">View Products</span></a>
                </p>
                <hr class="bg-light ">
                <p class="pt-2 pb-2 text-center">
                    <a href="new-user-requests.php" class="text-decoration-none"><span class="text-light">New user requests</span></a>
                </p>
                <hr class="bg-light ">
                <p class="pt-2 pb-2 text-center">
                    <a href="view-users.php" class="text-decoration-none"><span class="text-light">View user</span></a>
                </p>                
                <hr class="bg-light ">
            </div>
            <div class="col-sm-10 bg-light">
               <div class="row">
                   <div class="col-sm-2">
                       <p class="text-center pt-5">
                                    <img class="rounded" src="<?php echo ("/test123/profile-pic/") . ($_SESSION['email']) . "display-picture.jpg"; ?>" width="150px" height="140px">
                                </p>
                   </div>
                   <div class="col-sm-8">
                       <h1 class="text-center pt-4 pb-5"><strong>Categories</strong>
                       <hr class="w-25 mx-auto">
                   </div>
                   <div class="col-sm-2">
                       <p class="pt-5 text-center">
                            <a href="logout.php" class="btn btn-outline-primary">Logout</a>
                       </p>
                   </div>
               </div>
                <div class="row ">
                    <div class="col-sm-10">
                        <p class="text-center">
                            <strong>Add categories</strong>
                        </p>
                       
                            <label class="pt-2 pb-4 text-center">Enter a category</label>
                            <input class="form-control" type="text" id="category" name="cate" placeholder="Enter a category">
                            <br>
                            <button class="form-control  btn btn-primary" onclick='cate();'  name="submit">Add a category</button>
                            <div class="error pt-2"></div><div class="pt-2 success"></div>
                       
                        <p class="text-center pt-3">
                            <strong>Add Sub-categories</strong>
                        </p>
                       
                            <label class="pt-2 pb-4 text-center" for="categories">Choose a category</label>
                            <select class="form-control" id="categories" name="categories">
                                <option value="">------</option>
                            <?php while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){ ?>
                                     <option value="<?php echo $row['id'];?>"><?php echo ($row['name']); ?></option>
                             <?php } ?>
                             </select>
                             <br>
                            <label class="pt-1 pb-4 text-center">Enter a sub category</label>
                            <input class="form-control" type="text" id="subcategory" placeholder="Enter a sub category">
                            <br>
                            <input type="button" class="form-control btn btn-primary" onclick="addsubcategory()" value="Add a Sub category" />
                            <div class="error1 pt-2"></div><div class="success1 pt-2"></div>
                       
                    </div>
                    
                    <div class="error2"></div><div class="success2"></div>
                 
                    <script >  
                         function cate(){
                            consolo.log('sdg')
                            var x = $('#category').val();
                           
                            $.ajax({
                                url : 'controller.php',
                                method : 'POST',
                                dataType : "json",
                                data :{ x:x},
                                success : function(response)
                                {
                                    $('.success').html(response.message).show();
                                    $('.error').hide();
                                },
                                error : function(response)
                                {
                                     $('.error').html("Sub category already exist.").show();
                                     $('.success').hide();
                                }
                            });
                            
                        }
                        function addsubcategory(){
                            var x = $('#subcategory').val();
                            var id = $('#categories').val();
                            var input = {
                                "subcategory" : x,
                                "id" : id,
                                "action" : 'addsubcategory'
                            };
                            $.ajax({
                                url : 'controller.php',
                                type : 'POST',
                                dataType : "json",
                                data : input,
                                success : function(response)
                                {
                                    $('.success1').html(response.message).show();
                                    $('.error1').hide();
                                },
                                error : function(response)
                                {
                                     $('.error1').html("Sub category already exist.").show();
                                     $('.success1').hide();
                                }
                            });
                            
                        }
                
                    </script>
                </div>
            </div>
        </div>
    </div>
       
</body>
</html>