import Alpine from 'alpinejs';

import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';

window.Alpine = Alpine;
window.Calendar = Calendar;
window.dayGridPlugin = dayGridPlugin;

Alpine.start();