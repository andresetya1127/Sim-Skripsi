@extends('template.template')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table-buku" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 10px;">status</th>
                                    <th>NIM</th>
                                    <th>Username</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">

                                    </td>
                                    <td>TI16190003</td>
                                    <td>Andre17</td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-outline-danger">
                                            <i class="fas fa-user-times text-danger" style="font-size: 1rem"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">

                                    </td>
                                    <td>TI16190003</td>
                                    <td>Andre17</td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-outline-success">
                                            <i class="fas fa-user-times text-success" style="font-size: 1rem"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@section('manual_script')
    <script>
        $('#datetime').datetimepicker({
            format: 'MM/DD/YYYY H:mm',
        });
        $('#datepicker').datetimepicker({
            format: 'MM/DD/YYYY',
        });
        $('#timepicker').datetimepicker({
            format: 'h:mm A',
        });

        $('#basic').select2({
            theme: "bootstrap"
        });

        $('#multiple').select2({
            theme: "bootstrap"
        });

        $('#multiple-states').select2({
            theme: "bootstrap"
        });

        $('#tagsinput').tagsinput({
            tagClass: 'badge-info'
        });

        $(function() {
            $("#slider").slider({
                range: "min",
                max: 100,
                value: 40,
            });
            $("#slider-range").slider({
                range: true,
                min: 0,
                max: 500,
                values: [75, 300]
            });
        });
    </script>
@endsection
@endsection
