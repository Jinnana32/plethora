            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                    <!-- sidebar: style can be found in sidebar.less -->
                    <section class="sidebar">
                      <!-- Sidebar user panel -->
                      <div class="user-panel">
                        <div class="pull-left info">
                          @if (Auth::user()->type == 1)
                            <p>Plethora Admin</p>
                          @else
                            <p>{{ Auth::user()->username }}</p>
                          @endif
                            <a href="phradmin/dashboard"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                      </div>

                      <!-- sidebar menu: : style can be found in sidebar.less -->
                      <ul class="sidebar-menu" data-widget="tree">



                        @if (Auth::user()->type == 1)
                        <li class = "header phr-list-header">Manage</li>
                        <li>
                            <a href="{{ url("phradmin/dashboard") }}">
                              <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        @endif

                        <!-- Only Admin or Listing Encoder -->
                        @if (Auth::user()->type == 1 || Auth::user()->type == 3)
                        <li class = "header phr-list-header">Manage</li>
                        <!-- Listings -->
                        <li class="treeview">
                          <a href="#">
                            <i class="fa fa-stack-overflow"></i>
                            <span>Listings</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                          </a>
                          <ul class="treeview-menu" style="display: none;">
                            <li><a href="{{ url("phradmin/abode") }}"><i class="fa fa-circle-o"></i> View All Listings</a></li>
                            <li><a href="{{ url("phradmin/customize/developers") }}"><i class="fa fa-steam"></i>  Developers</a></li>
                            <li><a href="{{ url("phradmin/customize/location") }}"><i class="fa fa-map"></i> Locations</a></li>
                            <li><a href="{{ url("phradmin/customize/category") }}"><i class="fa fa-book"></i> Categories</a></li>
                            <li> <a href="{{ url("phradmin/customize/feature") }}"><i class="fa fa-cubes"></i> Features</a></li>
                          </ul>
                        </li>
                          <!-- End of Listings -->
                        @endif

                        @if (Auth::user()->type == 1 || Auth::user()->type == 4)
                        <li class = "header phr-list-header">Manage</li>
                        <!-- Admin -->
                        <li class="treeview">
                          <a href="#">
                            <i class="fa fa-users"></i>
                            <span>Agents</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                          </a>
                          <ul class="treeview-menu" style="display: none;">
                            <li><a href="{{ url("phradmin/agents/create") }}"><i class="fa fa-user"></i> Add Agent</a></li>
                            <li><a href="{{ url("phradmin/agents") }}"><i class="fa fa-circle-o"></i> Approved</a></li>
                            <li><a href="{{ url("phradmin/pending_agents") }}"><i class="fa fa-circle-o"></i> Pending</a></li>
                          </ul>
                        </li>
                          <!-- Admin -->
                          @endif

                         @if (Auth::user()->type == 1 || Auth::user()->type == 2)
                         <li class = "header phr-list-header">Keep track</li>
                         <li>
                          <a href="{{ url("phradmin/track/compensation") }}">
                            <i class="fa fa-stack-overflow"></i> <span>Sales</span>
                          </a>
                         </li>
                         @endif

                         @if (Auth::user()->type == 1)
                          <li>
                            <a href="{{ url("phradmin/track/milestone") }}">
                              <i class="fa fa-stack-overflow"></i> <span>Milestones</span>
                            </a>
                          </li>

                          <li>
                              <a href="{{ url("phradmin/track/incentives") }}">
                                <i class="fa fa-stack-overflow"></i> <span>Incentives</span>
                              </a>
                          </li>

                          <li>
                              <a href="{{ url("phradmin/track/logging") }}">
                                <i class="fa fa-stack-overflow"></i> <span>Logs</span>
                              </a>
                          </li>
                          @endif

                        @if (Auth::user()->type == 1)
                        <li class = "header phr-list-header">Learnings</li>

                        <li>
                          <a href="{{ url("phradmin/learning/trainings") }}">
                           <i class="fa fa-cubes"></i> <span>Trainings</span>
                         </a>
                        </li>

                        <li>
                          <a href="{{ url("phradmin/learning/webinars") }}">
                          <i class="fa fa-cubes"></i> <span>Webinars</span>
                          </a>
                        </li>
                        @endif

                        <li class = "header phr-list-header">Settings</li>


                        <li>
                            <a href="{{ url("phradmin/settings/account") }}">
                             <i class="fa fa-cog"></i> <span>My Account</span>
                           </a>
                        </li>

                        @if (Auth::user()->type == 1)
                        <li>
                            <a href="{{ url("phradmin/settings/website") }}">
                             <i class="fa fa-globe"></i> <span>Website</span>
                           </a>
                        </li>
                        @endif

                      </ul>
                    </section>

                    <!-- /.sidebar -->
                  </aside>