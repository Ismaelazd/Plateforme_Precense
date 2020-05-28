<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Non Autorisé</title>
    <link rel="stylesheet" href="{{asset('css/403.css')}}" type="text/css">

</head>
<body>
    <h1>403</h1>
    <div><p> <span>ERROR CODE</span>: "<i>HTTP 403 Forbidden</i>"</p>
        <p>> <span>DESCRIPTION DE L'ERREUR </span>: "<i>Accès Refusé. Vous N'Avez Pas La Permission D'Accéder À Cette Page</i>"</p>
        {{-- <p>> <span>ERROR POSSIBLY CAUSED BY</span>: [<b>execute access forbidden, read access forbidden, write access forbidden, ssl required, ssl 128 required, ip address rejected, client certificate required, site access denied, too many users, invalid configuration, password change, mapper denied access, client certificate revoked, directory listing denied, client access licenses exceeded, client certificate is untrusted or invalid, client certificate has expired or is not yet valid, passport logon failed, source access denied, infinite depth is denied, too many requests from the same client ip</b>...]</p> --}}
        <p>> <span>PAGE À LAQUELLE VOUS AVEZ LA PERMISSION D'ACCÉDER </span>: [<a href="/">Page D'Acceuil</a>]</p><p>> <span>PASSEZ UNE BONNE JOURNÉE</span></p>
        </div>
    <script src="{{asset('js/403.js')}}"></script>
</body>
</html>