@extends('layout.mainlayout_admin')
@section('content')
<!-- Page Wrapper -->
<div class="page-wrapper">
                <div class="content container-fluid">
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Job Name - ( {{ $alljobs->name  }})</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index">Dashboard</a></li>
									<li class="breadcrumb-item"><a href="javascript:(0);">Clients</a></li>
									<li class="breadcrumb-item active">Project</li>
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
                                                    <th>Freelancer Name</th>
                                                    <th>Type</th>
                                                    <th>Proposal Time</th>
													<th>Proposal Budget</th>
													<th>Assigned</th>
												</tr>
											</thead>
											<tbody>

                                            @forelse($proposal as $j)
												<tr>
													<td>{{ $j['working_user_name'] }}</td>
													<td>{{ $j['bidding_type'] }}</td>
													<td>{{ $j['proposal_time'] }}</td>
													<td>{{ $j['bidding_price'] }}</td>
													<td>{{ ($j['current_proposal_status'] == 1)? 'Yes' : 'No' }}</td>
												</tr>
                                                @empty
                                                    <tr> <td> No Bid yet </td></tr>
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
