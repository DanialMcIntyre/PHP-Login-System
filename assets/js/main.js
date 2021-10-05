$(document)
//Registration
.on("submit", "form.js-register", function(event) {
    event.preventDefault();

    var _form = $(this);
    var _error = $(".js-error", _form);
    var dataObj = {
        email: $("input[type='email']", _form).val(),
        password: $("input[type='password']", _form).val()
    };

    if(dataObj.email.length < 6) {  
        _error.text("Please enter a valid email address").show();
        return false;
    } else if (dataObj.password.length < 8) {
        _error.text("Please enter a password that is at least 9 characters long").show();
        return false;
    }

    _error.hide();

    $.ajax({
		type: 'POST',
		url: '/FullStackPHP/PHP-Login-System/ajax/register.php',
		data: dataObj,
		dataType: 'json',
		async: true,
	})
	.done(function ajaxDone(data) {
		// Whatever data is 
		console.log(data);
        if(data.redirect !== undefined) {
            window.location = data.redirect;
        } else if(data.error !== undefined) {
            _error.text(data.error).show();
        }
	})
	.fail(function ajaxFailed(e) {
		// This failed 
        console.log(e);
	})
	.always(function ajaxAlwaysDoThis(data) {
		// Always do
        console.log('Always');
	})

    return false;
})
//Login
.on("submit", "form.js-login", function(event) {
    event.preventDefault();

    var _form = $(this);
    var _error = $(".js-error", _form);
    var dataObj = {
        email: $("input[type='email']", _form).val(),
        password: $("input[type='password']", _form).val()
    };

    if(dataObj.email.length < 6) {
        _error.text("Please enter a valid email address").show();
        return false;
    } else if (dataObj.password.length < 8) {
        _error.text("Please enter a password that is at least 9 characters long").show();
        return false;
    }

    _error.hide();

    $.ajax({
		type: 'POST',
		url: '/FullStackPHP/PHP-Login-System/ajax/login.php',
		data: dataObj,
		dataType: 'json',
		async: true,
	})
	.done(function ajaxDone(data) {
		// Whatever data is 
		console.log(data);
        if(data.redirect !== undefined) {
            window.location = data.redirect;
        } else if(data.error !== undefined) {
            _error.html(data.error).show();
        }
	})
	.fail(function ajaxFailed(e) {
		// This failed 
        console.log(e);
	})
	.always(function ajaxAlwaysDoThis(data) {
		// Always do
        console.log('Always');
	})

    return false;
})
//Change pass
.on("submit", "form.js-changepass", function(event) {
    
    event.preventDefault();

    var _form = $(this);
    var _error = $(".js-error", _form);
    var _success = $(".js-success", _form);
    var dataObj = {
        password: $("input[type='password']", _form).val()
    };

    if(dataObj.password.length < 8) {
        _error.text("This password is too short! Must be at least 8 characters!").show();
        return false;
    } else {
        _success.text("Password change successful!").show();
        _error.hide();
    }

    $.ajax({
		type: 'POST',
		url: '/FullStackPHP/PHP-Login-System/ajax/changepass.php',
		data: dataObj,
		dataType: 'json',
		async: true,
	})
	.done(function ajaxDone(data) {
		// Whatever data is 
		console.log(data);
        if(data.redirect !== undefined) {
            window.location = data.redirect;
        } else if(data.error !== undefined) {
            _error.html(data.error).show();
        }
	})
	.fail(function ajaxFailed(e) {
		// This failed 
        console.log(e);
	})
	.always(function ajaxAlwaysDoThis(data) {
		// Always do
        console.log('Always');
	})

    return false;
    
})