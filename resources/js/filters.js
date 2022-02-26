/**
 * Created by private on 19/06/2015.
 */

app.filter('range', function() {
    return function(input, total) {
        total = parseInt(total);
        for (var i=1; i<=total; i++)
            input.push(i);
        return input;
    };
});

app.filter('range2', function() {
    return function(input, min, max, text) {
        min = parseInt(min); //Make string input int
        max = parseInt(max);
        for (var i=min; i<max; i++)
            input.push(i + ' ' + text);
        return input;
    };
});

app.filter('reverse', function() {
    return function(items) {
        return items.slice().reverse();
    };
});
