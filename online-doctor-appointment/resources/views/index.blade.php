<!DOCTYPE html>
<html lang="en">
<!--divinectorweb.com-->
<head>
	<meta charset="UTF-8">
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<title>Online Doctor AppointMent</title>
	<!-- All CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('/style1.css')}}" />
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
		<div class="container">
			<a class="navbar-brand" href="#"><span class="text-warning">Health</span>Care</a> <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-bs-target="#navbarSupportedContent" data-bs-toggle="collapse" type="button"><span class="navbar-toggler-icon"></span></button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link" href="#">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#about">About</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#team">Team</a>
					</li>
                    
					{{-- <li class="nav-item">
						<a class="nav-link" href="#contact">Contact</a>
					</li>  --}}
					<li class="nav-item">
						<a class="nav-link" href="{{url('/registration')}}" >Sign-up</a>
					</li> 
					<li class="nav-item">
						<a class="nav-link" href="{{url('/user-login')}}" >Login</a>
					</li> 
				</ul>
			</div>
		</div>
	</nav>
	<div class="carousel slide" data-bs-ride="carousel" id="carouselExampleIndicators">
		<div class="carousel-indicators">
			<button aria-label="Slide 1" class="active" data-bs-slide-to="0" data-bs-target="#carouselExampleIndicators" type="button"></button> <button aria-label="Slide 2" data-bs-slide-to="1" data-bs-target="#carouselExampleIndicators" type="button"></button> <button aria-label="Slide 3" data-bs-slide-to="2" data-bs-target="#carouselExampleIndicators" type="button"></button>
		</div>
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img alt="..." class="d-block w-100" src="img/home-1.jpeg">
				<div class="carousel-caption">
					<h5>Your Most Trusted Health Partnere</h5>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime, nulla, tempore. Deserunt excepturi quas vero.</p>
					<p><a class="btn btn-warning mt-3" href="#">Learn More</a></p>
				</div>
			</div>
			<div class="carousel-item">
				<img alt="..." class="d-block w-100" src="img/home-2.jpeg">
				<div class="carousel-caption">
					<h5>We Are The Best Dotors</h5>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime, nulla, tempore. Deserunt excepturi quas vero.</p>
					<p><a class="btn btn-warning mt-3" href="#">Learn More</a></p>
				</div>
			</div>
			<div class="carousel-item">
				<img alt="..." class="d-block w-100" src="img/home-3.jpg">
				<div class="carousel-caption">
					<h5>Here We Are For Your Care</h5>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime, nulla, tempore. Deserunt excepturi quas vero.</p>
					<p><a class="btn btn-warning mt-3" href="#">Learn More</a></p>
				</div>
			</div>
		</div><button class="carousel-control-prev" data-bs-slide="prev" data-bs-target="#carouselExampleIndicators" type="button"><span aria-hidden="true" class="carousel-control-prev-icon"></span> <span class="visually-hidden">Previous</span></button> <button class="carousel-control-next" data-bs-slide="next" data-bs-target="#carouselExampleIndicators" type="button"><span aria-hidden="true" class="carousel-control-next-icon"></span> <span class="visually-hidden">Next</span></button>
	</div><!-- about section starts -->
	<section class="about section-padding" id="about">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-12 col-12">
					<div class="about-img h-100"><img alt="" class="img-fluid" src="img/about4.jpeg"></div>
				</div>
				<div class="col-lg-8 col-md-12 col-12 ps-lg-5 mt-md-5">
					<div class="about-text">
						<h2 class="text-center">About Us
						</h2>
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam hic nulla harum totam magnam quos, beatae eligendi voluptate voluptates accusamus libero consectetur laboriosam veniam? Quibusdam asperiores ratione possimus neque rem, tempora officiis, quos velit quam laborum nostrum eius veritatis repellat? Veniam maiores officiis ut, ipsam vero laborum provident voluptates culpa dicta assumenda ratione nisi illum qui tempora doloremque nam, odit facilis? Voluptatem nobis accusantium, eveniet sit deserunt molestias nulla tempora harum ipsa recusandae ex rerum ea consectetur, neque excepturi veritatis?</p>
					</div>
				</div>
			</div>
		</div>
	</section><!-- about section Ends -->

	<!-- team starts -->
	<section class="team section-padding" id="team">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-header text-center pb-5">
						<h2>Our Team</h2>
						<p>Lorem ipsum dolor sit amet, consectetur<br>
						adipisicing elit. Non, quo.</p>
					</div>
				</div>
			</div>
			<div class="row">
                @foreach($data as $index => $datas)
				<div class="col-12 col-md-6 col-lg-3 mb-1">
					<div class="card text-center">
						<div class="card-body">
							<img alt="" class="img-fluid rounded-circle" src="../doctor-images/{{$datas->image}}" style="height: 55px;">
							<h3 class="card-title py-2">{{$datas->name}}</h3>
                            <p class="card-text">{{$datas->specialization->title}}</p>
							<p class="card-text">Fee:{{$datas->fees}}</p>
							<p class="card-text">Day:{{$datas->day}}</p>
							<p class="card-text">Time:{{$datas->time}} to {{$datas->totime}}</p>
							
							{{-- <p class="socials"><i class="bi bi-twitter text-dark mx-1"></i> <i class="bi bi-facebook text-dark mx-1"></i> <i class="bi bi-linkedin text-dark mx-1"></i> <i class="bi bi-instagram text-dark mx-1"></i></p> --}}
						</div>
					</div>
				</div>
                @endforeach
				{{-- <div class="col-12 col-md-6 col-lg-3">
					<div class="card text-center">
						<div class="card-body">
							<img alt="" class="img-fluid rounded-circle" src="img/team-2.jpg">
							<h3 class="card-title py-2">Jack Wilson</h3>
							<p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sequi ipsam nostrum illo tempora esse quibusdam.</p>
							<p class="socials"><i class="bi bi-twitter text-dark mx-1"></i> <i class="bi bi-facebook text-dark mx-1"></i> <i class="bi bi-linkedin text-dark mx-1"></i> <i class="bi bi-instagram text-dark mx-1"></i></p>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-6 col-lg-3">
					<div class="card text-center">
						<div class="card-body">
							<img alt="" class="img-fluid rounded-circle" src="img/team-3.jpg">
							<h3 class="card-title py-2">Jack Wilson</h3>
							<p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sequi ipsam nostrum illo tempora esse quibusdam.</p>
							<p class="socials"><i class="bi bi-twitter text-dark mx-1"></i> <i class="bi bi-facebook text-dark mx-1"></i> <i class="bi bi-linkedin text-dark mx-1"></i> <i class="bi bi-instagram text-dark mx-1"></i></p>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-6 col-lg-3">
					<div class="card text-center">
						<div class="card-body">
							<img alt="" class="img-fluid rounded-circle" src="img/team-4.jpg">
							<h3 class="card-title py-2">Jack Wilson</h3>
							<p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sequi ipsam nostrum illo tempora esse quibusdam.</p>
							<p class="socials"><i class="bi bi-twitter text-dark mx-1"></i> <i class="bi bi-facebook text-dark mx-1"></i> <i class="bi bi-linkedin text-dark mx-1"></i> <i class="bi bi-instagram text-dark mx-1"></i></p>
						</div>
					</div>
				</div> --}}
			</div>
		</div>
	</section><!-- team ends -->
	<!-- Contact starts -->
	<section class="contact section-padding" id="contact">
		<div class="container mt-5 mb-5">
			<div class="row">
				<div class="col-md-12">
					<div class="section-header text-center pb-5">
						<h2>Contact Us</h2>
					</div>
				</div>
			</div>
			<div class="row m-0">
				<div class="col-md-8 m-auto">
					<!--for getting the form download the code from download button-->
                    <div class="card border-0 shadow py-4">
                        <div class="card-body mx-2">
                            <form action="{{route('feedback')}}" method="post">
                                @csrf
                                @if(session('success'))
                                <h6 class="text-center text-success">{{ session('success') }}</h6>
                                @endif      
                                <input type="text" class="form-control my-4 py-2" name="name" placeholder="Your Name" value="{{old('name')}}" required>

                                <input type="text" class="form-control my-4 py-2" name="contact" id="contact" placeholder="Your Contact Number" value="{{old('contact')}}" required>       

                                <textarea class="form-control my-4 py-2" name="feedback" id="feedback" placeholder="Write Your FeedBack" required cols="10" rows="5" value="{{old('feedback')}}"></textarea>
                                <button type="submit" class="btn btn-primary">Send Feedback</button>
                            </form>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</section><!-- contact ends -->
	<!-- footer starts -->
	<footer class="bg-dark p-2 text-center">
		<div class="container">
			<p class="text-white">All Right Reserved By @Koyel Paul</p>
		</div>
	</footer>
	<!-- footer ends -->
	
	<!-- All Js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
