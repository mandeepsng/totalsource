@extends('layout.mainlayout_admin')
@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">List of Agency</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="javascript:(0);">Users</a></li>
                            <li class="breadcrumb-item active">Agency</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="table-responsive">
                                    <table class="datatable table table-hover table-center mb-0">
                                        <thead>
                                        <tr>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Email Verified</th>
                                            <th>Mannual Verify </th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @forelse($user as $u)
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        {{--															<a href="profile" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="../assets_admin/img/patients/patient7.jpg" alt="User Image"></a>--}}
                                                        <a href="profile"> {{ $u->first_name  }}</a>
                                                    </h2>
                                                </td>
                                                <td> {{ $u->last_name  }}</td>
                                                <td> {{ $u->email  }}</td>
                                                <td> {{ ($u->email_verified_at == null)? 'No' : 'Yes'  }}</td>
                                                <td>  <div class="status-toggle">
                                                        <input type="checkbox" data-id="{!! $u->id !!} " id="status_{!! $u->id !!}" class="check statuschange" >
                                                        <label for="status_{!! $u->id !!}" class="checktoggle">checkbox</label>
                                                    </div> </td>
                                            </tr>
                                        @empty
                                            <tr> <td> No Bid yet </td> </tr>


                                        @endforelse

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- /Page Wrapper -->

    </div>
    <!-- /Main Wrapper -->
@endsection

@section('script')
    <script>
        $(document).on('click','.statuschange',function(){
            var prop = $(this).prop('checked');
            console.log('dfsdfsdfsdf', prop )
            var id = $(this).data('id');
            var apt_for_userid = $(this).data('apt_for_userid');
            if(prop === false){
                swal({
                    title: "Wishlist Added Product will not be Removed.",
                    text: "Are you Sure ?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then( (willchange) =>{
                    if (willchange) {
                        $.ajax({
                            type:"POST",
                            url:"{!!route('super.user_mannual_approval')!!}",
                            data:{prop:prop,'_token': "{!! csrf_token() !!}",id:id},
                            success:function(result){
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: result.message,
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                            }
                        });
                    } else{
                        swal("Cancelled", "Not disapproved", "error");
                    }

                } );
                return false;
            }else{

                $.ajax({
                    type:"POST",
                    url:"{!!route('super.user_mannual_approval')!!}",
                    data:{prop:prop,'_token': "{!! csrf_token() !!}",id:id},
                    success:function(result){
                        // scl_show_alert(result.type,result.msg);
                        console.log(result.message)
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: result.message,
                            showConfirmButton: false,
                            timer: 1500
                        })
                        setTimeout(
                            location.reload()
                            , 5000)
                    }
                });
            }
        });


    </script>
@endsection

