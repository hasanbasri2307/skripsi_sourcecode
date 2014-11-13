<aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
                  <li>
                      <a class="{{(Request::is('admin/dashboard')) ? 'active' : ''}}" href="{{URL::to('admin/dashboard')}}">
                          <i class="icon-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" class="@if(Request::is('admin/users/*')) {{ 'active' }} @endif  " >
                         <i class="icon-user"></i>
                         <span>Users</span>
                      </a>
                       <ul class="sub">
                           <li class="{{(Request::is('admin/users/index/admin')) ? 'active' :''}}"><a  href="{{route('admin.users.index','admin')}}">Administrator</a></li>
                           <li class="{{(Request::is('admin/users/index/cso')) ? 'active' :''}}"><a  href="{{route('admin.users.index','cso')}}">CSO</a></li>
                           <li class="{{(Request::is('admin/users/index/client')) ? 'active' :''}}"><a  href="{{route('admin.users.index','client')}}">Clients</a></li>
                       </ul>
                  </li>
                  <li>
                      <a class="@if(Request::is('admin/docs/*') || Request::is('admin/docs')) {{ 'active' }} @endif " href="{{route('admin.docs.index')}}">
                          <i class="icon-book"></i>
                          <span>Docs</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="@if(Request::is('admin/report/*') || Request::is('admin/report')) {{ 'active' }} @endif" >
                          <i class="icon-bar-chart"></i>
                          <span>Report</span>
                      </a>
                      <ul class="sub">
                          <li class="@if(Request::is('admin/report/*') || Request::is('admin/report')) {{ 'active' }} @endif" ><a  href="{{route('admin.report_user.index')}}">Users Report</a></li>

                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" class="@if(Request::is('admin/changePassword') || Request::is('admin/profile') || Request::is('admin/profile/*')) {{ 'active' }} @endif">
                          <i class="icon-cogs"></i>
                          <span>Settings</span>
                      </a>
                      <ul class="sub">
                          <li class="@if(Request::is('admin/changePassword')) {{ 'active' }} @endif"><a  href="{{route('admin.changepassword')}}">Change Password</a></li>
                          <li class="@if(Request::is('admin/profile') || Request::is('admin/profile/*') ) {{ 'active' }} @endif"><a  href="{{route('admin.profile')}}">Profile</a></li>

                      </ul>
                  </li>
                 

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>