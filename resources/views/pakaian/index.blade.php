<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="pakaian" content="">

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

            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Pakaian</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                                        {{-- TABLE --}}
                                            <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                               Data Pakaian
                               <a href="{{ route('pakaian.create')}}" class="btn btn-primary float-right">Tambah</a>
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="table-responsive table-bordered">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Pakaian</th>
                                                <th>Nama Merk</th>
                                                <th>jenis Pakaian</th>
                                                <th>Bahan</th>
                                                <th>Ukuran</th>
                                                <th>Harga</th>
                                                <th>Nama Supplier</th>
                                                <th>Foto</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @php $no=1; @endphp
                                        @foreach($pakaian as $data)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $data->nama }}</td>
                                                <td>{{ $data->merk->nama_merk }}</td>
                                                <td>{{ $data->jenisBarang->jenis_barang }}</td>
                                                <td>{{ $data->bahan }}</td>
                                                <td>{{ $data->ukuran }}</td>
                                                <td>{{ $data->harga }}</td>
                                                <td>{{ $data->supplier->nama }}</td>
                                                <td><img src="{{ asset("image/pakaian/".$data->foto) }}" alt="" style="width:150px; height:150px;"
                                                alt="foto"></td>
                                        <td>
                                                <td>
                                                <form action="{{route('pakaian.destroy',$data->id)}}" method="post">
                                                @method('delete')
                                                @csrf

                                                <a href="{{route('pakaian.edit',$data->id)}}" class="btn btn-success float-right">Edit</a>
                                                <a href="{{route('pakaian.show',$data->id)}}" class="btn btn-warning float-right">Show</a>
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus ini?');">Delete</button>
                                                </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
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
