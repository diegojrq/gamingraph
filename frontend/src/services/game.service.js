import api from './api';

const getGame = (game) => api.get(`games/${game}`);

export {    
    getGame,
}
