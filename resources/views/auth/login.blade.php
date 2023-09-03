<x-layout>
<div class="container  d-none d-sm-none d-md-block register-body">
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-6">
        <h2 class="register-title">Bentornato! Accedi per continuare a fare aquisti!</h2>
        <form action="{{route('login')}}" method="post">
          @csrf
          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label register-text">Email address</label>
          <input type="email" name="email" class="form-control shadow" id="exampleInputEmail1" aria-describedby="emailHelp">
          <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label register-text">Password</label>
          <input type="password"  name="password"class="form-control shadow" id="exampleInputPassword1">
        </div>
        <div class="d-flex justify-content-end">
          <button type="submit" class="register-btn my-3 shadow">Log In</button>
        </div>
      </form>
      </div>
      <div class="col-12 row col-md-6">
        <img class="register-img col" src="/img/cinese2.png" alt="">
      </div>
    </div>
  </div>
</div>
 {{-- smart --}}
 <div class="container  d-block d-sm-block d-md-none  register-body">
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-6">
        <h2 class="register-title">Bentornato! Accedi per continuare a fare aquisti!</h2>
        <form action="{{route('login')}}" method="post">
          @csrf
          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label register-text">Email address</label>
          <input type="email" name="email" class="form-control shadow" id="exampleInputEmail1" aria-describedby="emailHelp">
          <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label register-text">Password</label>
          <input type="password"  name="password"class="form-control shadow" id="exampleInputPassword1">
        </div>
        <div class="d-flex justify-content-end">
          <button type="submit" class="register-btn my-3 shadow">Log In</button>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>





</x-layout>