<?php
include_once 'dbConfig.php';
if (isset($_POST['submit'])) {
    $cname = $_POST['category'];
    if (empty($cname)) {
        $msg = "Please enter category";
    } else if (!preg_match("/^[a-zA-Z( )]*$/", $user)) {
        $msg = "Category name must be in alphabets";
    } else {
        $cname = $_POST['category'];
        $sql = "INSERT INTO categories (C_name)
    VALUES ('$cname')";
        session_start();

        if ($db->query($sql) === true) {
            $_SESSION['success'] = "";
            header("Location: list_category.php");
        } else {
            $_SESSION['error'] = "";
            echo "Error: " . $sql . "<br>" . $db->error;
        }
        $db->close();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="add_category.css">
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
<div id="third">
  <form method="POST" >
    <div id="content" >
      <label id="lbl_category">Category Name</label>
      <input type="text" name="category" id="txt_category">
      <span id="p_fail">
               <?php
if (isset($msg)) {
    echo $msg;
}
?>
      </span>
      <hr id="line" width="740" style="border: 1px solid #cacbcd" color="#cacbcd" size="6" >
      <input type="submit" value="Submit I>" style="background-color: #ace600; height: 60px; width: 200px; margin-left: 283px; margin-top: 134px; border-radius: 5px; color: white" name="submit" >
    </div>
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
