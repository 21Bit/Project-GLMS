<div class="sidebar" data-color="orange">
    {{-- <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text">
            {{ config("app.name") }}
        </a>
    </div> --}}
    <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
            <li class="{{ menuHighLighter('dashboard', 2, 'active') }}"">
                <a href="{{ route('student.dashboard.index') }}">
                    <i class="now-ui-icons design_app"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="{{ menuHighLighter('transaction', 2, 'active') }}">
                <a href="{{ route('student.transaction.index') }}">
                    <i class="now-ui-icons location_map-big"></i>
                    <p>Transactions</p>
                </a>
            </li>
            <li class="{{ menuHighLighter('class', 2, 'active') }}">
                <a href="{{ route('student.class.index') }}">
                    <i class="now-ui-icons design_bullet-list-67"></i>
                    <p>Class</p>
                </a>
            </li>
            <li class="{{ menuHighLighter('proofreading', 2, 'active') }}">
                <a href="{{ route('student.proofreading.index') }}">
                    <i class="now-ui-icons text_align-center"></i>
                    <p>
                        Proof Reading 
                        <span class="menu-badge">1</span>
                    </p>
                </a>
            </li>
            <li class="{{ menuHighLighter('message', 2, 'active') }}">
                <a href="{{ route('student.message.index') }}">
                    <i class="now-ui-icons text_align-center"></i>
                    <p>
                        Message
                        <span class="menu-badge">1</span>
                    </p>
                </a>
            </li>
            <li>
                <a href="./notifications.html">
                    <i class="now-ui-icons media-2_sound-wave"></i>
                    <p>Ratings</p>
                </a>
            </li>
          
        </ul>
    </div>
</div>