window.useDefault = false;

window.onload = function () {
    if (window.useDefault || ie8() || getParameterByName('dev')) {
        document.getElementById('default').style.display = 'block';
        var loginIframe = document.getElementById('loginIframe');
        loginIframe.parentNode.removeChild(loginIframe);
        return;
    }

     if (/MicroMessenger/i.test(navigator.userAgent) && /auth\.bupt\.edu\.cn/i.test(window.location.host) && !getParameterByName('noAutoRedirect') && !config.error) {
         var url = config.pac4j.filter(function(e){return e.name === 'mc-wx'})[0].href;
         window.open(url, '_self');
         return;
     }

    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
        //document.getElementById('loginIframe').src = '/authserver/cas/login-mobile.html';
        document.getElementById('default').style.display = 'block';
    } else {
        //document.getElementById('loginIframe').src = '/authserver/cas/login-normal.html';
        document.getElementById('default').style.display = 'none';
    }
};
