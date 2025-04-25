<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Blog</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Blogging</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="form">Contact</a>
        </li>
      </ul>
      <form class="d-flex">
        <button class="btn btn-outline-success"><a href="http://localhost/mgmts/admin" style="text-decoration:none;color:white;">Login</a></button>
      </form>
    </div>
  </div>
</nav>
<br/><br/>
  <div class="container">
  <!-- Stack the columns on mobile by making one full-width and the other half-width -->
  <div class="row">
    <div class="col-md-8">
      
    @foreach($products as $product)
        <div class="card mb-3">
          <img src="https://cdn.pixabay.com/photo/2016/01/19/17/29/earth-1149733_1280.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">{{$product->title}}</h5>
            <p class="card-text">{{$product->body}}</p>
            <p class="card-text"><small class="text-muted">Last updated {{$product->created_at}}</small></p>
          </div>
        </div>
      
        @endforeach
       
      
    </div>
    <div class="col-12 col-md-4">
      
      <div class="card">
        <div class="card-body">
          <h5>A propos de l'auteur</h5>
          <hr/>
          <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cupiditate amet ullam excepturi odio impedit saepe nemo repellendus, aut suscipit voluptas omnis quas quisquam accusamus illo laboriosam rerum, totam ea eaque.</p>
        </div>
      </div>
       <br/>
      <div class="card">
        <div class="card-body">
          <h5>Les formations</h5>
          <hr/>
          <button type="button" class="btn btn-light">Payantes</button>
          <button type="button" class="btn btn-dark">Gratuites</button>
        </div>
      </div>
      
      <br/>
      <div class="card">
        <div class="card-body">
          <h5>Présentation</h5>
          <hr/>
          <div class="ratio ratio-16x9">
  <iframe src="https://www.youtube.com/embed/ZEyAs3NWH4A" title="YouTube video" allowfullscreen></iframe>
</div>
        </div>
      </div>
           
    </div>
  </div>
</body>
</html>

<!----------------------------------------------Footer----------------------------->

<footer style="width:100%;">
        <div class="footer-top">
            <div class="container">
                <div class="footer-day-time">
                    <div class="row">
                        <div class="col-md-8">
                            <ul>
                                <li>Opening Hours: Mon - Friday: 8AM - 5PM</li>
                                <li>Sunday: 8:00 AM - 12:00 PM</li>
                            </ul>
                        </div>
                        <div class="col-lg-4">
                            <div class="phone-no">
                                <a href="tel:+12 34 56 78 90"><i class="fa fa-mobile" aria-hidden="true"></i>Call +12 34 56 78 90</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        
                        <h4>About us</h4>
                        <p>Lorem Ipsum ist einfach Dummy-Text der Druck- und Satzindustrie. Lorem Ipsum war der Standard der Branche Lorem Ipsum ist einfach Dummy-Text der Druck- und Satzindustrie. Lorem Ipsum war der Standard der Branche  </p>

                    </div>

                    <div class="col-md-4">
                        <h4>Information</h4>
                        <ul class="address1">
                            <li><i class="fa fa-map-marker"></i>Lorem Ipsum 132 xyz Lorem Ipsum</li>
                            <li><i class="fa fa-envelope"></i><a href="mailto:#">info@test.com</a></li>
                            <li><i class="fa fa-mobile" aria-hidden="true"></i> <a href="tel:12 34 56 78 90">12 34 56 78 90</a></li>
                        </ul>
                    </div>

                    <div class="col-md-4">
                        <h4>Follow us</h4>
                        <ul class="social-icon">
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-sm-5">
                        <p class="copyright text-uppercase">Copyright © 2018
                        </p>
                    </div>
                    <div class="col-sm-7">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Our services</a></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

<style>
  footer {
    color: #fff;
}
ul {
    padding: 0px;
}
ol, ul {
    margin-bottom: 0px;
}

.social-icon {
    padding: 0;
    margin-bottom: 0px;
        float: right;
}

.social-icon li {
    list-style: none;
    display: inline-block;
}
.social-icon li i {
    font-size: 14px;
    color: #262725;
    border: solid 2px #ffffff;
    height: 31px;
    width: 31px;
    text-align: center;
    vertical-align: middle;
    border-radius: 100px;
    line-height: 27px;
    margin-right: 15px;
    transition: 1s;
    background: #fff;
}
.social-icon li i:hover {
    border: solid 2px #262725;
    color: #ffffff;
    background: #262725;
}

.phone-no i {
    position: relative;
    margin-right: 14px;
    font-size: 43px;
    top: 5px;
}
.phone-no {
    margin-top: -22px;
    text-align: right;
}
.footer-day-time {
    padding-bottom: 30px;
    border-bottom: 2px solid #7a6f6f;
    padding-top: 14px;
    margin-bottom: 55px;
}
.footer-day-time ul li {
    display: inline;
    margin-right: 20px;
}
.footer-day-time ul li:last-child {
    margin-right: 0px;
}
.phone-no a {
    color: #fff;
    font-family: PlayfairDisplay-Black;
    font-size: 34px;
    font-weight: bold;
}
.footer-top {
    background: #2f2f2f;
    padding:50px 0 50px;
}
.footer-top h4 {
    font-size: 19px;
    text-transform: uppercase;
    margin-bottom: 30px;
}
.footer-top p {
    font-size: 13px;
    line-height: 2;
}

footer p {
  margin-bottom:0;
}
.footer-logo {
    display: block;
    margin-bottom: 32px;
}
.address1 li {
    list-style: none;
    position: relative;
    padding: 0px 0 14px 34px;
    line-height: 26px;
}
ul.address1 span {
    position: absolute;
    width: 40px;
    max-width: 40px;
    left: 0;
}
.address1 li a {
    color: #fff;
    text-decoration: none;
}
ul.address1 i {
    width: 20px;
    position: absolute;
    left: 0px;
    text-align: center;
    font-size: 28px;
    top: 0;
}

ul.address1 i.fa-envelope {
    font-size: 18px;
    top: 4px;
}
footer ul.social-icon {
    float: left;
}
footer .social-icon li i:hover {
    background: #4b8800;
    border-color: #4b8800;
}

.footer-bottom {
    background: #4b8800;
    padding: 10px 0px;
}
.footer-bottom ul li {
    display: inline;
    margin-right: 20px;
    font-size: 18px;
}
.footer-bottom ul li a{
    color:#fff;
}

.footer-bottom ul {
    float: right;
}

.footer-bottom ul li:last-child {
    margin-right: 0;
}
.copyright {
    font-size: 18px;
}
</style>

