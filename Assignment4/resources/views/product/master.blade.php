<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-uA-compatible" content="IE=edge">
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('/css/list_product.css') }}"/>
        <title></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
	<body>
		<div id="first">
            <img src="{{URL::asset('/images/logo.png')}}" alt="profile Pic" id="img1">
            <span id="sp_call">Call Us Today! (02) 9017 8413</span>
            <span>
                <input type="text" name="search" value="Type desired job Location" onFocus="this.value=''" id="txt">
                <img src="{{URL::asset('/images/top_search.png')}}" id="img_search">
            
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
            <span id="txt_create">Create Product</span>
        </div>
        <div id="third">
            <div class="container">
                @yield('content')
            </div> 
        </div>
        <div id="fourth" > 
            <img id="img_next" src="{{URL::asset('/images/review_arrow.png')}}" id="img2">
            <img src="{{URL::asset('/images/icon5.png')}}"  id="img_icon"> 
            <span id="sp_icon">FREE: Men Are From Mars</span>
            <button id="Download" style="float:right;">Download Now</button> 
        </div>
        <div id="fifth">
            <img src="{{URL::asset('/images/logo.png')}}" id="img2">
            <span id="p1">Shortcut your search to happiness right now. Live
            </span>
            <span id="a1">a life without regrets and take action today!</span>
            <span id="sp2"><i>Call Us Today! (02) 9017 8413</i></span>
            <button id="b1">Book an Appointment<img src="{{URL::asset('/images/icon7.png')}}" id="img3"></button>
            <button id="b2">Contact a Consultant<img src="{{URL::asset('/images/icon6.png')}}" id="img4"></button>
            <span id="c">CONTACT INFO </span>        
            <span id="p"> RECENT POSTS</span>          
            <span id="t">RECENT TWEETS</span>
            <span id="sp3">4/220 George St, Sydney NSW 2000</span>
            <span id="sp4">Phone: (02) 9017 8413</span>
            <span id="sp5">Email:</span>
            <span id="sp6">info@syd.vitalpartners.com.au</span>
            <span id="sp7">Canberra City Act 2600</span>
            <span id="sp8">Phone: (02) 9017 8426</span>
            <span id="sp9">Email:</span>
            <span id="sp10">can@syd.vitalpartners.com.au</span>
            <img src="{{URL::asset('/images/review_arrow.png')}}" id="img5">
            <a href="#" id="lk1">How to Recover After a Bad Date</a><br>
            <img src="{{URL::asset('/images/review_arrow.png')}}" id="img6">
            <a href="#" id="lk2">Review | Vital Partners Review</a><br>
            <img src="{{URL::asset('/images/review_arrow.png')}}" id="img7">
            <a href="#" id="lk3">Review | Vital Partners Review</a><br>
            <img src="{{URL::asset('/images/review_arrow.png')}}" id="img8">
            <a href="#" id="lk4">Review | Vital Partners Derek <br> and Julie</a><br>
            <img src="{{URL::asset('/images/review_arrow.png')}}" id="img9">
            <a href="#" id="lk5">7 Rules for a Happy Relationship<br> | Vital Partners Dating Sydney</a>
            <img src="{{URL::asset('/images/icon9.png')}}" id="img10">
            <pre id="pre1">Are you being vulnerable to find
        love? via offline dating agency
        Sydney Canberra Vital Partners
        http://t.co/hGCgHEU6If       1 week ago</pre>
                <img src="{{URL::asset('/images/icon9.png')}}" id="img11">
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
            <img src="{{URL::asset('/images/icon10.png')}}" id="img12">
            <img src="{{URL::asset('/images/icon11.png')}}" id="img13">
            <img src="{{URL::asset('/images/icon12.png')}}" id="img14">
            <img src="{{URL::asset('/images/icon13.png')}}" id="img15">
            <img src="{{URL::asset('/images/icon14.png')}}" id="img16">
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