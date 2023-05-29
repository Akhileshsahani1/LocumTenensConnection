<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{asset('Css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('Css/style.css')}}" />
    <title>Success</title>
  </head>

  <body>
    <main>
      <div class="container">
        <div class="text-start my-5">
          <img src="{{asset('Assets/logo.svg')}}" style="width: 100px" alt="" />
        </div>
        <div class="row">
          <div class="col-md-4 col-lg-5 m-auto text-center">
            <div  class="m-auto my-3" >
              <img src="{{asset('Assets/images/success.png')}}" class="img-fluid" alt="">
            </div>
            <div class="">
              <div class="mb-4">
                <h1 class="fw-bold mb-0 welcom-heading">Success!</h1>
                <h4 class="fw-semibold mb-0 dark-blue-color  mt-4 " >Your password has been changed!</h4>
              </div>
              <form action="{{ route('success') }}" method="GET">
                @csrf
              <div class="mb-3">
                <button type="submit"
                  class="w-100 button-outline button-color fw-bold p-16"
                >
                 done
                </button>
              </div>
            </form>
            </div>
          </div>
        </div>
      
      </div>
  
    </main>

    <script src="{{asset('Js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('Js/script.js')}}"></script>
  </body>
</html>
