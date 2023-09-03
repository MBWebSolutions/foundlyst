<x-layout >
  <div class="container d-none d-sm-none d-md-block register-body">
    <div class="container">
      <div class="row">
        <div class="col-6 col-md-6">
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-6">
          <h2 class="register-title">Ci sei quasi completa la registrazione per comprare e vendere cio che vuoi !</h2>
          <form action="{{route('register')}}" method="POST">
            @csrf
            
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label register-text ">Name</label>
                <input type="text" name="name" class="form-control shadow">
                <div id="emailHelp" class="form-text"></div>
              </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label register-text">Email address</label>
                  <input type="email" name="email" class="form-control shadow">
                  <div id="emailHelp" class="form-text"></div>
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label register-text">Password</label>
                  <input type="password" name="password" class="form-control shadow">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label register-text"> Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control shadow">
                </div>
                <div class="d-flex justify-content-end">
                  <button type="submit" class="register-btn my-3 shadow">Registrati</button>
                </div>
            </form>
        </div>
        <div class="col-12 row col-md-6">
          <img class="register-img col" src="/img/cinese3.png" alt="">
        </div>
      </div>
    </div>  
  </div>


  {{-- smart --}}
  <div class="container d-block d-sm-block d-md-none register-body">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-6">
          <h2 class="register-title">Ci sei quasi completa la registrazione per comprare e vendere cio che vuoi !</h2>
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-6">
          <form action="{{route('register')}}" method="POST">
            @csrf
            
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label register-text ">Name</label>
                <input type="text" name="name" class="form-control shadow">
                <div id="emailHelp" class="form-text"></div>
              </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label register-text">Email address</label>
                  <input type="email" name="email" class="form-control shadow">
                  <div id="emailHelp" class="form-text"></div>
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label register-text">Password</label>
                  <input type="password" name="password" class="form-control shadow">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label register-text"> Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control shadow">
                </div>
                <div class="d-flex justify-content-end">
                  <button type="submit" class="register-btn my-3 shadow">Registrati</button>
                </div>
            </form>
        </div>
      </div>
    </div>  
  </div>
</x-layout >