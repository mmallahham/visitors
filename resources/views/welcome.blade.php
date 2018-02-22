
@include('partial.header')
<div class="row col-md-12">
    <img class="pageImg" src="/images/bg-s.jpg" alt="visitors">
</div>
<div class="row">
    <div class="col-md-12 text-center">
        <h5>Welcome to</h5>
        <h2>Visitor Management System</h2>
    </div>
</div>
<div class="row">
    <div class="col-md-3 ">
    </div>
    <div class="col-md-6 text-justify">
        <br>
        <p>A cloud-based visitor management and registration solution that serves small and medium businesses 
            across various industries. It is compatible with all browsers. Core features include visitor registration, 
            a real-time view of visitors present in a building, view analytics, and some reports.</p><hr>
    </div>
</div>
<div class="row">
    <div class="col-md-2 ">
     
    </div>
    <div class="col-md-8 text-center">
        <a class="btn btn-primary text-white main-page-btn btn-lg col-md-4"
            href="{{ route('visitor.welcome') }}">Visitor</a>
        <a class="btn btn-primary text-white main-page-btn btn-lg col-md-4">Student</a>
        <a class="btn btn-primary text-white main-page-btn btn-lg col-md-4">Staff</a>
        <a class="btn btn-primary text-white main-page-btn btn-lg col-md-4">Admin</a>
    </div>
</div>
@include('partial.footer')
