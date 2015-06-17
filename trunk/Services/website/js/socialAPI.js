//setfbconfig('386632408213192','v2.3');
setfbconfig('464257530407346','v2.2');
var fbLoginResponseInfo = '';
var loginFacebook	=	function(){
	checkfbLoginState('0,1', postLoginFunction);
};
var postLoginFunction	= function(){
	alert('Welcome '+fbLoginResponseInfo['first_name']);
};