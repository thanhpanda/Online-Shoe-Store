 <?php
  $profile = GetInfo($_SESSION["UserInfo"]["Username"]);
  if (isset($_POST["UploadImage"])) {
    // xoa avatar cu
    $filePath = "images/avatar/" . $profile["Avatar"];
    unlink($filePath);

    $profile["Title_KhongDau"] = BoDauTiengViet($profile["Username"]);
    if ($_FILES["image"]["error"] == 0) {
        // có file
        // upload file hinh
        $fileName =  basename($_FILES["image"]["name"]);
        $fileName = explode(".", $fileName);
        $extention =  end($fileName);
        $hinh = "images/avatar/" . $profile["Title_KhongDau"]  . ".{$extention}";
        UploadFile($_FILES["image"], $hinh);
        $profile["Avatar"] =  $profile["Title_KhongDau"]  . ".{$extention}";
    }
    $res =  PutProfile($profile);
  }
  ?>
 <!-- Dark Profile Start -->
 <div class="col-md-12">

   <div class="boxed profile dark">
     <div class="inner">

       <!-- Profile Title Start -->
       <div class="title">
         <h3>My profile</h3>
         <a href="#" class="share-profile">Share this profile</a>
       </div>
       <!-- Profile Title End -->

       <div class="row profile-data">
         <!-- Left Side Start -->
         <div class="col-md-6 text-center">

           <!-- Profile Avatar Start -->
           <div class="profile-avatar">
             <img class="img-circle" src="images/avatar/<?php echo $profile["Avatar"] ?>" alt="Samantha Lenna Wilson" />
           </div>
           <!-- Profile Avatar End -->

           <!-- Send Message Start -->
           <div class="send-msg">
             <form action="" method="POST" enctype="multipart/form-data" class="basic-form">
               <input type="file" name="image">
               <button class="btn btn-sm btn-default" name="UploadImage" type="submit">Upload Avatar</button>
             </form>
           </div>
           <!-- Send Message End -->

         </div>
         <!-- Left Side End -->

         <!-- Right Side Start -->
         <div class="col-md-6">

           <h3><?php echo $profile["Name"] ?></h3>
           <ul class="icon-list">
             <li><i class="fa fa-envelope"></i><?php echo $profile["Email"] ?></li>
             <li><i class="fa fa-building-o"></i><?php echo $profile["Phone"] ?></li>
             <li><i class="fa fa-map-marker"></i><?php echo $profile["Address"] ?></li>
             <li><i class="fa fa-suitcase"></i><?php echo $profile["BOD"] ?></li>
             <li><i class="fa fa-circle"></i><?php if ($profile["Sex"] == 0) echo "Women";  
             else echo "Men"
             ?></li>
           </ul>

         </div>
         <!-- Right Side End -->
       </div>

       <!-- Profile Stats Start -->
       <div class="row">
         <ul class="profile-stats">
           <li class="followers col-md-3 col-lg-3 col-sm-3 col-xs-3">
             <p>1,315</p>
             <h3>Followers</h3>
           </li>
           <li class="following col-md-3 col-lg-3 col-sm-3 col-xs-3">
             <p>218</p>
             <h3>Following</h3>
           </li>
           <li class="projects col-md-3 col-lg-3 col-sm-3 col-xs-3">
             <p>28</p>
             <h3>Projects</h3>
           </li>
           <li class="courses col-md-3 col-lg-3 col-sm-3 col-xs-3">
             <p>39</p>
             <h3>Courses</h3>
           </li>
         </ul>
       </div>
       <!-- Profile Stats End -->

       <!-- Profile About Me Start -->
       <div class="row about-me">
         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
           <h3>About Me</h3>
           <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eget lobortis dui. Quisque congue tellus at sapien vestibulum aliquam. Phasellus in felis congue, lacinia justo id, feugiat urna. Nullam sit amet dolor nec arcu rhoncus condimentum. Pellentesque ut orci velit.</p>
           <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eget lobortis dui. Quisque congue tellus at sapien vestibulum aliquam. Phasellus in felis congue, lacinia justo id, feugiat urna. Nullam sit amet dolor nec arcu rhoncus condimentum. Pellentesque ut orci velit.</p>
         </div>
       </div>
       <!-- Profile About Me End -->

       <!-- Profile Footer Start -->
       <div class="footer">
         <div class="col-lg-5 col-md-12 col-sm-6 col-xs-6">
           <h4>Follow my work at</h4>
         </div>
         <div class="col-lg-7 col-md-12 col-sm-6 col-xs-6">
           <ul class="profile-socials">
             <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
             <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
             <li><a href="#" class="pinterest"><i class="fa fa-pinterest"></i></a></li>
             <li><a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a></li>
             <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
             <li><a href="#" class="dribbble"><i class="fa fa-dribbble"></i></a></li>
           </ul>
         </div>
       </div>
       <!-- Profile Footer End -->

     </div>
   </div>

 </div>
 <!-- Dark Profile End -->