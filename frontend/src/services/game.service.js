import api from './api';

const getGame = (game) => api.get(`game/${game}`);
const getMostHypedGamesFromAllTime = () => api.get(`game/most-hyped-from-all-time`);
const getGenreCount = () => api.get(`game/genre-count`);
const getThemeCount = () => api.get(`game/theme-count`);
const getGameCount = () => api.get(`game/count`);

export {    
    getGame,
    getGameCount,
    getMostHypedGamesFromAllTime,
    getGenreCount,
    getThemeCount
}
