@extends('layouts.admin')
@section('head')
    <!-- DataTables -->
    <link href="/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <!-- Responsive datatable examples -->
    <link href="/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css">
@endsection
@section('content')
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h4 class="page-title">Product</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">Data Product</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <label class="col-2">Code<i class="text-danger">*</i></label>
                                            <input type="text" name="code" class="form-control col-3" placeholder="Product Code" required>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-2">Name<i class="text-danger">*</i></label>
                                            <input type="text" name="name" class="form-control col-7" placeholder="Product Name" required>
                                            </div>
                                        <div class="form-group row">
                                            <label class="col-2">Stock<i class="text-danger">*</i></label>
                                            <input type="number" name="stock" class="form-control col-10" placeholder="Stock" required>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-2">Sell Price<i class="text-danger">*</i></label>
                                            <input type="number" name="sell_price" class="form-control col-10" placeholder="Sell Price" required>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-2">Buy Price<i class="text-danger">*</i></label>
                                            <input type="number" name="buy_price" class="form-control col-10" placeholder="Buy Price" required>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-2">&nbsp;</label>
                                            <div class="col-10 text-right">
                                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                                                <button onclick="if(confirm('You have unsaved product, are you sure to cancel?')){ window.location.href = '{{ route('admin.product') }}'; }" type="button" class="btn btn-dark"><i class="fa fa-times"></i> Cancel</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary"><i class="fa fa-plus"></i> Add Product</a>
                    <p class="text-muted m-b-30">Please update your product periodically.</p>
                    <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Stock</th>
                            @if(auth()->user()->role== 1 ||auth()->user()->role== 2 )
                            <th>Sell Price</th>
                            @endif
                            @if(auth()->user()->role==2)
                            <th>Buy Price</th>
                                @endif
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($product as $ini)
                            <tr>
                                <td>
                                    {{ $ini->code }}
                                </td>
                                <td>
                                    <p id="default-name-{{ $ini->id }}" onclick="editName{{ $ini->id }}()">{{ $ini->name }}</p>
                                    <form class="row" style="display: none" id="form-name-{{ $ini->id }}" action="{{ route('admin.product.update.name') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $ini->id }}">
                                        <input  type="text" class="form-control col-6" value="{{ $ini->name }}" name="name" required>
                                        <button type="submit" class="btn btn-sm btn-primary col-2">Save</button>
                                    </form>
                                    <script>
                                        function editName{{ $ini->id }}() {
                                            document.getElementById('default-name-{{ $ini->id }}').style.display = 'none';
                                            document.getElementById('form-name-{{$ini->id}}').style.display = '';
                                        }
                                    </script>
                                </td>
                                <td>
                                    <input id="default-stock-{{ $ini->id }}" type="number" class="form-control col-6" value="{{ $ini->stock }}" readonly onclick="editStock{{ $ini->id }}()">
                                    <form class="row" style="display: none" id="form-stock-{{ $ini->id }}" action="{{ route('admin.product.update.stock') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $ini->id }}">
                                        <input  type="number" class="form-control col-6" value="{{ $ini->stock }}" name="stock" required>
                                        <button type="submit" class="btn btn-sm btn-primary col-2">Save</button>
                                    </form>
                                    <script>
                                        function editStock{{ $ini->id }}() {
                                            document.getElementById('default-stock-{{ $ini->id }}').style.display = 'none';
                                            document.getElementById('form-stock-{{$ini->id}}').style.display = '';
                                        }
                                    </script>
                                </td>
                                @if(auth()->user()->role== 1 || auth()->user()->role== 2)
                                <td>
                                    <input id="default-sellprice-{{ $ini->id }}" type="text" class="form-control col-6" value="{{ number_format($ini->sell_price) }}" readonly onclick="editSellPrice{{ $ini->id }}()">
                                    <form class="row" style="display: none" id="form-sellprice-{{ $ini->id }}" action="{{ route('admin.product.update.sellPrice') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $ini->id }}">
                                        <input  type="number" class="form-control col-6" value="{{ $ini->sell_price }}" name="sell_price" required>
                                        <button type="submit" class="btn btn-sm btn-primary col-2">Save</button>
                                    </form>
                                    <script>
                                        function editSellPrice{{ $ini->id }}() {
                                            document.getElementById('default-sellprice-{{ $ini->id }}').style.display = 'none';
                                            document.getElementById('form-sellprice-{{$ini->id}}').style.display = '';
                                        }
                                    </script>
                                </td>
                                @endif
                                @if(auth()->user()->role==2)
                                <td>
                                    <input id="default-buyprice-{{ $ini->id }}" type="text" class="form-control col-6" value="{{ number_format($ini->buy_price) }}" readonly onclick="editBuyPrice{{ $ini->id }}()">
                                    <form class="row" style="display: none" id="form-buyprice-{{ $ini->id }}" action="{{ route('admin.product.update.buyPrice') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $ini->id }}">
                                        <input  type="number" class="form-control col-6" value="{{ $ini->buy_price }}" name="buy_price" required>
                                        <button type="submit" class="btn btn-sm btn-primary col-2">Save</button>
                                    </form>
                                    <script>
                                        function editBuyPrice{{ $ini->id }}() {
                                            document.getElementById('default-buyprice-{{ $ini->id }}').style.display = 'none';
                                            document.getElementById('form-buyprice-{{$ini->id}}').style.display = '';
                                        }
                                    </script>
                                </td>
                                @endif
                                <td>
                                    <a href="/admin/product/delete/{{$ini->id}}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $product->links() }}
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
@endsection
@section('script')
    <!-- Required datatable js -->
    <script src="/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Buttons examples -->
    <script src="/plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="/plugins/datatables/buttons.bootstrap4.min.js"></script>
    <script src="/plugins/datatables/jszip.min.js"></script>
    <script src="/plugins/datatables/pdfmake.min.js"></script>
    <script src="/plugins/datatables/vfs_fonts.js"></script>
    <script src="/plugins/datatables/buttons.html5.min.js"></script>
    <script src="/plugins/datatables/buttons.print.min.js"></script>
    <script src="/plugins/datatables/buttons.colVis.min.js"></script>
    <!-- Responsive examples -->
    <script src="/plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="/plugins/datatables/responsive.bootstrap4.min.js"></script>
    <!-- Datatable init js -->
    <script src="/assets/pages/datatables.init.js"></script>
@endsection