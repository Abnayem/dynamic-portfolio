@extends('front/layout')
@section('page_title','Home Page')
@section('container')


<header class="header">
@foreach($header_home as $list)
<a href="#" class="logo" data-aos="zoom-in">{{$list->header}}<span class="animate" ></span></a>

<div class="bx bx-menu" id="menu-icon"><span class="animate"  data-aos="fade-left"></span></div>
<nav class="navbar" data-aos="zoom-in">
<a href="#home" class="active">Home</a>
<a href="#about">About</a>
<a href="#education">Education</a>
<a href="#skills">Skills</a>
<a href="#contact">Contact</a>

<span class="active-nav"></span>
<span class="animate" ></span>
</nav>
  </header>

  <section class="home show-animate" id="home">
  <div id="home-content">
  <h1 data-aos="fade-left">{{$list->name}}<span class="animate" ></span></h1>
  <div class="text-animate">
  <h3 data-aos="fade-left"> {{$list->designation}}</h3>
  <span class="animate" data-aos="zoom-in"></span>
  </div>
  <div  data-aos="zoom-in">
    <p> 
     {{$list->text}} 
  </p>

  </div>

  <div class="btn-box"  data-aos="zoom-in">
   <a href="" class="btn">Hire Me</a>
  <a href="" class="btn">Let's Talk</a>
 
  </div>
  </div>
  <div class="home-sci"  data-aos="fade-up">
    <a href=""><i class='bx bxl-facebook'></i></a>
    <a href=""><i class='bx bxl-twitter'></i></a>
    <a href=""><i class='bx bxl-linkedin'></i></a>
   

  </div>
  <div class="home-imgHover">
    <span class="animate home-img" style="--i:7;"></span>
  </div>
  @endforeach
  </section>
  <!-- about section design -->
  <section class="about" id="about">
  @foreach($about as $list)
    <h2 class="heading" data-aos="zoom-in">About <span>Me</span></h2>
    <div class="about-img"  data-aos="zoom-in">
      <img src="{{asset('storage/media/aboutme/'.$list->image)}}" alt="">
      <span class="circle-spin"></span>
      <!-- <span class="animate " style="--i:2;"></span> -->
    </div>
    <div class="about-content" data-aos="fade-left">
  <h3>{{$list->designation}}</h3>
  <p> {{$list->text}} </p>
    <!-- <span class="animate " style="--i:4;"></span> -->
    </div>
    <div class="btn-box btns" data-aos="zoom-in">
      <a href="#" class="btn">Read More</a>
      <!-- <span class="animate " style="--i:5;"></span> -->
    </div>
    @endforeach
  </section>
  <!-- education- section design -->
  <section class="education" id="education">

<h2 class="heading" data-aos="zoom-in">My <span>Journey</span></h2>
<div class="education-row">
<div class="education-column">
  
  <h3 class="title" data-aos="fade-left">Education</h3>
  <div class="education-box">
  @foreach($edu_skill as $list)
<div class="education-content">

  <div class="content">
   <div class="year" data-aos="fade-left"><i class='bx bxs-calendar'></i>{{$list->date}}</div>
   <h3 data-aos="fade-up">{{$list->name}}</h3>
   <p data-aos="flip-down">{{$list->text}}</p>
  </div>

</div>
@endforeach
 <!-- <div class="education-content">
  <div class="content">
   <div class="year" data-aos="fade-left"><i class='bx bxs-calendar'></i>2016-2021</div>
   <h3 data-aos="fade-up">Diploma in Engineering -College</h3>
   <p data-aos="flip-down">Lorem ipsum dolor sit amet consectetur adipisicing elit. 
    Consequatur repellat eveniet optio tempore sint id doloremque 
    quisquam, veniam, repellendus dolorum aperiam at neque voluptatum 
    accusamus iusto corrupti voluptates nam porro.</p>
  </div>
  
</div> -->

  </div>
</div>
<div class="education-column">
  
  <h3 class="title" data-aos="zoom-in">Experience</h3>
  <div class="education-box">
  @foreach($experi_skill as $list)
<div class="education-content">
  <div class="content">
   <div class="year" data-aos="fade-left"><i class='bx bxs-calendar'></i>{{$list->date}}</div>
   <h3 data-aos="fade-up">{{$list->name}}</h3>
   <p data-aos="flip-down">{{$list->text}}</p>
  </div>
  
</div>
@endforeach


  </div>
</div>
</div>
  </section>
  
  <!-- skills section design -->
<section class="skills" id="skills">
<h2 class="heading" data-aos="zoom-in">My <span>Skills</span></h2>

<div class="skills-row">

  <div class="skills-column">
    <h3 class="title">Coding Skills</h3>
    <div class="skills-box">
      <div class="skills-content">
        @foreach($coding_skill as $list)
        <div class="progress" >
          <h3 >{{$list->skillname}} <span>{{$list->percentice}}</span></h3>
          <div class="bar"> <span data-aos="fade-left"></span></div>
        </div>
        @endforeach
        
      </div>
    </div>
  </div>
  <div class="skills-column">
    <h3 class="title">Professional Skills</h3>
    <div class="skills-box">
      <div class="skills-content">
      @foreach($profe_skill as $list)
        <div class="progress">
          <h3>{{$list->skillname}} <span>{{$list->percentice}}/span></h3>
          <div class="bar"> <span data-aos="fade-right"></span></div>
        </div>
        @endforeach
        

        
  
      </div>
    </div>
  </div>
</div>
 </section>
 <section class="contact" id="contact">
 <h2 class="heading" data-aos="zoom-in">Contact <span>Me!</span></h2>
 <form action="{{route('frontend.contact')}}"  method="post" enctype="multipart/form-data">
 @csrf
 <div class="input-box">
    <div class="input-field">
      <input type="text" placeholder="Full Name" name="name" required data-aos="fade-up">
      <span class="focus"></span>
    </div>
    <div class="input-field">
      <input type="text" placeholder="Email Address" name="email" required data-aos="fade-up">
      <span class="focus"></span>
    </div>
  </div>
  <div class="input-box">
    <div class="input-field">
      <input type="number" placeholder="Mobile Number" name="mobile" required data-aos="fade-up">
      <span class="focus"></span>
    </div>
    <div class="input-field">
      <input type="text" placeholder="Email Subject" name="subject" required data-aos="fade-up">
      <span class="focus"></span>
    </div>
  </div>
  <div class="textarea-field">
  <textarea name="message" id="message" cols="30" rows="10" placeholder="Your Message" required data-aos="fade-up"></textarea>
  <span class="focus"></span>
  </div>
  <div class="btn-box btns">
    <button type="submit" class="btn" data-aos="flip-down">Submit</button>
  </div>
 </form>
 </section>
 @endsection