@extends('layout.mainlayout_admin')
@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Freelancer Project</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="javascript:(0);">Freelancer</a></li>
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
                                            <th>Name</th>
                                            <th>Type</th>
                                            <th>Budget</th>
                                            <th>Duration</th>
                                            <th>Assigned</th>
                                            <th class="text-end">Company</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @forelse($alljobs as $j)
                                            <tr>
                                                <td>{{ $j->name }}</td>
                                                <td>{{ $j->type }}</td>
                                                <td>{{ $j->salary }}</td>
                                                <td>{{ $j->expected_duration }}</td>
                                                <td>{{ ($j->current_proposal_status == 1)? 'Yes' : 'No' }}</td>
                                                <td class="text-end"> <a href="{{ route('super.userData', ['id' => $j->hiring_client_id] )  }}">View company </a></td>
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
