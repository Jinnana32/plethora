<!DOCTYPE html>
<html lang="en">
<head>
      <!-- Admin header -->
      @include('landing.layouts.header')
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
    @include('landing.layouts.agent_navigation')

 <!-- Header -->
 @include('public.layout.pub_agent_masthead')

 <section style = "background-color:#f3f3f3;padding-top:40px;padding-bottom:30em;" id="gallery">
    <div class="container">
      <div class="row">

        <div class="col-md-12">
            <div class = "col-md-12  col-form-header">
              <div class="dot-header"></div>
              <span>My inbox</span>
            </div>

            <table class="table" role="grid">
                <thead>
                <tr role="row">
                    <th class="sorting_asc">Date</th>
                    <th class="sorting">Name</th>
                    <th class="sorting">Email</th>
                    <th class="sorting">Message</th>
                </tr>
                </thead>
                <tbody>
                    <tr role="row" class="odd">
                        <td class="sorting_1">October 12, 2019</td>
                        <td>tj coyoca</td>
                        <td>tjcoyoca17@gmail.com</td>
                        <td>Hi cer mike sa diin ni pwedi makita</td>
                    </tr>
                </tbody>
                </table>

        </div>

      </div>
    </div>
</section>


    <!-- Admin header -->
    @include('landing.layouts.footer')


</body>
</html>
