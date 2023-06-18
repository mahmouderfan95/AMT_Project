<div class="link">
    @if(auth('web')->user())
        <div class="edt">
        <img src="{{asset('dashboard/uploads/staffs/' . auth('web')->user()->image)}}" alt="" />
        <a href="#" rel="noopener noreferrer">{{auth('web')->user()->name}}</a>
        <button
            type="button"
            class="btn btn-secondary dow dropdown-toggle"
            id="dropdownMenuOffset"
            data-bs-toggle="dropdown"
            aria-expanded="false"
            data-bs-offset="10,20"
        ></button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
            <li>
                <a onclick="myFunction_edit_profile()" class="dropdown-item lang btn_edit_profile" href="#"
                ><i class="fa-solid fa-pen-to-square"></i> edit profile</a
                >
            </li>
            <li>
                <a class="dropdown-item lang" href="#"
                ><i class="fa-solid fa-globe"></i> language change</a
                >
            </li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="dropdown-item lang" type="submit">
                        <i class="fa-solid fa-arrow-up-from-bracket"></i> logout
                    </button>
                </form>

            </li>
        </ul>
    </div>
    @endif
    <a href="{{route('home')}}" rel="noopener noreferrer">Home</a>
    <a href="{{route('mangeAttendance')}}" rel="noopener noreferrer"
    >Manage Attendance</a
    >
        @if(auth('web')->user()->person_type == 'super')
            <a href="{{route('staff_list')}}" rel="noopener noreferrer">Staff List</a>
        @endif
    <a href="{{route('student_list')}}" rel="noopener noreferrer"
    >Students List</a
    >
    <a href="{{route('course_list')}}" rel="noopener noreferrer"
    >Courses List</a
    >
    <a href="{{route('report')}}" rel="noopener noreferrer">Reports</a>
    <img
        class="attrnd"
        src="{{asset('system/img/337161739_757190335970682_6999940040612747794_n.png')}}"
        alt=""
    />
</div>
