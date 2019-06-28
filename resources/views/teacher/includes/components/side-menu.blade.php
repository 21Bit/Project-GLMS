<div class="sidebar" data-color="orange">
    <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text">
            {{ config("app.name") }}
        </a>
    </div>
    <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
            <li class="{{ menuHighLighter('dashboard', 2, 'active') }}"">
                <a href="{{ route('teacher.dashboard.index') }}">
                    <i class="now-ui-icons design_app"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="{{ menuHighLighter('class', 2, 'active') }}">
                <a href="{{ route('teacher.class.index') }}">
                    <i class="now-ui-icons design_bullet-list-67"></i>
                    <p>
                        Class
                        <span class="menu-badge">2</span>
                    </p>
                </a>
            </li>
            <li>
                <a href="{{ route('teacher.proofreading.index') }}">
                    <i class="now-ui-icons text_align-center"></i>
                    <p>
                        Proof Reading 
                        <span class="menu-badge">1</span>
                    </p>
                </a>
            </li>
            <li>
                <a href="./notifications.html">
                    <i class="now-ui-icons ui-1_email-85"></i>
                    <p>
                        Message 
                        <span class="menu-badge">15</span>
                    </p>
                </a>
            </li>
            <li>
                <a href="./notifications.html">
                    <i class="now-ui-icons ui-1_settings-gear-63"></i>
                    <p>Settings</p>
                </a>
            </li>
          
        </ul>
    </div>
</div>