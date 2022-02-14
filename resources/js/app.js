require('./bootstrap');
require('./datepicker.min');
$.fn.datepicker.language['en'] = {
    days: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
    daysShort: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
    daysMin: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
    months: [
        'January',
        'February',
        'March',
        'April',
        'May',
        'June',
        'July',
        'August',
        'September',
        'October',
        'November',
        'December',
    ],
    monthsShort: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
    today: 'Today',
    clear: 'Clear',
    dateFormat: 'mm/dd/yyyy',
    timeFormat: 'hh:ii aa',
    firstDay: 0,
};
require('./main');
require('./contactVoluteer');
require('./contactHost');
require('./contactProject');
import { flare } from '@flareapp/flare-client';

// only launch in production, we don't want to waste your quota while you're developing.
if (process.env.NODE_ENV === 'production') {
    flare.light('McTqNT0q5FEFuxHF9v7iEHWW1eU8wFgx');
}
