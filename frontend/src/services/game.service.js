import api from './api';

const getGame = (game) => api.get(`game/${game}`);
const getGameCount = () => api.get(`game/count`);

export {    
    getGame,
    getGameCount
}
