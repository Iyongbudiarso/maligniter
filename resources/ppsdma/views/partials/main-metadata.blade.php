<title>{{ $_ci->config->item('site_name') }}</title>
<meta charset="utf-8">
<meta name="csrf-token" content="{{ $_ci->security->get_csrf_hash() }}">
<link rel="canonical" href="{{ base_url() }}" >
<link rel="icon" href="{{ theme_url('manifest/favicon.ico') }}" type="image/x-icon" />
<link rel="shortcut icon" type="image/x-icon" href="{{ theme_url('manifest/favicon.ico') }}" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta property="fb:app_id" content="{{ $_ci->config->item('facebook_application_id') }}" />
@section('metacontent')
@show

<link rel="stylesheet" type="text/css" href="{{ theme_url('css/global.min.css') }}">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lilita+One">
@section('appendstyle')
@show

<link rel="apple-touch-icon" sizes="57x57" href="{{ theme_url('manifest/apple-icon-57x57.png') }}">
<link rel="apple-touch-icon" sizes="60x60" href="{{ theme_url('manifest/apple-icon-60x60.png') }}">
<link rel="apple-touch-icon" sizes="72x72" href="{{ theme_url('manifest/apple-icon-72x72.png') }}">
<link rel="apple-touch-icon" sizes="76x76" href="{{ theme_url('manifest/apple-icon-76x76.png') }}">
<link rel="apple-touch-icon" sizes="114x114" href="{{ theme_url('manifest/apple-icon-114x114.png') }}">
<link rel="apple-touch-icon" sizes="120x120" href="{{ theme_url('manifest/apple-icon-120x120.png') }}">
<link rel="apple-touch-icon" sizes="144x144" href="{{ theme_url('manifest/apple-icon-144x144.png') }}">
<link rel="apple-touch-icon" sizes="152x152" href="{{ theme_url('manifest/apple-icon-152x152.png') }}">
<link rel="apple-touch-icon" sizes="180x180" href="{{ theme_url('manifest/apple-icon-180x180.png') }}">
<link rel="icon" type="image/png" sizes="192x192"  href="{{ theme_url('manifest/android-icon-192x192.png') }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ theme_url('manifest/favicon-32x32.png') }}">
<link rel="icon" type="image/png" sizes="96x96" href="{{ theme_url('manifest/favicon-96x96.png') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ theme_url('manifest/favicon-16x16.png') }}">
<link rel="manifest" href="{{ theme_url('manifest/manifest.json') }}">
<meta name="msapplication-TileColor" content="#ffffff ">
<meta name="msapplication-TileImage" content="{{ theme_url('manifest/ms-icon-144x144.png') }}">
<meta name="theme-color" content="#ffffff">

<script type="text/javascript">
    window.fbAsyncInit = function() {
        FB.init({
            appId      : "{{ $_ci->config->item('facebook_application_id') }}", // '270157153450222'
            xfbml      : true,
            version    : 'v2.9'
        });
        FB.AppEvents.logPageView();
    };

    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<script type="text/javascript">
    function shareFB(title, href, caption, description, picture) {
        console.log(title);
        console.log(href);
        console.log(caption);
        console.log(description);
        console.log(picture);

        FB.ui({
            method: 'feed',
            name: title,
            link: href,
            caption: caption,
            description: description,
            picture: picture,
        },function(response){
        });

        return false;
    }

    function shareTW(href, description) {
        var length = 110;
        var body = description;
        if(body.length>length){
            body = body.substring(0, length);
            body += '...';
        }
        var data = encodeURIComponent(href)+'&text='+encodeURIComponent(body);

        var width  = 575,
        height = 400,
        left   = (screen.width - width) / 2,
        top    = (screen.height - height) / 2,
        url    = 'https://twitter.com/share?url='+data,
        opts   =    'status=1'+
        ',width='+width+
        ',height='+height+
        ',top='+top+
        ',left='+left;

        window.open(url, 'twitter', opts);

        return false;
    }
</script>