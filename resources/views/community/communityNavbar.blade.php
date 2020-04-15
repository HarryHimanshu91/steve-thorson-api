<div class="row">
     <ul class="custom-navbar">
        <li class="custom-link {{ request()->segment('3') == 'dashboard' ? 'active' : '' }}"><a href="{{ route('admin.community.dashboard',['id'=>$id]) }}">Dashboard</a></li>
        <li class="custom-link {{ request()->segment('3') == 'member' ? 'active' : '' }}"><a href="{{ route('admin.community.member',['id'=>$id]) }}">Member</a></li>
        <li class="custom-link {{ request()->segment('3') == 'mapdata' ? 'active' : '' }}"><a href="{{ route('admin.community.mapdata',['id'=>$id]) }}">Map Data</a></li>
        <li class="custom-link {{ request()->segment('3') == 'event' ? 'active' : '' }}"><a href="{{ route('admin.community.createevent',['id'=>$id]) }}">Events </a></li>
        <li class="custom-link {{ request()->segment('3') == 'notification' ? 'active' : '' }}"><a href="{{ route('admin.community.createnotification',['id'=>$id]) }}">Notification </a></li>
        <!-- <li class="custom-link {{ request()->segment('3') == 'prompt' ? 'active' : '' }}"><a href="{{ route('admin.community.prompt',['id'=>$id]) }}">Prompt </a></li> -->
    </ul>

                   
</div>