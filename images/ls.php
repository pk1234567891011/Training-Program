<?php
include_once "action.php";
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="add_category.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- jQuery library (served from Google) -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<!-- bxSlider Javascript file -->
<script src="js/jquery.bxslider.min.js"></script>
<script src="js/script.js" type="text/javascript"></script>
<script src="validate.jsp" type="text/javascript"></script>
<script type="text/javascript">
  function delete_confirm(){
    if($('.checkbox:checked').length > 0){
        var result = confirm("Are you sure to delete selected users?");
        if(result){
            return true;
        }else{
            return false;
        }
    }else{
        alert('Select at least 1 record to delete.');
        return false;
    }
}
$(document).ready(function(){
    $('#select_all').on('click',function(){
        if(this.checked){
            $('.checkbox').each(function(){
                this.checked = true;
            });
        }else{
             $('.checkbox').each(function(){
                this.checked = false;
            });
        }
    });
  
    $('.checkbox').on('click',function(){
        if($('.checkbox:checked').length == $('.checkbox').length){
            $('#select_all').prop('checked',true);
        }else{
            $('#select_all').prop('checked',false);
        }
    });
});
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
    <span id="txt_create">Create Category</span>
  </div>
<div id="third_form">
  <button id="Create_link"><a href="a_c.php" style="color: white; font-weight: bold; text-decoration: none;font-size: 18px">Create Category</a></button>
  
<?php if(!empty($statusMsg)){ ?>
<div class="alert alert-success"><?php echo $statusMsg; ?></div>
<?php } ?>
  <form name="bulk_action_form" action="" method="post" onSubmit="return delete_confirm();"/>
    <table class="bordered" style="width:100%">

      <thead>
        <tr>
          <th><input type="checkbox" id="select_all" value=""></th>
          <th>NAME</th>
          <th colspan="@">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include_once 'dbConfig.php';
        $query=$db->query("SELECT * FROM categories ORDER BY ID DESC");
        if($query->num_rows>0)
        {
          while ($row=$query->fetch_assoc()) 
          {
            # code...
          
        
        ?>
        <tr>
          <td align="center"><input type="checkbox" name="checked_id[]" class="checkbox" value="<?php echo $row["ID"]; ?>"/></td>
          <td><?php echo $row["C_name"];?></td>
          <td>
            <div class="square">
              <a href="edit.php?ID = <?php echo $row['ID'];?>" ><img src="images/edit_icon.png" style="margin-left: -4px;
                padding-top: 11px;"></a>
            </div>
            <div class="squares">
              <a href="delete.php?ID= <?php echo $row['ID'];?>" id="btn_edit"><img src="images/delete_icon.png" style="margin-left: -2px;
                padding-top: 13px;"></a>
            </div>
       <!--  <button style="background-color: red ;height: 43px;
width: 32px;"><img src="images/edit_icon.png" style="margin-left: -4px;
padding-top: 6px;"><a href="edit.php?edit= <?php echo $row['ID'];?>" id="btn_edit"></a></button> -->
<!--<button type="submit" name="bulk_delete_submit" value="DELETE" style="background-color: green;
height: 43px;
width: 32px;
">--><!--<img src="images/delete_icon.png" style="margin-left: -4px;
padding-top: 6px;"><a href="delete.php?delete = <?php echo $row['ID'];?>" id="btn_edit"></a></button>-->
          </td>

        </tr>
        <?php }}
        else
        {
          ?>
          <tr><td colspan="2">No records found.</td></tr>
          <?php 
        }

        ?>
      </tbody>

    </table>
   <!-- <input type="submit" name="bulk_delete_submit" value="DELETE">-->
     <span id="del"><input type="submit" name="bulk_delete_submit" value="DELETE" id="btn_del"> </span>
  </form>
  
</div>
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