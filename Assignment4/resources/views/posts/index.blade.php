@extends('posts.master')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="pull-right">
                <div id="crdiv">
                <a  href="{{route('posts.create')}}"
                id="cr">Create category</a>
                </div>
            </div>
        </div>
    </div>
    @if($message=Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div id="div_form">
    <form method="get" action="/postsearch">
    <input type="search" name="search" class="form-control" id="search"> 
    <button type="submit" id="btnSearch" class="btn btn-primary"  >Search</button>
    </form>
    </div>
    <div id="d1">
   
        <button id="deleteAll"style="margin-bottom: 10px;background-color: #9fbc35;border-color: #9fbc35" class="btn btn-primary delete_all" data-url="{{ url('posts') }}">Delete</button>
    </div>
    <table class="table table-bordered" style="top:89px ;position: absolute; width: 78%;margin-left: -19px;">
        <thead style="padding-left: 20px ">
            <tr>
                <th ><input type="checkbox" id="master" value="" ></th>
                <th >NAME</th>
                <th width="300px">Actions</th>
            </tr>
        </thead>
        @foreach($posts as $post)
            <tr>
                <td ><input type="checkbox" name="checked_id[]"  class="sub_chk" data-id="{{$post->id}}"/></td>

                <td>{{$post->C_name}}</td>
                <!-- <td>{{$post->body}}</td> -->
                <td>
                    <!-- <a class="btn btn-xs btn-info" href="{{route('posts.show',$post->id)}}">show</a> -->
                    <a class="btn btn-xs btn-info" href="{{route('posts.edit',$post->id)}}">edit</a>
                    {!! Form::open(['method'=>'DELETE','route'=>['posts.destroy',$post->id],'style'=>'display:inline'])!!}
                    {!! Form::submit('Delete',['class'=>'btn btn-xs btn-danger']) !!}
                    {!! Form::close()!!}

                </td>
            </tr>
        @endforeach
        
    </table>
    <br>
    <br>
    <br>
    <br>
    {!! $posts->links() !!}
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">

    $(document).ready(function () {


        $('#master').on('click', function(e) {

         if($(this).is(':checked',true))  

         {

            $(".sub_chk").prop('checked', true);  

         } else {  

            $(".sub_chk").prop('checked',false);  

         }  

        });


        $('.delete_all').on('click', function(e) {


            var allVals = [];  

            $(".sub_chk:checked").each(function() {  

                allVals.push($(this).attr('data-id'));

            });  


            if(allVals.length <=0)  

            {  

                alert("Please select row.");  

            }  else {  


                var check = confirm("Are you sure you want to delete this row?");  

                if(check == true){  


                    var join_selected_values = allVals.join(","); 


                    $.ajax({

                        url: $(this).data('url'),

                        type: 'DELETE',

                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

                        data: 'ids='+join_selected_values,

                        success: function (data) {

                            if (data['success']) {

                                $(".sub_chk:checked").each(function() {  

                                    $(this).parents("tr").remove();

                                });

                                alert(data['success']);

                            } else if (data['error']) {

                                alert(data['error']);

                            } else {

                                alert('Whoops Something went wrong!!');

                            }

                        },

                        error: function (data) {

                            alert(data.responseText);

                        }

                    });


                  $.each(allVals, function( index, value ) {

                      $('table tr').filter("[data-row-id='" + value + "']").remove();

                  });

                }  

            }  

        });


        $('[data-toggle=confirmation]').confirmation({

            rootSelector: '[data-toggle=confirmation]',

            onConfirm: function (event, element) {

                element.trigger('confirm');

            }

        });


        $(document).on('confirm', function (e) {

            var ele = e.target;

            e.preventDefault();


            $.ajax({

                url: ele.href,

                type: 'DELETE',

                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

                success: function (data) {

                    if (data['success']) {

                        $("#" + data['tr']).slideUp("slow");

                        alert(data['success']);

                    } else if (data['error']) {

                        alert(data['error']);

                    } else {

                        alert('Whoops Something went wrong!!');

                    }

                },

                error: function (data) {

                    alert(data.responseText);

                }

            });


            return false;

        });

    });

</script>





