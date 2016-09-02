/**
 * Created by Seejee on 8/13/2016.
 * Dependency [PNotify, JQuery]
 */

function ajaxRequest(url, req_data, callbacks, return_json) {
    return_json = $.type(return_json) !== "boolean";
    $.ajax({
        url: url,
        data: req_data
    })
        .done(function (data, textStatus, jqXHR) {
            /*first parameter is server response and second is header*/
            if (!$.isEmptyObject(callbacks) && !!callbacks.success)
                checkJSONResponseStatus(200, return_json, data, jqXHR, false, callbacks.success, callbacks.error);
            else {
                console.log('No callbacks found.');
                new PNotify({
                    title: 'Remote request format',
                    text: 'You didn\'t add callback function on success.'
                });
            }
        })
        .fail(function (jqXHR, textStatus, errorThrown) {
            new PNotify({
                title: 'Server error',
                text: errorThrown,
                type: 'error'
            });

            if (!$.isEmptyObject(callbacks) && !!callbacks.error) {
                checkJSONResponseStatus(0, return_json, null, jqXHR, errorThrown, false, callbacks.error);
            } else {
                console.log('No callbacks found.');
                new PNotify({
                    title: 'Remote request format',
                    text: 'You didn\'t add callback function on error.'
                });
            }
        });
}

function checkJSONResponseStatus(status, return_json, data, jqXHR, errorThrown, callback_success, callback_error) {
    if (status == 0) {
        $.isFunction(callback_error) ? callback_error(jqXHR, 0, errorThrown) : console.log("No error callback found. 'Response:" + errorThrown + "'");
        return;
    }
    if (!return_json)
        callback_success(data, status, jqXHR);
    else {
        json_data = $.parseJSON(data);
        if (json_data.status == 0) { /* in callback error 1 means response found but server rejected request */
            new PNotify({
                title: 'Server reject',
                text: json_data.message,
                type: 'error'
            });
            $.isFunction(callback_error) ? callback_error(json_data.errors, 1, json_data.message) : console.log("No error callback found. 'Response found with status(" + json_data.status + "):" + json_data.message + "'");
            return;
        }

        if ($.isFunction(callback_success)) callback_success(json_data.result, 200, jqXHR);
        else {
            new PNotify({
                title: 'Server reject',
                text: 'No callback function found in ajax request.'
            });
            console.log('No callback function found in ajax request. \n Response recieved: ' + json_data);
        }
    }

}

function post(path, params, method) {
    method = method || "post";
    var form = document.createElement("form");
    form.setAttribute("method", method);
    form.setAttribute("action", path);

    for (var key in params) {
        if (params.hasOwnProperty(key)) {
            var hiddenField = document.createElement("input");
            hiddenField.setAttribute("type", "hidden");
            hiddenField.setAttribute("name", key);
            hiddenField.setAttribute("value", params[key]);

            form.appendChild(hiddenField);
        }
    }

    document.body.appendChild(form);
    form.submit();
}