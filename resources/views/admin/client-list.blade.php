@extends('layout.mainlayout_admin')
@section('content')
<!-- Page Wrapper -->
<div class="page-wrapper">
                <div class="content container-fluid">

					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">List of Clients</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index">Dashboard</a></li>
									<li class="breadcrumb-item"><a href="javascript:(0);">Users</a></li>
									<li class="breadcrumb-item active">Clients</li>
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
													<th>View all Projects </th>
													<th class="text-end">Earning</th>
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
                                                    <td>  <a href="{{ route('super.clientProjectById', ['id' => $u->id] )  }}">View all </a>  </td>
                                                    <td class="text-end">$250.00</td>
												</tr>
                                                @empty
                                                    <tr> No Data Found </tr>


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
