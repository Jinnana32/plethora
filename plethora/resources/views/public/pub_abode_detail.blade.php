
<!DOCTYPE html>
<html lang="en">
<head>
      <!-- Admin header -->
      @include('landing.layouts.header')
      <link rel="stylesheet" href="{{ url("vendor/css/phr-listing.css") }}">

    <style>
        .team-member {
            margin-bottom: 50px;
            text-align: center;
            background-color: #fff;
            border: 0;
            border-radius: 10px;
            padding: 30px 20px 20px;
        }

        .team-member h4 {
            color: #404040;
        }

        .team-member p {
            color: #505050 !important;
        }
        .phr-card {
            height:100%;
            background-color: #fff;
            box-shadow: 0 1px 14px rgba(0,0,0,0.09);
            padding:10% 5%;
        }
        .phr-agent-image {
            width: 200px;
            height: 200px;
            border-radius: 100%;
        }
        .sub-mast-info {
            background: rgba(0,0,0,0.5);
            padding-left:2rem;
            padding-top:20px;
            margin-top:-2rem;
            border-radius: 10px;
            position: relative;
        }

        .phr-star-holder {
            position: absolute;
            right:1rem;
            top:1rem;
        }

        .phr-star-holder .checked {
            color:yellow;
        }
    </style>
</head>

<body id="page-top">

    <!-- Plethora headline -->
    <div class = "phr-headline">
        <div class="container text-right">
            <span><i class="fa fa-inbox"></i> plethorahomes@gmail.com</span>
            <span><i class="fa fa-phone"></i> 0921-7298-758</span>
        </div>
    </div>

    <!-- Plethora Navigation -->
    @include('landing.layouts.navigation')

  <!-- Header -->
  <header class="sub-masthead">
                <div class="container">
                    <div class="row">
                        <div class="col-md-1 sub-mast-back" style = "font-size:2rem;">
                            <a href = "{{ url("/") }}"><i class = "fa fa-angle-left"></i></a>
                        </div>
                        <div class="col-md-6 sub-mast-text">
                            <h1>{{ $abode->project_name }}</h1>
                        </div>
                    </div>
                </div>
              </header>

              <section style = "background-color:#f3f3f3;padding-top:40px;padding-bottom:40px;" id="gallery">
                    <div class="container">
                      <div class="row">

                        <div class="col-md-8">
                            <h2>Abode Details</h2>

                            <div class="row">

                                        <div class="col-md-12">
                                            <img style = "width:100%; height:100%;" src="{{ str_replace("/public", "", url("")) }}/storage/app/public/abode/{{ $abode->image }}"/>
                                        </div>

                                        <div class = "col-xs-12 col-form-header">
                                                <div class="dot-header"></div>
                                                <span>Project Related</span>
                                        </div>

                                        <div class="col-md-12">
                                                <table id="example2" class="table" role="grid" aria-describedby="example2_info">
                                                        <tbody>
                                                                <tr role="row" class="odd">
                                                                        <td class="sorting_1">Developer:</td>
                                                                        <td>{{ $developer->name }}</td>
                                                                </tr>
                                                                <tr role="row" class="odd">
                                                                        <td class="sorting_1">Project Name:</td>
                                                                        <td>{{ $abode->project_name }}</td>
                                                                </tr>
                                                        </tbody>
                                                        </table>
                                                </div>

                                        <div class = "col-xs-12 col-form-header">
                                                <div class="dot-header"></div>
                                                <span>Listing</span>
                                        </div>

                                        <div class="col-md-12">
                                                <table id="example2" class="table" role="grid" aria-describedby="example2_info">
                                                        <tbody>
                                                            <tr role="row" class="odd">
                                                                    <td class="sorting_1">Category:</td>
                                                                    <td>{{ $abode->category }}</td>
                                                            </tr>
                                                            <tr role="row" class="odd">
                                                                    <td class="sorting_1">Location:</td>
                                                                    <td>{{ $abode->location }}</td>
                                                            </tr>
                                                        </tbody>
                                                        </table>
                                        </div>

                                        <div class = "col-xs-12 col-form-header">
                                                <div class="dot-header"></div>
                                                <span>Pricing</span>
                                        </div>

                                        <div class="col-md-12">
                                                <table id="example2" class="table" role="grid" aria-describedby="example2_info">
                                                        <tbody>
                                                                <tr role="row" class="odd">
                                                                        <td class="sorting_1">Monthly Payment:</td>
                                                                        <td>{{ $abode->monthly_payment }}</td>
                                                                </tr>
                                                                <tr role="row" class="odd">
                                                                        <td class="sorting_1">Total Contract Price:</td>
                                                                        <td>{{ $abode->total_contract_price }}</td>
                                                                </tr>
                                                                <tr role="row" class="odd">
                                                                        <td class="sorting_1">Net Selling Price:</td>
                                                                        <td>{{ $abode->net_selling_price }}</td>
                                                                </tr>
                                                        </tbody>
                                                        </table>
                                        </div>

                                    </div>



                        </div>

                        <div class="col-md-4">

                        <div class="row">
                                <div class="col-md-12">
                                        <div class = "phr-card">

                                                <h3>Contact</h3>
                                                        <form>
                                                        <div class="form-group">
                                                                <label for="exampleInputEmail1">Email</label>
                                                                <input type="number" class="form-control" id="exampleInputEmail1" name = "project_name" required/>
                                                        </div>

                                                        <div class="form-group">
                                                                <label for="exampleInputEmail1">Name</label>
                                                                <input type="number" class="form-control" id="exampleInputEmail1" name = "project_name" required/>
                                                        </div>

                                                        <div class="form-group">
                                                                <label for="exampleInputEmail1">Message</label>
                                                                <textarea class = "form-control" name="message" id="1" cols="10" rows="10"></textarea>
                                                        </div>

                                                        <button class = "btn btn-primary btn-block">Submit</button>
                                                        </form>
                                        </div>
                                </div>
                        </div>

                        <div class="row" style = "margin-top:30px;">
                            <div class="col-md-12">
                                    <div class = "phr-card">

                                            <h3>Mortrage Calculator</h3>
                                            <form>
                                            <div class="form-group">
                                                    <label for="exampleInputEmail1">Contract Pice</label>
                                                    <input type="number" class="form-control" id="exampleInputEmail1" value = "5700005" name = "project_name" required/>
                                            </div>

                                            <div class="form-group">
                                                    <label for="exampleInputEmail1">Downpayment</label>
                                                    <input type="number" class="form-control" id="exampleInputEmail1" name = "project_name" required/>
                                            </div>

                                            <div class="form-group">
                                                    <label for="exampleInputEmail1">Loan Term</label>
                                                    <input type="number" class="form-control" id="exampleInputEmail1" name = "project_name" required/>
                                            </div>

                                            <div class="form-group">
                                                    <label for="exampleInputEmail1">Interest</label>
                                                    <input type="number" class="form-control" id="exampleInputEmail1" name = "project_name" required/>
                                            </div>

                                            <button class = "btn btn-info btn-block">Calculate</button>
                                            </form>
                                        </div>
                            </div>
                        </div>

                        </div>

                      </div>
                    </div>
                  </section>
    <!-- Admin header -->
    @include('landing.layouts.footer')

</body>
</html>
