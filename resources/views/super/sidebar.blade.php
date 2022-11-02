<ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li>
              <a href="{{url('home')}}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i data-feather="user"></i><span>Student</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{url('add_student')}}">Add student</a></li>
                <li><a class="nav-link" href="">Upload student</a></li>
                <li><a class="nav-link" href="{{url('showstudent')}}">Manage Student</a></li>
              </ul>
            </li>
              <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i data-feather="user"></i><span>Admission</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{url('showadmission')}}">Manage admission</a></li>
              </ul>
            </li>
           
               <li class="menu-header">Course</li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i data-feather="copy"></i><span>Course</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{url('add_course')}}">Add course</a></li>
                <li><a class="nav-link" href="{{url('showcourse')}}">Manage course</a></li>
              </ul>
            </li>
            <li class="menu-header">Team</li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i data-feather="copy"></i><span>Team</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{url('add_team')}}">Add team</a></li>
                <li><a class="nav-link" href="{{url('showteam')}}">Manage team</a></li>
              </ul>
            </li>
           
            <li class="menu-header">User Feedback</li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i data-feather="file"></i><span>Feedback & Message</span></a>
              <ul class="dropdown-menu">
                <li><a href="{{url('list_feedback_view')}}">List of Feedbacks</a></li>
                <li><a href="{{url('message_view')}}">User Message</a></li>
              </ul>
            </li>
         
          
            <li class="menu-header">Reports & Others</li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i data-feather="file"></i><span>Students Reports</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{url('individual_student')}}">Individual Report</a></li>
                <li><a href="{{url('general_report')}}">General Report</a></li>
              </ul>
            </li>
            <li class="menu-header">Tracking User</li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i data-feather="file"></i><span>user activity</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{url('user_activity')}}">user activity</a></li>
              </ul>
            </li>
          </ul>