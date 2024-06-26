<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    {{-- Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo&family=Noto+Kufi+Arabic&display=swap" rel="stylesheet">
    <link href="{!! asset('theme/css/sb-admin-2.min.css') !!}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    @yield('style')
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body{
            /* font-family: 'Cairo', sans-serif; */
            font-family: 'Noto Kufi Arabic', sans-serif;
            background-color: #f0f0f0;
        }

        ol, ul, menu {
          list-style: decimal;
          padding-right: 2rem;
        }
        ul, menu {
          list-style: inside;
          padding-right: 2rem;
        }

        input[type=file]{
          position: absolute !important;
          width: 100% !important;
          height: 100% !important;
          top: 0;
          left: 0;
          right: 0;
          bottom: 0;
          opacity: 0;
          cursor: pointer;
        }
        .input-title{
          width: 100%;
          padding: 30px;
          background: rgba(255, 255, 255, 0.1);
          border: 2px dashed rgba(255, 255, 255, 0.1);
          text-align: center;
          transition: background 0.3s ease-in-out;
        }
        .file-area:hover .input-title{
          background: rgba(255, 255, 255, 0.1);
        }
        input[type=file] + .input-title{
          border-color: #f0f0f0;
          background-color: #f0f0f0;
        }
    </style>
</head>
  <body dir="rtl" style="text-align: right;">
    
    <div>
        @include('partials.navbar')

      <main class="py-4 mb-5">
          <div class="container">
            <div class="row">
              @include('alerts.success')

              @yield('content')
              
            </div>
          </div>
        </main>
        @include('partials.footer')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    {{-- FontAwesomeKit --}}
    <script src="https://kit.fontawesome.com/71cf089bc4.js" crossorigin="anonymous"></script> 
    {{-- ckeditor --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
    {{-- jQuery 3.x --}}
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    {{-- pusher --}}
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    
    <script>
      // Enable pusher logging - don't include this in production
      Pusher.logToConsole = true;
  
      var pusher = new Pusher('0ab0f08f102ff6e69e92', {
        cluster: 'mt1'
      });
  
      var channel = pusher.subscribe('my-channel');
      channel.bind('my-event', function(data) {
        alert(JSON.stringify(data));
      });
    </script>

    <script src="{!! asset('theme/js/sb-admin-2.min.js') !!}"></script>

    <script type="module">
      @if (Auth::check())
        var post_userId = {{ Auth::user()->id }};
        Echo.private(`real-notification.${post_userId}`)
        .listen('CommentNotification', (data) => {
          var notificationsWrapper = $('.alert-dropdown');
          var notificationsToggle = notificationsWrapper.find('a[data-bs-toggle]');
          var notificationsCountElem = notificationsToggle.find('span[data-count]');
          var notificationsCount = parseInt(notificationsCountElem.text());
          var notifications = notificationsWrapper.find('div.alert-body');

          var existingNotifications = notifications.html();
          var newNotificationsHtml = '<a class="dropdown-item d-flex align-items-center" href="#">\
                                        <div class="ml-3">\
                                          <div">\
                                            <img style="float:right" src='+data.user_image+' width="50px" class="rounded-full"/>\
                                          </div>\
                                        </div>\
                                        <div>\
                                          <div class="small text-gray-500">'+data.date+'</div>\
                                          <span>'+data.user_name+'وضع تعليقا على هذا المشروع<b>'+data.post_title+'<b><span>\
                                        </div>\
                                      </a>';
          notifications.html(newNotificationsHtml + existingNotifications);
          notificationsCount += 1;
          notificationsWrapper.find('.notif-count').text(notificationsCount);
          notificationsWrapper.show();
        });
      @endif
    </script>

    <script>
      var token = '{{ Session::token() }}';
      var urlNotify = '{{ route('notification') }}';

      $('#alertsDropdown').on('click', function(event){
        event.preventDefault();
        var notificationsWrapper = $('.alert-dropdown');
        var notificationsToggle = notificationsWrapper.find('a[data-bs-toggle]');
        var notificationsCountElem = notificationsToggle.find('span[data-count]');

        notificationsCount = 0;
        notificationsCountElem.attr('data-count', notificationsCount);
        notificationsWrapper.find('.notif-count').text(notificationsCount);
        notificationsWrapper.show();

        $.ajax({
          method: 'POST',
          url: urlNotify,
          data: {
            _token: token
          },
          success : function(data){
            var resposeNotifications = "";
            $.each(data.someNotifications, function(i, item){
              var post_slug = "{{ route('post.show', ':post_slug') }}";
              post_slug = post_slug.replace(':post_slug', item.post_slug);
              resposeNotifications += '<a class="dropdown-item d-flex align-items-center" href='+post_slug+'>\
                                        <div class="ml-3">\
                                          <div">\
                                            <img style="float:right" src='+item.user_image+' width="50px" class="rounded-full"/>\
                                          </div>\
                                        </div>\
                                        <div>\
                                          <div class="small text-gray-500">'+item.date+'</div>\
                                          <span>'+item.user_name+'وضع تعليقا على هذا المشروع<b>'+item.post_title+'<b><span>\
                                        </div>\
                                      </a>';
            $('.alert-body').html(resposeNotifications);
            });
          }
        });

      });
    </script>

    @yield('script')
</body>
</html>