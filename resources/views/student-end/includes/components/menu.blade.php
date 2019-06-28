<nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
           
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
                  <li class="nav-item dropdown">
          <a
            class="nav-link dropdown-toggle"
            id="navbarDropdownMenuLink"
            data-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="true"
          >
            <i class="now-ui-icons ui-1_bell-53"></i>
            <p>
              <span class="d-lg-none d-md-block">Some Actions</span>
            </p>
          </a>
          <div
            class="dropdown-menu dropdown-menu-right p-0 dropdown-notification"
            aria-labelledby="navbarDropdownMenuLink"
          >
            <a class="dropdown-item" href="#">
              <span>May 20, 2019</span>
              <div class="d-flex">
                <div style="width:36px;" class="pr-1">
                  <img
                    src="http://127.0.0.1/images/placeholders/male-sm.png"
                    alt=""
                    class="rounded-circle pr-1"
                    align="left"
                  />
                </div>
                <div>
                  <b>Jofie Bernas</b> <br />
                  has Rate you on your Class
                </div>
              </div>
            </a>
            <a class="dropdown-item" href="#">
              <span>May 20, 2019</span>
              <div class="d-flex">
                <div style="width:36px;" class="pr-1">
                  <img
                    src="http://127.0.0.1/images/placeholders/male-sm.png"
                    alt=""
                    class="rounded-circle pr-1"
                    align="left"
                  />
                </div>
                <div>
                  <b>Jofie Bernas</b> <br />
                  Has reply on your message
                </div>
              </div>
            </a>
            <a class="dropdown-item text-center" href="#">
              Show All Notifications
            </a>
          </div>
        </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="now-ui-icons users_single-02"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Account</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="{{ route('student.profile') }}">Profile</a>
                  <a class="dropdown-item" href="{{ route('student.profile.changepassword') }}">Change Password</a>
                  <a class="dropdown-item" onclick="event.preventDefault();
							                    document.getElementById('logout-form').submit();"  href="{{ route('logout') }}">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>