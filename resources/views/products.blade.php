     @extends('layouts.master')
     @section('content')
        <!-- Content Body Start -->
        <div class="content-body">
             <div class="row">
                   <!--Export Data Table Start-->
                   <div class="col-12 mb-30">
                    <div class="box">
                        <div class="box-head">
                            <h3 class="title">Export Data Table</h3>
                        </div>
                        <div class="box-body">

                            <table class="table table-bordered data-table data-table-export">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Office</th>
                                        <th>Age</th>
                                        <th>Start date</th>
                                        <th>Salary</th>
                                    </tr>
                                </thead>
                              <tbody>
                                
                              </tbody>

                            </table>

                        </div>
                    </div>
                </div>
                <!--Export Data Table End-->
             </div>
        </div><!-- Content Body End -->
     @endsection
