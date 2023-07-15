@extends('admin.layout.master')
@section('title','Dashboard')
@section('body')

    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="row">
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-0">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-3 text-center">
                                          <span class="circle circle-sm bg-primary">
                                            <i class="fe fe-16 fe-shopping-cart text-white mb-0"></i>
                                          </span>
                                        </div>
                                        <div class="col pr-0">
                                            <p class="small text-muted mb-0">Total orders today</p>
                                            <span class="h3 mb-0">{{$orderDay}}</span>
{{--                                            <span class="small text-success">Total orders today</span>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-0">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-3 text-center">
                                          <span class="circle circle-sm bg-primary">
                                            <i class="fe fe-16 fe-filter text-white mb-0"></i>
                                          </span>
                                        </div>
                                        <div class="col">
                                            <p class="small text-muted mb-0">Total sales today</p>
                                            <div class="row align-items-center no-gutters">
                                                <div class="col-auto">
                                                    <span class="h3 mr-2 mb-0">${{$orderDayTotal}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-0">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-3 text-center">
                                          <span class="circle circle-sm bg-primary">
                                            <i class="fe fe-16 fe-activity text-white mb-0"></i>
                                          </span>
                                        </div>
                                        <div class="col">
                                            <p class="small text-muted mb-0">Total order completed today</p>
                                            <span class="h3 mb-0">{{$orderDayCompleted}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-0">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-3 text-center">
                                          <span class="circle circle-sm bg-primary-light">
                                            <i class="fe fe-16 fe-shopping-bag text-white mb-0"></i>
                                          </span>
                                        </div>
                                        <div class="col pr-0">
                                            <p class="small text-muted mb-0">Total Revenue</p>
                                            <span class="h3 mb-0">${{$totalRevenue}}</span>
                                            {{--                                            <span class="small text-muted">+5.5%</span>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end section -->
                    <div class="row align-items-center my-2">
                        <div class="col-auto ml-auto">
                            <form class="form-inline">
                                <div class="form-group">
                                    <label for="reportrange" class="sr-only">Date Ranges</label>
                                    <div id="reportrange" class="px-2 py-2 text-muted">
                                        <i class="fe fe-calendar fe-16 mx-2"></i>
                                        <span class="small"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="button" class="btn btn-sm"><span
                                            class="fe fe-refresh-ccw fe-12 text-muted"></span></button>
                                    <button type="button" class="btn btn-sm"><span
                                            class="fe fe-filter fe-12 text-muted"></span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- charts-->
                    <div class="row my-4">
                        <div class="col-md-12">
                            <div class="chart-box">
                                <div id="columnChart"></div>
                            </div>
                        </div> <!-- .col -->
                    </div>
                    <!-- end section -->


                    {{-- Charts 2 --}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <p class="pl-3" ><strong class="mb-0 text-uppercase card-title">Statistics of the last 7 days</strong></p>
                                    <h3 class="pt-3 pl-3">${{$total7Days}}</h3>
                                    <div class="chart-box pt-4">
                                        <div id="line" style="padding-bottom: 36px"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card shadow mb-4">
                                <div class="card-header">
                                    <strong class="card-title" style="margin-top: 1rem;">Featured products</strong>
                                </div>
                                <div class="card-body">
                                    <div class="list-group list-group-flush p-1">
                                        @foreach($featured as $productFeatured)
                                            <div class="list-group-item">
                                                <div class="row align-items-center">
                                                    <div class="col-3 col-md-2">
                                                        <img src="front/img/product/{{ isset($productFeatured->productImages[0]) ? $productFeatured->productImages[0]->path : 'front/img/hhhh.jpg' }}" alt="{{$productFeatured->name}}" class="img-thumbnail" style="width: 50px; height: 50px; object-fit: cover">
                                                    </div>
                                                    <div class="col">
                                                        <strong>{{$productFeatured->name}}</strong>
                                                        <div class="my-0 text-muted small">{{$productFeatured->brand->name}}</div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <a href="{{url('/admin/product/show/'.$productFeatured->id)}}" class="btn btn-hover-shine btn-outline-primary border-0 btn-sm">Details</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div> <!-- / .list-group -->
                                </div> <!-- / .card-body -->
                            </div> <!-- .card -->
                        </div>
                    </div>

                    {{-- End Charts 2 --}}

                    <div class="row">
                        <!-- Recent orders -->
                        <div class="col-md-12">
                            <h6 class="mb-3">Last orders</h6>
                            <table class="table table-borderless table-striped">
                                <thead>
                                <tr role="row">
                                    <th>ID</th>
                                    <th>Purchase Date</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Total</th>
                                    <th>Payment</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="col">1331</th>
                                    <td>2020-12-26 01:32:21</td>
                                    <td>Kasimir Lindsey</td>
                                    <td>(697) 486-2101</td>
                                    <td>996-3523 Et Ave</td>
                                    <td>$3.64</td>
                                    <td> Paypal</td>
                                    <td>Shipped</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-sm dropdown-toggle more-vertical" type="button"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="text-muted sr-only">Action</span>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#">Edit</a>
                                                <a class="dropdown-item" href="#">Remove</a>
                                                <a class="dropdown-item" href="#">Assign</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col">1156</th>
                                    <td>2020-04-21 00:38:38</td>
                                    <td>Melinda Levy</td>
                                    <td>(748) 927-4423</td>
                                    <td>Ap #516-8821 Vitae Street</td>
                                    <td>$4.18</td>
                                    <td> Paypal</td>
                                    <td>Pending</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-sm dropdown-toggle more-vertical" type="button"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="text-muted sr-only">Action</span>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#">Edit</a>
                                                <a class="dropdown-item" href="#">Remove</a>
                                                <a class="dropdown-item" href="#">Assign</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col">1038</th>
                                    <td>2019-06-25 19:13:36</td>
                                    <td>Aubrey Sweeney</td>
                                    <td>(422) 405-2736</td>
                                    <td>Ap #598-7581 Tellus Av.</td>
                                    <td>$4.98</td>
                                    <td>Credit Card</td>
                                    <td>Processing</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-sm dropdown-toggle more-vertical" type="button"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="text-muted sr-only">Action</span>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#">Edit</a>
                                                <a class="dropdown-item" href="#">Remove</a>
                                                <a class="dropdown-item" href="#">Assign</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col">1227</th>
                                    <td>2021-01-22 13:28:00</td>
                                    <td>Timon Bauer</td>
                                    <td>(690) 965-1551</td>
                                    <td>840-2188 Placerat, Rd.</td>
                                    <td>$3.46</td>
                                    <td> Paypal</td>
                                    <td>Processing</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-sm dropdown-toggle more-vertical" type="button"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="text-muted sr-only">Action</span>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#">Edit</a>
                                                <a class="dropdown-item" href="#">Remove</a>
                                                <a class="dropdown-item" href="#">Assign</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col">1956</th>
                                    <td>2019-11-11 16:23:17</td>
                                    <td>Kelly Barrera</td>
                                    <td>(117) 625-6737</td>
                                    <td>816 Ornare, Street</td>
                                    <td>$4.16</td>
                                    <td>Credit Card</td>
                                    <td>Shipped</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-sm dropdown-toggle more-vertical" type="button"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="text-muted sr-only">Action</span>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#">Edit</a>
                                                <a class="dropdown-item" href="#">Remove</a>
                                                <a class="dropdown-item" href="#">Assign</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col">1669</th>
                                    <td>2021-04-12 07:07:13</td>
                                    <td>Kellie Roach</td>
                                    <td>(422) 748-1761</td>
                                    <td>5432 A St.</td>
                                    <td>$3.53</td>
                                    <td> Paypal</td>
                                    <td>Shipped</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-sm dropdown-toggle more-vertical" type="button"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="text-muted sr-only">Action</span>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#">Edit</a>
                                                <a class="dropdown-item" href="#">Remove</a>
                                                <a class="dropdown-item" href="#">Assign</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col">1909</th>
                                    <td>2020-05-14 00:23:11</td>
                                    <td>Lani Diaz</td>
                                    <td>(767) 486-2253</td>
                                    <td>3328 Ut Street</td>
                                    <td>$4.29</td>
                                    <td> Paypal</td>
                                    <td>Pending</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-sm dropdown-toggle more-vertical" type="button"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="text-muted sr-only">Action</span>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#">Edit</a>
                                                <a class="dropdown-item" href="#">Remove</a>
                                                <a class="dropdown-item" href="#">Assign</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade modal-notif modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="defaultModalLabel">Notifications</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="list-group list-group-flush my-n3">
                            <div class="list-group-item bg-transparent">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="fe fe-box fe-24"></span>
                                    </div>
                                    <div class="col">
                                        <small><strong>Package has uploaded successfull</strong></small>
                                        <div class="my-0 text-muted small">Package is zipped and uploaded</div>
                                        <small class="badge badge-pill badge-light text-muted">1m ago</small>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item bg-transparent">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="fe fe-download fe-24"></span>
                                    </div>
                                    <div class="col">
                                        <small><strong>Widgets are updated successfull</strong></small>
                                        <div class="my-0 text-muted small">Just create new layout Index, form, table
                                        </div>
                                        <small class="badge badge-pill badge-light text-muted">2m ago</small>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item bg-transparent">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="fe fe-inbox fe-24"></span>
                                    </div>
                                    <div class="col">
                                        <small><strong>Notifications have been sent</strong></small>
                                        <div class="my-0 text-muted small">Fusce dapibus, tellus ac cursus commodo</div>
                                        <small class="badge badge-pill badge-light text-muted">30m ago</small>
                                    </div>
                                </div> <!-- / .row -->
                            </div>
                            <div class="list-group-item bg-transparent">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="fe fe-link fe-24"></span>
                                    </div>
                                    <div class="col">
                                        <small><strong>Link was attached to menu</strong></small>
                                        <div class="my-0 text-muted small">New layout has been attached to the menu
                                        </div>
                                        <small class="badge badge-pill badge-light text-muted">1h ago</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Clear All
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade modal-shortcut modal-slide" tabindex="-1" role="dialog"
             aria-labelledby="defaultModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="defaultModalLabel">Shortcuts</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body px-5">
                        <div class="row align-items-center">
                            <div class="col-6 text-center">
                                <div class="squircle bg-success justify-content-center">
                                    <i class="fe fe-cpu fe-32 align-self-center text-white"></i>
                                </div>
                                <p>Control area</p>
                            </div>
                            <div class="col-6 text-center">
                                <div class="squircle bg-primary justify-content-center">
                                    <i class="fe fe-activity fe-32 align-self-center text-white"></i>
                                </div>
                                <p>Activity</p>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-6 text-center">
                                <div class="squircle bg-primary justify-content-center">
                                    <i class="fe fe-droplet fe-32 align-self-center text-white"></i>
                                </div>
                                <p>Droplet</p>
                            </div>
                            <div class="col-6 text-center">
                                <div class="squircle bg-primary justify-content-center">
                                    <i class="fe fe-upload-cloud fe-32 align-self-center text-white"></i>
                                </div>
                                <p>Upload</p>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-6 text-center">
                                <div class="squircle bg-primary justify-content-center">
                                    <i class="fe fe-users fe-32 align-self-center text-white"></i>
                                </div>
                                <p>Users</p>
                            </div>
                            <div class="col-6 text-center">
                                <div class="squircle bg-primary justify-content-center">
                                    <i class="fe fe-settings fe-32 align-self-center text-white"></i>
                                </div>
                                <p>Settings</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
