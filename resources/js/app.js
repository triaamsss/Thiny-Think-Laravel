import './bootstrap';

import Alpine from 'alpinejs';
import { letterNavigator } from './components/letterNavigator';
import { quizEngine }      from './components/quizEngine';
import { matchingGame }    from './components/matchingGame';

Alpine.data('letterNavigator', letterNavigator);
Alpine.data('quizEngine',      quizEngine);
Alpine.data('matchingGame',    matchingGame);

window.Alpine = Alpine;

Alpine.start();  // ← ganti dari DOMContentLoaded wrapper