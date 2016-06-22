/**
 * Created by mikem on 6/18/2016.
 */

$(document).ready(function(){
    $.jTimeout({
        'flashTitle': true,
        'flashTitleSpeed': 500,
        'flashingTitleText': '**WARNING**',
        'originalTitle': document.title,

        'tabID': false,
        'timeoutAfter': 300,
        'heartbeat': 1,

        'extendOnMouseMove': true,
        'mouseDebounce': 30,

        'extendUrl': '/',
        'logoutUrl': '/logout',
        'loginUrl': '/login',

        'secondsPrior': 60

    });

});

function loading(toggle)
{
    if(toggle == 'start')
    {
        $('body').append('<div id="loading"><div><span class="fa-li fa fa-cog fa-spin"></span> <div id="loading_text">Working...please wait.</div></div></div>');
        $('#loading').fadeIn('fast');
    }
    else
    {
        $('#loading').fadeOut('fast', function(){
            $(this).remove();
        });
    }
}
