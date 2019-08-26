<?php
include_once 'dbConfig.php';
if(isset($_POST['update']))
{   
  $image = $_FILES['image']['tmp_name'];
  $imgContent = addslashes(file_get_contents($image));
  if($imgContent!="")
  {
    $name=$_POST['name'];
    $PID=$_POST['PID'];
    $price=$_POST['price'];
    #$category=$_POST['category'];
    $category=$_POST['category'];
    $s= mysqli_query($db, "SELECT * FROM categories where C_name='$category'");
    $row = mysqli_num_rows($s);
    while ($row = mysqli_fetch_array($s)){
      $CID=$row['ID'];
    }
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    $result = mysqli_query($db, "UPDATE products SET name='$name',price=$price,CID=$CID,image='$imgContent' WHERE PID=$PID");
         session_start();
    if($result)
      {
        $_SESSION['edit']="";

        //redirectig to the display page. In our case, it is index.php
        header("Location: list_product.php");
      }
	}
  else
  {
    $name=$_POST['name'];
    $PID=$_POST['PID'];
    $price=$_POST['price'];
        #$category=$_POST['category'];
    $category=$_POST['category'];
    $s= mysqli_query($db, "SELECT * FROM categories where C_name='$category'");
    $row = mysqli_num_rows($s);
    while ($row = mysqli_fetch_array($s)){
    $CID=$row['ID'];
    } 
    $result = mysqli_query($db, "UPDATE products SET name='$name',price=$price,CID='$CID' WHERE PID=$PID");
    session_start();
    if($result)
    {
      $_SESSION['edit']="";

        //redirectig to the display page. In our case, it is index.php
      header("Location: list_product.php");
    }
        //redirectig to the display page. In our case, it is index.php
        
  }
}
?>
<?php
include_once("dbConfig.php");
//getting id from url
$PID = trim($_GET['PID']);
 
//selecting data associated with this particular id
$result = mysqli_query($db, "SELECT * FROM products WHERE PID=$PID");
 
while($res = mysqli_fetch_array($result))
{
    $name = $res['name'];
    $price=$res['price'];
    $category=$res['category'];
    $image=$res['image'];
}
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="add_product.css">
  <script type="javascript/text"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<!-- bxSlider Javascript file -->
<script src="js/jquery.bxslider.min.js"></script>
<script src="js/script.js" type="text/javascript"></script>
<script src="js/script.js" type="text/javascript"></script>

  <script> 
  function validateform()
   {var fileInput = document.getElementById('image');
    var filePath = fileInput.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    var name=document.getElementById("txt_name").value;
    var price=document.getElementById("txt_price").value;
    var regex = /^[A-Za-z]+$/;
    var preg=/^[0-9]+$/
    if(name==null || name=="")
    {
        alert("Please enter Product name");
        return false;
    }
     if(!regex.test(name)) 
    {
        alert("Product name must be in alphabets");
        return false;
    }
    
    
    if(price==null || price=="") 
    {
      alert("Please enter Product price");
      return false;
    }
    if(!preg.test(price)) 
    {
      alert("Please enter Product price in digits");
      return false;
    }
    if(filePath=="" || filePath==null)
    {
      return true;
    } 
    else if(!allowedExtensions.exec(filePath))
    {
      alert('Please upload file having extensions .jpeg/.jpg/.png/.gif only.');
      fileInput.value = '';
      return false;
    }
    
    else
    {
      return true;
    }
   }
   </script>
</head>
<body>
  <div id="first">
    <img src="images/logo.png" id="img1">
        <span id="sp_call">Call Us Today! (02) 9017 8413</span>
        <span>
          <input type="text" name="search" value="Type desired job Location" onFocus="this.value=''" id="txt">
          <img src="images/top_search.png" id="img_search">
        
        </span>
        <div id="menu">
          <span id="menus" >
            <a href="#" class="link">Home</a>
            &nbsp;
            <a href="#" class="link" >Dating Blog</a>
            &nbsp;
            <a href="#" class="link">Who We Help</a>
            &nbsp;
            <a href="#" class="link">Why Vital</a>
            &nbsp;
            <a href="#" class="link">Reviews</a>
            &nbsp;
            <a href="#" class="link">Contact Us</a>
        </span>
      </div>
  </div>
  <div id="second">
    <span id="txt_create">Edit Product</span>
  </div>
  <div id="third">
    <form method="POST" action="edit_product.php" name="myform" enctype="multipart/form-data">  
      <div id="content" >
        <label id="lbl_product_name">Product Name</label>
        <input type="text" name="name" id="txt_name" value="<?php echo $name;?>">
        <label id="lbl_product_price">Product Price</label>
        <input type="text" name="price" id="txt_price" value="<?php echo $price;?>">
        <label id="lbl_upload">Upload Image</label>
        <div id="up_div">
          <input type="file" placeholder="Choose File" id="image" name="image"> 
        </div>   
        <input type="submit" name="update" value="Update" style="background-color: #ace600; height: 60px; width: 200px; margin-left: 272px;
          margin-top: 416px; border-radius: 5px; color: white" onclick="return validateform()" > 
      </div>

      <label id="select">Select Category</label>
      <select name="category" class="select_category" id="cate" value="<?php echo $category;?>">
           
        <?php
          $sql = mysqli_query($db, "SELECT C_name From categories");
          $row = mysqli_num_rows($sql);
          while ($row = mysqli_fetch_array($sql)){
          echo "<option value='". $row['C_name'] ."'>" .$row['C_name'] ."</option>" ;
          }
        ?>
              
      </select>
        <span class="select"></span> 
        <hr id="line"  style="border: 1px solid #cacbcd" color="#cacbcd" size="6" >
        <input type="hidden" name="PID" value=<?php echo $_GET['PID'];?>>
          
    </div>
  </form>
  <!-- </div> -->
  <div id="fourth" > 
    <img id="img_next" src="images/review_arrow.png" id="img2">
    <img src="images/icon5.png"  id="img_icon"> 
    <span id="sp_icon">FREE: Men Are From Mars</span>
    <button id="Download" style="float:right;">Download Now</button> 
  </div>
  <div id="fifth">
    <img src="images/logo.png" id="img2">
    <pre id="p1">Shortcut your search to happiness right now. Live
  a life without regrets and take action today!</pre>
    <span id="sp2"><i>Call Us Today! (02) 9017 8413</i></span>
    <button id="b1">Book an Appointment<img src="images/icon7.png" id="img3"></button>
    <button id="b2">Contact a Consultant<img src="images/icon6.png" id="img4"></button>
    <pre id="social">CONTACT INFO         RECENT POSTS           RECENT TWEETS</pre>
    <span id="sp3">4/220 George St, Sydney NSW 2000</span>
    <span id="sp4">Phone: (02) 9017 8413</span>
    <span id="sp5">Email:</span>
    <span id="sp6">info@syd.vitalpartners.com.au</span>
    <span id="sp7">Canberra City Act 2600</span>
    <span id="sp8">Phone: (02) 9017 8426</span>
    <span id="sp9">Email:</span>
    <span id="sp10">can@syd.vitalpartners.com.au</span>
    <img src="images/review_arrow.png" id="img5">
    <a href="#" id="lk1">How to Recover After a Bad Date</a><br>
    <img src="images/review_arrow.png" id="img6">
    <a href="#" id="lk2">Review | Vital Partners Review</a><br>
    <img src="images/review_arrow.png" id="img7">
    <a href="#" id="lk3">Review | Vital Partners Review</a><br>
    <img src="images/review_arrow.png" id="img8">
    <a href="#" id="lk4">Review | Vital Partners Derek <br> and Julie</a><br>
    <img src="images/review_arrow.png" id="img9">
    <a href="#" id="lk5">7 Rules for a Happy Relationship<br> | Vital Partners Dating Sydney</a>
    <img src="images/icon9.png" id="img10">
    <pre id="pre1">Are you being vulnerable to find
love? via offline dating agency
Sydney Canberra Vital Partners
http://t.co/hGCgHEU6If       1 week ago</pre>
    <img src="images/icon9.png" id="img11">
    <pre id="pre2">Are you being vulnerable to find
love? via offline dating agency 
Sydney Canberra Vital Partners
http://t.co/hGCgHEU6If       2 week ago  
    </pre>
  </div>
  <div id="sixth">
    <span id="sp11">&copy;</span><span id="sp12">VitalPartners.com.au </span>
    <div id="menu1">
      <span id="menus1" >
        <a href="#" class="links">Contact  |    </a>
            &nbsp;
        <a href="#" class="links" >Terms of Use |</a>
            &nbsp;
        <a href="#" class="links">Privacy Policy |</a>
        &nbsp;
        <a href="#" class="links">Disclaimer</a>
      </span>
    </div>
    <span id="sp13">FOLLOW US:</span>
    <img src="images/icon10.png" id="img12">
    <img src="images/icon11.png" id="img13">
    <img src="images/icon12.png" id="img14">
    <img src="images/icon13.png" id="img15">
    <img src="images/icon14.png" id="img16">
  </div>
  <div id="seventh">
    <div id="menu2">
      <span id="menus2" >
        <a href="#" class="linkss">Who Designed This Site?</a>
            &nbsp;
            &nbsp;
            &nbsp;
        <a href="#" class="linkss" >Who Built This Site?</a>
      </span>
    </div>
  </div>
</body>
</html>
