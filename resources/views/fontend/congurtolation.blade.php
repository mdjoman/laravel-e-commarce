
@extends('fontend.master')
@section('body')
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.hero-image {
  background-image: url("{{ asset('/') }}fontend-style/images/congurtolation.jpg");
  background-color: #cccccc;
  height: 500px;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}
h2{
 
  font-family: "arial";
  font-size: 3em;
  margin: 10px 0 0 10px;
  color: #e80f0f;
  white-space: nowrap;
  text-transform: uppercase;
  overflow: hidden;
  width: 100%;
  animation: animtext 4s steps(80, end); 
   transition: all cubic-bezier(0.1, 0.7, 1.0, 0.1);
}
h4{
    color:  #e88f0f; 
  font-family: "arial";
  font-size: 16px;
  margin: 10px 0 0 10px;
}
@keyframes animtext { 
  from {
      width: 0;
     transition: all 2s ease-in-out;
  } 
}
.hero-text {
  text-align: center;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: white;
}
</style>
</head>
<body>

<div class="hero-image">
  <div class="hero-text">
  <div class="container">
	<div class="row">
		<h2>congratulation</h2>
        <h4>Your order has been successfully completed. We will contact you soon and deliver your product to you. InshaAllah. Thank you for shopping with us.</h5>
	</div>
</div>
   <a href="{{route('/')}}" class="btn btn-danger mt-5" >continue</a>
  </div>
</div>



</body>

@endsection