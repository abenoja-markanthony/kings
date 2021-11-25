<nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/home') }}">
            {{ config('app.name', 'KINGS') }}
            {{-- MEGAWORLD MANILA --}}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('expenses.index') }}">DISBURSEMENTS <span class="sr-only">(current)</span></a>
                </li>               
          
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('employee.index') }}">EMPLOYEES <span class="sr-only">(current)</span></a>
                </li>  

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('staff.index') }}">STAFFS <span class="sr-only">(current)</span></a>
                </li> 

                @if (Auth::user()->access_level=="Admin")

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('report') }}">REPORTS <span class="sr-only">(current)</span></a>
                    </li>  

                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin-audit') }}">AUDIT <span class="sr-only">(current)</span></a>
                    </li>  
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pcso-pre-sales') }}">PCSO <span class="sr-only">(current)</span></a>
                    </li> 
                    
                @endif

                @if (Auth::user()->access_level=="Admin" OR Auth::user()->access_level=="User 1"  )

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('daily-cash-balance') }}">DCB <span class="sr-only">(current)</span></a>
                </li>       
                
                @endif
                
                

                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('receipt') }}">RECEIPTS <span class="sr-only">(current)</span></a>
                    </li>             --}}

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('daily-sales') }}">DAILY SALES <span class="sr-only">(current)</span></a>
                    </li>         

                     
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                           

                            <a class="dropdown-item" href="{{ route('change-pass') }}">
                                {{ __('Change Password') }}
                            </a>

                             @if (Auth::user()->access_level=="Admin" OR Auth::user()->access_level=="User 1"  OR Auth::user()->access_level=="User 2")
                                <a class="dropdown-item" href="{{ route('restore-backup') }}">
                                    {{ __('Restore/Backup SQL') }}
                                </a>
                            @endif

                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                             {{ __('Logout') }}
                         </a>

                         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                             @csrf
                         </form>
                            
                        </div>


                        
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>