<!DOCTYPE html>
<html lang="en">
<head>
      <!-- Admin header -->
      @include('landing.layouts.header')
</head>

<body id="page-top">

     <!-- Plethora Navigation -->
     @include('landing.layouts.headline')

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
                    <th class="sorting">Message</th>
                    <th class="sorting">Email</th>
                    <th class="sorting">Contact</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($inboxes as $inbox)
                        <tr role="row" class="odd">
                            <td class="sorting_1">{{ $inbox->date_created }}</td>
                            <td>{{ $inbox->client_name }}</td>
                            <td>{{ $inbox->message }}</td>
                            <td>{{ $inbox->email_address }}</td>
                            <td>{{ $inbox->mobile_number }}</td>
                        </tr>
                    @endforeach
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
