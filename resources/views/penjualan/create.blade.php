<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="pelanggan" content="">

        <title>Startmin - Bootstrap Admin Theme</title>

        <!-- Bootstrap Core CSS -->
        <link href="{{asset('backend/css/bootstrap.min.css')}}" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="{{asset('backend/css/metisMenu.min.css')}}" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="{{asset('backend/css/timeline.css')}}" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="{{asset('backend/css/startmin.css')}}" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="{{asset('backend/css/morris.css')}}" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="{{asset('backend/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <div id="wrapper">

            <!-- Navigation -->
            @include('auth.bagian.navbar')
            <!-- /.navbar-top-links -->

            <!-- /input-group -->
            @include('auth.bagian.sidebar')
            <!-- /.nav-second-level -->
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>


                        <!-- /.col-lg-12 -->
                                        {{-- TABLE --}}
                                             <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Pelanggan</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- TABLE -->
               <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                             Tambah Data Pelanggan
                             </div>
                            <form Action="{{ route('penjualan.store')}}" method="post">
                             @csrf
                    <div class="panel-body">
                        <label>Nama Pelanggan</label>
                        <select name="id_pelanggan" class="form-control">
                                    @foreach($pelanggan as $data)
                                    <option value="{{$data->id}}">{{$data->nama}}</option>
                                    @endforeach
                                    </select>
                         <label>ID Chart</label>
                        <select name="id_chart" class="form-control">
                                    @foreach($chart as $data)
                                    <option value="{{$data->id}}">{{$data->id}}</option>
                                    @endforeach
                                    </select>
                        <label>Tanggal Pembelian</label>
                        <input type="text" class="form-control" name="tgl_pembelian">
                        <label>Total Pembelian</label>
                        <input type="text" class="form-control" name="total_pembelian">
                    </div>
                    <div class="panel-body">
                     <button type="reset" class="btn btn-warning">Reset</button>
                     <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
               </form>
               @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
            </div>
       </div>
  </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                                    {{-- /TABLE --}}
                    <!-- /.row -->
                            <!-- /.panel-footer -->
                            </div>
                            <!-- /.panel .chat-panel -->
                        </div>
                        <!-- /.col-lg-4 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="{{asset('backend/js/jquery.min.js')}}"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="{{asset('backend/js/bootstrap.min.js')}}"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="{{asset('backend/js/metisMenu.min.js')}}"></script>

        <!-- Morris Charts JavaScript -->
        <script src="{{asset('backend/js/raphael.min.js')}}"></script>
        <script src="{{asset('backend/js/morris.min.js')}}"></script>
        <script src="{{asset('backend/js/morris-data.js')}}"></script>

        <!-- Custom Theme JavaScript -->
        <script src="{{asset('backend/js/startmin.js')}}"></script>

    </body>
</html>
