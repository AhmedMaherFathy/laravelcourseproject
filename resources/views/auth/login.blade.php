<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Log in (v2)</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">

    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">

    <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css?v=3.2.0')}}">
    <script defer="" referrerpolicy="origin"
        src="/cdn-cgi/zaraz/s.js?z=JTdCJTIyZXhlY3V0ZWQlMjIlM0ElNUIlNUQlMkMlMjJ0JTIyJTNBJTIyQWRtaW5MVEUlMjAzJTIwJTdDJTIwTG9nJTIwaW4lMjAodjIpJTIyJTJDJTIyeCUyMiUzQTAuOTc3MDc2MDY3MzU0NDYxJTJDJTIydyUyMiUzQTE1MzYlMkMlMjJoJTIyJTNBODY0JTJDJTIyaiUyMiUzQTc0NiUyQyUyMmUlMjIlM0ExNTM2JTJDJTIybCUyMiUzQSUyMmh0dHBzJTNBJTJGJTJGYWRtaW5sdGUuaW8lMkZ0aGVtZXMlMkZ2MyUyRnBhZ2VzJTJGZXhhbXBsZXMlMkZsb2dpbi12Mi5odG1sJTIyJTJDJTIyciUyMiUzQSUyMmh0dHBzJTNBJTJGJTJGYWRtaW5sdGUuaW8lMkZ0aGVtZXMlMkZ2MyUyRnBhZ2VzJTJGZXhhbXBsZXMlMkZwcm9maWxlLmh0bWwlMjIlMkMlMjJrJTIyJTNBMjQlMkMlMjJuJTIyJTNBJTIyVVRGLTglMjIlMkMlMjJvJTIyJTNBLTE4MCUyQyUyMnElMjIlM0ElNUIlNUQlN0Q=">
    </script>
    <script nonce="f2fe5931-cc68-4421-bcb7-5c30c3241d36">
        (function(w, d) {
            ! function(du, dv, dw, dx) {
                du[dw] = du[dw] || {};
                du[dw].executed = [];
                du.zaraz = {
                    deferred: [],
                    listeners: []
                };
                du.zaraz.q = [];
                du.zaraz._f = function(dy) {
                    return async function() {
                        var dz = Array.prototype.slice.call(arguments);
                        du.zaraz.q.push({
                            m: dy,
                            a: dz
                        })
                    }
                };
                for (const dA of ["track", "set", "debug"]) du.zaraz[dA] = du.zaraz._f(dA);
                du.zaraz.init = () => {
                    var dB = dv.getElementsByTagName(dx)[0],
                        dC = dv.createElement(dx),
                        dD = dv.getElementsByTagName("title")[0];
                    dD && (du[dw].t = dv.getElementsByTagName("title")[0].text);
                    du[dw].x = Math.random();
                    du[dw].w = du.screen.width;
                    du[dw].h = du.screen.height;
                    du[dw].j = du.innerHeight;
                    du[dw].e = du.innerWidth;
                    du[dw].l = du.location.href;
                    du[dw].r = dv.referrer;
                    du[dw].k = du.screen.colorDepth;
                    du[dw].n = dv.characterSet;
                    du[dw].o = (new Date).getTimezoneOffset();
                    if (du.dataLayer)
                        for (const dH of Object.entries(Object.entries(dataLayer).reduce(((dI, dJ) => ({
                                ...dI[1],
                                ...dJ[1]
                            })), {}))) zaraz.set(dH[0], dH[1], {
                            scope: "page"
                        });
                    du[dw].q = [];
                    for (; du.zaraz.q.length;) {
                        const dK = du.zaraz.q.shift();
                        du[dw].q.push(dK)
                    }
                    dC.defer = !0;
                    for (const dL of [localStorage, sessionStorage]) Object.keys(dL || {}).filter((dN => dN
                        .startsWith("_zaraz_"))).forEach((dM => {
                        try {
                            du[dw]["z_" + dM.slice(7)] = JSON.parse(dL.getItem(dM))
                        } catch {
                            du[dw]["z_" + dM.slice(7)] = dL.getItem(dM)
                        }
                    }));
                    dC.referrerPolicy = "origin";
                    dC.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(du[dw])));
                    dB.parentNode.insertBefore(dC, dB)
                };
                ["complete", "interactive"].includes(dv.readyState) ? zaraz.init() : du.addEventListener(
                    "DOMContentLoaded", zaraz.init)
            }(w, d, "zarazData", "script");
        })(window, document);
    </script>
</head>

<body class="login-page" style="min-height: 464px;">
    <div class="login-box">

        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="/" class="h1"><b>Mostafa Askar</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                @if(Session::has('fail'))
                    <p class="alert alert-danger">{{session()->get('fail')}}</p>
                @endif

                <form action="{{route('login')}}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        

                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>

                    </div>
                </form>
              

              
            </div>

        </div>

    </div>


    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>

    <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <script src="{{asset('dist/js/adminlte.min.js?v=3.2.0')}}"></script>


</body>

</html>
