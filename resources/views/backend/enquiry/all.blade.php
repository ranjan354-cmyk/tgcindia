@extends('backend.layouts.app')
@section('content')



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   
   <div class="row mart10 padd">
        <div class="col-md-12">
          <form class="row" method="get" action="">
              <div class="col-md-2 no-padding-left">
                <div class="form-group">
                  <input type="date" class="form-control" name="from_date" value="<?= $data['from_date'] ?? ''; ?>">
                </div>
              </div>
               <div class="col-md-2 no-padding-left">
                <div class="form-group">
                  <input type="date" class="form-control" name="to_date" value="<?= $data['to_date'] ?? ''; ?>">
                </div>
              </div>
              
            <div class="col-md-2 no-margin-left">
                <div class="form-group">
                    <input type="text" name="keyword" class="form-control" placeholder="Keywords" value="<?=$data['keyword'];?>">
                </div>
              </div>
              <div class="col-md-2 no-padding-left">
                <div class="form-group">
                  <select class="form-control select2" name="r_page">
                    <option value="25"> 25 Records Per Page</option>
                    <option <?php if($data['r_page'] == '50'){ echo "selected"; } ?> value="50"> 50 Records Per Page</option>
                    <option <?php if($data['r_page'] == '100'){ echo "selected"; } ?> value="100"> 100 Records Per Page</option>
                  </select>
                </div>
              </div>

              <div class="col-md-2 no-padding-left">
                        <div class="form-group">
                            <select class="form-control select2" name="form_type">
                                <option value="">All Page Name</option>
                                @foreach ($page as $pgs)
                                    <option {{ $data['form_type'] == $pgs->form_type ? 'selected' : '' }} value="{{ $pgs->form_type }}">
                                        {{ $pgs->form_type }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>


              <div class="col-md-1 no-padding-left">
                <div class="form-group " >
                    <button type="submit" class="btn btn-primary" > Filter</button> 
                </div>
              </div>
            </form>
        </div>
        


      
   </div>


    


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">Enquiry Management</h3>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <form method="post" action="downloadcsv" >
                  <div class="row">
                    <div class="col-md-2 no-padding-left">
                <div class="form-group">
                    
                  <input type="date" class="form-control" name="from_date" required >
                </div>
              </div>
               <div class="col-md-2 no-padding-left">
                <div class="form-group">
                  <input type="date" class="form-control" name="to_date" required>
                </div>
              </div>
                    @csrf
                <button class="btn btn-primary" type="submit" style="    text-align: center;
    margin-inline: 10px;" onclick="downloadCsv('hello')">Download Leads</button>
    </div>
</form>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                @if (\Session::has('success'))
                    <div class="alert alert-success">
                        {!! \Session::get('success') !!}
                    </div>
                @endif
                @if($page->total() > 0)
                <div class="table-responsive p-0">
                  <table class="table table-hover text-nowrap1">
                    <thead>
                      <tr>
                        <th>Sno</th>
                          <th>Date </th>
                        <th>Page Name</th>
                          <th>Page URL</th>
                        <th> Name</th>
                        <th> Phone</th>
                        <th> Email</th>
                       
                        <th>Message</th>
                        <th>Company Name</th>
                        <th>Training</th>
                        <th>Subject</th>
                        <th>Location</th>
                        <th>Course Interest</th>
                        <th>Position</th>
                        <th>Keyskill</th>
                        <th>Time Availability</th>
                        <th>Number</th>
                        <th>DOB</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Zipcode</th>
                        <th>DOJ</th>
                        <th>Country</th>
                        <th>From Title</th>
                        <th>From </th>
                        <th>Start Date</th>
                        <th>Course Name</th>
                        <th>Technology</th>
                        <th>Education</th>
                        <th>College Name</th>
                        <th>Linkedin Profile</th>
                        <th>About Course</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($page as $pgs)
                      <tr>
                        <td>{{$i+1}}</td>
                         <td>@php
                       echo   $newDate = date("d-m-Y h:i:A", strtotime($pgs->updated_at));
                         
                         @endphp
                             
                            </td>
                        <td>{{$pgs->form_type}}</td>
                        <td>{{$pgs->page_url}}</td>
                        <td>{{$pgs->name}}</td>
                        
                       
                        <td>{{$pgs->phone}}</td>
                         <td>{{$pgs->email}}</td>
                        <td>{{$pgs->message}}</td>
                        <td>{{$pgs->company_name}}</td>
                        <td>{{$pgs->training}}</td>
                        <td>{{$pgs->subject}}</td>
                        <td>{{$pgs->location}}</td>
                        <td>{{$pgs->course_interest}}</td>
                        <td>{{$pgs->position}}</td>
                        <td>{{$pgs->keyskill}}</td>
                        <td>{{$pgs->time_availability}}</td>
                        <td>{{$pgs->number}}</td>
                        <td>{{$pgs->dob}}</td>
                        <td>{{$pgs->city}}</td>
                        <td>{{$pgs->state}}</td>
                        <td>{{$pgs->zipcoad}}</td>
                        <td>{{$pgs->doj}}</td>
                        <td>{{$pgs->country}}</td>
                        <td>{{$pgs->from_title}}</td>
                        <td>{{$pgs->from}}</td>
                        <td>{{$pgs->start_date}}</td>
                        <td>{{$pgs->course_name}}</td>
                        <td>{{$pgs->technology}}</td>
                        <td>{{$pgs->education}}</td>
                        <td>{{$pgs->college_name}}</td>
                        <td>{{$pgs->linkedin}}</td>
                        <td>{{$pgs->about_course}}</td>
                        
                        
                      </tr>
                      <?php ++$i; ?>
                      @endforeach

                      

                    </tbody>
                  </table>
                </div>
                <div class="gmz-pagination">
                    {!! $page->links('pagination::bootstrap-4') !!}
                </div>

                @else
                    <div class="alert alert-warning">{{__('No data')}}</div>
                @endif
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                
              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  


  


@endsection