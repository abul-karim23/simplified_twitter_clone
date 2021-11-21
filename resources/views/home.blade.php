@extends('layouts.admin_template')

@section('content')
        
        <!-- main body starts here -->
       
        
<div class="container">
    <nav class="navbar navbar-static-top">
        <ul class="nav navbar-nav">
            <li class="nav-item">
                <h3><a class="nav-link" href="{{route('home')}}">Home</a></h3>
            </li>
        </ul>
    </nav>
        
    <div class="row">
        <hr>

        <!-- col 1 -->
        <div class="col-md-8 border-end scroll" style="height:100vh">        

                <div class="media mb-2">
                  <img class="mr-3" src="{{asset('images/user.png')}}" alt="Generic placeholder image">
                  <div class="media-body">
                        <h5 class="mt-0">{{ Auth::user()->name }}</h5>{{ Auth::user()->email }}
                 </div>
                </div>

                    <hr>
            
                <!-- post add -->
                <form action="{{route('add_status')}}" method="POST">
                {{ csrf_field() }}
                    <div class="md-form">
                        <textarea id="user_status" name="user_status" class="md-textarea form-control" rows="3" placeholder="Write your thoughts..." value="" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary float-right my-2" style="border-radius:30px;">Tweet</button>
                </form>
                <br><br>
            <hr>

            <!-- posts area -->

            <div id="post_div" name="post_div" class="mb-4">
                <!-- posts go here -->
            </div>
            <br>

            <!-- end posts area-->


        </div>
        <!-- end 1st col -->

       
            <!-- <div class="vr" style="height:100vh;"></div> -->
            

        <!-- 2nd col -->
        <div class="col-md-4 scroll" style="height:100vh">
            
        <!-- search bar -->
        <form action="#" method="">
            <div class="input-group" >
                <div class="form-outline">
                    <input type="search" id="form1" class="form-control" placeholder="Search User"/>
                    <!-- <label class="form-label" for="form1">Search</label> -->
                </div>
                <button type="submit" class="btn btn-sm">
                <img src="{{asset('images/search_icon_24.svg')}}" alt="">
                </button>
            </div>
            </form>

            <br>
        <ul class="list-group" id="right_user_list" name="right_user_list">          

            
                       <!-- list of all users -->
        </ul>
        </div>  
         <!--end of 2nd col  -->

    </div>
</div>

<script>
    $(document).ready(function(){
        get_posts();
        get_users();
        
    });

    function get_posts(){
        $.ajax({
            method: 'GET',
            url: "{!!route('get_status')!!}",
            data: {
              "_token": "{{ csrf_token() }}"
              },
              complete: function(result){
                var new_posts=result.responseJSON.results;

                    if(result===undefined){
                        $('#post_div').append(`<div class="d-flex p-2"><div class="media mb-2">
                            <div class="media-body">
                                    <h5 class="mt-0">No posts by anyone</h5>
                            </div>
                        </div></div><br><hr>`);
                        }                    
                    else{
                            for(var i=0; i<new_posts.length; i++){

                        $('#post_div').append(`<div class="d-flex p-2"><div class="media mb-2">
                            <img class="mr-3" src="{{asset('images/user.png')}}" alt="Generic placeholder image">
                            <div class="media-body">
                                    <h5 class="mt-0">`+new_posts[i].follower_name+` @`+new_posts[i].follower_email+`</h5>Posted on `+new_posts[i].created_at+`<p>`+new_posts[i].description+`</p>
                            </div>
                        </div></div><br><hr>`);
                        }
                    }

              }
        });
    }

    function get_users(){
        $.ajax({
            method: 'GET',
            url: "{!!route('get_users')!!}",
            data: {
              "_token": "{{ csrf_token() }}"
              },
              complete: function(result){
                var new_users=result.responseJSON.results;
                    for(var i=0; i<new_users.length; i++){


                        $('#right_user_list').append(`<form action="{{route('follow')}}" method="POST">{{ csrf_field() }} <input type="hidden" id="follower_id" name="follower_id" value="`+new_users[i].id+`"><input type="hidden" id="follower_name" name="follower_name" value="`+new_users[i].name+`"><input type="hidden" id="follower_email" name="follower_email" value="`+new_users[i].email+`"> <li class="list-group-item d-flex justify-content-between align-items-center">`+new_users[i].name+`<button type="submit" id="follow_btn" name="follow_btn" class="btn btn-primary follow_btn">Follow</button></li><br></form>`);
                    }
                
              }
        });
    }


</script>
@endsection
