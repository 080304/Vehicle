<div>
    <style>
        #main{
            width: 100%;
            height: 10vh;
            background-color: white;
        }
        #left{
            width: 20%;
            height: 100%;
            float: left;
        }
        #left img{
            height: 90%;
            width: 50%;
        }
        #right{
            width: 80%;
            height: 100%;
            float: right;
            display: flex;
            align-items: center;
            justify-content:flex-end;
            justify-content: space-between;
        }
        #right a{
            margin-left: 25%;
            text-decoration: none;
        }
       
    </style>
    <div id="main">
        <div id="left">
          <a href="{{route('home')}}"><img src="{{url('Business_Logo/Main_logo.png')}}" alt="Logo image"></a>  
        </div>
        <div id="right">
           
            <a class="text-success fw-bold" href="mailto:Adinni08@student.ub.ac.id"><i class="fas fa-envelope"></i>&nbsp;Mail Us</a>
            <a class="text-success fw-bold" href="tel:08993659998"><i class="fas fa-phone"></i>&nbsp;Call us</a>
           
        </div>
    </div>
</div>