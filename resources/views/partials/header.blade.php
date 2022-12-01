<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
      <a class="navbar-brand" href="{{ route('user.profile') }}">The ACME Pet Clinic</a>

    </div>
     <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
              
                <li>
                    <a href="{{ route('customers.index') }}">
                        <i class="fa fa-users" aria-hidden="true"></i> Customer
                    </a>
                </li>
                <li>
                  <a href="{{ route('pets.index') }}">
                      <i class="fa fa-paw" aria-hidden="true"></i> Pet
                  </a>
              </li>
              <li>
                <a href="{{ route('employees.index') }}">
                    <i class="fa-solid fa-users" aria-hidden="true"></i> Employee
                </a>
            </li>
                <li>
                    <a href="{{ route('services.index') }}">
                        <i class="fa fa-cog" aria-hidden="true"></i> Services
                    </a>
                </li>


                <li>
                  <a href="{{ route('consultations.index') }}">
                      <i class="fa fa-plus-square" aria-hidden="true"></i> Consultations
                  </a>
              </li>
              <li>
                <a href="{{ route('shops.index') }}">
                    <i class="fa fa-plus-square" aria-hidden="true"></i> Transaction
                </a>
            </li>

            <li>
              <a href="{{ route('shop.shoppingCart') }}">
                  <i class="fa fa-shopping-cart" aria-hidden="true"></i> Shopping Cart
                  <span class="badge">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span>
              </a>
          </li>
      
              
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false"><i class="fa fa-users" aria-hidden="true"></i> User Management <span
                                class="caret"></span></a>
         <ul class="dropdown-menu">
            @if (Auth::check())
              <li><a href="{{ route('user.profile') }}">User Profile</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="{{ route('user.logout') }}">Logout</a></li>
            @else
              <li><a href="{{ route('user.signup') }}">Signup</a></li>
              <li><a href="{{ route('user.signin') }}">Signin</a></li>
            @endif
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>