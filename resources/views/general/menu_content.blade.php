

<nav class="bottom-navbar">
   <div class="container">
      <ul class="nav page-navigation">
         <li class="nav-item">
            <a class="nav-link" href="{{url('/home')}}">
            <span class="menu-title"><i class="fa fa-home"></i> Dashboard</span>
            </a>
         </li>
         <!--
          <li class="nav-item">
              <a href="#" class="nav-link">
                  <span class="menu-title"><i class="fa fa-cogs"></i> Revenue Stream</span> &nbsp;
                  <i class="fa fa-caret-down"></i></a>
              <div class="submenu">
                  <ul class="submenu-item">
                      <li class="nav-item"><a class="nav-link" href="">Tenement Rate</a></li>
                      <li class="nav-item"><a class="nav-link" href="">Motor Park Levy or
                              Park Registration</a></li>
                      <li class="nav-item"><a class="nav-link" href="">Signboard and
                              Advertisement</a></li>
                      <li class="nav-item"><a class="nav-link" href="#">Marriage Registration</a></li>
                      <li class="nav-item"><a class="nav-link" href="#">Birth Registration</a></li>
                      <li class="nav-item"><a class="nav-link" href="#">Vehicle Radio License</a></li>
                  </ul>
              </div>
          </li>
        -->
          <li class="nav-item">
            <a class="nav-link" href="{{url('pay-tax')}}">
            <span class="menu-title"><i class="fa  fa-th"></i> Pay Tax</span>
            </a>
         </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('tin')}}">
            <span class="menu-title"><i class="fa fa-bars"></i> Validate Tin</span>
            </a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="{{url('tax-payer')}}">
            <span class="menu-title"><i class="fa fa-users"></i> Tax Payer</span>
            </a>
         </li>

@can('isAdmin')
         <li class="nav-item">
             <a href="#" class="nav-link">
                 <span class="menu-title"><i class="fa fa-cogs"></i> Configuration</span> &nbsp;
                 <i class="fa fa-caret-down"></i></a>
             <div class="submenu">
                 <ul class="submenu-item">
                     <li class="nav-item"><a class="nav-link" href="{{'/users/register'}}">Users</a></li>
                     <li class="nav-item"><a class="nav-link" href="{{'/payments/create'}}">Create New Taxes and Levy</a></li>
                     <li class="nav-item"><a class="nav-link" href="{{'/configurations/create'}}">Configure Prices</a></li>
                     <li class="nav-item"><a class="nav-link" href="{{'/roles/create'}}">Add Role</a></li>

                 </ul>
             </div>
         </li>

@endcan

      </ul>
   </div>
</nav>
