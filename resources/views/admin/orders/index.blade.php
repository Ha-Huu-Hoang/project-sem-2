@extends('admin.layout.master')
@section('title','Orders')
@section('body')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h2 class="h3 mb-3 page-title">Orders</h2>
                    <div class="row mb-4 items-align-center">
                        <div class="col-md">
                            <ul class="nav nav-pills justify-content-start">
                                <li class="nav-item">
                                    <a class="nav-link{{ $status == 'active' ? ' active bg-transparent pr-2 pl-0 text-primary' : 'text-muted px-2' }}" href="{{ request()->fullUrlWithQuery(['status' => 'active']) }}">
                                        All <span class="badge badge-pill{{ $status == 'active' ? ' bg-primary text-white' : ' bg-white border text-muted' }} ml-2">({{ $count[0] }})</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link{{ $status == 'trash' ? ' active bg-transparent pr-2 pl-0 text-primary' : ' text-muted px-2' }}" href="{{ request()->fullUrlWithQuery(['status' => 'trash']) }}">
                                        Pending <span class="badge badge-pill{{ $status == 'trash' ? ' bg-primary text-white' : ' bg-white border text-muted' }} ml-2">({{ $count[1] }})</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-muted px-2" href="#">Processing <span class="badge badge-pill bg-white border text-muted ml-2">48</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-muted px-2" href="#">Completed <span class="badge badge-pill bg-white border text-muted ml-2">52</span></a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-auto ml-auto text-right">
                  <span class="small bg-white border py-1 px-2 rounded mr-2 d-none d-lg-inline">
                    <a href="#" class="text-muted"><i class="fe fe-x mx-1"></i></a>
                    <span class="text-muted">Status : <strong>Pending</strong></span>
                  </span>
                            <span class="small bg-white border py-1 px-2 rounded mr-2 d-none d-lg-inline">
                    <a href="#" class="text-muted"><i class="fe fe-x mx-1"></i></a>
                    <span class="text-muted">April 14, 2020 - May 13, 2020</span>
                  </span>
                            <button type="button" class="btn" data-toggle="modal" data-target=".modal-slide"><span class="fe fe-filter fe-16 text-muted"></span></button>
                            <button type="button" class="btn"><span class="fe fe-refresh-ccw fe-16 text-muted"></span></button>
                        </div>
                    </div>
                    <!-- Slide Modal -->
                    <div class="modal fade modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="defaultModalLabel">Filters</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <i class="fe fe-x fe-12"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="p-2">
                                        <div class="form-group my-4">
                                            <p class="mb-2"><strong>Regions</strong></p>
                                            <label for="multi-select2" class="sr-only"></label>
                                            <select class="form-control select2-multi" id="multi-select2">
                                                <optgroup label="Mountain Time Zone">
                                                    <option value="AZ">Arizona</option>
                                                    <option value="CO">Colorado</option>
                                                    <option value="ID">Idaho</option>
                                                    <option value="MT">Montana</option>
                                                    <option value="NE">Nebraska</option>
                                                    <option value="NM">New Mexico</option>
                                                    <option value="ND">North Dakota</option>
                                                    <option value="UT">Utah</option>
                                                    <option value="WY">Wyoming</option>
                                                </optgroup>
                                                <optgroup label="Central Time Zone">
                                                    <option value="AL">Alabama</option>
                                                    <option value="AR">Arkansas</option>
                                                    <option value="IL">Illinois</option>
                                                    <option value="IA">Iowa</option>
                                                    <option value="KS">Kansas</option>
                                                    <option value="KY">Kentucky</option>
                                                    <option value="LA">Louisiana</option>
                                                    <option value="MN">Minnesota</option>
                                                    <option value="MS">Mississippi</option>
                                                    <option value="MO">Missouri</option>
                                                    <option value="OK">Oklahoma</option>
                                                    <option value="SD">South Dakota</option>
                                                    <option value="TX">Texas</option>
                                                    <option value="TN">Tennessee</option>
                                                    <option value="WI">Wisconsin</option>
                                                </optgroup>
                                            </select>
                                        </div> <!-- form-group -->
                                        <div class="form-group my-4">
                                            <p class="mb-2">
                                                <strong>Payment</strong>
                                            </p>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                <label class="custom-control-label" for="customCheck1">Paypal</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck2">
                                                <label class="custom-control-label" for="customCheck2">Credit Card</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck1-1" checked>
                                                <label class="custom-control-label" for="customCheck1">Wire Transfer</label>
                                            </div>
                                        </div> <!-- form-group -->
                                        <div class="form-group my-4">
                                            <p class="mb-2">
                                                <strong>Types</strong>
                                            </p>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio1">End users</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input" checked>
                                                <label class="custom-control-label" for="customRadio2">Whole Sales</label>
                                            </div>
                                        </div> <!-- form-group -->
                                        <div class="form-group my-4">
                                            <p class="mb-2">
                                                <strong>Completed</strong>
                                            </p>
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                                <label class="custom-control-label" for="customSwitch1">Include</label>
                                            </div>
                                        </div> <!-- form-group -->
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn mb-2 btn-primary btn-block">Apply</button>
                                    <button type="button" class="btn mb-2 btn-secondary btn-block">Reset</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table border table-hover bg-white">
                        <thead>
                        <tr role="row">
                            <th>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="all">
                                    <label class="custom-control-label" for="all"></label>
                                </div>
                            </th>
                            <th>ID</th>
                            <th>Purchase Date</th>
                            <th>Customer / Products</th>
                            <th>Phone</th>
                            <th>Ship To</th>
                            <th>Total</th>
                            <th>Payment</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($order->total()>0)
                        @foreach($order as $orders)
                        <tr>
                            <td class="align-center">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input">
                                    <label class="custom-control-label"></label>
                                </div>
                            </td>
                            <td>#{{$orders->order_code}}</td>
                            <td>{{$orders->created_at->format('Y-m-d H:i:s')}}</td>
                            <td> <div class="widget-heading">{{$orders->first_name . ' ' . $orders->last_name}}</div>
                                <div class="widget-subheading opacity-7">
                                    {{$orders->orderDetails[0]->product->name}}
                                    @if(count($orders->orderDetails)>1)
                                    (and {{count($orders->orderDetails)}} other products)
                                    @endif
                                </div></td>
                            <td>{{$orders->phone}}</td>
                            <td>{{$orders->street_address . ' ' . $orders->town_city}}</td>
                            <td>${{$orders->total}}</td>
                            <td> {{$orders->payment_method}}</td>
                            <td>
                                @if ($orders->status == 0)
                                    <span class="dot dot-lg bg-warning mr-2"></span>
                                @elseif ($orders->status == 1)
                                    <span class="dot dot-lg bg-success mr-2"></span>
                                @endif
                                {{ \App\Utilities\Constant::$order_status[$orders->status] }}
                            </td>
                            <td>
                                <a href="{{route('order.show',$orders->id)}}"
                                   class="btn btn-hover-shine btn-outline-primary border-0 btn-sm">
                                    Details
                                </a>
                                    <a href="" class="btn btn-danger btn-sm rounded-0 text-white"  onclick="return confirm('Are you sure you want to delete ?')" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                        @else
                            <tr>
                                <td colspan="10"> <p class="alert alert-warning">Search results are empty</p></td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                    <nav aria-label="Table Paging" class="my-3">
                        <ul class="pagination justify-content-end mb-0">
                            {!! $order->appends(app("request")->input())->links("pagination::bootstrap-4") !!}
                        </ul>
                    </nav>
                </div>
            </div> <!-- .row -->
        </div> <!-- .container-fluid -->
        <div class="modal fade modal-notif modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
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
                                        <div class="my-0 text-muted small">Just create new layout Index, form, table</div>
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
                                        <div class="my-0 text-muted small">New layout has been attached to the menu</div>
                                        <small class="badge badge-pill badge-light text-muted">1h ago</small>
                                    </div>
                                </div>
                            </div> <!-- / .row -->
                        </div> <!-- / .list-group -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Clear All</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade modal-shortcut modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
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
