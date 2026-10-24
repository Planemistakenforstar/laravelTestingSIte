import './bootstrap';
import '../css/app.css';
import.meta.glob(['../img/**']);
import Alpine from 'alpinejs';
import collapse from '@alpinejs/collapse';
import './stores';   // <-- the Alpine store definitions


Alpine.plugin(collapse);
window.Alpine = Alpine;
Alpine.start();
